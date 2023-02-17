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
                                    <h2><i class="bi bi-bag-plus-fill"></i> Add Admin
                                        <a href="{{route('admin.index')}}" class="btn btn-success bx-pull-right">
                                            Users List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="name">Name:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('name')}}
                                                </a>
                                            </label>
                                            <input type="text" name="name" value="{{old('name')}}" id="name"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="username">Username:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('username')}}
                                                </a>
                                            </label>
                                            <input type="text" name="username" value="{{old('username')}}" id="username"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Email:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('email')}}
                                                </a>
                                            </label>
                                            <input type="text" name="email" value="{{old('email')}}" id="email"
                                                   class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="password">Password:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('password')}}
                                                        </a>
                                                    </label>
                                                    <input type="password" name="password" id="password"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="password_confirmation">Confirm Password:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('password_confirmation')}}
                                                        </a>
                                                    </label>
                                                    <input type="password" name="password_confirmation"
                                                           id="password_confirmation"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="gender">Gender:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('gender')}}
                                                        </a>
                                                    </label>
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="" selected readonly>---Select Gender---</option>
                                                        <option value="male" {{old('gender')=='male' ? 'selected' :''}}>
                                                            Male
                                                        </option>
                                                        <option
                                                            value="female" {{old('gender')=='female' ? 'selected' :''}}>
                                                            Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="role">Role:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('role')}}
                                                        </a>
                                                    </label>
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="" selected readonly>---Select Role---</option>
                                                        <option value="admin" {{old('role')=='admin' ? 'selected' :''}}>
                                                            Admin
                                                        </option>
                                                        <option
                                                            value="super_admin" {{old('role')=='super_admin' ? 'selected' :''}}>
                                                            Super Admin
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button class="btn btn-success"><i class="bi bi-bag-plus-fill"></i> Create Account</button>
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
