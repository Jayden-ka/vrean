<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testcontroller extends Controller
{
    public function index(Request $test){
        //dd($test->input('idclass'));
        $myarray['myarray']=$test->input('idclass');
        return view('mine.test',$myarray);
    }
    public function kosal(Request $test2){
        $myarray['myarray']=$test2->input('idclass');
        return view('mine.test2',$myarray);
    }
    public function kosal2(Request $test3){
        //foreach($idMaterial as $itemmaterial){
            if($test3->hasFile('file')){
                foreach($test3->file('file') as $item){                    
                    $filenameWithExt=$item->getClientOriginalName();
                    $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension= $item->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path=$item->storeAs('public/photo/material',$fileNameToStore);
                    $resultId = DB::table("kosalcutes")
                                ->insertGetId(
                                    [   
                                        "title" =>$test3->input('title'),
                                        "file"=>$fileNameToStore // Just string
                                    ]
                                );
                }                
            }else{
                $fileNameToStore= 'noname';
            }
            // $value= session('id');
            // $username = DB::select('select * from users where idUser=?',[$value]);
            // $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
            // $class=DB::select('select * from classrooms order by idclass desc');
            
            // foreach($username as $item){
            //     return view('layouts.classroom',[
            //         'username'=> $item->username,
            //         'userid' => $value,
            //         'yourclass' => $yourclass,
            //         'class' => $class
            //     ]); 
            // }
            return redirect('/class');  
            //return view('layouts.classroom');
        //}
        // DB::table("kosalcutes")
        // ->insertGetId(
        //                             [   
        //                                 "title" =>$test3->input('title'),
        //                                 "file"=>$fileNameToStore // Just string
        //                             ]
        //                         );
    }
}
