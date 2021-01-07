@extends('layouts.header')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="row d-flex justify-content-center bg-light sticky-top">
            <nav class="navbar navbar-expand-lg d-flex justify-content-center">
                <a class="nav-link" href="/joinedclass" style="color:black">Joined Class</a>
                <a class="nav-link" href="/class" style="color:black">My Class</a>
                <a class="nav-link" id="joinclassbtn" style="color:black">Join Class</a>
            </nav>
        </div>
        {{-- <div class="row d-flex justify-content-center bg-light sticky-top">
            <nav class="navbar navbar-expand-lg d-flex justify-content-center">
                <a class="nav-link active" href="stream-class.html">Stream</a>
                <a class="nav-link" href="#">Member</a>
                <a class="nav-link" href="#">Classwork</a>
            </nav>
        </div> --}}
    </div>
    @yield('contentclass')
    <div id="myModaljoinclass" class="modaljoinclass">                                    
        <div class="modal-contentjoinclass">
            <span class="closejoinclass">&times;</span>
            <form class="form-group" action="{{ action('App\Http\Controllers\ClassController@joiningclass') }}" method="POST">
                @csrf
                <h4 style="color:black">Class Code</h4>
                {!! Form::text('classcode', '', ['class'=>'form-control mb-2 w-100','placeholder'=>'Class Code']) !!}
                {{-- <input type="text" placeholder="What is in your mind?..." class="orm-control form-control-md w-100" name="caption" id="caption"><br><br> --}}
                <input type="submit" name="joinclass" id="joinclass" value="Join" class="submit btn btn-primary w-100">
            </form>
        </div>
    </div>
    <script>
        // Get the modal
            var modaljoinclass = document.getElementById("myModaljoinclass");
            
            // Get the button that opens the modal
            var btnjoinclass = document.getElementById("joinclassbtn");
            
            // Get the <span> element that closes the modal
            var spanjoinclass = document.getElementsByClassName("closejoinclass")[0];
            
            // When the user clicks the button, open the modal 
            btnjoinclass.onclick = function() {
            modaljoinclass.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            spanjoinclass.onclick = function() {
            modaljoinclass.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modaljoinclass) {
                modaljoinclass.style.display = "none";
            }
            }
    </script>
@endsection
  