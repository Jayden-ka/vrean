@extends('layouts.stream-class')

@section('list-content')
    {{-- {{ $idclass }} --}}
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
@endsection