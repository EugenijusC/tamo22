<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Klausimai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
         //   'usr_search' => 'required',
        ]);

        $s =$request->usr_search;
        $c=$request->centras;

        if($c=='-visi-'){
            $users = USER::like($s)->paginate(50);
        }
        else {
            $users = USER::where('centras','=', "{$c}")->where('name','LIKE', "%{$s}%")->paginate(50);
        }


        
        return view('admin.useriai.search', compact('users','s','c'));
    }

    

 
}
