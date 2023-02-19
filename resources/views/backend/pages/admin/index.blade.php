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
                                    <h2><i class="bi bi-eye-fill"></i> User List
                                        <a href="{{route('admin.create')}}" class="btn btn-success bx-pull-right">
                                            <i class="bi bi-bag-plus-fill"></i>
                                            Add User</a>
                                    </h2>

                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    @include('helper.messages')
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">S.n</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </thead>
                                        <tbody>
                                        @if($adminData->count()>0)
                                            @foreach($adminData as $key=>$admin)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$admin->name}}</td>
                                                    <td>{{$admin->username}}</td>
                                                    <td>{{$admin->email}}</td>
                                                    <td>{{$admin->gender}}</td>
                                                    <td>
                                                        @if($admin->is_active==1)
                                                            <button class="btn btn-success btn-sm">
                                                                <i class="bi bi-check-circle-fill"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="bi bi-clipboard2-x"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>{{$admin->role}}</td>
                                                    <td>
                                                        @if($admin->gallery)
                                                            <img src="{{url($admin->gallery->image)}}" width="60"
                                                                 alt="">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{route('admin.destroy',$admin->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{route('admin.show',$admin->id)}}"
                                                               class="btn btn-primary" title="show users">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            @can('super_admin')
                                                                <a href="{{route('admin.edit',$admin->id)}}"
                                                                   class="btn btn-success" title="update user">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>

                                                                <button class="btn btn-danger" title="delete user"><i
                                                                        class="bi bi-trash3-fill"></i></button>
                                                            @endcan

                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9" class="text-center">No Data Found</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    {{$adminData->links()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
