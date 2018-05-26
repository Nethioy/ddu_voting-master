@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
  <div class="card">
      <div class="card-body">
          <table class="table table-bordered table-striped table-condensed">
          <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Batch</th>
                <th>Action</th>
              </tr>
              <tr>
              <td>{{$user->student_id}}</td>
              <th>{{$user->fname}}</th>
              <td>{{$user->lname}}</td>
              <td>{{$user->department}}</td>
              <td>{{$user->batch}}</td>
              </tr>
          </thead>
          </table>

 
      </div>
  </div>
</div>
    </div>
</div>
@endsection