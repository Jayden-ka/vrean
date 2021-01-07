@extends('layouts.classopenheader')

@section('contentclass')
    <div class="classroom2">
        @if (count($yourjoinedclass)>0)
            @foreach ($yourjoinedclass as $item_joinedclass)
                @foreach ($class as $item_class)
                    @if ($item_joinedclass->idclass==$item_class->idclass)
                        <div class="row classgo">
                            <div class="col"></div>
                            <div class="col-6 col6 p-3">
                                <div class="row">                    
                                    <div class="col-sm-9 mt-1">
                                        <h4 style="font-weight: 600;" class="">{{ $item_class->classname }}</h4>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="{{ action('App\Http\Controllers\ClassController@joiningclass') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $item_class->idclass }}" name="idclass">
                                            <input class="btn btn-primary rounded-pill" type="submit" value="Go">
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        @else
            
        @endif
    </div>
@endsection