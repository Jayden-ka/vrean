@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-5 col-sm-12"> 
            <div class="sticky-top py-1" style="top: 65px; background-color: #F0F2F5;">
                <div class="bg-dark text-white mt-2 rounded-pill ">
                <h5 class="text-center py-2"><b>Follower</b></h5>
                </div>
                <hr>
            </div>
            @if (count($follower)>0)
                @foreach ($follower as $item_follower)
                    @foreach ($user as $item_user)
                        @if ($item_user->idUser==$item_follower->idFollowing)
                            <div class="px-2">
                                @foreach ($profileimage as $item_pf)
                                    @if ($item_user->idUser == $item_pf->idUser)
                                        <a href="profile/{{ $item_user->idUser }}" class="text-decoration-none text-dark">
                                            <div class="row my-2 ">
                                                <div class="col-auto">
                                                    <div class="profile rounded-circle shadow" 
                                                        style="
                                                            width: 45px;
                                                            height: 45px; 
                                                            background-image: url('storage/photo/pfimage/{{ $item_pf->image_profile }}'); 
                                                            background-size: cover; 
                                                        ">
                                                    </div>
                                                </div>
                                                <div class="col mx-2 border-bottom border-dark">
                                                    <p class="fs-4 fw-bolder">{{ $item_user->username }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach

                                
                                <!-- <a href="#" class="profilefollowlist">
                                    <img src="img/hi.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                                    {{ $item_user->username }}
                                </a> -->
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @else
            @endif
        </div>

        <!-- <div class="followlistcol-md-2 col-md-2"></div> -->
        
        <div class="col-lg-3 col-md-5 col-sm-12 ">
            {{-- following --}}
            <div class="sticky-top py-1" style="top: 65px; background-color: #F0F2F5;">
                <div class="bg-dark text-white mt-2 rounded-pill ">
                <h5 class="text-center py-2"><b>Following</b></h5>
                </div>
                <hr>
            </div>
            @if (count($following)>0)
                @foreach ($following as $item_following)
                    @foreach ($user as $item_user)
                        @if ($item_user->idUser==$item_following->idFollower)
                            <a href="profile/{{ $item_user->idUser }}" class="text-decoration-none text-dark">
                                <div class="row px-2 my-2 ">
                                    <div class="col-auto">
                                        <div class="profile rounded-circle shadow" 
                                            style="
                                                width: 45px;
                                                height: 45px; 
                                                background-image: url('storage/photo/pfimage/{{ $item_pf->image_profile }}'); 
                                                background-size: cover; 
                                            ">
                                        </div>
                                    </div>
                                    <div class="col mx-2 border-bottom border-dark">
                                        <p class="fs-4 fw-bolder">{{ $item_user->username }}</p>
                                    </div>
                                </div>
                            </a>
                            {{-- <div style="padding-top: 10px;">
                                <a href="#" class="profilefollowlist">
                                    <img src="img/hi.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                                    {{ $item_user->username }}
                                </a>
                            </div> --}}
                        @endif
                    @endforeach
                @endforeach
            @else
                <h5>null</h5>
                
            @endif
        </div>
    </div>
</div>
@endsection