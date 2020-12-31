<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-md-6 text-primary d-flex justify-content-center">
                <div class="title ">
                    <div class="logo d-flex justify-content-center">
                        <img src="/img/vrean(png).png" alt="vRean logo">
                    </div>
                    <h1>vRean</h1>
                    <p>Your class and social-media are in one app.</p>
                </div>
            </div>

            <div class="col-md-6 ml-5 bg-danger text-light">
                <div class=" form-container d-flex justify-content-center align-items-center py-5">
                    <div class="form-items border-secondary rounded signup">
                        <form action="{{ action('App\Http\Controllers\UseraccController@store') }}" method="POST">
                            @csrf
                            <!-- Confirm password -->
                            <div class="form-group">
                                @include('val.message');
                                <h1 class="signup-title">Sign Up</h1>
                                <hr size="8" width="100%" style="color: #000;">
                                <!-- First name & last name -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-md mb-3" name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-md mb-3" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <!-- Email & password -->
                                <input type="email" class="form-control form-control-md mb-3" name="email" placeholder="Email">
                                <input type="password" class="form-control form-control-md mb-3" name="password" placeholder="Password">
                                <!-- Date of birth -->
                                <div class="row ">
                                    <p>Date of birth</p>
                                    <div class="col-md-4">
                                        <input type="number" min="1" max="31" class="form-control form-control-md mb-3" name="day" placeholder="Day">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" min="1" max="12" class="form-control form-control-md mb-3" name="month" placeholder="Month">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" min="1970" max="2021" class="form-control form-control-md mb-3" name="year" placeholder="Year" value="2000">
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="row mb-3">
                                    <p>Gender</p>
                                    <div class="col-md-4">
                                        <div class="form-check dob">
                                            <div class="gender">
                                                <label class="form-check-label gender-label" for="female">Female</label>
                                                <input class="form-check-input gender-radio" type="radio" name="gender" id="female" value="F" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check dob">
                                            <div class="gender">
                                                <label class="form-check-label gender-label" for="male">Male</label>
                                                <input class="form-check-input gender-radio" type="radio" name="gender" id="male" value="M" checked>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-check dob">
                                            <div class="gender">
                                                <label class="form-check-label gender-label" for="other">Other</label>
                                                <input class="form-check-input gender-radio" type="radio" name="gender" id="other" value="other" checked>
                                            </div>                                        
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary w-50" name="login" value="Sign Up">
                                </div>
                                <hr size="3" width="100%" style="color: #000;">
                                <a href="/login" class="d-flex justify-content-center">Log in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>