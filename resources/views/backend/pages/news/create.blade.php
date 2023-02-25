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
                                    <h2><i class="bi bi-bag-plus-fill"></i> Add News
                                        <a href="{{route('admin-news.index')}}"
                                           class="btn btn-success bx-pull-right">
                                            News List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                    @include('helper.messages')

                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('admin-news.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group mb-3">
                                                    <label for="category_id">Category:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('category_id')}}
                                                        </a>
                                                    </label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach($categoryData as $category)
                                                            <option value="{{$category->id}}"
                                                                    @if(old('category_id') == $category->id) selected @endif>
                                                                {{$category->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="title">Title:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('title')}}
                                                        </a>
                                                    </label>
                                                    <input type="text" name="title" id="title"
                                                           value="{{old('title')}}" class="form-control">
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
                                                    <label for="meta_title">Meta Title:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('meta_title')}}
                                                        </a>
                                                    </label>
                                                    <textarea id="meta_title" name="meta_title"
                                                              class="form-control">{{old('meta_title')}}</textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="meta_description">Meta Description:
                                                        <a style="color: red;text-decoration: none;">
                                                            {{$errors->first('meta_description')}}
                                                        </a>
                                                    </label>
                                                    <textarea id="meta_description" name="meta_description"
                                                              class="form-control">{{old('meta_description')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @include('helper.image-not-found')
                                                <div class="choose_file">
                                                    <span><i class="fa fa-upload"></i> Upload Image</span>
                                                    <input name="image" type="file" id="change_image">
                                                </div>
                                                <a style="color: red;">{{$errors->first('image')}}</a>

                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="intro_text">Summary:
                                                <a style="color: red;text-decoration: none;">
                                                    {{$errors->first('intro_text')}}
                                                </a>
                                            </label>
                                            <textarea name="intro_text" id="intro_text"
                                                      class="form-control">{{old('intro_text')}}</textarea>
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
                                            <button class="btn btn-success"> Add News</button>

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

            $('#title').keyup(function () {
                var value = $(this).val();
                $('#slug').val(slugify(value));

            });

            CKEDITOR.replace('intro_text', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

            CKEDITOR.replace('description', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });
        });
    </script>

@endsection
