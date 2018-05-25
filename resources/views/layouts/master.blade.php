<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('foradminpage/bootstrap.min.css') }}">
</head>
<body>
      <div class="bg-info text-white p-5 mb-3">
      <a href="{{route('posts.index')}}" class="btn btn-secondary">Home</a>
      <a href="{{route('posts.create')}}" class="btn btn-secondary">Create Post</a>
      </div>
    <div class="container">
            @yield('content')
    </div>
    <div class="bg-dark text-white p-4 text-center">
       All rights reserved Neway {{date('Y')}}.
  </div>
</body>
</html>