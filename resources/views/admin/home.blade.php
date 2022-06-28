@extends('layouts.appAdmin')

@section('content')
    <div class="content-wrap">

        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Table-Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Absensi Karyawan </h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th width="50px">Foto</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Keterangan Absensi</th>
                                                    <th>Tanggal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($absensi as $a)
                                                    <tr>
                                                        <th scope="row">{{ $a->id }}</th>
                                                        <td><img width="150px" src="{{ asset('storage/' . $a->foto) }}">
                                                        </td>
                                                        <td>{{ $a->user->name }}</td>
                                                        <td>{{ $a->ket_id }}</td>
                                                        <td>{{ $a->tgl }}</td>
                                                        <td>

                                                            {{-- <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a> --}}
                                                            <a class="btn btn-primary"
                                                                href="/admin/editA/{{ $a->id }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>
@endsection
