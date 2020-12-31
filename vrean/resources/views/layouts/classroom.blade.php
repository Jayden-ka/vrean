@extends('layouts.classopenheader')

@section('contentclass')
    <div class="classroom">
        <div class="row">
            <div class="col"></div>
            <div class="col-5 div_create">
                <h5 class="title_create_school"><b>Create school</b></h5>
                <hr>                
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input class="btn btn-primary rounded-pill" id="createclass_btn" type="submit" value="Create">
                    <div id="myModalcreateclass" class="modalcreateclass">                                    
                        <div class="modal-contentcreateclass">
                            <span class="closecreateclass">&times;</span>
                            <form class="form-group" action="{{ action('App\Http\Controllers\ClassController@createclass') }}" method="POST">
                                @csrf
                                <h4 style="color:black">Create Class</h4>
                                
                                    <label for="classname" class="form-label mt-3">Class Name</label>
                                    <input type="text" class="form-control rounded-pill mb-3" name="classname" id="classname">
                                
                                
                                    <label for="classsubject" class="form-label">Subject</label>
                                    <input type="text" class="form-control rounded-pill mb-3" name="classsubject"  id="classsubject">
                                
                                
                                    <label for="classroom" class="form-label">Room</label>
                                    <input type="text" class="form-control rounded-pill mb-3" name="classroom" id="classroom">
                                
                                <input type="submit" name="createclass" id="createclass" value="Create" class="submit btn btn-primary w-100">
                            </form>
                        </div>
                    </div>
                </div>    
            </div>            
            <div class="col"></div>
        </div>
    </div> 
    <div class="classroom2">
        @if (count($yourclass)>0)
            @foreach ($class as $item_class)
                @foreach ($yourclass as $item_yourclass)
                    @if ($item_yourclass->idclass==$item_class->idclass)
                        <div class="row classgo">
                            <div class="col"></div>
                            <div class="col-6 col6 p-3">
                                <div class="row">                    
                                    <div class="col-sm-9 mt-1">
                                        <h4 style="font-weight: 550;" class="">{{ $item_class->classname }}</h4>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="{{ action('App\Http\Controllers\ClassController@inclass') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="idclass" value="{{ $item_class->idclass }}">
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
    <script>
        // Get the modal
            var modalcreateclass = document.getElementById("myModalcreateclass");
            
            // Get the button that opens the modal
            var btncreateclass = document.getElementById("createclass_btn");
            
            // Get the <span> element that closes the modal
            var spancreateclass = document.getElementsByClassName("closecreateclass")[0];
            
            // When the user clicks the button, open the modal 
            btncreateclass.onclick = function() {
            modalcreateclass.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            spancreateclass.onclick = function() {
            modalcreateclass.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modalcreateclass) {
                modalcreateclass.style.display = "none";
            }
            }
    </script>
@endsection