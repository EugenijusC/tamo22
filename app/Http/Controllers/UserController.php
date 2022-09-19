<?php

namespace App\Http\Controllers;


use App\Klausimai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use App\Contact;


use Carbon\Carbon;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


//    public function index() {
//        $user =Auth::user();
//        dd($user);
//        return view('user.login');
//    }

//    public function start() {
//        return redirect()->route('start');
//    }






    public function contacts() {
        //$reviews = new Contact();
      //  $posts = Post::orderBy('id'),
        $puslapiavimas=\Config::get('constants.puslapiavimas.contacts_row_per_page');
        $contacts =Contact::orderBy('created_at', 'desc')->paginate($puslapiavimas);
        return view('user.contacts', compact('contacts'));
    }


    public function contacts_check(Request $request){
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:10|max:500'
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('contacts');
    }





    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'centras' => 'required|integer|between:0,9',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'centras' => $request->centras,
            'password' => bcrypt($request->password),
        ]);
  
       // dd($user);

      //  session()->flash('success', 'Naujas vartotojas įrašytas'.$request->name);
     //  Auth::login($user);
        return redirect()->route('useriai.index')->with('success', 'Naujas vartotojas įrašytas  '.$request->name); // redirect()->home();
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Sėkmingai prisijungėte '.$request->name);
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->home();
            }
        }

        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }

    public function atgal()
    {
        return redirect()->back();
    }

    public function klausimai()
    {
        $klausimai = Klausimai::all();
    }

}

