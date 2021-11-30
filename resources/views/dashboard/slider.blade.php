@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Slider</h4>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left mt-1">Slider</h4>
                    <div class="form-group float-right">
                        <a href="#test-form" class="btn btn-danger waves-effect waves-light popup-with-form" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add</a>
                    </div>
                    <p></p>
                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th width="6%">Sr.No</th>
                                <th width="25%">Slider Image</th>
                                <th width="15%">Description</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliderData as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $slider->slider_img }}" alt="contact-img" title="contact-img" class="avatar-sm">
                                </td>
                                <td>{{ substr($slider->description, 0,  60) }}...</td>
                                <td>
                                    <a href="#edit-test-form-{{ $slider->id }}" class="btn btn-success btn-xs waves-effect waves-light popup-with-form" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a">Edit</a>
                                    <a href="{{ route('slider-delete', ['deleteId' => $slider->id]) }}" class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>
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
<form id="test-form" class="mfp-hide white-popup-block" method="post" action="{{ route('slider-add') }}" enctype="multipart/form-data">
    @csrf
    <h3 class="font-18">Add</h3><br>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleImgUrl">Slider Image</label>
                <input type="file" class="form-control @error('slider_img') is-invalid @enderror" id="exampleImgUrl" name="slider_img">
                @error('slider_img')
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
    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
</form>
 <!-- End Popup with Form -->
 <!-- edit Popup with Form -->
 @foreach($sliderData as $slider)
<form id="edit-test-form-{{ $slider->id }}" class="mfp-hide white-popup-block" method="post" action="{{ route('slider-edit', ['sid' => $slider->id]) }}" enctype="multipart/form-data">
    @csrf
    <h3 class="font-18">Edit</h3><br>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleImgUrl">Slider Image</label>
                <input type="file" class="form-control @error('slider_img') is-invalid @enderror" id="exampleImgUrl" name="slider_img">
                @error('slider_img')
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
                <textarea class="form-control @error('description') is-invalid @enderror" id="example-textarea" name="description" rows="4">{{ $slider->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
</form>
 <!-- End Popup with Form -->
 @endforeach
@endsection
