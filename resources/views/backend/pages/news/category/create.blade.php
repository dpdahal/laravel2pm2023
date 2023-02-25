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
                                    <h2><i class="bi bi-bag-plus-fill"></i> Add Category
                                        <a href="{{route('admin-category.index')}}"
                                           class="btn btn-success bx-pull-right">
                                            Category List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                    @include('helper.messages')

                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('admin-category.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="name">Name:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('name')}}
                                                </a>
                                            </label>
                                            <input type="text" name="name" id="name"
                                                   value="{{old('name')}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="slug">Slug:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('slug')}}
                                                </a>
                                            </label>
                                            <input type="text" name="slug" id="slug"
                                                   value="{{old('slug')}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description">Description:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('description')}}
                                                </a>
                                            </label>
                                            <textarea name="description" id="description"
                                                      class="form-control">{{old('description')}}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button class="btn btn-success"> Add Category</button>

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

@section('javascript')
    <script>
        $(document).ready(function () {
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
            }

            $('#name').keyup(function () {
                var value = $(this).val();
                $('#slug').val(slugify(value));

            });

            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });
        });
    </script>

@endsection
