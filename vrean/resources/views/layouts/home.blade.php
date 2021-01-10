@extends('layouts.header')

@section('content')
    <div class="container">
        {{-- <h1>The posts</h1> --}}
        @if (count($posts)>0)
            @foreach ($posts as $item)
                @foreach ($username_post as $item_user)
                    @if ($item_user->idUser==$item->User_idUser)                            
                        <div class="d-flex justify-content-center my-3" style="overflow: hidden">
                            <div class="post px-2 py-3 rounded shadow">
                                <div class="row px-2">
                                    <!-- Post owner -->
                                    <!-- User profile photo -->
                                    <div class="col-auto profile ">
                                        @foreach ($profileimage as $itemprofile)
                                            @if ($itemprofile->idUser==$item_user->idUser)
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
                                                    <!-- <a href="profile/{{ $item_user->idUser }}"><img class="" src="/img/facebook-default-no-profile-pic1.jpg" alt=""></a> -->
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
                                                    <!-- <a href="profile/{{ $item_user->idUser }}"><img class="" src="/storage/photo/pfimage/{{ $itemprofile->image_profile }}" alt=""></a> -->
                                                @endif
                                            @endif
                                        @endforeach                                                    
                                    </div>
                                    <!-- User name -->
                                    <div class="col name">
                                        {{-- {{ session(['anotheruserid'=>$item_user->idUser]) }} --}}
                                        <a style="text-decoration: none; color: black" href="profile/{{ $item_user->idUser }}" ><p>{{ $item_user->username }}</p></a>
                                        <span>{{ $item->created_at }}</span>
                                    </div>
                                    {{-- =============================================== --}}
                                    <!-- Option btn -->
                                    {{-- <div class="col-auto d-flex justify-content-end">
                                        <div class="dropdown d-flex justify-content-end">
                                            <button class="btn mx-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <form action="" method="post">
                                                    <label for="delete" class="dropdown-item">Delete</label>
                                                    <input type="submit" id="delete" style="display: none;">
                                                </form>
                                                <form action="" method="post">
                                                    <label for="edit" class="dropdown-item">Edit</label>
                                                    <input type="submit" id="edit" style="display: none;">
                                                </form>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    {{-- =============================================== --}}
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
                                
                                <!-- Like share comment -->
                                <div class="row border-top border-bottom mx-0">
                                    <!-- Like btn -->
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
                                    <!-- Comment btn -->
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
                                <!-- Comment section -->
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
@endsection