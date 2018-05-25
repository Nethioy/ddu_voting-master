
@extends('layouts.master')
@section('content')
<h2 class="my-3">Add Post</h2>
@if($errors->all())
<div class="alert alert-danger">
      @foreach($errors->all() as $error)
       <li>{{$error}}</li>
      @endforeach
</div>
@endif
<form action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
         <button type="submit" class="btn btn-outline-primary"> Add Post</button>
    </div>
</form>
@endsection

