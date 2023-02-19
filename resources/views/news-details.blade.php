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
            <h1>News Details</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
            @if($newsData->image)
                <img src="{{url($newsData->image)}}" class="card-img-top" alt="...">
            @endif
            <h1>{{$newsData->title}}</h1>
            <p>
                {!! $newsData->description !!}
            </p>
        </div>
        <div class="col-md-4">
            <h1>Related News</h1>

            <ul>
                @foreach($categoryNews as $cNews)
                    <li><a href="{{url('news').'/'.$cNews->slug}}">{{$cNews->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


<script src="{{url('backend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Template Main JS File -->

</body>
</html>
