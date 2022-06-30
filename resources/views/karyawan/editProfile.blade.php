@extends('layouts.app')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit User
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
                <form method="post" action="/updateProfile" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" class="form-control" id="email"
                            value="{{ $user->email }}" aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $user->name }}" ariadescribedby="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
