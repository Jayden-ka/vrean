@extends('layouts.header')

@section('content')
    <div class="container-fluid"> <!-- edited -->
        <!-- edited -->
        <div class="row d-flex justify-content-center sticky-top py-0" style="top:65px;">
            <div class="w-100 bg-light shadow" >
                <nav class="navbar navbar-expand-lg d-flex justify-content-center">
                    {{-- <a class="nav-link active" href="#">Stream</a> --}}
                    <form action="{{ action('App\Http\Controllers\ClassController@inclass_material') }}" method="post">
                        @csrf
                        <input type="hidden" name="idclass" value="{{ $idclass }}">
                        <input class="btn btn-link" type="submit" value="Stream" style="text-decoration: none">
                    </form>
                    <form action="{{ action('App\Http\Controllers\ClassController@list_member_teacher') }}" method="post">
                        @csrf
                        <input type="hidden" name="idclass" value="{{ $idclass }}">
                        <input class="btn btn-link" type="submit" value="Member" style="text-decoration: none">
                    </form>
                    {{-- <a class="nav-link" href="#">Member</a> --}}
                    <form action="{{ action('App\Http\Controllers\ClassController@inclass_assignment') }}" method="post">
                        @csrf
                        <input type="hidden" name="idclass" value="{{ $idclass }}">
                        <input class="btn btn-link" type="submit" value="Classwork" style="text-decoration: none">
                    </form>
                    {{-- <a class="nav-link" href="#">Classwork</a> --}}
                </nav>
            </div> 
        </div>
        <!-- Class infor -->
        <div class="row d-flex justify-content-center my-3 mt-5">
            <div class="col-sm-12 col-md-10 col-lg-7 d-flex justify-content-center">
                <div class="card w-100 bg-primary rounded text-white" style="height: 250px;">
                    @foreach ($class as $item)
                        <div class="card-body">
                            <h1 class="card-title">{{ $item->classname }}</h1>
                            <p class="card-text">Class Code: {{ $item->classcode }}</p>
                        </div>
                        <!-- edited -->
                        <div class="d-flex justify-content-end mb-1">
                            <form action="{{ action('App\Http\Controllers\ClassController@creatematerial') }}" method="post">
                                @csrf
                                <input type="hidden" name="idclass" value="{{ $item->idclass }}">
                                <input type="submit" class="w-auto btn btn-light" value="Material">
                            </form>
                        </div>
                        <!-- edited -->
                        <div class="d-flex justify-content-end mb-1">
                            <form action="{{ action('App\Http\Controllers\ClassController@createassignment') }}" method="post">
                                @csrf
                                <input type="hidden" name="idclass" value="{{ $item->idclass }}">
                                <input type="submit" class="w-auto btn btn-light" value="Assignment">
                            </form>
                            {{-- <a href="/create_assignment" class=" w-auto btn btn-light">Assignment</a> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end class infor -->
        <!-- ======================================= -->
        <!-- add assignment and material nav bar -->
        <!-- ======================================= -->
        <div class="row d-flex justify-content-center my-3">
            <div class="col-sm-12 col-md-10 col-lg-7 d-flex justify-content-center">
                <div class="card w-100 bg-light rounded text-white" style="height: 60px">
                    <div class="row h-100">
                        <div class="col d-flex justify-content-center align-items-center text-primary border-right">
                            <form action="{{ action('App\Http\Controllers\ClassController@inclass_assignment') }}" method="post">
                                @csrf
                                <input type="hidden" name="idclass" value="{{ $idclass }}">
                                <input class="btn btn-link" type="submit" value="Assignment" style="text-decoration: none">
                            </form>
                            {{-- Assignment --}}
                        </div>
                        <div class="col d-flex justify-content-center align-items-center text-primary">
                            <form action="{{ action('App\Http\Controllers\ClassController@inclass_material') }}" method="post">
                                @csrf
                                <input type="hidden" name="idclass" value="{{ $idclass }}">
                                <input class="btn btn-link" type="submit" value="Material" style="text-decoration: none">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- the content to show the list --}}
        @yield('list-content')

        {{-- <!-- Post assignment -->
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <a href="view-assignment.html">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-2 text-center h-100">
                                <h1 class="py-0"><i class="fa fa-clipboard-list"></i></h1>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Teacher posted a new assignment</h5>
                                <p class="card-text">Nov 29</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Post assignment -->
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <a href="view-assignment.html">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-2 text-center h-100">
                                <h1 class="py-0"><i class="fa fa-clipboard-list"></i></h1>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Teacher posted a new assignment</h5>
                                <p class="card-text">Nov 29</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Post assignment -->
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <a href="view-assignment.html">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-2 text-center h-100">
                                <h1 class="py-0"><i class="fa fa-clipboard-list"></i></h1>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Teacher posted a new assignment</h5>
                                <p class="card-text">Nov 29</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Post assignment -->
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <a href="view-assignment.html">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-2 text-center h-100">
                                <h1 class="py-0"><i class="fa fa-clipboard-list"></i></h1>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Teacher posted a new assignment</h5>
                                <p class="card-text">Nov 29</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- post material -->
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <a href="view-material.html">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-2 text-center h-100">
                                <h1 class="py-0"><i class="fa fa-book"></i></h1>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Teacher posted a material</h5>
                                <p class="card-text">Nov 29</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Post assignment -->
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <a href="view-assignment.html">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-2 text-center h-100">
                                <h1 class="py-0"><i class="fa fa-clipboard-list"></i></h1>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title">Teacher posted a new assignment</h5>
                                <p class="card-text">Nov 29</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>   --}}
    </div>
@endsection