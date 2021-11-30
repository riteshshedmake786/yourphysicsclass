@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-2">Courses</h4>
                <div class="mt-1">
                    <div class="float-left" dir="ltr">
                        <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#f05050 "
                            data-bgColor="#F9B9B9" value="58"
                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                            data-thickness=".15"/>
                    </div>
                    <div class="text-right">
                        <h2 class="mt-3 pt-1 mb-1"> 3 </h2>
                        <!-- <p class="text-muted mb-0">Since last week</p> -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Blogs</h4>
                <div class="mt-1">
                    <div class="float-left" dir="ltr">
                        <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#675db7"
                            data-bgColor="#e8e7f4" value="80"
                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                            data-thickness=".15"/>
                    </div>
                    <div class="text-right">
                        <h2 class="mt-3 pt-1 mb-1"> {{ $blogData }} </h2>
                        <!-- <p class="text-muted mb-0">Since last month</p> -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Feedback</h4>
                <div class="mt-1">
                    <div class="float-left" dir="ltr">
                        <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#23b397"
                            data-bgColor="#c8ece5" value="77"
                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                            data-thickness=".15"/>
                    </div>
                    <div class="text-right">
                        <h2 class="mt-3 pt-1 mb-1"> {{ $feedbackData }} </h2>
                        <!-- <p class="text-muted mb-0">This week</p> -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Contact</h4>
                <div class="mt-1">
                    <div class="float-left" dir="ltr">
                        <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#ffbd4a"
                            data-bgColor="#FFE6BA" value="35"
                            data-skin="tron" data-angleOffset="180" data-readOnly=true
                            data-thickness=".15"/>
                    </div>
                    <div class="text-right">
                        <h2 class="mt-3 pt-1 mb-1"> {{ $contacts }} </h2>
                        <!-- <p class="text-muted mb-0">Revenue today</p> -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
