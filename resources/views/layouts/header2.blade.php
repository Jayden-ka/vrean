<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>vRean</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="/css/homepage2.css">
        <link rel="stylesheet" href="/css/style-post.css">
        <link rel="stylesheet" href="/css/style-profile.css">
        <link rel="stylesheet" href="/css/style-profile (2).css">
        <link rel="stylesheet" href="/css/editprofile.css">
        <link rel="stylesheet" href="/css/sharebtn.css">
        <link rel="stylesheet" href="/css/commetbtn.css">
        <link rel="stylesheet" href="/css/classroom-create.css">
        <link rel="stylesheet" href="/css/classgodiv.css">
        <link rel="stylesheet" href="/css/joinclassbtn.css">
        <link rel="stylesheet" href="/css/followlist.css">
        <style>

        </style>
        {{-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'></script> --}}
        <script src="https://kit.fontawesome.com/cb214ee1de.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-3 shadow" style="z-index: 9999">
        <a class="navbar-brand" href="{{ route('logo') }}" style="font-size: 24px; font-weight: 600;">
          <img src="/img/vrean_png.png" width="40" height="40" class="d-inline-block align-top" alt="">
          vRean
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <div class="row justify-content-center px-3 w-100">
            <!-- Search btn -->
            <div class="col-lg-8 col-md-12 ">
              <form action="{{ action('App\Http\Controllers\PostController@showsearch') }}" method="POST" class="form-group my-2 my-lg-0 ml-5">
                @csrf
                <div class="row w-100">
                  <!-- Search Box -->
                  <div class="col-lg-5 col py-1 px-0">
                      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                  </div>
                  <!-- Search Icon -->
                  <div class="col-1 py-1 d-flex justify-content-center">
                      <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <!-- end search btn -->
            <!-- Dropdown ITems  -->
            <div class="col-lg-4 col-md-12 px-3">
              <ul class="navbar-nav w-100 d-flex justify-content-end">
                <div class="row">
                  <!-- Post -->
                  <div class="col">
                    <li class="nav-item">
                      <!-- POST btn -->
                      <button id="myBtn" class="btn btn-primary"><span class="login">POST</span></button>       
                      <!-- Pop up post  -->
                      <div id="myModal" class="modal">
                        <div class="modal-content container w-25 mt-5">
                          <span class="close">&times;</span>
                          <form class="form-group" action="{{ action('App\Http\Controllers\PostController@store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                                <h4 style="color:black">Create a post</h4>
                                                {!! Form::textarea('caption', '', ['class'=>'form-control mb-2','placeholder'=>'Your mind.....']) !!}
                                                {!! Form::file('photo[]', ['class'=>'form-control mb-2','multiple']) !!}
                                                {{-- <input type="text" placeholder="What is in your mind?..." class="orm-control form-control-md w-100" name="caption" id="caption"><br><br> --}}
                                                <input type="submit" name="post" id="post" value="Post" class="submit btn btn-primary w-100">
                          </form>
                        </div>
                      </div>
                      <!-- end pop up post -->
                    </li>
                  </div>
                  <!-- end post -->
    
                  <!-- Drop Down Items -->
                  <!-- Home btn -->
                  <div class="col">
                    <li class="nav-item d-flex  justify-content-center active">
                      <a class="nav-link text-primary" href="{{ route('logo') }}"><i class="fa fa-home"></i> <span class="sr-only">(current)</span></a>
                    </li>
                  </div>
                  <!-- Classroom -->
                  <div class="col">
                    <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link text-primary " href="\class"><i class="fa fa-book"></i></a>
                    </li>
                  </div>
                  <!-- Profile dropdown -->
                  <div class="col">
                    <li class="nav-item dropdown d-flex justify-content-center">
                      <a class="nav-link dropdown-toggle text-primary " href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        {{-- {{ $username }} --}}
                      </a>
                      <div class="dropdown-menu justify-content-center" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('toprofile') }}">{{ $username }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/">Log out</a>
                      </div>
                    </li>
                  </div>
                  <!-- end profile dropdown -->
                </div>
              </ul>
            </div>
            <!-- end drop down item -->
          </div>
        </div>
      </nav>
    
        {{-- <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br>
        <p>hello</p><br><br><br><br> --}}
      
    
        <script>
          // Get the modal
          var modal = document.getElementById("myModal");
          
          // Get the button that opens the modal
          var btn = document.getElementById("myBtn");
          
          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];
          
          // When the user clicks the button, open the modal 
          btn.onclick = function() {
            modal.style.display = "block";
          }
          
          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
            modal.style.display = "none";
          }
          
          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery/min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <main class="py-4">
          @yield('content')
        </main>
      </body>    

</html>