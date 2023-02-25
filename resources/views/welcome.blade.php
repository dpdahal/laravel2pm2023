<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{url('backend-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <style>
        #box {
            width: 100%;
            min-height: 100px;
            background: #f3f3f3;

            display: none;
            flex-direction: column;

        }
        #box a{
            text-decoration: none;
            line-height: 30px;
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1>News List</h1>
        </div>
        <div class="col-md-12">
            <input type="text" placeholder="Enter any keywords" id="search" class="form-control">
            <div id="box"></div>
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

<script src="{{url('backend-assets/js/jquery.js')}}"></script>
<script src="{{url('backend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Template Main JS File -->
<script>
    window.searchURL = "{{route('search')}}";
</script>
<script src="{{url('backend-assets/js/custom.js')}}"></script>


</body>
</html>
