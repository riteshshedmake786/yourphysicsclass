@extends('layouts.website')

@section('title', 'Home')

@section('content')
<!-- Slider Section Start -->
<section class="slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliderData as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $slider->slider_img }}" class="d-block w-100" alt="">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End -->


<!-- Videos Section Start -->
<section class="videos pt-3 pt-lg-5">
    <div class="container-fluid overflow-hidden px-0">
    <div class="w-100">
        <h3 class="col text-center mb-4">Videos</h3>
        <hr>
    </div>
    <!-- Class 11 -->
    <section class="class class_11 py-4">
        <div class="container">
        <!-- Grid row -->
        <div class="row">
            <div class="col-12 mb-5">
            <h4>Class 11</h4>
            <hr>
            </div>
            @foreach($getAllClass11Course as $getClass11Course)
            <div class="col-lg-4 col-md-6 mx-auto mb-4">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" src="{{ $getClass11Course->youtube_url }}"
                        allowfullscreen></iframe>
                    </div> 
                    <div class="card-body">
                        <h5 class="card-title">{{ $getClass11Course->heading }}</h5>
                        <p class="card-text">{{ $getClass11Course->description }}</p>
                        <a href="{{ $getClass11Course->pdf }}" target="_blank" class="btn  btn-block">Click here to Download PDF</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 py-4 ">
            <a class="btn btn-warning float-right w-auto px-4" href="{{ route('class', ['course' => 'class-11']) }}" role="button">View More</a>
            </div>
        </div>
        </div>
    </section>

    <!-- Class 12 -->
    <section class="class class_12 py-4">
        <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
            <h4>Class 12</h4>
            <hr>
            </div>
            <!-- Grid column -->
            @foreach($getAllClass12Course as $getClass12Course)
            <div class="col-lg-4 col-md-6  mx-auto mb-4">
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" src="{{ $getClass12Course->youtube_url }}"
                        allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $getClass12Course->heading }}</h5>
                        <p class="card-text">{{ $getClass12Course->description }}</p>
                        <a href="{{ $getClass12Course->pdf }}" target="_blank" class="btn btn-block">Click here to Download PDF</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 py-4 ">
            <a class="btn btn-warning w-auto px-4 float-right" href="{{ route('class', ['course' => 'class-12']) }}" role="button">View More</a>
            </div>
        </div>
        </div>
    </section>

    <!-- Class JEE/NEET -->
    <section class="class Jee_Neet py-4">
        <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
            <h4>JEE/NEET</h4>
            <hr>
            </div>
            <!-- Grid column -->
            @foreach($getAllJEENEETCourses as $getJEENEETCourses)
                <div class="col-lg-4 col-md-6  mx-auto mb-4">
                    <div class="card">
                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe class="embed-responsive-item" src="{{ $getJEENEETCourses->youtube_url }}"
                                allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $getJEENEETCourses->heading }}</h5>
                                <p class="card-text">{{ $getJEENEETCourses->description }}</p>
                                <a href="{{ $getJEENEETCourses->pdf }}" target="_blank" class="btn  btn-block">Click here to Download PDF</a>
                            </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 py-4 ">
            <a class="btn btn-warning w-auto float-right px-4" href="{{ route('class', ['course' => 'JEE-NEET']) }}" role="button">View More</a>
            </div>
        </div>
        </div>
    </section>
    </div>
</section>
<!-- Videos Section End -->

<!-- Subscribe Channel Section Start -->
<section class="subscribe py-5">
    <div class="container">
    <div class="row">
        <div class="col heading text-center">
        <h3>Welcome to Your Physics Class</h3>
        <h4>Learn Physics without any limits</h4>
        <hr>
        <p>
            This is an educational space where you can learn anything and everything about Physics. Right from the tedious topics to the simple ones, we have got everything sorted for you in our series of interactive videos. So, if you are the one who is looking for some physics-related study material, then you must definitely go and check our videos. Our ultimate goal is to create a platform that offers quality education to every nook of the globe, so if you have anyone who aspires to gain knowledge in physics, then do let them know about us. We are here to serve knowledge related to physics at its best.
        </p>
        <a class="btn btn-lg px-3" href="https://youtu.be/rfcxqJGHxbM" target="_blank" role="button">Subscribe our YouTube Channel</a>
        </div>
    </div>
    </div>
</section>
<!-- Subscribe Channel Section End -->

<!-- Blog Section Start -->
<section class="blogs py-5">
    <div class="container">
    <div class="row">
        <div class="col-12 text-center mb-4">
        <h3>Blog</h3>
        <!-- <h6>Upcoming Videos</h6> -->
        <hr>
        </div>
        <div class="col">
        <div class="media row">
            <img src="{{ isset($topicSingleData->img_url) ? $topicSingleData->img_url : '' }}" class="mr-3 col-md-4 img-fluid mb-3" alt="...">
            <div class="media-body col-md-8">
            <h5 class="mt-0">
                <a href="#">{{ isset($topicSingleData->heading) ? $topicSingleData->heading : '' }}</a>
            </h5>
            <p class="pr-5">{{ isset($topicSingleData->description) ? $topicSingleData->description : '' }}</p>
            <h6 class="float-right mr-5 mt-3"><a href="{{ route('blogs') }}">Click here to Read More</a></h6>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Blog Section End -->

<!-- Our Success Section Start -->
<section class="success py-5">
    <div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-12 mb-4">
        <h3>Our Success</h3>
        <hr>
        </div>
        <div class="col-md-4">
        <div class="card" >
            <img src="{{ asset('physics/assets/img/subscribe.svg') }}" class="card-img-top w-25 mx-auto" alt="...">
            <div class="card-body">
            <span id="count1" class="display-4"></span>
            <h6 class="card-title">Subscriber</h6>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card" >
            <img src="{{ asset('physics/assets/img/likes.svg') }}" class="card-img-top w-25 mx-auto" alt="...">
            <div class="card-body">
            <span id="count2" class="display-4"></span>
            <h6 class="card-title">Likes</h6>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card" >
            <img src="{{ asset('physics/assets/img/views.svg') }}" class="card-img-top w-25 mx-auto" alt="...">
            <div class="card-body">
            <span id="count3" class="display-4"></span>
            <h6 class="card-title">Views</h6>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Our Success Section End -->

<!-- important Link Section Start -->
<section class="imp-link py-4">
    <h1 class="come-soon">Coming soon....</h1>
    <div class="container ">
        <div class="col-12 text-center mb-4 link_head">
            <h5 class="text-white">Some important Links</h5>
            <hr>
        </div>
        <div class="row paper">
            <!-- Question Paper Solution -->
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">Question Paper Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">Question Paper Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">Question Paper Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>

            <!-- Textbook Solution -->
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">Textbook Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">Textbook Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">Textbook Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>

            <!-- JEE/NEET Solution -->
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">JEE Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">JEE Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
            <div class="col-md-6 col-lg-4 topic mb-4">
                <span class="icon-dot mr-1"></span>
                <h6 class="d-inline">JEE Solutation</h6>
                <p class="link ml-4 my-2">
                    <a href="#">But I must explain to you how all this mistaken idea..</a>
                </p>
            </div>
        </div>
    </div>
</section>
    <!-- important Link Section End -->
@endsection
