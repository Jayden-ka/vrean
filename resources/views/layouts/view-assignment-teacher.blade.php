@extends('layouts.header')
@section('content')
    <div class="container-fluid">
        {{-- <div class="row bg-light sticky-top shadow">
            <nav class="navbar navbar-expand-lg d-flex justify-content-center">
                <a class="nav-link active" href="stream-class.html">Stream</a>
                <a class="nav-link" href="#">Member</a>
                <a class="nav-link" href="#">Classwork</a>
            </nav>  
        </div> --}}
        @foreach ($assignment as $item_ass)
            @foreach ($teacher as $item_tea)
                <div class="row d-flex justify-content-center my-3">
                    <div class="col-sm-12 col-md-12 col-lg-7 shadow py-3">
                        <div class="row mr-3">
                            <!-- Assignment Icon -->
                            <div class="col-2 text-center text-primary">
                                <h1 style="font-size: 70px;"><i class="fas fa-clipboard-list"></i></h1>
                            </div>
                            <div class="col-10 ">
                                <!-- Title  -->
                                <div class="row d-block border-bottom border-primary ">
                                    <h1 class="text-primary">{{ $item_ass->title }}</h1>
                                    <p class="text-muted">{{ $item_tea->username }} at {{ $item_ass->created_at }}</p>
                                </div>
                                <!-- Caption -->
                                <div class="row mt-3">
                                    <p>{{ $item_ass->caption }}</p>
                                </div>
                                <!-- File send -->
                                <div class="row pb-3 border-bottom  border-danger ">
                                    @foreach ($assignment_file as $item_file)
                                        <div class="col-6 border py-3 text-center">
                                            <a href="storage/photo/assignment/{{ $item_file->file }}">{{ $item_file->file }}</a>
                                           
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Comments -->
                                <div class="row mt-3">
                                    <p>Class Comments</p>
                                </div>
                                <div class="row">
                                    <form action="" method="POST" class="w-100 d-flex">
                                        <input class="form-control" type="text" placeholder="Add class comments...">
                                        <button class="btn"><i class="far fa-paper-plane"></i></button>
                                    </form>
                                </div>
                                <!-- Answer -->
                                <div class="row bg-light mt-3 py-3 px-3 shadow d-block">
                                    <h3 class="fw-bold">Student's work</h3>
        
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <!-- <th scope="col">#</th> -->
                                            <th scope="col">Name</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student_submit as $item_stu)
                                                <tr>
                                                    <!-- Student Name -->
                                                    <td>{{ $item_stu->username }}</td>
                                                    <!-- Answer -->
                                                    <td>
                                                        @foreach ($student_submit as $item_stu_file)
                                                            @if ($item_stu_file->idStudent==$item_stu->idStudent)
                                                                <span class="d-block"><a href="storage/photo/answer/{{ $item_stu->file }}">{{ $item_stu->file }}</a></span>
                                                        
                                                            @endif
                                                            
                                                        @endforeach
                                                        
                                                    </td>
                                                    <!-- Score -->
                                                    <form action="{{ action('App\Http\Controllers\ClassController@put_stu_score') }}" method="POST">
                                                        @csrf
                                                        <td>
                                                            <p><input type="text" class="score" name="score" value="{{ $item_stu->score }}" style="background-color: #F8F9FA;
                                                                border: none;
                                                                border-bottom: solid 2px #000;
                                                                width: 45px;">/100</p>
                                                        </td>
                                                        <!-- Return -->
                                                        <td>
                                                            <input type="hidden" value="{{ $item_stu->idclass }}" name="idc">
                                                            <input type="hidden" value="{{ $item_stu->idAssignment }}" name="idA">
                                                            <input type="hidden" value="{{ $item_stu->idAnswer }}" name="ida">
                                                            <input type="submit" class="btn btn-primary" value="Return">
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
        
    </div>
@endsection