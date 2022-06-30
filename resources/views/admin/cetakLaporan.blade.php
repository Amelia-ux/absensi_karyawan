<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak KHS</title>
</head>

<body>
    <h3 class="text-center mt-4">PT. TRIO Kelinci </h3>
    <h2 class="text-center mt-5 mb-4">Laporan Absensi Karyawan</h2>
    <strong>Email: </strong>{{ $user->email }}<br>
    <strong>Nama: </strong>{{ $user->name }}<br>
    <table class="table table-striped mt-2">
        <th>Absensi</th>
        <th>Keterangan</th>
        @foreach ($absen as $a)
            <tr>
                <td>{{ $a->tgl }}</td>
                <td>{{ $a->ket_absensi->keterangan }}</td>
            </tr>
        @endforeach
    </table>
</body>
