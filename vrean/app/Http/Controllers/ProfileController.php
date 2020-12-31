<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use App\post_file;
use App\follow;
use DB;

class ProfileController extends Controller
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
            $postcounter= DB::select('select count(idPost) as postnumber from posts where User_idUser=? group by User_idUser',[$value]);
            $bio= DB::select('select bio from users where idUser=?',[$value]);
            $coverimage= DB::select('select image_cover from users where idUser=?',[$value]);
            $profileimage= DB::select('select image_profile from users where idUser=?',[$value]);
            $followercounter=DB::select('select count(idFollow) as followernumber from follows where idfollower=? group by idfollower',[$value]);
            $followingcounter=DB::select('select count(idFollow) as followingnumber from follows where idfollowing=? group by idfollowing',[$value]);
            foreach($username as $item){
                return view('layouts.profile',[
                    'username'=> $item->username,
                    'posts' => $post,
                    'username_post' => $username_post,
                    'post_file' => $post_file,
                    'postcounter' => $postcounter,
                    'likecounter' => $likecounter,
                    'likechecker' => $likecheck,
                    'followercounter' => $followercounter,
                    'followingcounter' => $followingcounter,
                    'bio' => $bio,
                    'coverimage' => $coverimage,
                    'profileimage' => $profileimage,
                    'userid' => $value
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request1
     * @return \Illuminate\Http\Response
     */
    public function geteditprofile(Request $request1)
    {
        $idUser= session('id');
        //$user = new user();

        if($request1->input('bio')!=NULL){
            $bioupdate=DB::update('update users set bio = ? where idUser = ?', [$request1->input('bio'),$idUser]);
        }


        if($request1->hasFile('coverimage')){
            //dd($request1->file('coverimage'));
            //foreach($request1->file('coverimage') as $item){                    
                $cvimagenameWithExt=$request1->file('coverimage')->getClientOriginalName();
                $cvimagename= pathinfo($cvimagenameWithExt, PATHINFO_FILENAME);
                $cvimageextension= $request1->file('coverimage')->getClientOriginalExtension();
                $cvimageNameToStore= $cvimagename.'_'.time().'.'.$cvimageextension;
                $path=$request1->file('coverimage')->storeAs('public/photo/cvimage',$cvimageNameToStore);
                $cvimageupdate=DB::update('update users set image_cover = ? where idUser = ?', [$cvimageNameToStore,$idUser]);
        
            //}                
        }else{
            $cvimageNameToStore= 'noimage.jpeg';
        }

        if($request1->hasFile('profileimage')){
            //foreach($request1->file('profileimage') as $item){                    
                $pfimagenameWithExt=$request1->file('profileimage')->getClientOriginalName();
                $pfimagename= pathinfo($pfimagenameWithExt, PATHINFO_FILENAME);
                $pfimageextension= $request1->file('profileimage')->getClientOriginalExtension();
                $pfimageNameToStore= $pfimagename.'_'.time().'.'.$pfimageextension;
                $path=$request1->file('profileimage')->storeAs('public/photo/pfimage',$pfimageNameToStore);
                $pfimageupdate=DB::update('update users set image_profile = ? where idUser = ?', [$pfimageNameToStore,$idUser]);
            
            //}                
        }else{
            $pfimageNameToStore= 'noimage.jpeg';
        }

        //dd($cvimageNameToStore);

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request2
     * @return \Illuminate\Http\Response
     */
    public function followact(Request $request2){
        //dd($request2->input('followerid'));
        $followingid=session('id');
        $follow = new follow();

        $idfollow=DB::select('select * from follows');

        if(follow::count()==0){
            $follow->idFollowing=$followingid;
            $follow->idFollower=$request2->input('followerid');
            $follow->save();
        }
        else{
            foreach($idfollow as $item_idfollow){
                if($item_idfollow->idFollower==$request2->input('followerid') && $item_idfollow->idFollowing==$followingid){
                    $deletefollow=DB::delete('delete from follows where idFollow = ?', [$item_idfollow->idFollow]);
                    return redirect()->back();
                }
            }
            $follow->idFollowing=$followingid;
            $follow->idFollower=$request2->input('followerid');
            $follow->save();

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
        $value= session('id');
        if($id==$value){
            return redirect('/profile');
        }
        $username = DB::select('select * from users where idUser=?',[$value]);
        $post= DB::select('select * from posts order by idPost desc');
        $post_file=DB::select('select * from post_files');
        $username_post= DB::select('select * from users');
        $likecounter= DB::select('select count(idUser) as likenumber, idPost from likes group by idPost');
        $likecheck= DB::select('select * from likes');
        $postcounter= DB::select('select count(idPost) as postnumber from posts where User_idUser=? group by User_idUser',[$id]);
        $bio= DB::select('select bio from users where idUser=?',[$id]);
        $coverimage= DB::select('select image_cover from users where idUser=?',[$id]);
        $profileimage= DB::select('select image_profile from users where idUser=?',[$id]);
        $followercounter=DB::select('select count(idFollow) as followernumber from follows where idfollower=? group by idfollower',[$id]);
        $followingcounter=DB::select('select count(idFollow) as followingnumber from follows where idfollowing=? group by idfollowing',[$id]);
        $followchecker=DB::select('select idFollowing, idFollower from follows where idFollowing=? and idFollower=?',[$value,$id]);
        //dd(count($followchecker));
        foreach($username as $item){
            return view('layouts.anotherpf',[
                'username'=> $item->username,
                'posts' => $post,
                'username_post' => $username_post,
                'post_file' => $post_file,
                'likecounter' => $likecounter,
                'likechecker' => $likecheck,
                'postcounter' => $postcounter,
                'bio' => $bio,
                'coverimage' => $coverimage,
                'profileimage' => $profileimage,
                'userid' => $id,
                'followercounter' => $followercounter,
                'followingcounter' => $followingcounter,
                'followchecker' => $followchecker,
                'userid_likechecker' => $value 
            ]); 
        }
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
