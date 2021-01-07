@extends('layouts.header')

@section('content')
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center bg-light sticky-top">
            <nav class="navbar navbar-expand-lg">
                <a class="nav-link active" href="stream-class.html">Stream</a>
                <a class="nav-link" href="#">Member</a>
                <a class="nav-link" href="#">Classwork</a>
            </nav>
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
        </div>
    </div>
@endsection