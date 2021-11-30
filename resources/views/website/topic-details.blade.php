@extends('layouts.website')

@section('title', 'Blog')

@section('content')
<section class="topic-detail  py-md-5 py-4">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center pb-md-4 pb-3 text-uppercase">
            <h3>{{ $getImportantTopic->topic_name }}</h3>
          </div>
          <div class="col-md-6 pb-md-4 mb-3">
            <img src="{{ $getImportantTopic->topic_img }}" class="img-fluid" height="300">
          </div>
          <div class="col-md-6 para">
            <p>{{ $getImportantTopic->topic_content }}</p>
            </div>
          </div>
        </div>

      </div>
    </section>
@endsection
