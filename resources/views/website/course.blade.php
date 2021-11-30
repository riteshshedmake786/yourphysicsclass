@extends('layouts.website')

@section('title', 'Course')

@section('content')
<section class="videos ">
    <div class="container-fluid overflow-hidden px-0">
        <section class="class class_12 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5 text-center">
                        <h4>{{ $course }}</h4>
                        <hr class="float-none mx-auto">
                    </div>
                    @foreach($courseData as $course)
                    <div class="col-lg-4 col-md-6  mx-auto mb-4">
                        <div class="card">       
                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                <iframe class="embed-responsive-item" src="{{ $course->youtube_url }}" allowfullscreen></iframe>
                            </div>
                                        
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->heading }}</h5>
                                    <p class="card-text">{{ $course->description }}</p>
                                <a href="{{ url($course->pdf) }}" target="_blank" class="btn btn-block">Click here to Download PDF</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</section>
@endsection