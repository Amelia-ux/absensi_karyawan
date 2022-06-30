<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrator</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('style/theme/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/theme/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('style/theme/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('style/theme/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/theme/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('style/theme/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- jquery vendor -->
    <script src="{{ asset('style/theme/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('style/theme/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('style/theme/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('style/theme/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <!-- bootstrap -->
    <script src="{{ asset('style/theme/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/theme/js/scripts.js') }}"></script>
    <!-- scripit init-->

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo"><a href="/admin/home"><span>Administrator</span></a></div>
                <ul>
                    <li class="label">Main</li>
                    <li><a href="/admin/home" class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard</a>
                    <li><a href="/admin/profil"><i class="ti-user"></i> Profile</a></li>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Data
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li><a href="chart-flot.html">Data Karyawan</a></li>
                            <li><a href="chart-morris.html">Data Admin</a></li>
                        </ul>
                    </li>
                    <li class="label">Features</li>
                    <li><a href="/admin/absensi"><i class="ti-view-list-alt"></i>Absensi Karyawan</a></li>
                    <li><a href="/admin/karyawan"><i class="ti-view-list-alt"></i>Karyawan</a></li>
                    <li><a href="/cetak"><i class="ti-files"></i>Cetak Laporan</a></li>
                    </li>
                    <li><a href="/logout"><i class="ti-close"></i> Logout</a></li>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    @yield('content');

</body>

</html>
