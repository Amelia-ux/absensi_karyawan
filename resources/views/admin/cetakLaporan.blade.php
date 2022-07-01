<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cetak KHS</title>

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
<div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mb-4">
                    <center>PT. TRIO KELINCI</center>
                    <center>LAPORAN ABSENSI KARYAWAN</center>
                </h4>

                <b>Email : </b>{{ $user->email }}<br>
                <b>Nama : </b>{{ $user->name }}<br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Absensi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($absen as $a)
                    <tr>
                        <td>{{ $a->tgl }}</td>
                        <td>{{ $a->ket_absensi->keterangan }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
