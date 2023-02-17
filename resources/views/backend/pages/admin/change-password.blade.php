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
                                    <h2><i class="bi bi-file-lock-fill"></i> Change password
                                        <a href="{{route('admin.index')}}" class="btn btn-success bx-pull-right">
                                            Users List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                </div>
                                <div class="col-md-12">
                                    @include('helper.messages')
                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('admin-change-password')}}" method="post">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="old_password">Old old_Password:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('old_password')}}
                                                </a>
                                            </label>
                                            <input type="password" name="old_password" id="old_password"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Password:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('password')}}
                                                </a>
                                            </label>
                                            <input type="password" name="password" id="password"
                                                   class="form-control">
                                        </div>

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

                                        <div class="form-group mb-3">
                                            <button class="btn btn-success">
                                                <i class="bi bi-file-lock-fill"></i>
                                                Change Password
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
