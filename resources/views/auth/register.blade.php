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
                        <h5 class="auth-title">Create Account</h5>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <label for="fullname">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" id="name" placeholder="Enter your name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="emailaddress" placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" type="password" id="password-confirm" placeholder="Enter your confirm password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-danger btn-block" type="submit"> Sign Up </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account?  <a href="{{ route('login') }}" class="text-muted ml-1"><b class="font-weight-semibold">Sign In</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
