<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use App\post_file;
use App\like;
use DB;

class PostController extends Controller
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
        $post= DB::select('select * from posts order by idPost desc');
        $post_file=DB::select('select * from post_files');
        $username_post= DB::select('select * from users');
        $likecounter= DB::select('select count(idUser) as likenumber, idPost from likes group by idPost');
        $likecheck= DB::select('select * from likes');
        // $bio= DB::select('select bio from users');
        // $coverimage= DB::select('select image_cover from users');
        $profileimage= DB::select('select idUser, image_profile from users');
        foreach($username as $item){
            return view('layouts.home',[
                'username'=> $item->username,
                'posts' => $post,
                'username_post' => $username_post,
                'post_file' => $post_file,
                'profileimage' => $profileimage,
                'likecounter' => $likecounter,
                'likechecker' => $likecheck,
                'userid' => $value
            ]); 
        }  
    }
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request2
     * @return \Illuminate\Http\Response
     */
    public function showsearch(Request $request2)
    {
        $value= session('id');
        $username = DB::select('select * from users where idUser=?',[$value]);
        $post= DB::select('select * from posts order by idPost desc');
        $post_file=DB::select('select * from post_files');
        //$username_post= DB::select('select * from users');
        $likecounter= DB::select('select count(idUser) as likenumber, idPost from likes group by idPost');
        $likecheck= DB::select('select * from likes');
        $username_spec=DB::select('select * from users where username=?',[$request2->input('search')]);
        $profileimage= DB::select('select idUser, image_profile from users');
        $followchecker=DB::select('select idFollowing, idFollower from follows where idFollowing=?',[$value]);
        foreach($username as $item){
            return view('layouts.searchbody',[
                'username'=> $item->username,
                'posts' => $post,
                //'username_post' => $username_post,
                'post_file' => $post_file,
                'likecounter' => $likecounter,
                'likechecker' => $likecheck,
                'profileimage' => $profileimage,
                'followchecker' => $followchecker,
                'userid' => $value,
                'username_spec' => $username_spec
            ]); 
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toprofile(){
        return redirect('/profile');
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
        $post_file= new post_file();

        $userid= session('id');
        $posts = new post();
        $posts->caption=$request->input('caption');
        $posts->User_idUser=$userid;
        $posts->save();

        $idPost= DB::select('select * from posts order by idPost desc limit 1');
        //dd($idPost);
        foreach($idPost as $itempost){
            if($request->hasFile('photo')){
                foreach($request->file('photo') as $item){                    
                    $filenameWithExt=$item->getClientOriginalName();
                    $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension= $item->getClientOriginalExtension();
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    $path=$item->storeAs('public/photo',$fileNameToStore);
                    $resultId = DB::table("post_files")
                                ->insertGetId(
                                    [   
                                        "idPost" =>$itempost->idPost,
                                        "file"=>$fileNameToStore // Just string
                                    ]
                                );
                }                
            }else{
                $fileNameToStore= 'noimage.jpeg';
            }
        }
        return redirect('/media');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request1
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request1){
        //dd($request1->input('thelike'));
        $value=session('id');
        $like = new like();
        $select_like = DB::select('select * from likes');
        $i=0;
        if(count($select_like)==0){
            $like->idPost= $request1->input('thelike');
            $like->idUser=$value;
            $like->save();
        }
        else{
            foreach($select_like as $item){
                $i++;
                if($item->idPost==$request1->input('thelike') && $item->idUser==$value){
                    DB::delete('delete from likes where idPost = ? and idUser=?', [$item->idPost,$value]);
                    break;
                }
                else if($i==count($select_like)){
                    $like->idPost= $request1->input('thelike');
                    $like->idUser=$value;
                    $like->save();
                }                
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 123;
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
