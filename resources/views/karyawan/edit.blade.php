@extends('layouts.app')

@section('content')

<div class="container mt-5">
    
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <form action="/absensi/{{ $absensi->id }}" method="post" >
                @csrf
                <td>
                    @foreach($ket as $k)
                    <input type="radio" name="ket" id="ket" value="{{ $k->id }}"> 
                    <label for="">{{ $k->keterangan }}</label>
                    @endforeach
                </td>
                <button type="submit" class="btn btn-info">Kirim</button>
            </form>
                </div>
            </div>

            @endsection
            