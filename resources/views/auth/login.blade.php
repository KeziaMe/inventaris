<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('backend/css/app-dark.css')}}" id="darkTheme" disabled>
</head>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="post" action="{{ route('login') }}">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
                    <img src="{{asset('backend/assets/images/logo2.png')}}" alt="Logo"
                        style="width: 80px; height: 80px;" class="navbar-brand-img brand-sm" />
                </a>
                <h1 class="h2 mb-3">Login</h1>
                @csrf
                <div class="form-group">
                    <label for="email" class="sr-only">Email </label>
                    <input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="Email"
                        required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" class="form-control form-control-lg" name="password"
                        placeholder="Password" required="">
                </div>
                <div class="checkbox mb-3">
                    <label for="remember_me">
                        <input type="checkbox" id="remember_me" name="remember" value="remember-me"> Ingat Saya
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
            </form>
        </div>
    </div>
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/js/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('backend/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('backend/js/config.js')}}"></script>
    <script src="{{asset('backend/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments)
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>