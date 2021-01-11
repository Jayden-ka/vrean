@extends('layouts.stream-class')

@section('list-content')
  <div class="container" style="padding-top:50px; align-content:center;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 py-3 px-3" style="align-items: center; background-color: lightgray; border-radius: 20px;">
          <h5 style="padding-top:10px;text-align:center;"><b>Teacher</b></h5>
          <hr>
          @foreach ($classteacher as $item_tea)
            @foreach ($user_teacher as $item_user_tea)
                @if ($item_tea->idUser == $item_user_tea->idUser)
                  <div>
                    <a href="profile/{{ $item_user_tea->idUser }}" style="text-decoration:none">
                        {{-- <img src="storage/photo/pfimage/{{ $item_user_tea->image_profile }}" alt=""> --}}
                        {{ $item_user_tea->username }}
                    </a>
                  </div>
                @endif
            @endforeach
            
          @endforeach

          <h5 style="padding-top:10px;text-align:center;" class="mt-2"><b>Student</b></h5>
          <hr>
          @foreach ($classstudent as $item_stu)
            @foreach ($user_student as $item_user_stu)
                @if ($item_stu->idUser == $item_user_stu->idUser)
                  <div>
                    <a href="profile/{{ $item_user_stu->idUser }}" style="text-decoration:none">
                        {{-- <img src="storage/photo/pfimage/{{ $item_user_stu->image_profile }}" alt=""> --}}
                        {{ $item_user_stu->username }}
                    </a>
                  </div>
                @endif
            @endforeach
          @endforeach
        </div>

        <div class="col-md-3"></div>
    </div>
  </div> 
@endsection
