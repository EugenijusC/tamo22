<?php

namespace App\Http\Controllers\Admin;
use App\Klausimai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Search_kl_Controller extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
         //   'usr_search' => 'required',
        ]);

        $s =$request->kl_search;
        $c=$request->grupe;

        if($c=='-visos-'){
            $klaus = Klausimai::like($s)->paginate(50);
        }
        else {
            $klaus = Klausimai::where('klaus_gr_id','=', "{$c}")->where('klaus_pavadinimas','LIKE', "%{$s}%")->paginate(50);
        }


        
        return view('admin.klausimai.search', compact('klaus','s','c'));
    }
}
