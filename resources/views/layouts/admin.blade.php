<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
        <?php
        $satu = Request::segment(1) === null ? null : 'admin &raquo; ';
        $dua = Request::segment(2) === null ? null : Request::segment(2).' &raquo; ';
        echo ucwords($dua.$satu."profile sekolah ".date('Y'));
        ?>
    </title>
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

    <!-- Bootstrap Select Css -->
    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />    

    <!-- JQuery DataTable Css -->
    <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">    

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />

    @yield('head-content')

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
            <p>Sedang Memuat...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ url('/') }}">                    
                    <?php
                    echo ucwords($dua.$satu."profile sekolah ".date('Y'));
                    ?>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">color_lens</i></a></li>
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
                    <!-- <img src="{{asset('img/user.png')}}" width="48" height="48" alt="User" /> -->
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" ><i class="material-icons">input</i>Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === null ? 'active' : null }}">
                        <a href="{{route('admin')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'sekolah' ? 'active' : null }}">
                        <a href="{{route('sekolah')}}">
                            <i class="material-icons">school</i>
                            <span>Sekolah</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'guru' ? 'active' : null }}">
                        <a href="{{route('guru')}}"><i class="material-icons">person</i>
                            <span>Guru</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'siswa' ? 'active' : null }}">
                        <a href="{{route('siswa')}}">
                            <i class="material-icons">people</i>
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'provinsi' ? 'active' : null }}">
                        <a href="{{route('provinsi')}}">
                            <i class="material-icons col-green">location_city</i>
                            <span>Provinsi</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'kabupaten' ? 'active' : null }}">
                        <a href="{{route('kabupaten')}}">
                            <i class="material-icons col-amber">
                            location_city</i>
                            <span>Kabupaten</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'kecamatan' ? 'active' : null }}">
                        <a href="{{route('kecamatan')}}">
                            <i class="material-icons col-light-blue">location_city</i>
                            <span>Kecamatan</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'desa' ? 'active' : null }}">
                        <a href="{{route('desa')}}">
                            <i class="material-icons">location_city</i>
                            <span>Desa</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'kurikulum' ? 'active' : null }}">
                        <a href="{{route('kurikulum')}}">
                            <i class="material-icons">book</i>
                            <span>Kurikulum</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'jurusan' ? 'active' : null }}">
                        <a href="{{route('jurusan')}}">
                            <i class="material-icons">next_week</i>
                            <span>Jurusan</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'galeri' ? 'active' : null }}">
                        <a href="{{route('galeri')}}">
                            <i class="material-icons">collections</i>
                            <span>Galeri</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'prestasi' ? 'active' : null }}">
                        <a href="{{route('prestasi')}}">
                            <i class="material-icons">brightness_high</i>
                            <span>Prestasi</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'eskul' ? 'active' : null }}">
                        <a href="{{route('eskul')}}">
                            <i class="material-icons">directions_walk</i>
                            <span>Eskul</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) === 'fasilitas' ? 'active' : null }}">
                        <a href="{{route('fasilitas')}}">
                            <i class="material-icons">waves</i>
                            <span>Fasilitas</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018{{ date('Y') === '2018' ? null : ' - '.date('Y') }} <a>Admin - SMKN 10 JAKARTA</a>.
                </div>
                <div class="version">
                    <b>Version: </b> Beta
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>                
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>            
    <section class="content">
        <div class="container-fluid">            
            <ol class="breadcrumb breadcrumb-bg-red">
                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                <li class="active"><i class="material-icons">library_books</i> Library</li>
            </ol>
        </div>    
        <div class="container-fluid">            
            @yield('content')
        </div>
    </section>
</body>
<!-- Jquery Core Js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/light-gallery/js/lightgallery-all.js')}}"></script>
<script src="{{asset('js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>


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

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('js/pages/ui/notifications.js')}}"></script>
<script src="{{asset('js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('js/demo.js')}}"></script>

<script type="text/javascript">
    @yield('foot-content')
</script>
@yield('foot-content-no-script')
</html>