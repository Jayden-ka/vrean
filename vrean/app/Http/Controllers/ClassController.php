<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
use App\post;
use App\post_file;
use App\like;
use App\class_teacher;
use App\class_student;
use App\classroom;
use App\material;
use App\material_file;
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
        //thaem herre
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourjoinedclass= DB::select('select * from class_students where idUser=?',[$value]);
        $class=DB::select('select * from classrooms order by idclass desc');
        
        foreach($username as $item){
            return view('layouts.joinedclass',[
                'username'=> $item->username,
                'userid' => $value,
                'yourjoinedclass' => $yourjoinedclass,
                'class' => $class
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
        $material = new material();

    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request5
     * @return \Illuminate\Http\Response
     */
    public function creatematerial(Request $request5)
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $idclass= $request5->input('idclass');
        
        foreach($username as $item){
            return view('layouts.create-material',[
                'username'=> $item->username,
                'userid' => $value,
                'idclass' => $idclass
            ]); 
        }  
    }

    // /**
    //  * Display a listing of the resource.
    //  * @param  int $idclass1
    //  * @return \Illuminate\Http\Response
    //  */
    // public function creatematerial($idclass1)
    // {
    //     $value= session('id');
    //     $username = DB::select('select * from users where idUser=?',[$value]);
        
    //     foreach($username as $item){
    //         return view('layouts.create-material',[
    //             'username'=> $item->username,
    //             'userid' => $value,
    //             'idclass' => $idclass1
    //         ]); 
    //     }  
    // }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request4
     * @return \Illuminate\Http\Response
     */
    public function creatingmaterial(Request $request4)
    {
        $material = new material();
        //$file=  new material_file();
        $idTeacher=DB::select('select idTeacher from class_teachers where idclass=?',[$request4->input('idclass')]);
        foreach($idTeacher as $item){
            $material->idTeacher=$item->idTeacher;
        }
        $material->title=$request4->input('title');
        $material->caption=$request4->input('caption');
        $material->save();
        $idMaterial= DB::select('select idMaterial from materials order by idMaterial desc limit 1');
        foreach($idMaterial as $itemmaterial){
            if($request4->hasFile('file')){
                foreach($request4->file('file') as $item){                    
                    $filenameWithExt=$item->getClientOriginalName();
                    $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension= $item->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path=$item->storeAs('public/photo/material',$fileNameToStore);
                    $resultId = DB::table("material_files")
                                ->insertGetId(
                                    [   
                                        "idMaterial" =>$itemmaterial->idMaterial,
                                        "file"=>$fileNameToStore // Just string
                                    ]
                                );
                }                
            }else{
                $fileNameToStore= 'noname';
            }
        }
        return redirect('/inclass');
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
     * @param  \Illuminate\Http\Request  $request3
     * @return \Illuminate\Http\Response
     */
    public function joiningclass(Request $request3){

        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$request3->input('idclass')]);
        
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request2
     * @return \Illuminate\Http\Response
     */
    public function inclass_material(Request $request2){
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$request2->input('idclass')]);
        
        foreach($username as $item){
            return view('layouts.material-list',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $request2->input('idclass')
            ]); 
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request6
     * @return \Illuminate\Http\Response
     */
    public function inclass_assignment(Request $request6){
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$request6->input('idclass')]);
        
        foreach($username as $item){
            return view('layouts.assignment-list',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $request6->input('idclass')
            ]); 
        }  
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
