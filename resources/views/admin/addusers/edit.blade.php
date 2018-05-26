@extends('layouts.master')
@section('content')
<h2 class="my-3">Update the user</h2>
@if($errors->all())
<div class="alert alert-danger">
      @foreach($errors->all() as $error)
       <li>{{$error}}</li>
      @endforeach
</div>
@endif
@if(session()->has('message'))
  <div class="alert alert-success">
      {{session()->get('message')}}
  </div>
@endif
<form action="{{route('users.edit', $user->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
    <label for="idno"  >ID.NO</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$user->student_id}}">
    </div>

    <div class="form-group">
    <label for="fname"  >First Name</label>
        <input type="text" name="fname" id="fname" class="form-control" value="{{$user->fname}}">
    </div>

    <div class="form-group">
    <label for="lname"  >Last Name</label>
    <input type="text" name="lname" id="lname" class="form-control" value="{{$user->lname}}">
</div>

<div class="form-group">
<label for="department"  >Department</label>
<input type="text" name="department" id="department" class="form-control" value="{{$user->department}}">
</div>

<div class="form-group">
<label for="batch"  >Batch</label>
<input type="text" name="batch" id="batch" class="form-control" value="{{$user->batch}}">
</div>

    <div class="form-group">
         <button type="submit" class="btn btn-outline-primary"> Update the user</button>
    </div>
</form>
@endsection
