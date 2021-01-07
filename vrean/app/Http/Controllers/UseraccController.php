<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use DB;

class UseraccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'gender' => 'required',
        ]);
        $id= user::count();
        $user = new user();
        $username= $request->input('firstname').$request->input('lastname');
        $dob=$request->input('year')."-".$request->input('month')."-".$request->input('day');
        $user->idUser=$id+1;
        $user->username=$username;
        $user->first_name=$request->input('firstname');
        $user->last_name=$request->input('lastname');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->gender=$request->input('gender');
        $user->dob=$dob;
        $user->save();
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request1
     * @return \Illuminate\Http\Response
     */
    public function log2(Request $request1)
    {
        $this->validate($request1,[
            'email' => 'required|min:11',
            'password' => 'required|min:8'
        ]);

        $user = DB::select('select * from users');
        foreach($user as $item){
            if($request1->input('email')==$item->email && $request1->input('password')==$item->password){        
                session(['id'=>$item->idUser]);
                return redirect('/media');
            }
        }
        return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    }
}
