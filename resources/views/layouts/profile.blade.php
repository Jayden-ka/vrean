@extends('layouts.header')

@section('content')
    <div class="d-flex justify-content-center py-3">
        <div class="row d-flex justify-content-center bg-white shadow rounded" style="width: 700px;">
            <div class="col-sm-12 col-md-12">
                <!-- Cover -->
                @foreach ($coverimage as $item)
                            @if ($item->image_cover == null)
                                <div 
                                    style=" 
                                        height: 250px; 
                                        background-image: url(''); 
                                        background-size: cover;
                                ">
                                    <!-- Add Cover photo -->
                                </div>
                                <!-- <img class="rounded-circle" src="" alt=""> -->
                            @else
                            <div 
                                style=" 
                                    height: 250px; 
                                    background-image: url('/storage/photo/cvimage/{{ $item->image_cover }}'); 
                                    background-size: cover;
                            ">
                                <!-- Add Cover photo -->
                            </div>
                                <!-- <img src="/storage/photo/cvimage/{{ $item->image_cover }}" alt=""> -->
                            @endif
                    @endforeach
                

                <!-- Profile infor -->
                <div class="row  mx-1 d-flex justify-content-center">
                    <!-- Profile Photo -->
                    @foreach ($profileimage as $item)
                        @if ($item->image_profile == null)
                            <div class="profile rounded-circle shadow" 
                                style="
                                    width: 120px;
                                    height: 120px; 
                                    background-image: url('/img/facebook-default-no-profile-pic1.jpg'); 
                                    background-size: cover; 
                                    position: relative; 
                                    bottom: 45px;
                                ">
                            </div>
                            <!-- <img class="rounded-circle border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""> -->
                        @else
                            <div class="profile rounded-circle shadow" 
                                style="
                                    width: 120px;
                                    height: 120px; 
                                    background-image: url('/storage/photo/pfimage/{{ $item->image_profile }}'); 
                                    background-size: cover; 
                                    position: relative; 
                                    bottom: 45px;
                                ">
                            </div>
                            <!-- <img class="rounded-circle border border-primary" src="/storage/photo/pfimage/{{ $item->image_profile }}" alt=""> -->
                        @endif
                    @endforeach
                    

                    <div class="col-sm">
                        <!-- Name and message -->
                        <div class="text-dark border-bottom border-primary">
                            <div class="row mb-1 ">
                                <div class="col-sm-9 mt-2 fs-1 fw-bold d-flex justify-content-center">
                                    <span class="">{{ $username }}</span>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <button type="button" class="btn btn-primary shadow w-100" id="myBtn2"><i class="fas fa-user-edit"></i> Edit</button>
                                    <div id="myModal2" class="modal2">                                    
                                        <!-- POST -->
                                        <div class="modal-content2">
                                            <span class="close2">&times;</span>
                                            {{-- <form class="form-group" action="{{ action('App\Http\Controllers\PostController@store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <h4 style="color:black">Create a post</h4>
                                                {!! Form::textarea('caption', '', ['class'=>'form-control mb-2','placeholder'=>'Your mind.....']) !!}
                                                {!! Form::file('photo[]', ['class'=>'form-control mb-2','multiple']) !!}
                                                
                                                <input type="submit" name="post" id="post" value="Post" class="submit btn btn-primary w-100">
                                            </form> --}}
                                            <form action="{{ action('App\Http\Controllers\ProfileController@geteditprofile') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <label for="coverimage" style="color: black" class="mt-1">Upload Cover</label>
                                                {{-- {!! Form::file('coverimage', ['class'=>'form-control mb-2']) !!} --}}
                                                <input type="file" class="form-control" name="coverimage" id="coverimage">
                    
                                                <label for="profileimage" style="color: black">Upload Profile</label>
                                                {!! Form::file('profileimage', ['class'=>'form-control mb-2']) !!}
                    
                                                <label for="bio" style="color: black">Update Bio</label>
                                                <input type="text" class="form-control" name="bio" id="bio">

                                                {{-- <input type="hidden" name="profileid" id="profileid" value="{{ $userid }}"> --}}
                    
                                                {{-- <label for="cover" style="color: black">Home Town</label>
                                                <input type="text" class="form-control">
                    
                                                <label for="profile" style="color: black">Address Now </label>
                                                <input type="text" class="form-control">
                    
                                                <label for="school" style="color: black">School</label>
                                                <input type="text" class="form-control">
                    
                                                <label for="birthday" style="color: black">Birthday</label>
                                                <input type="Date" class="form-control"> --}}
                    
                                                <input type="submit" name="editprofile" id="editprofile" class="btn btn-primary mt-2">
                                            </form>
                                        </div>
                                    </div>
                                    <script>
                                        // Get the modal
                                        var modal2 = document.getElementById("myModal2");
                                        
                                        // Get the button that opens the modal
                                        var btn2 = document.getElementById("myBtn2");
                                        
                                        // Get the <span> element that closes the modal
                                        var span2 = document.getElementsByClassName("close2")[0];
                                        
                                        // When the user clicks the button, open the modal 
                                        btn2.onclick = function() {
                                        modal2.style.display = "block";
                                        }
                                        
                                        // When the user clicks on <span> (x), close the modal
                                        span2.onclick = function() {
                                        modal2.style.display = "none";
                                        }
                                        
                                        // When the user clicks anywhere outside of the modal, close it
                                        window.onclick = function(event) {
                                        if (event.target == modal2) {
                                            modal2.style.display = "none";
                                        }
                                        }
                                    </script>
                                </div>
                                <!-- <div class="col-sm-3 ">
                                    <button type="button" class="mt-3 btn btn-primary shadow  w-100">Edit</button>
                                </div> -->
                            </div>
                        </div>
                        <!-- Profile Bio -->
                        <div class="text-dark py-2">
                            @foreach ($bio as $item)
                                <p>{{ $item->bio }}</p>
                            @endforeach
                        </div>
                        <!-- Follow Information -->
                        <div class="text-dark w-100">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <span class="text-dark ">
                                        @if (count($postcounter)==0)
                                            <a href="#" class="text-dark ">No Posts</a>
                                        @else
                                            @foreach ($postcounter as $item_counter)
                                                <a href="#" class="text-dark text-decoration-none">{{ $item_counter->postnumber }} Posts</a>
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                                <div class="col-4">
                                    <!-- <a href="#" class="text-dark"> -->
                                        @if (count($followercounter)==0)
                                        <form action="{{ action('App\Http\Controllers\ProfileController@followlist') }}" method="post">
                                            @csrf
                                            <label for="follower0" class="text-dark">0 follower</label>
                                            <input type="hidden" name="profileid" value="{{ $userid }}">
                                            <input type="submit" style="display: none;" name="follower0" id="follower0">
                                        </form>
                                        @endif
                                        @foreach ($followercounter as $item)
                                        <form action="{{ action('App\Http\Controllers\ProfileController@followlist') }}" method="post">
                                            @csrf
                                            <label for="follower" class="text-dark">{{ $item->followernumber }} follower</label>
                                            <input type="hidden" name="profileid" value="{{ $userid }}">
                                            <input type="submit" style="display: none;" name="follower" id="follower">
                                        </form>
                                        @endforeach
                                    <!-- </a> -->
                                </div>
                                <div class="col-4">
                                    <!-- <a href="#" class="text-dark"> -->
                                        @if (count($followingcounter)==0)
                                        <form action="{{ action('App\Http\Controllers\ProfileController@followlist') }}" method="post">
                                            @csrf
                                            <label for="following0" class="text-dark">0 following</label>
                                            <input type="hidden" name="profileid" value="{{ $userid }}">
                                            <input type="submit" style="display: none;" name="following0" id="following0">
                                        </form>
                                        @endif
                                        @foreach ($followingcounter as $item)
                                        <form action="{{ action('App\Http\Controllers\ProfileController@followlist') }}" method="post">
                                            @csrf
                                            <label for="following" class="text-dark">{{ $item->followingnumber }} following</label>
                                            <input type="hidden" name="profileid" value="{{ $userid }}">
                                            <input type="submit" style="display: none;" name="following" id="following">
                                        </form>
                                        @endforeach
                                    <!-- </a> -->
                                </div>
                            </div>
                        </div>
                        

                        <!-- User information -->
                        <div class="px-3">
                            <!-- Come from  -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex align-self-center d-flex justify-content-center d-inline">
                                    <i class="fas fa-home" style="font-size: 24px;"></i>
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>From <a href="#"> Battambong</a> </span>
                                </div>
                            </div>
                            <!-- Live in Now -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex align-self-center d-flex justify-content-center d-inline">
                                    <i class="fas fa-map-marker-alt" style="font-size: 24px;"></i> 
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>Live in <a href="#"> Phnom Penh</a> </span>
                                </div>
                            </div>
                            <!-- Study at -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex align-self-center d-flex justify-content-center d-inline">
                                    <i class="fas fa-graduation-cap" style="font-size: 24px;"></i>
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>Study at <a href="#"> NIPTICT</a> </span>
                                </div>
                            </div>
                            <!-- Birthday -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex align-self-center d-flex justify-content-center d-inline">
                                    <i class="fas fa-birthday-cake" style="font-size: 24px;"></i>
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>May 17 2002</span>
                                </div>
                            </div>
                        </div>
                        <!--- end user info-->
                    </div>
                </div>
            </div>
        </div>

        <!-- show post history -->
    </div>

    <!-- shwo  -->
    @if (count($posts)>0)
            @foreach ($posts as $item)
                @foreach ($username_post as $item_user)
                    @if ($item_user->idUser==$item->User_idUser && $userid==$item->User_idUser)  
                        <div class="d-flex justify-content-center my-3">
                            <div class="post px-2 py-3 rounded shadow">
                                <div class="row px-2">
                                    <!-- Post owner -->
                                    <div class="col-2 profile ">
                                        
                                        @foreach ($profileimage as $itemprofile)
                                            @if ($itemprofile->image_profile == null)
                                                <a href="profile/{{ $item_user->idUser }}">
                                                    <div class="profile rounded-circle shadow" 
                                                        style="
                                                            width: 45px;
                                                            height: 45px; 
                                                            background-image: url('/img/facebook-default-no-profile-pic1.jpg'); 
                                                            background-size: cover; 
                                                        ">
                                                    </div>
                                                </a>
                                                <!-- <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""></a> -->
                                            @else
                                                <a href="profile/{{ $item_user->idUser }}">
                                                    <div class="profile rounded-circle shadow" 
                                                        style="
                                                            width: 45px;
                                                            height: 45px; 
                                                            background-image: url('/storage/photo/pfimage/{{ $itemprofile->image_profile }}'); 
                                                            background-size: cover; 
                                                        ">
                                                    </div>
                                                </a>
                                                <!-- <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/storage/photo/pfimage/{{ $itemprofile->image_profile }}" alt=""></a> -->
                                            @endif
                                        @endforeach
                                        <!-- {{-- <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt="profile"></a> --}} -->
                                    </div>
                                    <div class="col-10 name">
                                        <a style="text-decoration: none; color: black" href="profile/{{ $item_user->idUser }}" ><p>{{ $item_user->username }}</p></a>
                                        <span>{{ $item->created_at }}</span>
                                    </div>
                                </div>
                                <!-- Caption -->
                                <div class="row py-2 px-2 ml-1">
                                    <p>{{ $item->caption }}</p>
                                </div>
                                <!-- Photo upload -->
                                {{-- @foreach ($post_file as $item_file)
                                    @if ($item_file->idPost == $item->idPost)

                                    @endif
                                @endforeach --}}
                                {{-- @foreach ($post_file as $item_file)
                                    @if ($item_file->idPost == $item->idPost) --}}
                                        <div class="row mx-0 px-0 mb-3 w-100">
                                            <div class="horizontal_slider d-flex justify-content-center">
                                                <div class="slider_container">
                                                    <div class="item">
                                                        @foreach ($post_file as $item_file)
                                                            @if ($item_file->idPost == $item->idPost)
                                                                <img style="width:100%" src="storage/photo/{{ $item_file->file }}" alt="{{ $item_file->file }}">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- @endif
                                @endforeach --}}
                                <!-- Display number of like share cmt -->
                                {{-- <div class="row px-2 mb-0">
                                    <div class="col-3">
                                        <span class="d-flex float-start">16 likes</span>
                                    </div>
                                    <div class="col-9">
                                        <span class="d-flex float-end">16 comments 4 shares</span> 
                                    </div>
                                </div> --}}
                                <!-- Like share comment -->
                                <div class="row border-top border-bottom mx-0">
                                    <div class="col-4 d-flex justify-content-center">
                                        <form action="{{ action('App\Http\Controllers\PostController@like') }}" class="w-100" method="POST">
                                            @csrf
                                            <input type="hidden" name="thelike" id="thelike" value="{{ $item->idPost }}">
                                            @if (count($likecounter)==0)
                                                <button type="submit" class="btn w-100" name="submit_like" id="submit_like"><i class="far fa-thumbs-up"></i></button> 
                                            @else
                                                @foreach($likecounter as $likeitem)
                                                    @if ($likeitem->idPost==$item->idPost)
                                                        @if ($likeitem->likenumber==0)
                                                            <button type="submit" class="btn w-100" name="submit_like" id="submit_like"><i class="far fa-thumbs-up"></i></button>
                                                            @break 
                                                        @else
                                                            @foreach ($likechecker as $item_likechecker)
                                                                @if ($item_likechecker->idPost==$likeitem->idPost && $item_likechecker->idUser==$userid)
                                                                    <button type="submit" class="btn w-100" name="submit_like" id="submit_like"><i class="far fa-thumbs-up" style="color:blue"></i>{{ $likeitem->likenumber }}</button>
                                                                    @break
                                                                @endif
                                                                @if($loop->last)
                                                                    <button type="submit" class="btn w-100" name="submit_like" id="submit_like"><i class="far fa-thumbs-up"></i>{{ $likeitem->likenumber }}</button>
                                                                @endif
                                                            @endforeach                                                                        
                                                            @break   
                                                        @endif
                                                    @endif
                                                    @if($loop->last)
                                                        <button type="submit" class="btn w-100" name="submit_like" id="submit_like"><i class="far fa-thumbs-up"></i></button>                                                                    
                                                    @endif
                                                @endforeach 
                                            @endif                                                                                                               
                                        </form>
                                    </div>
                                    <div class="col-4 d-flex justify-content-center">
                                        <button type="submit" class="btn w-100" id="cmtbtn"> <i class="far fa-comment-alt"></i></button>
                                        <div id="myModalcmt" class="modalcmt">                                    
                                            <!-- comment -->
                                            <div class="modal-contentcmt">
                                                <span class="closecmt">&times;</span>                                                      
                                                <form action="" method="POST">
                                                    @csrf
                                                    {{-- <label for="cmtcaption" style="color:black"></label> --}}
                                                    {!! Form::text('cmtcaption', '', ['class'=>'form-control mb-2','placeholder'=>'comment']) !!}
                                                    <input type="submit" name="cmtgo" id="cmtgo" class="btn btn-primary mt-2" value="comment">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- share btn -->
                                    <div class="col-4 d-flex justify-content-center">
                                        <button type="submit" class="btn dropbtn w-100" id="sharebtn" name="sharebtn"><i class="fas fa-share" style="color: black"></i></button>
                                            <div id="myModalshare" class="modalshare">                                    
                                            <!-- share -->
                                            <div class="modal-contentshare">
                                                <span class="closeshare">&times;</span>
                                        
                                                <form action="" method="POST" >
                                                    @csrf
                                                    {!! Form::textarea('sharecaption', '', ['class'=>'form-control mb-2','placeholder'=>'Your share caption']) !!}
                                                    <input type="submit" name="sharego" id="sharego" class="btn btn-primary mt-2" value="share">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="" class="form-inline d-inline" style="padding-top: 10px; margin-left: 30px;">
                                    <div class="row justify-content-center px-3">
                                        <div class="col">
                                            <input class="form-control rounded-pill w-100" type="text" placeholder="Write your comment here...">
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-self-center">
                                            <button type="submit" class="btn btn-outline-dark rounded-circle" style="width: 40px; height: 40px;"><i class="far fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <!--show comment-->
                                <!-- <div class="px-3"> -->
                                    <!-- <div class="row" style="padding-top: 10px;"> -->
                                        <!-- Comment owner -->
                                        <!-- <div class="col-auto">
                                            <a href="#"><img src="img/facebook-default-no-profile-pic1.jpg" class="rounded-circle" style="width: 40px; height: 40px;" alt="profile"></a>
                                        </div>
                                        <div class="col" style="background-color: #F0F2F5; border-radius: 10px;">
                                            <p><b>Rotsarak</b></p>
                                            <p style="font-size: 15px;">Long time no see!!!</p>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>  
                    @endif
                @endforeach                  
            @endforeach
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <script>
        // Get the modal
        var modalshare = document.getElementById("myModalshare");
            
            // Get the button that opens the modal
            var btnshare = document.getElementById("sharebtn");
            
            // Get the <span> element that closes the modal
            var spanshare = document.getElementsByClassName("closeshare")[0];
            
            // When the user clicks the button, open the modal 
            btnshare.onclick = function() {
            modalshare.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            spanshare.onclick = function() {
            modalshare.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modalshare) {
                    modalshare.style.display = "none";
                }
            }

            //comment

            var modalcmt = document.getElementById("myModalcmt");
            
            // Get the button that opens the modal
            var btncmt = document.getElementById("cmtbtn");
            
            // Get the <span> element that closes the modal
            var spancmt = document.getElementsByClassName("closecmt")[0];
            
            // When the user clicks the button, open the modal 
            btncmt.onclick = function() {
            modalcmt.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            spancmt.onclick = function() {
            modalcmt.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modalcmt) {
                    modalcmt.style.display = "none";
                }
            }
    </script>
</body>
</html>
@endsection


