<?php

namespace App\Http\Controllers\Admin;
use App\Klausimai;
use App\grupe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\KlausimaiExport;
use Maatwebsite\Excel\Facades\Excel;

class KlausimaiController  extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $klaus =Klausimai::orderBy('id', 'desc')->paginate(10);
        $grupe =grupe::orderBy('grupe','asc')->paginate(100);
        return view('admin.klausimai.index', ['klaus' => $klaus ,'grupe' => $grupe]);
    }

    public function export(Request $request) 
    {
      // dd($request->grupe);//->nuo, $request->iki, $request->centras);
      $gr=$request->grupe;
        return Excel::download(new KlausimaiExport($gr), 'klausimai_gr'.$gr.'_'.date('Ymd_His').'.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.klausimai.create');
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
        Klausimai::create($request->all());

       // $request->session()->flash('success', 'Kontaktas pridėtas');

        return redirect()->route('klausimai.index')->with('success', 'Klausimas pridėtas');
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
        $klaus = Klausimai::find($id);


        return view('admin.klausimai.edit', compact('klaus'));
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
        Klausimai::destroy($id);
        return redirect()->route('klausimai.index')->with('success', 'Klausimas ištrintas');
    }

    
}
