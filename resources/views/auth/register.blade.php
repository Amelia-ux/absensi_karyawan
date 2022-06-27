@extends('layouts.auth')

@section('content')
<div class="login-form">
                            <h4>Login</h4>
                            <form>
                            <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign Up</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="#"> Sign In Here</a></p>
                                </div>
                            </form>
                        </div>
@endsection
