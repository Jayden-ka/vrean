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
              <div class="col-sm-12 col-md-12 col-lg-7 shadow">
                  <div class="row mr-3">
                      <!-- Assignment Icon -->
                      <div class="col-2 text-center text-primary">
                          <h1 style="font-size: 70px;"><i class="fas fa-clipboard-list"></i></h1>
                      </div>
                      <div class="col-10 ">
                          <!-- Title  -->
                          <div class="row d-block border-bottom border-primary ">
                              <h1 class="text-primary">{{ $item_ass->title }}</h1>
                              <p class="text-muted mb-0">{{ $item_tea->username }} at {{ $item_ass->created_at }}</p>
                              @if (count($score_student)>0)
                                @foreach ($score_student as $item_stu)
                                    @if ($loop->last)
                                        <p class="text-muted">score:{{ $item_stu->score }}/{{ $item_ass->score }}</p>
                                    @endif
                                    
                                @endforeach
                              @else
                                <p class="text-muted">score: __/{{ $item_ass->score }}</p>
                              @endif
                              
                              {{-- <p class="text-muted">score: /100</p> --}}
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
                          <!-- Answer -->
                          <div class="row bg-light mt-3 py-3 px-3 shadow d-block">
                              <p class="fw-bold">Your work</p>
                              @if (count($score_student)>0)
                                @foreach ($score_student as $item_stu)
                                    <span class="d-block"><a href="storage/photo/answer/{{ $item_stu->file }}">{{ $item_stu->file }}</a></span>
                                    

                                    @if ($loop->last)
                                        <form action="{{ action('App\Http\Controllers\ClassController@unsubmit') }}" method="POST">
                                            @csrf
                                            {{-- <label for="addfile" class="form-control text-center"><i class="fas fa-plus"></i> Add create</label> --}}
                                            <input type="hidden" name="ida" value={{ $idAssignment }}>
                                            <input type="hidden" name="idc" value={{ $idclass }}>
                                            <input type="hidden" name="idA" value={{ $item_stu->idAnswer }}>
                                            {{-- <input style="" class="form-control mb-2" type="file" id="addfile" name="file[]" multiple> --}}
                                            <input type="submit" class="form-control btn btn-primary" value="Unsubmit">
                                        </form>
                                    @endif
                                    
                                @endforeach
                                
                              @else 
                                <form action="{{ action('App\Http\Controllers\ClassController@submitting_assignment') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <label for="addfile" class="form-control text-center"><i class="fas fa-plus"></i> Add create</label> --}}
                                    <input type="hidden" name="idAssignment" value={{ $idAssignment }}>
                                    <input type="hidden" name="idclass" value={{ $idclass }}>
                                    <input style="" class="form-control mb-2" type="file" id="addfile" name="file[]" multiple>
                                    <input type="submit" class="form-control btn btn-primary" value="Submit">
                                </form>
                              @endif
                              
                          </div>
                          <!-- Comment -->
                          <div class="row mt-3">
                              <p>Class Comments</p>
                          </div>
                          <div class="row mx-3 ">
                              <form action="" method="POST" class="w-100 d-flex">
                                  @csrf
                                  <input class="form-control" type="text" placeholder="Add class comments...">
                                  
                                  <button class="btn"><i class="far fa-paper-plane"></i></button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            @endforeach
        @endforeach
        
    </div>
@endsection