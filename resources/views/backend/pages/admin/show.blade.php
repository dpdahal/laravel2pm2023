@extends('backend.master.master')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-3">
                                    <h2><i class="bi bi-eye-fill"></i> User Details
                                        <a href="{{route('admin.index')}}" class="btn btn-success bx-pull-right">
                                            Users List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    @include('helper.messages')
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th width="10%">Name</th>
                                                    <td>{{$adminData->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Username</th>
                                                    <td>{{$adminData->username}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Email</th>
                                                    <td>{{$adminData->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Gender</th>
                                                    <td>{{$adminData->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Role</th>
                                                    <td>{{$adminData->role}}</td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Status</th>
                                                    <td>
                                                        @if($adminData->is_active==1)
                                                            <button class="btn btn-success btn-sm">Active</button>
                                                        @else
                                                            <button class="btn btn-warning btn-sm">Inactive</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Created At</th>
                                                    <td>
                                                        {{$adminData->created_at->diffForHumans()}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <h1>Gallery</h1>
                                            <hr>

                                            <div class="row">
                                                @if($adminData->allImage->count()>0)
                                                    @foreach($adminData->allImage as $gallery)
                                                        <div class="col-md-3">
                                                            <img src="{{url($gallery->image)}}" width="100%" alt="">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-md-12">
                                                        <h1>No Image Found</h1>
                                                    </div>
                                                @endif
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
