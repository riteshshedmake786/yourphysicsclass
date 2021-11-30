@extends('layouts.website')

@section('title', 'Blog')

@section('content')
<!-- Slider Section Start -->
<section class="topic-slider overflow-hidden py-md-5 py-3 position-relative">
    <div class="container-fluid">
        <div class="row d-flex ">
            <div class="col-12 pt-3 ">
                <div class="text-box">
                    <h1 class="heading-primary">
                        <span class="heading-primary-main">
                        Some Important Topics
                        </span>
                    </h1>
                </div>
            </div>
            <div class="col px-0 mt-md-5 mt-3">
                <!-- Item-1 -->
            <div class="item row text-center" id="mySlide1">
                @foreach($importantTopic as $importantTopicData)
                <div class="col-md-12">
                    <a href="{{ route('topic-details', ['topic' => $importantTopicData->topic_name]) }}">
                    <div class="card">
                        <img src="{{ $importantTopicData->topic_img }}" class="card-img" alt="img">
                        <div class="card-img-overlay">
                        <h5 class="card-title">
                            {{ $importantTopicData->topic_name }}
                        </h5>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach       
        </div>
    </div>
</section>
<!-- Slider Section End -->

<!-- Topic Section Start  -->
<section class="blog-topics py-md-5 py-3">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 text-center mb-4">
                <h3>Topics may you like to learn</h3>
            </div>
            @foreach($topicData->take(3) as $topic)
                @if($loop->odd)
                    <div class="row">
                        <div class="col-md-6 order-1 mb-3">
                            <img src="{{ $topic->img_url }}" class="img-fluid">
                        </div>
                        <div class="col-md-6 order-2 mb-3">
                            <h5>{{ $topic->heading }}</h5>
                            <p>{{ $topic->description }}</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6 order-md-3 order-4 mb-3">
                            <h5>{{ $topic->heading }}</h5>
                            <p>{{ $topic->description }}</p>
                        </div>
                        <div class="col-md-6 order-md-4 order-3 mb-3">
                            <img src="{{ $topic->img_url }}" class="img-fluid">
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-12  order-7 text-center">
                <a class="btn btn-warning w-auto px-4 float-md-right " href="{{ route('topics') }}" role="button">View More</a>
            </div>
        </div>
    </div>
</section>
<!-- Topic Section End -->

<!-- Student Review Section Start-->    
<section class="review pt-5 pb-4">
    <div class="container">
        <div class="row overflow-hidden">
            <div class="col-12 text-center mb-5 text-uppercase">
                <h3>Students Review</h3>
            </div>
            <div class="col-sm-12 pt-5 ">
                <div id="student-review" class="owl-carousel">
                    @foreach($feedbackData as $feedback)
                    <div class="item">
                        <div class="shadow-effect card">
                            <div class="img-cir">
                            <img src="{{ $feedback->img_url }}" class="w-100 h-100" alt="...">                 
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $feedback->name }}</h5>
                                <p class="card-text">
                                    <span class="icon-Icon-metro-quote q-top"></span>
                                        {{ $feedback->feedback }}
                                    <span class="icon-Icon-metro-quote-1 q-bot"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Student Review Section End-->
@endsection
