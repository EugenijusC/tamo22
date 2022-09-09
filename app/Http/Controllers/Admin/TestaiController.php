<?php

namespace App\Http\Controllers\Admin;

use App\Rezultatai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class TestaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testai =Rezultatai::orderBy('testas_pradzia', 'desc')->paginate(12);
        return view('admin.testai.index', compact('testai'));
    }


    public function testas_sm( $id, $name=null){



         $rez = DB::table('test_kl_view')
         ->where('test_testas_id',$id)
         ->get()
         ->toArray(); 

         $rez_sum = DB::table('rezultatais')
         ->where('id',$id)
         ->get()
         ->toArray(); 


        return view('admin.testai.testas_smulkiai', ['testas' => $rez, 'sumine' => $rez_sum, 'test_id' => $id, 'vardas' => $name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $testai =Rezultatai::find($id);
        return view('admin.testai.smulkiai', compact('testai'));
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
        //
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

        Rezultatai::destroy($id);
        return redirect()->route('testai.index')->with('success', "Testas $id ištrintas");
    }
}
