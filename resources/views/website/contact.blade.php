@extends('layouts.website')

@section('title', 'Contact')

@section('content')


<!-- Contact form Section start -->
<section class="contact pb-4">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-9 cont-form">
        <div class="container">
            <div class="row">
            <div class="col-md-8 offset-md-2 pb-md-5  py-4">
                <h2>Contact Us</h2>
            
            </div>
            <div class=" col-md-6 offset-md-2 pt-3" >
                @if(Session::has('msg'))
                <p style="color: green; border-radius:unset;" >
                    <b>{{ Session::get('msg') }}</b>
                </p>
                @endif
                <form method="post" action="{{ route('contact') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Enter Your Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputName">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Enter Your Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber">Enter Your Mobile Number *</label>
                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="exampleInputNumber">
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea">Comment</label>
                    <textarea class="form-control textarea" name="comment" id="exampleFormControlTextarea" rows="5"></textarea>
                </div>
                <button type="submit" class="btn w-50 mt-4 mb-5">Submit</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-3 sidebar text-center pb-5">
        <div class="box p-5">
            <img src="{{ asset('physics/assets/img/logoo.png') }}" class="img-fluid w-75">
            <div class="icon">
                <span class="icon-Icon-ionic-ios-mail mb-3"></span>
                <p>iteachcare@gmail.com</p>
            </div>
        </div>
        <div class="social-icon ">
            <p class="social d-flex align-item-middle justify-conten-center">
            <a href="https://twitter.com/yourphysicsclas" class="text-decoration-none">
            <span class="icon-twitter icons"></span>
            </a>
            <a href="https://www.instagram.com/your_physics_class/" class="text-decoration-none">
            <span class="icon-instagram icons"><span class="path1"></span><span class="path2"></span></span>
            </a>
            <a href="https://www.facebook.com/Dhiraj.P.Ninawe/" class="text-decoration-none">
            <span class="icon-facebook icons"><span class="path1"></span><span class="path2"></span></span>
            </a>
            <a href="https://youtu.be/rfcxqJGHxbM" class="text-decoration-none">
            <span class="icon-youtube icons"><span class="path1"></span><span class="path2"></span></span>
            </a>
            </p>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Contact form Section end -->
@endsection
