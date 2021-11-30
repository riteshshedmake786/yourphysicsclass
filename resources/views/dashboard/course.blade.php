@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Course</a></li>
                        <li class="breadcrumb-item active">{{ ucfirst($section) }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ ucfirst($section) }}</h4>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group text-right">
                        <a href="#test-form" class="btn btn-danger waves-effect waves-light popup-with-form" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add</a>
                    </div>
                    <p></p>
                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th width="6%">Sr.No</th>
                                <th width="18%">Heading</th>
                                <th width="12%">Video</th>
                                <th>Description</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courseData as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->heading }}</td>
                                <td>{{ $course->youtube_url }}</td>
                                <td>{{ Str::limit($course->description, 50) }}</td>
                                <td>
                                    <a href="#edit-test-form-{{ $course->id }}" class="btn btn-success btn-xs waves-effect waves-light waves-light popup-with-form">Edit</a>
                                    <a href="{{ route('course-delete', ['deleteId' => $course->id]) }}" class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>
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
<form id="test-form" class="mfp-hide white-popup-block" method="post" action="{{ route('course-add', ['section' => $section]) }}" enctype="multipart/form-data">
    @csrf
    <h3 class="font-18">Add</h3><br>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputHeading">Heading</label>
                <input type="hidden" name="class" value="{{ $section }}">
                <input type="text" class="form-control @error('heading') is-invalid @enderror" id="exampleInputHeading" name="heading" placeholder="Enter heading">
                @error('heading')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputCatogeryName">Youtube Url</label>
                <input type="text" class="form-control @error('youtube_url') is-invalid @enderror" id="exampleInputCatogeryName" name="youtube_url" placeholder="Add youtube url">
                @error('youtube_url')
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
    <div class="col-6">
        <div class="form-group">
            <label for="examplePdf">Upload PDF file</label>
            <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="examplePdf" name="pdf">
            @error('pdf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
</form>
 <!-- End Popup with Form -->

<!-- edit Popup with Form -->
@foreach($courseData as $course)
<form id="edit-test-form-{{ $course->id }}" class="mfp-hide white-popup-block" method="post" action="{{ route('course-edit', ['id' => $course->id]) }}" enctype="multipart/form-data">
    @csrf
    <h3 class="font-18">Add</h3><br>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputHeading">Heading</label>
                <input type="hidden" name="class" value="{{ $section }}">
                <input type="text" class="form-control @error('heading') is-invalid @enderror" id="exampleInputHeading" name="heading" value="{{ $course->heading }}" placeholder="Enter heading">
                @error('heading')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputCatogeryName">Youtube Url</label>
                <input type="text" class="form-control @error('youtube_url') is-invalid @enderror" id="exampleInputCatogeryName" name="youtube_url" value="{{ $course->youtube_url }}" placeholder="Add youtube url">
                @error('youtube_url')
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
                <textarea class="form-control @error('description') is-invalid @enderror" id="example-textarea" name="description" rows="4">{{ $course->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="examplePdf">Upload PDF file</label>
            <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="examplePdf" name="pdf" value="{{ $course->pdf }}">
            @error('pdf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
</form>
@endforeach
<!-- end edit Popup with Form -->
@endsection
