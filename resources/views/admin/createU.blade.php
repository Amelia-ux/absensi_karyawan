@extends('layout.appAdmin')

@section('content')

<div class="container mt-5">
    
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Karyawan
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="Email" class="form-control" id="Email" aria-describedby="Email" >
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama</label>
                        <input type="text" name="Name" class="form-control" id="Name" ariadescribedby="Name" >
                    </div>
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select name="role" id="role" class="form-control">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="Password" class="form-control" id="Password" ariadescribedby="Password" >
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label> <br>         
                        <input type="file" name="foto" id="Foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection