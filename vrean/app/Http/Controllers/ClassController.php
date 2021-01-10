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
use App\assignment;
use App\assignment_file;
use App\answer;
use App\answer_file;
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
     * creating assignment
     *
     * @param  \Illuminate\Http\Request  $assignment
     * @return \Illuminate\Http\Response
     */
    public function createassignment(Request $assignment)
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $idclass= $assignment->input('idclass');
        
        foreach($username as $item){
            return view('layouts.create-assignment',[
                'username'=> $item->username,
                'userid' => $value,
                'idclass' => $idclass
            ]); 
        }  

    }

    /**
     * upload assignment to database
     * @param  \Illuminate\Http\Request  $assignment2
     * @return \Illuminate\Http\Response
    */
    public function creatingassignment(Request $assignment2){
        $assignment = new assignment();
        //$file=  new material_file();
        $idTeacher=DB::select('select idTeacher from class_teachers where idclass=?',[$assignment2->input('idclass')]);
        foreach($idTeacher as $item){
            $assignment->idTeacher=$item->idTeacher;
        }
        $assignment->title=$assignment2->input('title');
        $assignment->caption=$assignment2->input('description');
        $assignment->score=$assignment2->input('score');
        $assignment->due_date=$assignment2->input('due_date');
        $assignment->idclass=$assignment2->input('idclass');
        $assignment->save();
        $idAssignment= DB::select('select idAssignment from assignments order by idAssignment desc limit 1');
        foreach($idAssignment as $itemassignment){
            if($assignment2->hasFile('file')){
                foreach($assignment2->file('file') as $item){                    
                    $filenameWithExt=$item->getClientOriginalName();
                    $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension= $item->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path=$item->storeAs('public/photo/assignment',$fileNameToStore);
                    $resultId = DB::table("assignment_files")
                                ->insertGetId(  
                                    [   
                                        "idAssignment" =>$itemassignment->idAssignment,
                                        "file"=>$fileNameToStore // Just string
                                    ]
                                );
                }                
            }else{
                $fileNameToStore= 'noname';
            }
        }
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$assignment2->input('idclass')]);
        $assignment=DB::select('select * from assignments where idclass=? order by idAssignment desc',[$assignment2->input('idclass')]);
        $assignment_file=DB::select('select * from assignment_files where idclass=? order by idAssignment desc',[$assignment2->input('idclass')]);

        foreach($username as $item){
            return view('layouts.assignment-list',[

                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $assignment2->input('idclass'),
                'assignment' => $assignment
                
            ]); 
        } 
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request5
     * @return \Illuminate\Http\Response
     */
    public function creatematerial(Request $request5)
    {
        //dd('hello');
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
        $material->idclass=$request4->input('idclass');
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

        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$request4->input('idclass')]);
        $material=DB::select('select * from materials where idclass=? order by idMaterial desc',[$request4->input('idclass')]);
        
        foreach($username as $item){
            return view('layouts.material-list',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $request4->input('idclass'),
                'material' => $material
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
     * @param  \Illuminate\Http\Request  $request3
     * @return \Illuminate\Http\Response
     */
    public function joiningclass_material(Request $request3){

        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$request3->input('idclass')]);
        $material=DB::select('select * from materials where idclass=? order by idMaterial desc',[$request3->input('idclass')]);
        
        foreach($username as $item){
            return view('layouts.material-list-student',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $request3->input('idclass'),
                'material' => $material
            ]); 
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $assignment_student
     * @return \Illuminate\Http\Response
     */
    public function joiningclass_assignment(Request $assignment_student){

        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$value]);
        $class=DB::select('select * from classrooms where idclass=?',[$assignment_student->input('idclass')]);
        //$material=DB::select('select * from materials where idclass=? order by idMaterial desc',[$request3->input('idclass')]);
        $assignment=DB::select('select * from assignments where idclass=? order by idAssignment desc',[$assignment_student->input('idclass')]);

        foreach($username as $item){
            return view('layouts.assignment-list-student',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $assignment_student->input('idclass'),
                'assignment' => $assignment,

            ]); 
        }  
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $classcode
     * @return \Illuminate\Http\Response
     * 
     */
    public function jointheclass(Request $classcode){
        $student= new class_student();
        $idUser= session('id');
        $idclass=DB::select('select * from classrooms where classcode=?',[$classcode->input('classcode')]);
        $student->idUser=$idUser;
        foreach($idclass as $item){
            $student->idclass=$item->idclass;
        }
        $student->save();

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
     * 
     * @param  \Illuminate\Http\Request  $putscore
     * @return \Illuminate\Http\Response
     * 
     */
    public function put_stu_score(Request $putscore){

        DB::update('update answers set score = ? where idAnswer = ?', [$putscore->input('score'),$putscore->input('ida')]);
        
        //returning
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        $teacher=DB::select('select * from users join class_teachers on class_teachers.idUser=users.idUser where class_teachers.idclass=?',[$putscore->input('idc')]);
        $assignment=DB::select('select * from assignments where idAssignment=? order by idAssignment desc',[$putscore->input('idA')]);
        $assignment_file=DB::select('select * from assignment_files where idAssignment=? order by idAssignment desc',[$putscore->input('idA')]);
        $student_unsubmit=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$putscore->input('idc')]);
        $student_submit=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser inner join answers on answers.idStudent=class_students.idStudent inner join answer_files on answer_files.idAnswer=answers.idAnswer where answers.idAssignment=?',[$putscore->input('idA')]);
        foreach($username as $item){
            return view('layouts.view-assignment-teacher',[
                'username' => $item->username,
                'assignment' => $assignment,
                'assignment_file' => $assignment_file,
                'teacher' => $teacher,
                'student_submit' => $student_submit
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
        $material=DB::select('select * from materials where idclass=? order by idMaterial desc',[$request2->input('idclass')]);
        
        foreach($username as $item){
            return view('layouts.material-list',[
                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $request2->input('idclass'),
                'material' => $material
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
        $assignment=DB::select('select * from assignments where idclass=? order by idAssignment desc',[$request6->input('idclass')]);
        $assignment_file=DB::select('select * from assignment_files where idclass=? order by idAssignment desc',[$request6->input('idclass')]);

        foreach($username as $item){
            return view('layouts.assignment-list',[

                'username'=> $item->username,
                'userid' => $value,
                'yourclass' => $yourclass,
                'class' => $class,
                'idclass' => $request6->input('idclass'),
                'assignment' => $assignment
                
            ]); 
        }  
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $request7
     * @return \Illuminate\Http\Response
     * 
     */
    public function view_material(Request $request7){
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        // $class=DB::select('select * from classrooms where idclass=?',[$request7->input('idclass')]);
        $teacher=DB::select('select * from users join class_teachers on class_teachers.idUser=users.idUser where class_teachers.idclass=?',[$request7->input('idc')]);
        $material=DB::select('select * from materials where idMaterial=? order by idMaterial desc',[$request7->input('idm')]);
        $material_file=DB::select('select * from material_files where idMaterial=? order by idMaterial desc',[$request7->input('idm')]);

        foreach($username as $item){
            return view('layouts.view-material',[
                'username' => $item->username,
                'material' => $material,
                'material_file' => $material_file,
                'teacher' => $teacher
            ]);
        }
        
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $view_assignment
     * @return \Illuminate\Http\Response
     * 
     */
    public function view_assignment(Request $view_assignment){
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        // $class=DB::select('select * from classrooms where idclass=?',[$request7->input('idclass')]);
        $teacher=DB::select('select * from users join class_teachers on class_teachers.idUser=users.idUser where class_teachers.idclass=?',[$view_assignment->input('idc')]);
        $assignment=DB::select('select * from assignments where idAssignment=? order by idAssignment desc',[$view_assignment->input('ida')]);
        $assignment_file=DB::select('select * from assignment_files where idAssignment=? order by idAssignment desc',[$view_assignment->input('ida')]);
        $student_unsubmit=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$view_assignment->input('idc')]);
        $student_submit=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser inner join answers on answers.idStudent=class_students.idStudent inner join answer_files on answer_files.idAnswer=answers.idAnswer where answers.idAssignment=?',[$view_assignment->input('ida')]);
        foreach($username as $item){
            return view('layouts.view-assignment-teacher',[
                'username' => $item->username,
                'assignment' => $assignment,
                'assignment_file' => $assignment_file,
                'teacher' => $teacher,
                'student_submit' => $student_submit
            ]);
        }
        
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $view_assignment2
     * @return \Illuminate\Http\Response
     * 
     */
    public function view_assignment_student(Request $view_assignment2){
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        // $class=DB::select('select * from classrooms where idclass=?',[$request7->input('idclass')]);
        $teacher=DB::select('select * from users join class_teachers on class_teachers.idUser=users.idUser where class_teachers.idclass=?',[$view_assignment2->input('idc')]);
        $assignment=DB::select('select * from assignments where idAssignment=? order by idAssignment desc',[$view_assignment2->input('ida')]);
        $assignment_file=DB::select('select * from assignment_files where idAssignment=? order by idAssignment desc',[$view_assignment2->input('ida')]);
        $student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$view_assignment2->input('idc')]);
        $score_student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser inner join answers on answers.idStudent=class_students.idStudent inner join answer_files on answer_files.idAnswer=answers.idAnswer where answers.idAssignment=? and users.idUser=?'
        ,[$view_assignment2->input('ida'),$value]);
        foreach($username as $item){
            return view('layouts.view-assignment-student',[
                'username' => $item->username,
                'assignment' => $assignment,
                'assignment_file' => $assignment_file,
                'teacher' => $teacher,
                'student' => $student,
                'idAssignment' => $view_assignment2->input('ida'),
                'idclass' => $view_assignment2->input('idc'),
                'score_student' => $score_student
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $submit
     * @return \Illuminate\Http\Response
     */
    public function submitting_assignment(Request $submit)
    {
        $answer = new answer();
        //$file=  new material_file();
        $idStudent=session('id');
        
        $answer->idStudent=$idStudent;
        $answer->idAssignment=$submit->input('idAssignment');
        $answer->idclass=$submit->input('idclass');
        $answer->save();

        $idAnswer= DB::select('select idAnswer from answers order by idAnswer desc limit 1');
        foreach($idAnswer as $itemanswer){
            if($submit->hasFile('file')){
                foreach($submit->file('file') as $item){                    
                    $filenameWithExt=$item->getClientOriginalName();
                    $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension= $item->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path=$item->storeAs('public/photo/answer',$fileNameToStore);
                    $resultId = DB::table("answer_files")
                                ->insertGetId(
                                    [   
                                        "idAnswer" =>$itemanswer->idAnswer,
                                        "idclass" =>$submit->input('idclass'),
                                        "file"=>$fileNameToStore // Just string
                                    ]
                                );
                }                
            }else{
                $fileNameToStore= 'noname';
            }
        }

        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        // $class=DB::select('select * from classrooms where idclass=?',[$request7->input('idclass')]);
        $teacher=DB::select('select * from users join class_teachers on class_teachers.idUser=users.idUser where class_teachers.idclass=?',[$submit->input('idclass')]);
        $assignment=DB::select('select * from assignments where idAssignment=? order by idAssignment desc',[$submit->input('idAssignment')]);
        $assignment_file=DB::select('select * from assignment_files where idAssignment=? order by idAssignment desc',[$submit->input('idAssignment')]);
        $student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$submit->input('idclass')]);
        $score_student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser inner join answers on answers.idStudent=class_students.idStudent inner join answer_files on answer_files.idAnswer=answers.idAnswer where answers.idAssignment=? and users.idUser=?'
        ,[$submit->input('idAssignment'),$value]);

        foreach($username as $item){
            return view('layouts.view-assignment-student',[
                'username' => $item->username,
                'assignment' => $assignment,
                'assignment_file' => $assignment_file,
                'teacher' => $teacher,
                'student' => $student,
                'idAssignment' => $submit->input('idAssignment'),
                'idclass' => $submit->input('idclass'),
                'score_student' => $score_student
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $unsubmit
     * @return \Illuminate\Http\Response
     */
    public function unsubmit(Request $unsubmit){
        DB::delete('delete from answer_files where idAnswer=?',[$unsubmit->input('idA')]);
        DB::delete('delete from answers where idAnswer = ?', [$unsubmit->input('idA')]);
        

        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        
        // $class=DB::select('select * from classrooms where idclass=?',[$request7->input('idclass')]);
        $teacher=DB::select('select * from users join class_teachers on class_teachers.idUser=users.idUser where class_teachers.idclass=?',[$unsubmit->input('idc')]);
        $assignment=DB::select('select * from assignments where idAssignment=? order by idAssignment desc',[$unsubmit->input('ida')]);
        $assignment_file=DB::select('select * from assignment_files where idAssignment=? order by idAssignment desc',[$unsubmit->input('ida')]);
        $student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$unsubmit->input('idc')]);
        $score_student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser inner join answers on answers.idStudent=class_students.idStudent inner join answer_files on answer_files.idAnswer=answers.idAnswer where answers.idAssignment=? and users.idUser=?'
        ,[$unsubmit->input('ida'),$value]);
        foreach($username as $item){
            return view('layouts.view-assignment-student',[
                'username' => $item->username,
                'assignment' => $assignment,
                'assignment_file' => $assignment_file,
                'teacher' => $teacher,
                'student' => $student,
                'idAssignment' => $unsubmit->input('ida'),
                'idclass' => $unsubmit->input('idc'),
                'score_student' => $score_student
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $classid_forstudent
     * @return \Illuminate\Http\Response
     */
    public function list_member_student(Request $classid_forstudent){
        $id=session('id');
        $username=DB::select('select * from users where idUser=?',[$id]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$id]);
        $class=DB::select('select * from classrooms where idclass=?',[$classid_forstudent->input('idclass')]);
        $classstudent=DB::select('select * from class_students where idclass=?',[$classid_forstudent->input('idclass')]);
        $classteacher=DB::select('select * from class_teachers where idclass=?',[$classid_forstudent->input('idclass')]);
        $user_teacher=DB::select('select * from users inner join class_teachers on class_teachers.idUser=users.idUser where idclass=?',[$classid_forstudent->input('idclass')]);
        $user_student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$classid_forstudent->input('idclass')]);
        foreach($username as $item){
            return view('layouts.list-member-student',[
                'username' => $item->username,
                'userid' => $id,
                'yourclass' => $yourclass,
                'class' => $class,
                'classstudent' => $classstudent,
                'classteacher' => $classteacher,
                'user_teacher' => $user_teacher,
                'user_student' => $user_student,
                'idclass' => $classid_forstudent->input('idclass')

            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $classid_forteacher
     * @return \Illuminate\Http\Response
     */
    public function list_member_teacher(Request $classid_forteacher){
        $id=session('id');
        $username=DB::select('select * from users where idUser=?',[$id]);
        $yourclass = DB::select('select * from class_teachers where idUser=?',[$id]);
        $class=DB::select('select * from classrooms where idclass=?',[$classid_forteacher->input('idclass')]);
        $classstudent=DB::select('select * from class_students where idclass=?',[$classid_forteacher->input('idclass')]);
        $classteacher=DB::select('select * from class_teachers where idclass=?',[$classid_forteacher->input('idclass')]);
        $user_teacher=DB::select('select * from users inner join class_teachers on class_teachers.idUser=users.idUser where idclass=?',[$classid_forteacher->input('idclass')]);
        $user_student=DB::select('select * from users inner join class_students on class_students.idUser=users.idUser where idclass=?',[$classid_forteacher->input('idclass')]);
        foreach($username as $item){
            return view('layouts.list-member',[
                'username' => $item->username,
                'userid' => $id,
                'yourclass' => $yourclass,
                'class' => $class,
                'classstudent' => $classstudent,
                'classteacher' => $classteacher,
                'user_teacher' => $user_teacher,
                'user_student' => $user_student,
                'idclass' => $classid_forteacher->input('idclass')

            ]);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
