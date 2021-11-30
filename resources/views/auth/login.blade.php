@extends('layouts.main')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <a href="{{ route('login') }}">
                                <span><img src="{{ asset('physics/assets/img/favicon.png') }}" alt="" height="60"></span>
                            </a><br><br>
                            <p><b>Your Physics Class</b></p>
                        </div>
                        <h5 class="auth-title">Sign In</h5>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="emailaddress" placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" name="remember_me" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-danger btn-block" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                        <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-muted ml-1"><b class="font-weight-semibold">Sign Up</b></a></p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
