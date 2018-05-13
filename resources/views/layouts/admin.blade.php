<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Profile-Sekolah</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- MaterializeCss -->
    <!-- <link href="{{asset('plugins/materialize-css/css/materialize.css')}}" rel="stylesheet" /> -->

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    @yield('head-content')

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
    <style type="text/css" media="screen">
        .sidebar .user-info {    
            background: url("{{asset('img/user-img-background.jpg')}}") no-repeat no-repeat;
        }
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->\
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Admin - Profile Sekolah</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('img/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" ><i class="material-icons">input</i>Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="index.html">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/typography.html">
                              <i class="material-icons">
                                school
                            </i>
                            <span>Sekolah</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/helper-classes.html">
                          <i class="material-icons">
                            person
                        </i>
                        <span>Guru</span>
                    </a>
                </li>
                <li>
                    <a href="pages/helper-classes.html">
                        <i class="material-icons">
                            people
                        </i>
                        <span>Murid</span>
                    </a>
                </li>
                <li>
                    <a href="pages/helper-classes.html">
                    <i class="material-icons col-green">
                        location_city
                    </i>
                    <span>Provinsi</span>
                </a>
            </li>
            <li>
                <a href="pages/helper-classes.html">
                  <i class="material-icons col-amber">
                    location_city
                </i>
                <span>Kabupaten</span>
            </a>
        </li>
        <li>
            <a href="pages/helper-classes.html">
              <i class="material-icons col-light-blue">
                location_city
            </i>
            <span>Kecamatan</span>
        </a>
    </li>
    <li>
        <a href="pages/helper-classes.html">
          <i class="material-icons">
            location_city
        </i>
        <span>Desa</span>
    </a>
</li>
<li>
    <a href="pages/helper-classes.html">
       <i class="material-icons">
        book
    </i>
    <span>Kurikulum</span>
</a>
</li>
<li>
    <a href="pages/helper-classes.html">
       <i class="material-icons">
        next_week
    </i>
    <span>Jurusan</span>
</a>
</li>
<li>
    <a href="pages/helper-classes.html">
     <i class="material-icons">
        collections
    </i>
    <span>Galeri</span>
</a>
</li>
<li>
    <a href="pages/helper-classes.html">
        <i class="material-icons">
            brightness_high
        </i>
        <span>Prestasi</span>
    </a>
</li>
<li>
    <a href="pages/helper-classes.html">
     <i class="material-icons">
        directions_walk
    </i>
    <span>Eskul</span>
</a>
</li>
<li>
    <a href="pages/helper-classes.html">
       <i class="material-icons">
        waves
    </i>
    <span>Fasilitas</span>
</a>
</li>
</ul>
</div>
<!-- #Menu -->
<!-- Footer -->
<div class="legal">
    <div class="copyright">
        &copy; 2018 - 2019 <a href="javascript:void(0);">Admin - SMKN 10 JAKARTA</a>.
    </div>
    <div class="version">
        <b>Version: </b> Beta
    </div>
</div>
<!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        @yield('content')
    </section>
</body>
<!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('js/demo.js')}}"></script>
    <script type="text/javascript">
    @yield('foot-content')
    </script>
</html>