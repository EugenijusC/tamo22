<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class UseriaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users =User::orderBy('id', 'desc')->paginate(15);
        return view('admin.useriai.index', compact('users'));
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
        $useris = User::find($id);
        return view('admin.useriai.edit', compact('useris'));
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'confirmed',
            'centras' => 'required|integer|between:0,9',
        ]);

        if ($request->password ){
                    $request->merge(['password' => bcrypt($request->password)]);
        }

        $useris = User::find($id);
      //  dd($useris);
//        $category->slug = null;

// $user = User::update([
//     'name' => $request->name,
//     'email' => $request->email,
//     'centras' => $request->centras,
//     'password' => bcrypt($request->password),
// ]);

        $data = $request->password ? $request->all():$request->except('password');

        $useris->update($data);
        return redirect()->route('useriai.index')->with('success', 'Pakeitimai išsaugoti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('useriai.index')->with('success', 'Vartotojas ištrintas');
    }
}
