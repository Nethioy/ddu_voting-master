@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/pimage/{{$user->pimage}}" style="width: 150px;height: 150;float: left;border-radius: 50%; margin-right: 25px;">
            <h2>{{$user->fname}} {{$user->lname}}'s Profile</h2>
            <form enctype="multipart/form-data" method="post" action="/home/profile/{{$user->id}}">
              <label for="pimage">Update Profile Image</label><br>
            <input type="file" id="pimage" name="pimage">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="pull-right btn btn-sm btn-primary" name="" > 
            </form>
           


        </div>
    </div>
</div>
@endsection
