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
                                    <h2><i class="bi bi-bag-plus-fill"></i> Category Details
                                        <a href="{{route('admin-category.index')}}"
                                           class="btn btn-success bx-pull-right">
                                            Category List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                </div>
                                <div class="col-md-12">
                                    <h1><a href="">{{$categoryData->name}}</a></h1>
                                    <p>
                                        {!! $categoryData->description !!}
                                    </p>
                                </div>

                            </div>
                            <div class="row mt-5 mb-3">
                                <div class="col-md-12">
                                    <h3>Related News</h3>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($categoryData->getNews as $news)
                                    <div class="col-md-3">
                                        <div class="card">
                                            @if($news->image)
                                            <img src="{{url($news->image)}}" class="card-img-top" alt="...">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{$news->title}}</h5>
                                                <p class="card-text">
                                                    {!! $news->getLimitText() !!}
                                                </p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
