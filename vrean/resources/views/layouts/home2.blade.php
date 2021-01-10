@extends('layouts.header')

@section('content')
    <div class="container">
        {{-- <h1>The posts</h1>
        @if (count($posts)>0)
            @foreach ($posts as $item)
                @foreach ($username_post as $item_user)
                    @if ($item_user->idUser==$item->User_idUser)
                        <div class="card">
                            <h2>{{ $item_user->username }}</h2>
                            <p>{{ $item->caption }}</p>
                            @foreach ($post_file as $item_file)
                                @if ($item_file->idPost == $item->idPost)
                                    <img style="width:50%" src="storage/photo/{{ $item_file->file }}" alt="{{ $item_file->file }}">
                                @endif
                            @endforeach
                        </div>  
                    @endif
                @endforeach                  
            @endforeach
        @endif --}}

        {{-- <h1>The posts</h1> --}}
        @if (count($posts)>0)
            @foreach ($posts as $item)
                @foreach ($username_post as $item_user)
                    @if ($item_user->idUser==$item->User_idUser)                            
                                    <div class="d-flex justify-content-center my-3">
                                        <div class="post px-2 py-3 rounded shadow">
                                            <div class="row px-2">
                                                <!-- Post owner -->
                                                <!-- User profile photo -->
                                                <div class="col-2 col-xs-4 profile ">
                                                    @foreach ($profileimage as $itemprofile)
                                                        @if ($itemprofile->idUser==$item_user->idUser)
                                                            @if ($itemprofile->image_profile == null)
                                                                <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""></a>
                                                            @else
                                                                <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/storage/photo/pfimage/{{ $itemprofile->image_profile }}" alt=""></a>
                                                            @endif
                                                        @endif
                                                    @endforeach                                                    
                                                </div>
                                                <!-- User name -->
                                                <div class="col-10 col-4 name">
                                                    {{-- {{ session(['anotheruserid'=>$item_user->idUser]) }} --}}
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
                                        </div>
                                    </div>
                                
                          
                    @endif
                @endforeach                  
            @endforeach
        @endif
    </div>
    
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