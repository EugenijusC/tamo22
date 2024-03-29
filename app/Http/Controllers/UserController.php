<?php

namespace App\Http\Controllers;


use App\Klausimai;
use App\User;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Route;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\DownloadExcel;
use Carbon\Carbon;

class UserController extends Controller
{

    public function export(Request $request) 
{
   //dd($request->nuo, $request->iki, $request->centras);
    return Excel::download(new UsersExport($request->nuo, $request->iki, $request->centras, $request->kontr, $request->kontr_vardas), 'users_'.date('Ymd_His').'.xlsx');
/*
   // Route::get('/users/export/', function (Request $request) {
     //   $filters = $request->only(['name', 'email']); // Filtravimo kriterijai
    
       // return (new UsersExport($filters))->with([
       //     'title' => 'Vartotojų sąrašas',
         //   'date' => now()->format('Y-m-d'),
       // ])->download('users.xlsx');
    */
}

  //      public function export(Request $request) 
 //       {
 //        $centras=empty($request->centras) ? '99' : $request->centras; 
          //  return Excel::download(new UsersExport, 'users-'+time()+'.xlsx');
         //   return (new UsersExport)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
         
         
         //return (new UsersExport)->download('invoices.xlsx');
 //        return (new UsersExport($centras))->download('users'.$centras.'.xlsx');
 //       }

        // public function action(Request $request) 
        // {
        //     return [
        //         (new DownloadExcel)->withHeadings(),
        //     ];
        // }

//    public function index() {
//        $user =Auth::user();
//        dd($user);
//        return view('user.login');
//    }

//    public function start() {
//        return redirect()->route('start');
//    }

    public function loginT() {
        return view('user.login_tuv', compact([]));
    }

    public function mailU() {
        return view('mail.user.password', compact([]));
    }




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
              //  Debugbar::addMessage('ddd');
                \Debugbar::enable();
                return redirect()->route('admin.index');
            } else {
                \Debugbar::disable();
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

    public function forgot()
    {
        
        return view('user.forgot-password');
    }
    public function forgot_store(Request $request)
    {
      //  dd($request);
        $request->validate([
          
            'email' => 'required|string|email',
          
        ]);
        $status = Password::sendResetLink(
            $request->only('email')
        );
//dd(($status));
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => trans($status)]);
    
    }

    public function passw_store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => trans($status)]);
    }
      
    public function passw_create(Request $request)
    {
        return view('user.reset-password', ['request' => $request]);
    }

}

