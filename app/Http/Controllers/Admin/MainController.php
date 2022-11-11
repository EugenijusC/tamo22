<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
class MainController extends Controller
{

    public function index()
    {
        // TODO: add unique to slug fields

        // $contact = new Contact();
        // $contact->email = 'eugenijus@tuvlita.lt';
        // //$contact->subject = 'ssd';
        // $contact->message = 'Hello contact@example.com';
        // $contact -> save();

// return view('admin.index');
        
    return redirect()->route('start');
    }

}
