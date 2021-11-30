@extends('layouts.website')

@section('title', 'Blog')

@section('content')
<!-- Topic Section Start  -->
<section class="blog-topics py-md-5 py-3">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 text-center mb-4">
                <h3>Topics may you like to learn</h3>
            </div>
            @foreach($searchresults as $data)
                @if($loop->odd)
                    <div class="row">
                        <div class="col-md-6 order-1 mb-3">
                            <img src="{{ $data->img_url }}" class="img-fluid">
                        </div>
                        <div class="col-md-6 order-2 mb-3">
                            <h5>{{ $data->heading }}</h5>
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6 order-md-3 order-4 mb-3">
                            <h5>{{ $data->heading }}</h5>
                            <p>{{ $data->description }}</p>
                        </div>
                        <div class="col-md-6 order-md-4 order-3 mb-3">
                            <img src="{{ $data->img_url }}" class="img-fluid">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
