@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        
        <div class="row d-flex justify-content-center my-3">
            <div class="col-sm-12 col-md-12 col-lg-7 shadow">
                <div class="row mr-3 py-5">
                    <div class="col-2 text-center text-primary">
                        <h1 style="font-size: 70px;"><i class="fa fa-clipboard-list"></i></h1>
                    </div>
                    <div class="col-10 ">
                        <form action="" method="POST">
                            @csrf
                            <!-- Title -->
                            <div class="row d-block border-bottom border-primary text-primary">
                                <input type="text" style="background-color: #F2F3F4;" class="form-control form-control-lg" placeholder="Title" >
                                <input type="text" class="form-control-sm score my-2 w-25" placeholder="Score" style="border: none;">
                            </div>
                            <!-- Describtion -->
                            <div class="row mt-3 pb-3 border-bottom  border-danger">
                                <textarea class="form-control describtion" style="background-color: #F2F3F4;" name="describtion" id="" cols="100" rows="3" placeholder="Describtion"></textarea>
                            </div>
                            <!-- File and Submit -->
                            <div class="row mt-3">
                                <div class="col-2 mr-3">
                                    <label for="addFile" class="btn btn-primary"><i class="fa fa-paperclip"></i>  Add file</label>
                                    <input type="file" id="addFile" style="display: none;">
                                </div>
                                <!-- Submit -->
                                <div class="col-2 mr-3">
                                    <input type="submit" class="btn btn-primary" value="&#43; Create">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection