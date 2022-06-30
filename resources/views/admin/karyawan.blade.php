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
                                <a href="/admin/createU" class="btn btn-info">Tambah User</a>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <div class="row">
                    <div style="margin:0px 0px 0px 70px;">
                        {{-- <a class="btn btn-success" href="{{ route('admin.cetakLaporan') }}">Cetak PDF</a> --}}
                    </div>
                </div></br>
                <section id="main-content">
                    <div class="row">
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Data Karyawan </h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Foto</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $u)
                                                    <tr>
                                                        <th scope="row">{{ $u->id }}</th>
                                                        <td><img width="150px" src="{{ asset('storage/' . $u->foto) }}">
                                                        </td>
                                                        <td>{{ $u->name }}</td>
                                                        <td>{{ $u->email }}</td>
                                                        <td>

                                                            {{-- <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a> --}}
                                                            <form action="/admin/destroyU/{{ $u->email }}" method="post">
                                                                @csrf
                                                            <a class="btn btn-primary"
                                                                href="/admin/editU/{{ $u->id }}">Edit</a>
                                                                <a class="btn btn-success" href="/admin/cetak/{{ $u->id }}">Cetak</a>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
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
