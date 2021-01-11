@extends('layouts.header')

@section('content')
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center sticky-top py-0" style="top:65px;">
            <div class="w-100 bg-light shadow" >
                <nav class="navbar navbar-expand-lg d-flex justify-content-center">
                    {{-- <a class="nav-link active" href="#">Stream</a> --}}
                    <form action="{{ action('App\Http\Controllers\ClassController@joiningclass_material') }}" method="post">
                        @csrf
                        <input type="hidden" name="idclass" value="{{ $idclass }}">
                        <input class="btn btn-link" type="submit" value="Stream" style="text-decoration: none">
                    </form>
                    <form action="{{ action('App\Http\Controllers\ClassController@list_member_student') }}" method="post">
                        @csrf
                        <input type="hidden" name="idclass" value="{{ $idclass }}">
                        <input class="btn btn-link" type="submit" value="Member" style="text-decoration: none">
                    </form>
                    {{-- <a class="nav-link" href="#">Member</a> --}}
                    <form action="{{ action('App\Http\Controllers\ClassController@joiningclass_assignment') }}" method="post">
                        @csrf
                        <input type="hidden" name="idclass" value="{{ $idclass }}">
                        <input class="btn btn-link" type="submit" value="Classwork" style="text-decoration: none">
                    </form>
                    {{-- <a class="nav-link" href="#">Classwork</a> --}}
                </nav>
            </div> 
        </div>
        <!-- Class infor -->
        <div class="row d-flex justify-content-center my-3">
            <div class="col-sm-12 col-md-10 col-lg-7 d-flex justify-content-center">
                <div class="card w-100  bg-primary rounded " style="height: 250px;">
                    <div class="card-body">
                        @foreach ($class as $item)
                            <h1 class="card-title" style="color: white">{{ $item->classname }}</h1>
                        @endforeach
                    
                    <!-- <p class="card-text">Class Code: This is the code</p> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================================= -->
        <!-- add assignment and material nav bar -->
        <!-- ======================================= -->
        <div class="row d-flex justify-content-center my-3">
            <div class="col-sm-12 col-md-10 col-lg-7 d-flex justify-content-center">
                <div class="card w-100 bg-light rounded text-white" style="height: 60px">
                    <div class="row h-100">
                        <div class="col d-flex justify-content-center align-items-center text-primary border-right">
                            <form action="{{ action('App\Http\Controllers\ClassController@joiningclass_assignment') }}" method="post">
                                @csrf
                                <input type="hidden" name="idclass" value="{{ $idclass }}">
                                <input class="btn btn-link" type="submit" value="Assignment" style="text-decoration: none">
                            </form>
                            {{-- Assignment --}}
                        </div>
                        <div class="col d-flex justify-content-center align-items-center text-primary">
                            <form action="{{ action('App\Http\Controllers\ClassController@joiningclass_material') }}" method="post">
                                @csrf
                                <input type="hidden" name="idclass" value="{{ $idclass }}">
                                <input class="btn btn-link" type="submit" value="Material" style="text-decoration: none">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('list-content')
        
    </div>
@endsection