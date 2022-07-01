<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cetak KHS</title>
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
