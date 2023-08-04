<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Nilai | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('add/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('add/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('add/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="add/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="add/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="add/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="add/css/util.css">
    <link rel="stylesheet" type="text/css" href="add/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('dist/img/logo-sekolah.png') }}" width="330" height="330" alt="IMG">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100">
                        <input class="input100" type="email" name="email" placeholder="Email" required>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    </span>
                    @error('password')
                        <label for=""><strong>{{ $message }}</strong></label>
                    @enderror
                    @error('email')
                        <label for=""><strong>{{ $message }}</strong></label>
                    @enderror

                    <!-- Tambahkan alert untuk kesalahan login -->
                    @if (session('error'))
                        <div>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                    </div>

                    <div class="text-center p-t-136">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="add/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="add/vendor/bootstrap/js/popper.js"></script>
    <script src="add/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="add/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="add/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script>
        @if (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>

</body>

</html>
