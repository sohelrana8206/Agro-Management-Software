<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Bismillah Agro & Varieties ::</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('public/favicon.ico')}}" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{url('public/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/css/color_skins.css')}}">
</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-translate n_logo">
            <a class="nav-link" href="{{url('')}}">Home</a>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{url('public/assets/images/login.jpg')}}"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                {{ Form::open(array('route' => 'admin.store')) }}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="header">
                        <div style="width: 200px" class="logo-container">
                            <img width="100%" src="{{url('public/assets/images/IRCL-logo.png')}}" alt="IRCL">
                        </div>
                        <h5>Log in</h5>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input type="email" class="form-control" name="email" placeholder="Enter email address">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input type="password" placeholder="Password" name="password" class="form-control" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <input type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light" value="SIGN IN">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright">
                &copy;
                <span>Designed by <a href="#" target="_blank">Faiza's IT Solutions</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="{{url('public/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{url('public/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

<script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>

</html>