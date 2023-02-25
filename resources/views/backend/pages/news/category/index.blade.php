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
                                    <h2><i class="bi bi-bag-plus-fill"></i> Category List
                                        <a href="{{route('admin-category.create')}}"
                                           class="btn btn-success bx-pull-right">
                                            Add Category
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>
                                    @include('helper.messages')

                                </div>
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categoryData as $key=>$category)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->slug}}</td>
                                                <td>{!!  $category->getLimitContent() !!}</td>
                                                <td width="15%">
                                                    <a href="{{route('admin-category.show',$category->id)}}"
                                                       class="btn btn-success">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{route('admin-category.edit',$category->id)}}"
                                                       class="btn btn-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{route('admin-category.destroy',$category->id)}}"
                                                          method="post" class="d-inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
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
            </div>
        </section>
    </main>
@endsection
