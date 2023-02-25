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
                                    <h2><i class="bi bi-bag-plus-fill"></i> News Details
                                        <a href="{{route('admin-news.index')}}"
                                           class="btn btn-success bx-pull-right">
                                            News List
                                            <i class="bi bi-arrow-right-circle-fill"></i>
                                        </a>
                                    </h2>

                                </div>
                                <div class="col-md-12">
                                    @if($newsData->image)
                                        <img src="{{url($newsData->image)}}"
                                             id="image_show"
                                             class="img-fluid" alt="image not selected">
                                    @else
                                        @include('helper.image-not-found')
                                    @endif
                                    <h1><a href="">{{$newsData->name}}</a></h1>
                                    <p>
                                        {!! $newsData->description !!}
                                    </p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
