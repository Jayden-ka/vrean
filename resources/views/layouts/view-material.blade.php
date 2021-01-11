@extends('layouts.header')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3 mt-5">
            <div class="col-1 justify-content-start">
                <a href="" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7 shadow">
                <div class="row mr-3 py-3">
                    @foreach ($material as $item_material)
                        @foreach ($teacher as $item_teacher)
                            
                                <div class="col-2 text-center text-primary">
                                    <h1 style="font-size: 70px;"><i class="fa fa-book"></i></h1>
                                </div>
                                <div class="col-10 ">
                                    <div class="row d-block border-bottom border-primary text-primary">
                                        <h1>{{ $item_material->title }}</h1>
                                        <p class="text-muted">{{ $item_teacher->username }} at {{ $item_material->created_at }}</p>
                                    </div>
                                    <div class="row mt-3">
                                        <p>{{ $item_material->caption }}</p>
                                    </div>
                                    <div class="row pb-3 border-bottom  border-danger ">
                                        @foreach ($material_file as $item_file)
                                            <div class="col-6 border py-3 text-center">
                                                <a href="storage/photo/material/{{ $item_file->file }}">{{ $item_file->file }}</a>
                                            </div>                    
                                        @endforeach
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <p>Class Comments</p>
                                    </div>
                                    <div class="row mx-3 ">
                                        <form action="" method="POST" class="w-100 d-flex">
                                            <input class="form-control" type="text" placeholder="Add class comments...">
                                            <button class="btn"><i class="far fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            
                        @endforeach
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
@endsection