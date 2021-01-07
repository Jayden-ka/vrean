<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>vRean</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="/css/homepage.css">
        <link rel="stylesheet" href="/css/style-post.css">
        <link rel="stylesheet" href="/css/style-profile.css">
        <link rel="stylesheet" href="/css/style-profile (2).css">
        <link rel="stylesheet" href="/css/editprofile.css">
        <link rel="stylesheet" href="/css/sharebtn.css">
        <link rel="stylesheet" href="/css/commetbtn.css">
        <link rel="stylesheet" href="/css/classroom-create.css">
        <link rel="stylesheet" href="/css/classgodiv.css">
        <link rel="stylesheet" href="/css/joinclassbtn.css">
        <style>

        </style>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'></script>
        <script src="https://kit.fontawesome.com/cb214ee1de.js" crossorigin="anonymous"></script>
    </head>
    <body class='snippet-body'>
        <header class="section-header">
        
        <section class="header-main border-bottom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-4 col-md-4 col-5"> <a href="{{ route('logo') }}" class="brand-wrap" data-abc="true">
                            <img style="width: 45px; height: 45px;" src="/img/vrean_png.png"> <span class="logo">vRean</span> </a> </div>
                    <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">
                        <form action="{{ action('App\Http\Controllers\PostController@showsearch') }}" class="search-wrap" method="POST">
                            @csrf
                            <div class="input-group w-100"> <input type="text" class="form-control search-form" style="width:55%;" placeholder="Search" name="search" id="search">
                                <div class="input-group-append"> <button class="btn btn-primary search-button" type="submit"> <i class="fa fa-search"></i> </button> </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                        <div class="d-flex justify-content-end"> <a target="" href="{{ route('logo') }}" data-abc="true" class="nav-link widget-header"> <i class="fas fa fa-home"></i></a> <span class="vl"></span>
                            <div class="d-flex justify-content-end"> <a target="" href="\class" data-abc="true" class="nav-link widget-header"> <i class="fas fa fa-book"></i></a> <span class="vl"></span></div>
                            <div class="dropdown btn-group"> <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-abc="true"><i class="fas fa fa-bell"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                    <li>
                                        <div class="notification-title">More Info</div>
                                        <div class="notification-list">
                                            <div class="list-group"> <a href="affiliates" class="list-group-item list-group-item-action active" data-abc="true">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="https://img.icons8.com/nolan/100/000000/helping-hand.png" alt="" class="user-avatar-md rounded-circle"></div>
                                                        <div class="notification-list-user-block"><span class="notification-list-user-name">Affiliate program</span> </div>
                                                    </div>
                                                </a> <a href="redemption-center" class="list-group-item list-group-item-action active" data-abc="true">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="https://img.icons8.com/bubbles/100/000000/prize.png" alt="" class="user-avatar-md rounded-circle"></div>
                                                        <div class="notification-list-user-block"><span class="notification-list-user-name">Redemption Center</span> </div>
                                                    </div>
                                                </a> <a href="#" class="list-group-item list-group-item-action active" data-abc="true">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="https://img.icons8.com/ultraviolet/100/000000/medal.png" alt="" class="user-avatar-md rounded-circle"></div>
                                                        <div class="notification-list-user-block"><span class="notification-list-user-name">Achievements</span> </div>
                                                    </div>
                                                </a> <a href="#" class="list-group-item list-group-item-action active" data-abc="true">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img"><img src="https://img.icons8.com/bubbles/100/000000/call-female.png" alt="" class="user-avatar-md rounded-circle"></div>
                                                        <div class="notification-list-user-block"><span class="notification-list-user-name">Contact us</span> </div>
                                                    </div>
                                                </a> </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> 
                            <span class="vl"></span> 
                            {{-- <a class="nav-link nav-user-img" href="#" data-toggle="modal" data-target="#login-modal" data-abc="true"> --}}
                                {{-- <span class="login"> --}}
                                <!-- Trigger/Open POST -->
                                    <button id="myBtn"><span class="login">POST</span></button>
                                    
                                    <!-- POST -->
                                    <div id="myModal" class="modal">                                    
                                        <!-- POST -->
                                        <div class="modal-content">
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
                                {{-- </span> --}}
                            {{-- </a> --}}
                            <span class="vl"></span> <a class="nav-link nav-user-img" href="{{ route('toprofile') }}" ><span class="login">{{ $username }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        {{-- <nav class="navbar navbar-expand-md navbar-main border-bottom">
            <div class="container-fluid">
                <form class="d-md-none my-2">
                    <div class="input-group"> <input type="search" name="search" class="form-control" placeholder="Search" required="">
                        <div class="input-group-append"> <button type="submit" class="btn btn-secondary"> <i class="fa fa-search"></i> </button> </div>
                    </div>
                </form> <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#dropdown6" aria-expanded="false"> <span class="navbar-toggler-icon"></span> </button>
                <div class="navbar-collapse collapse" id="dropdown6" style="">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" data-abc="true" aria-expanded="false">Create</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="" data-abc="true">Classroom</a> 
                                <a class="dropdown-item" href="" data-abc="true">---</a> 
                                <a class="dropdown-item" href="" data-abc="true">---</a> 
                            </div>
                        </li> -->
                        <!-- <li class="nav-item"> <a class="nav-link" href="" data-abc="true">POST</a> </li> -->
                    </ul>
                </div>
            </div>
        </nav> --}}


    </header>
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
        <main class="py-4">
            @yield('content')
        </main>
    </body>
</html>