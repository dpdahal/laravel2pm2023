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
            <h1>Category Data</h1>
        </div>
    </div>
    <div class="row mt-5">
        @foreach($categoryData as $category)
            <div class="col-md-6">
                <h2>{{$category->name}}</h2>
                @if($category->getNews->count() > 0)
                    <ul>
                        @foreach($category->getNews as $news)
                            <li><a href="{{url('news').'/'.$news->slug}}">{{$news->title}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
</div>


<script src="{{url('backend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Template Main JS File -->

</body>
</html>
