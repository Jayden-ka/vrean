<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Log In</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-md-6 text-primary d-flex justify-content-center">
                <div class="title">
                    <div class="d-flex justify-content-center">
                        <img src="/img/vrean(png).png" alt="vRean logo">
                    </div>
                    
                    <h1>vRean</h1>
                    <p>Your class and social-media are in one app.</p>
                </div>
            </div>
            <div class="col-md-6 ml-5 bg-danger text-light">
                <div class=" form-container d-flex justify-content-center align-items-center py-5">
                    <div class="form-items border-secondary rounded login">
                        <form action="{{ action('App\Http\Controllers\UseraccController@log2') }}" method="POST">
                            @csrf
                            <!-- Confirm password -->
                            <div class="form-group">
                                @include('val.message');
                                <input type="email" class="form-control form-control-lg mb-3" name="email" id="email" placeholder="Email">
                                <input type="password" class="form-control form-control-lg mb-3" name="password" id="password" placeholder="Password">
                                <input type="submit" class="btn btn-primary w-100" name="login" id="login" value="Log In" >
                                <hr size="3" width="100%" style="color: #000;">
                                <a href="/login/create" class="btn w-100 cr-acc">Create New Account</a>
                                <!-- <input type="submit" class="btn w-100 cr-acc" name="create_account" value="Create New Account" > -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>