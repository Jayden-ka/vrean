<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
use App\post;
use App\post_file;
use App\like;
use App\class_teacher;
use App\classroom;
use DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms order by idclass desc');
        
        foreach($username as $item){
            return view('layouts.classroom',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class
            ]); 
        }  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function joinedclass()
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        foreach($username as $item){
            return view('layouts.joinedclass',[
                'username'=> $item->username,
                'userid' => $value
            ]); 
        }  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createassignment()
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        foreach($username as $item){
            return view('layouts.create-assignment',[
                'username'=> $item->username,
                'userid' => $value
            ]); 
        }  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creatematerial()
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        foreach($username as $item){
            return view('layouts.create-material',[
                'username'=> $item->username,
                'userid' => $value
            ]); 
        }  
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request1
     * @return \Illuminate\Http\Response
     */
    public function createclass(Request $request1){
        $idUser=session('id');
        $class= new classroom();
        $classteacher= new class_teacher();
        $class->classname= $request1->input('classname');
        $class->subject= $request1->input('classsubject');
        $class->room= $request1->input('classroom');
        $class->classcode= $idUser.''.time();
        $class->save();

        $idClass=DB::select('select idclass from classrooms order by idclass desc limit 1');
        foreach($idClass as $item){
            $classteacher->idclass=$item->idclass;
        }
        $classteacher->idUser=$idUser;
        $classteacher->save();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request2
     * @return \Illuminate\Http\Response
     */
    public function inclass(Request $request2){
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms order by idclass desc');
        
        foreach($username as $item){
            return view('layouts.stream-class',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class
            ]); 
        }  

        return "hello";
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
