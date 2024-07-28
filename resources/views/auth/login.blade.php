<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Retribusi</title>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href="logo/Logo.png">
    <!--===============================================================================================-->	
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/bootstrap/csss/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fontss/font-awesome-4.7.0/csss/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('fontss/iconic/csss/material-design-iconic-font.min.css') }}"> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/animate/animate.css') }}">
    <!--===============================================================================================-->	
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/css-hamburgers/hamburgers.min.css') }}"> --}}
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/animsition/csss/animsition.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('csss/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Auth/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

    <!--===============================================================================================-->
    <style>
        .alert-danger {
            color: red;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <header class="login-header">
                        <span class="login100-form-title p-b-26">
                            <img src="{{ URL::asset('logo/Logo.png') }}" alt="" class="login-img mt-3 h-auto max-w-lg mx-auto">
                            <span class="login-title">Satu Pintu</span>
                        </span> 
                        <p class="login-info">
                            Please enter your user information.
                        </p>
                    </header>

                    <!-- Display error message -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error) 
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium text-center">{{$error}}</span> 
                            </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <h6>Username</h6>
                        <input class="input100" type="text" name="name" id="name" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <h6>Password</h6>
                        <input class="input100" type="password" name="password" id="password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    
    <!--===============================================================================================-->
    <script src="{{ URL::asset('vendorr/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('vendorr/animsition/jss/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('vendorr/bootstrap/jss/popper.js') }}"></script>
    <script src="{{ URL::asset('vendorr/bootstrap/jss/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('vendorr/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('vendorr/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('vendorr/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('vendorr/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('jss/main.js') }}"></script>
</body>
</html>
