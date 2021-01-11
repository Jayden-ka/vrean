@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row">

        <div class="followlistcol-md-2 col-md-2"></div>

        <div class="followlistcol-md-3 col-md-3">
            <h5 class="followlisttitle d-flex justify-content-center mt-3"><b>Follower</b></h5>
            <hr>
            @if (count($follower)>0)
                @foreach ($follower as $item_follower)
                    @foreach ($user as $item_user)
                        @if ($item_user->idUser==$item_follower->idFollowing)
                            <div style="padding-top: 10px;">
                                <a href="#" class="profilefollowlist">
                                    <img src="img/hi.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                                    {{ $item_user->username }}
                                </a>
                            </div>
                        @endif
                       
                    @endforeach
                    
                @endforeach
            @else
                <h5>null</h5>
            @endif
            
            
        </div>

        <div class="followlistcol-md-2 col-md-2"></div>
        
        <div class="followlistcol-md-3 col-md-3">
            {{-- following --}}
            <h5 class="followlisttitle d-flex justify-content-center mt-3"><b>Following</b></h5>
            <hr>
            @if (count($following)>0)
                @foreach ($following as $item_following)
                    @foreach ($user as $item_user)
                        @if ($item_user->idUser==$item_following->idFollower)
                            <div style="padding-top: 10px;">
                                <a href="#" class="profilefollowlist">
                                    <img src="img/hi.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                                    {{ $item_user->username }}
                                </a>
                            </div>
                        @endif
                       
                    @endforeach
                    
                @endforeach
            @else
                <h5>null</h5>
            @endif
            
        </div>

        <div class="followlistcol-md-2 col-md-2"></div>

    </div>
</div>
@endsection