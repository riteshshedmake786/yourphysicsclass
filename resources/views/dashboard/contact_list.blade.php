@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
                <h4 class="page-title">Contacts</h4>
            </div>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Contact List</h4>
                    <p></p>
                    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                        <thead>
                            <tr>
                                <th width="6%">Sr.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th width="33%">Comments</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->mobile }}</td>
                                <td>{{ $contact->comment }}</td>
                                <td>
                                    <a href="{{ route('contact-delete', ['cid' => $contact->id]) }}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
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
@endsection
