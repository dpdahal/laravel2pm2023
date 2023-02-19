<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{url('backend-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>News List</h1>
        </div>
    </div>
    <div class="row mt-5">
        @foreach($newsData as $news)
            <div class="col-md-4">
                <div class="card">
                    @if($news->image)
                        <img src="{{url($news->image)}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$news->title}}
                        </h5>
                        <p class="card-text">
                            {!!  $news->getLimitText() !!}
                        </p>
                        <a href="{{url('news').'/'.$news->slug}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>


<script src="{{url('backend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Template Main JS File -->

</body>
</html>
