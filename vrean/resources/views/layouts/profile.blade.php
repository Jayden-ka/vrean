@extends('layouts.header')

@section('content')
    {{-- <div class="d-flex justify-content-center py-5 bg-light">
        <div class="row d-flex justify-content-center bg-white shadow rounded">
            <div class="col-sm-12 col-md-12">
                <!-- Cover -->
                <div class="cover-container d-flex justify-content-center">
                    <img class="imgprofile" src="/img/1200px-Ankor_Wat_temple.jpg" alt="">
                </div>

                <!-- Profile infor -->
                <div class="row profilebig mx-1 d-flex justify-content-center">
                    <div class="" style="width: 150px;">
                        <img class="rounded-circle border border-primary imgprofile" src="img/facebook-default-no-profile-pic1.jpg" alt="">
                    </div>

                    <!-- Profile bio -->
                    <div class="col">
                        <!-- Name and message -->
                        <div class="text-white border-bottom border-dark">
                            <div class="row mb-1">
                                <div class="col-8 mt-2 nameprofile">
                                    
                                            <span class="shadow">{{ $username }}</span>
                                        
                                </div>
                                <div class="col-2 mt-1">
                                    <button type="button" class="btn btn-outline-light">Message</button>
                                </div>
                                <div class="col-2 mt-1">
                                    <button type="button" class="btn btn-outline-light w-100"><i class="fas fa-user"><i class="fas fa-check"></i></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Bio -->
                        <div class="text-dark py-2">
                            <p>Hi my name is Darot. I study CS at NIPTICT.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="d-flex justify-content-center py-5 bg-light">
        <div class="row d-flex justify-content-center bg-white shadow rounded">
            <div class="col-sm-12 col-md-12">
                <!-- Cover -->
                <div class="cover-container2 d-flex justify-content-center">
                    @foreach ($coverimage as $item)
                            @if ($item->image_cover == null)
                                <img class="rounded-circle" src="" alt="">
                            @else
                                <img src="/storage/photo/cvimage/{{ $item->image_cover }}" alt="">
                            @endif
                    @endforeach
                    {{-- <img src="/img/1200px-Ankor_Wat_temple.jpg" alt=""> --}}
                </div>
                <!-- Profile infor -->
                <div class="row anotherprofile mx-1 d-flex justify-content-center">
                    <!-- Profile Photo -->
                    <div class="" style="width: 150px;">
                        @foreach ($profileimage as $item)
                            @if ($item->image_profile == null)
                                <img class="rounded-circle border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt="">
                            @else
                                <img class="rounded-circle border border-primary" src="/storage/photo/pfimage/{{ $item->image_profile }}" alt="">
                            @endif
                        @endforeach
                        {{-- <img class="rounded-circle border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""> --}}
                    </div>

                    <div class="col-sm">
                        <!-- Name and message -->
                        <div class="text-white border-bottom border-primary">
                            <div class="row mb-1 ">
                                <div class="col-sm-9 mt-2 anothernameprofile d-flex justify-content-start">                                    
                                    <span class="shadow">{{ $username }}</span>                                        
                                </div>
                                {{-- <div class="col-sm-3 mt-2">
                                    <button type="button" class="btn btn-primary shadow  w-100">Follow</button>
                                </div> --}}
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
                            </div>
                        </div>
                        <!-- Profile Bio -->
                        <div class="text-dark py-2 border-bottom border-primary">
                            @foreach ($bio as $item)
                                <p>{{ $item->bio }}</p>
                            @endforeach
                        </div>
                        <!-- Follow Information -->
                        <div class="text-dark w-100">
                            <div class="row follow mb-3">
                                <div class="col-4">
                                    @if (count($postcounter)==0)
                                        <a href="#" class="text-dark">No Posts</a>
                                    @else
                                        @foreach ($postcounter as $item_counter)
                                            <a href="#" class="text-dark">{{ $item_counter->postnumber }} Posts</a>
                                        @endforeach
                                    @endif
                                    
                                </div>
                                <div class="col-4">
                                    @if (count($followercounter)==0)
                                    <a href="#" class="text-dark ">0 Follower</a>
                                    @endif
                                    @foreach ($followercounter as $item)
                                        <a href="#" class="text-dark ">{{ $item->followernumber }} Follower</a>
                                    @endforeach
                                </div>
                                <div class="col-4">
                                    @if (count($followingcounter)==0)
                                        <a href="#" class="text-dark ">0 Following</a>
                                    @endif
                                    @foreach ($followingcounter as $item)
                                        <a href="#" class="text-dark ">{{ $item->followingnumber }} Following</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        

                        <!-- User information -->
                        <div class="user-info px-3">
                            <!-- Come from  -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex justify-content-center d-inline">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>From <a href="#"> Battambong</a> </span>
                                </div>
                            </div>
                            <!-- Live in Now -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex justify-content-center d-inline">
                                    <i class="fa fa-map-marker-alt"></i> 
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>Live in <a href="#"> Phnom Penh</a> </span>
                                </div>
                            </div>
                            <!-- Study at -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex justify-content-center d-inline">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>Study at <a href="#"> NIPTICT</a> </span>
                                </div>
                            </div>
                            <!-- Birthday -->
                            <div class="row py-2" >
                                <div class="col-1 d-flex justify-content-center d-inline">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <div class="col py-1 d-flex d-inline">
                                    <span>May 17 2002</span>
                                </div>
                            </div>
                        </div><!--- end user info-->
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>


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
                                                            <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""></a>
                                                        @else
                                                            <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/storage/photo/pfimage/{{ $itemprofile->image_profile }}" alt=""></a>
                                                        @endif
                                                    @endforeach
                                                    {{-- <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt="profile"></a> --}}
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
                                                    <form action="" class="w-100">
                                                        <input type="hidden" name="comment" id="">
                                                        <button type="submit" class="btn w-100"> <i class="far fa-comment-alt"></i>3</button>
                                                    </form>
                                                </div>
                                                <div class="col-4 d-flex justify-content-center">
                                                    <form action="" class="w-100">
                                                        <input type="hidden" name="share" id="">
                                                        <button onclick="myFunction()" type="submit" class="btn dropbtn w-100"><i class="fas fa-share" style="color: black"></i>4</button>
                                                            <div id="myDropdown" class="dropdown-content">
                                                                <a href="#">Share now</a>
                                                                <a href="#">More Option</a>                                                                
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                          
                    @endif
                @endforeach                  
            @endforeach
        @endif
    </div>
    <script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
    </script>
@endsection