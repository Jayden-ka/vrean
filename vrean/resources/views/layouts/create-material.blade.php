@extends('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-sm-12 col-md-12 col-lg-7 shadow">
                <div class="row mr-3 py-5">
                    <div class="col-2 text-center text-primary">
                        <h1 style="font-size: 70px;"><i class="fa fa-book"></i></h1>
                    </div>
                    <div class="col-10 ">
                        <form action="{{ action('App\Http\Controllers\ClassController@creatingmaterial') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Title -->
                            <div class="row d-block border-bottom border-primary text-primary">
                                <input type="text" class="form-control form-control-lg mb-3" placeholder="Title" style="background-color: #F2F3F4;" name="title">
                            </div>
                            <!-- Description -->
                            <div class="row mt-3 pb-3 border-bottom  border-danger">
                                <textarea class="form-control describtion" style="background-color: #F2F3F4;" name="caption" id="" cols="100" rows="3" placeholder="Description"></textarea>
                            </div>
                            <!-- File and Submit -->
                            <div class="row mt-3">
                                <div class="col-2 mr-3">
                                    {{-- <label for="addFile" class="btn btn-primary"><i class="fa fa-paperclip"></i>  Add file</label> --}}
                                    {!! Form::file('file[]', ['class'=>'form-control mb-2','multiple']) !!}
                                    {{-- <input type="file" id="addFile" style="display: none;" name="file[]" multiple> --}}
                                </div>
                                <!-- Submit -->
                                <div class="col-2 mr-3">
                                    <input type="hidden" id="addFile" style="display: none;" name="idclass" value="{{ $idclass }}">
                                    <input type="submit" class="btn btn-primary" value="&#43; Create" name="creatematerial">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection