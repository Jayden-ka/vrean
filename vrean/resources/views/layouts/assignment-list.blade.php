@extends('layouts.stream-class')

@section('list-content')

    {{-- {{ $idclass }} --}}
    <!-- Post assignment -->
    @foreach ($assignment as $item)
        <div class="row d-flex justify-content-center my-3">
            <div class="card bg-light rounded " style="height: 100px; width: 500px;">
                <form action="{{ action('App\Http\Controllers\ClassController@view_assignment') }}" method="post">
                    @csrf
                    <input type="hidden" name="ida" id="ida" value={{ $item->idAssignment }}>
                    <input type="hidden" name="idc" id="idc" value={{ $item->idclass }}>
                    {{-- <input type="hidden" name="idMaterial" value={{ $item->idMaterial }}> --}}
                    {{-- <label for="material"> --}}
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-2 text-center h-100">
                                    <label for="{{ $item->idAssignment }}"><h1 class="py-0"><i class="fa fa-clipboard-list"></i></h1></label>
                                </div>
                                <div class="col-10">
                                    <label for="{{ $item->idAssignment }}"><h5 class="card-title">{{ $item->title }}</h5></label>
                                    <p class="card-text">{{ $item->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    {{-- </label> --}}
                    
                    <input type="submit" value="" id="{{ $item->idAssignment }}" style="display: none;">
                </form>
                
            </div>
        </div>
    @endforeach
@endsection