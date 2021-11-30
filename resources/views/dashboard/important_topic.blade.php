@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Important Topic</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Important Topic</h4>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left mt-1">Important Topic</h4>
                    <div class="form-group float-right">
                        <a href="{{ route('important-topic-add') }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Add</a>
                    </div>
                    <p></p>
                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th width="6%">Sr.No</th>
                                <th width="15%">Topic Image</th>
                                <th>Topic Name</th>
                                <th width="40%">Topic Content</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($importantTopicData as $importantTopic)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $importantTopic->topic_img }}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>
                                <td>{{ $importantTopic->topic_name }}</td>
                                <td>{{ substr($importantTopic->topic_content, 0,  60) }}...</td>
                                <td>
                                    <a href="{{ route('important-topic-edit', ['id' => $importantTopic->id]) }}" class="btn btn-success btn-xs waves-effect waves-light">Edit</a>
                                    <a href="{{ route('important-topic-delete', ['deleteId' => $importantTopic->id]) }}" class="btn btn-danger btn-xs waves-effect waves-light">Delete</a>
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
