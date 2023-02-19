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
                                    <h2><i class="bi bi-pencil-square"></i> Update</h2>
                                </div>
                                <div class="col-md-12">
                                    @include('helper.messages')
                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('admin.update',$adminData->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="name">Name:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('name')}}
                                                </a>
                                            </label>
                                            <input type="text" name="name" value="{{$adminData->name ?? old('name')}}"
                                                   id="name"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="username">Username:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('username')}}
                                                </a>
                                            </label>
                                            <input type="text" name="username"
                                                   value="{{$adminData->username ?? old('username')}}" id="username"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Email:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('email')}}
                                                </a>
                                            </label>
                                            <input type="text" name="email"
                                                   value="{{ $adminData->email ??old('email')}}" id="email"
                                                   class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="gender">Gender:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('gender')}}
                                                        </a>
                                                    </label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option
                                                            value="male" {{$adminData->gender =='male' ? 'selected' :''}}>
                                                            Male
                                                        </option>
                                                        <option
                                                            value="female" {{$adminData->gender =='female' ? 'selected' :''}}>
                                                            Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @can('super_admin')
                                                    <div class="form-group mb-3">
                                                        <label for="role">Role:
                                                            <a style="color: red;text-decoration: none;">
                                                                {{$errors->first('role')}}
                                                            </a>
                                                        </label>
                                                        <select name="role" id="role" class="form-control">
                                                            <option
                                                                value="admin" {{$adminData->role=='admin' ? 'selected' :''}}>
                                                                Admin
                                                            </option>
                                                            <option
                                                                value="super_admin" {{$adminData->role=='super_admin' ? 'selected' :''}}>
                                                                Super Admin
                                                            </option>
                                                        </select>
                                                    </div>
                                                @endcan
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button class="btn btn-success">
                                                <i class="bi bi-pencil-square"></i> Update
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

