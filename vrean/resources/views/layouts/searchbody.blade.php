@extends('layouts.header')

@section('content')
    
        {{-- <div class="card mt-5 mx-5" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-3 py-2 px-2">
                    <img class="rounded-circle" style="width: 100px; height: 100px;" src="/img/profile.jpg" alt="...">
                </div>
                <div class="col-7">
                    <div class="card-body">
                        <h5 class="card-title float-left">Chen Darot</h5>
                        <div class="card-text">
                            <span class="d-block">Study at NIPTICT</span>
                            <span class="d-clock">Live in Phnom Penh</span>
                        </div>
                    </div>
                </div>
                <div class="col-1 my-2 py-2 mb-1">
                    <div class="mb-2">
                        <a href="#" class="btn btn-primary rounded-circle shadow "><i class="far fa-comments"></i></a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary rounded-circle shadow"><i class="fas fa-user-check"></i></button>
                    </div>
                    
                </div>
            </div>
        </div> --}}
        @if (count($username_spec)>0)
            @foreach ($username_spec as $item_username_spec)
                <div class="d-flex justify-content-center my-3">
                    <div class="post px-2 py-3 rounded shadow">
                        <div class="row px-2">
                            <div class="col-4 mt-2 profilecard d-flex justify-content-start">
                                @foreach ($profileimage as $itemprofile)
                                    @if ($itemprofile->idUser==$item_username_spec->idUser)
                                        @if ($itemprofile->image_profile == null)
                                            <a href="profile/{{ $item_username_spec->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""></a>
                                        @else
                                            <a href="profile/{{ $item_username_spec->idUser }}"><img class="border border-primary" src="/storage/photo/pfimage/{{ $itemprofile->image_profile }}" alt=""></a>
                                        @endif                                    
                                    @endif
                                @endforeach                                    
                                {{-- <a href=""><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt="profile"></a>--}}
                            </div>
                            <div class="col-4 mt-3 mr-4">
                                <a href="profile/{{ $item_username_spec->idUser }}" style="text-decoration: none; color: black"><h4>{{ $item_username_spec->username }}</h4></a>
                            </div>
                            <div class="col-4 mt-3 justify-content-end ml-5">
                                {{-- @foreach ($username_spec as $item_username_spec)
                                    @foreach ($followchecker as $item_followchecker)
                                        @if ($item_followchecker->idFollower==$item_username_spec->idUser) --}}
                                            {{-- <button type="button" class="btn btn-primary shadow  w-100">Following</button> --}}
                                            {{-- @break
                                        @endif
                                        @if ($loop->last) --}}
                                            <button type="button" class="btn btn-primary shadow  w-100">Follow</button>
                                        {{-- @endif
                                    @endforeach
                                @endforeach             --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        @else
            <h3>No match users.</h3>
        @endif
     

    @if (count($posts)>0)
            @foreach ($posts as $item)
                @foreach ($username_spec as $item_user)
                    @if ($item_user->idUser==$item->User_idUser)
                            
                                    <div class="d-flex justify-content-center my-3">
                                        <div class="post px-2 py-3 rounded shadow">
                                            <div class="row px-2">
                                                <!-- Post owner -->
                                                <div class="col-2 profile ">
                                                    @foreach ($profileimage as $itemprofile)
                                                        @if ($itemprofile->idUser==$item_user->idUser)
                                                            @if ($itemprofile->image_profile == null)
                                                                <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/img/facebook-default-no-profile-pic1.jpg" alt=""></a>
                                                            @else
                                                                <a href="profile/{{ $item_user->idUser }}"><img class="border border-primary" src="/storage/photo/pfimage/{{ $itemprofile->image_profile }}" alt=""></a>
                                                            @endif                                    
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
                                                                            <img style="width:100%" src="/storage/photo/{{ $item_file->file }}" alt="{{ $item_file->file }}">
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