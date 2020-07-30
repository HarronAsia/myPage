<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> ! Harron The Intern</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    <!-- Bootstrap 3.3.7 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <!-- Datatable  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">

    @if (!Auth::guest())

    <!-- Main Header -->
    <header class="main-header" >

        <!-- Logo -->
        <a href="/" class="logo">
            <b><i class="fas fa-teeth-open" style="font-size: 25px;"></i></b>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
            <!-- Sidebar toggle button-->
            <button class="btn btn-dark" data-toggle="push-menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user"></i>&nbsp;&nbsp;{{ucfirst(Auth::user()->name)}}
                        </a>

                        <div class="dropdown-menu">
                            <a href="{{route('profile.index',['name'=>Auth::user()->name?? '', 'id'=>Auth::user()->id])}}">
                                <p class="dropdown-item"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;Profile</p>
                            </a>

                            <button type="submit" class="dropdown-item" style="background-color: red;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Log Out
                            </button>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    @if(Auth::user()->email_verified_at == NULL)

                    @else
                    <li class="nav-item dropdown ">

                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-envelope"></i> &nbsp; &nbsp;Notifications
                            <span class="badge pull-right"> {{$notifications->count()}} </span>
                        </a>

                        <div class="dropdown-menu">
                            @foreach($notifications->take(3) as $notification)

                            <p class="dropdown-item">{{json_decode($notification->data)->data}}</p>
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                            @endforeach
                            <a href="{{route('notifications.all')}}">
                                <button class="dropdown-item btn-info">All Unread Messages</button>
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

    </header>


    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(Auth::user()->email_verified_at == NULL)
        <div class="align-middle">
            <a href="/email/verify" style="background-color: red; font-size: 35px; color: white;">
                Click here to verify your account before doing anything !!!
            </a>
        </div>
        @else

        @endif
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Harron ! The Intern </strong>
    </footer>

    </div>
    @else
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <b><i class="fas fa-teeth-open" style="font-size: 25px;"></i></b>
        </a>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Sidebar toggle button-->
            <button class="btn btn-dark" data-toggle="push-menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">

                    <li class="nav-item dropdown">

                        <a href="{{route('home')}}">
                        &nbsp;&nbsp; <i class="fas fa-user-tie"></i>&nbsp;&nbsp;Home&nbsp;&nbsp;
                        </a>
                    </li>

                    <li class="nav-item dropdown">


                        <a href="{{ url('/login') }}">
                        &nbsp;&nbsp;<i class="fas fa-user-tie"></i>&nbsp;&nbsp;Login&nbsp;&nbsp;
                        </a>

                    </li>
                    <li class="nav-item dropdown">

                        <a href="{{ url('/register') }}">
                        &nbsp;&nbsp;<i class="fas fa-user-tie"></i>&nbsp;&nbsp;Register&nbsp;&nbsp;
                        </a>

                    </li>

                </ul>
            </div>
        </nav>

    </header>


    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Harron ! The Intern </strong>
    </footer>

    </div>

    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <!-- Datatable  -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

    <!--BootBox -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>



    @stack('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            //Preview Image-----------------------------------------------------------------------//
            function PreviewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_preview_container').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function PreviewImage2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_preview_container2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $("#photo").change(function() {
                PreviewImage(this);
            });

            $("#thumbnail").change(function() {
                PreviewImage(this);
            });

            $("#sub_photo").change(function() {
                PreviewImage(this);
            });

            $("#banner").change(function() {
                PreviewImage(this);
            });

            $("#image").change(function() {
                PreviewImage(this);
            });

            $("#comment_image").change(function() {
                PreviewImage2(this);
            });

            //Preview Image-----------------------------------------------------------------------//


        });
    </script>
</body>

</html>