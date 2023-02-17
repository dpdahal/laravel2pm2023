<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('backend-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

    <title>Admin login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1 mb-4">
            <h1>Login to Dashboard</h1>
            @include('helper.messages')
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin-login') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="username">Username:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('username')}}
                        </a>
                    </label>
                    <input type="text" name="username" value="{{old('username')}}" id="username" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:
                        <a style="color: red;text-decoration: none;">
                            {{$errors->first('password')}}
                        </a>
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
