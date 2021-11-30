@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Add Important Topic</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Add Important Topic</h4>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left mt-1">Important Topic</h4>
                    <div class="form-group float-right">
                        <a href="{{ route('important-topic') }}" class="btn btn-danger waves-effect waves-light"> Back</a>
                    </div>
                    <p></p><br><br>
                    <form action="{{ route('important-topic-add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTopic_name" class="col-form-label">Topic Name</label>
                                <input type="text" class="form-control" id="inputTopic_name" name="topic_name" placeholder="topic name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTopic_img" class="col-form-label">Topic Image</label>
                                <input type="file" class="form-control mb-2" id="inputTopic_img" name="topic_img">
                                <small class="text-danger">Image dimension 368 * 528 <sup><big>*</big></sup></small>
                            </div>
                        </div>
                        <hr class="mt-2 mb-3" style="border-color: black;"/>
                        <h4 class="header-title float-left mt-1">Important Topic Content</h4><br><br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputTopic_content" class="col-form-label">Topic Content Image</label>
                                <textarea class="form-control" id="inputTopic_content" rows="10" name="topic_content"></textarea>
                            </div>  
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
