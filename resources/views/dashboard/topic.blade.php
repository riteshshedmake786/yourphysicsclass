@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Topic</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Topic</h4>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left mt-1">Topics</h4>
                    <div class="form-group float-right">
                        <a href="#test-form" class="btn btn-danger waves-effect waves-light popup-with-form" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add</a>
                    </div>
                    <p></p>
                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th width="6%">Sr.No</th>
                                <th width="15%">Image</th>
                                <th>Heading</th>
                                <th width="40%">Description</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($topicData as $topic)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $topic->img_url }}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>
                                <td>{{ $topic->heading }}</td>
                                <td>{{ substr($topic->description, 0,  60) }}...</td>
                                <td>
                                    <a href="#edit-test-form-{{ $topic->id }}" class="btn btn-success btn-xs waves-effect waves-light popup-with-form" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a">Edit</a>
                                    <a href="{{ route('topic-delete', ['deleteId' => $topic->id]) }}" class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- add Popup with Form -->
<form id="test-form" class="mfp-hide white-popup-block" method="post" action="{{ route('topic-add') }}" enctype="multipart/form-data">
    @csrf
    <h3 class="font-18">Add</h3><br>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputHeading">Heading</label>
                <input type="hidden" name="class" value="">
                <input type="text" class="form-control @error('heading') is-invalid @enderror" id="exampleInputHeading" name="heading" placeholder="Enter heading">
                @error('heading')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="example-textarea">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="example-textarea" name="description" rows="4"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleImgUrl">Upload Image</label>
                <input type="file" class="form-control @error('img_url') is-invalid @enderror" id="exampleImgUrl" name="img_url" onchange="previewFile(this)">
                @error('img_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <img id="imgPreview" alt="" style="width: 100px; height:100px;">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
</form>
 <!-- End Popup with Form -->
 <!-- edit Popup with Form -->
@foreach($topicData as $topic)
<form id="edit-test-form-{{ $topic->id }}" class="mfp-hide white-popup-block" method="post" action="{{ route('topic-edit', ['tid' => $topic->id]) }}" enctype="multipart/form-data">
    @csrf
    <h3 class="font-18">Edit</h3><br>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputHeading">Heading</label>
                <input type="hidden" name="class" value="">
                <input type="text" class="form-control @error('heading') is-invalid @enderror" id="exampleInputHeading" value="{{ $topic->heading }}" name="heading" placeholder="Enter heading">
                @error('heading')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="example-textarea">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="example-textarea" name="description" rows="4">{{ $topic->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleImgUrl">Upload Image</label>
                <input type="file" class="form-control @error('img_url') is-invalid @enderror" id="exampleImgUrl" name="img_url" onchange="previewFile(this)">
                @error('img_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <img id="imgPreview" src="{{ $topic->img_url }}" alt="" style="width: 100px; height:100px;">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
</form>
@endforeach
 <!-- End Popup with Form -->
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var render = new FileReader();
            render.onload = function(){
                $("#imgPreview").attr("src", render.result);
            }
            render.readAsDataURL(file);
        }
    }
</script>
@endsection
