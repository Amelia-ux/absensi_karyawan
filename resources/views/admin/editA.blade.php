@extends('layouts.appAdmin')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Absensi
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
                <form method="post" action="/admin/updateA/{{ $absensi->id }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Tgl">Tanggal</label>
                        <input type="date" name="tgl" class="form-control" id="tgl" value="{{ $absensi->tgl }}" aria-describedby="tgl" >
                    </div>
                    <div class="form-group">
                        <label for="user">User</label>
                        <select name="user" id="user" class="form-control">
                            @foreach ($user as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-group">
                        @foreach($ket as $k)
                        <input type="radio" name="ket" id="ket" value="{{ $k->id }}"> {{ $k->keterangan }}  
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>