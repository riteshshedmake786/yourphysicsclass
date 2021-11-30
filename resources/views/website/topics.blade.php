@extends('layouts.website')

@section('title', 'Blog')

@section('content')
<section class="topics  py-5">
    <div class="container">
        <div class="row">
            @foreach($topicData as $topic)
                @if($loop->even)
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
        </div>
    </div>
</section>
@endsection
