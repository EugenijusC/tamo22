<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts =Contact::orderBy('created_at', 'desc')->paginate(9);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:99'],
            'subject' => 'required',
            'message' => 'required',
        ]);
        Contact::create($request->all());

       // $request->session()->flash('success', 'Kontaktas pridėtas');

        return redirect()->route('kontaktai.index')->with('success', 'Kontaktas pridėtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kontaktas = Contact::find($id);
        return view('admin.contacts.edit', compact('kontaktas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:99'],
            'subject' => 'required',
            'message' => 'required',
        ]);

        $kontaktas = Contact::find($id);
      //  dd($kontaktas);
//        $category->slug = null;
        $kontaktas->update($request->all());
        return redirect()->route('kontaktai.index')->with('success', 'Pakeitimai išsaugoti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Contact::destroy($id);
        return redirect()->route('kontaktai.index')->with('success', 'Kontaktas ištrintas');
    }


    public function __invoke(Request $request)
    {
        
    }
}
