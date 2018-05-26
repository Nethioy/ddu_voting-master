@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Students') }}
                	<button class="btn btn-info pull-right">Load</button>
                </div>
                <div class="card-body">
                    <table class="table table-borderd table-striped table-condensed">
                    	<thead>
                    		<tr>
                    			<th>NO</th>
                    			<th>ID</th>
                    			<th>First Name</th>
                    			<th>Last Name</th>
                    			<th>Dipartment</th>
                    			<th>Batch</th>
                    			<th>Action</th>
                    		</tr>
             {{csrf_field()}}
			<?php $no=1; ?>
			
			@foreach ($users as $key=>$value)
				<tr class="user{{$value->id}}">
					<td>{{$no++}}</td>
					<td>{{$value->student_id}}</td>
					<th>{{$value->fname}}</th>
					<td>{{$value->lname}}</td>
					<td>{{$value->department}}</td>
					<td>{{$value->batch}}</td>
					<td>
						<a href="{{route('users.show', $value->id)}}" class="btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-eye"></i>
						</a>
						<a href="{{route('users.edit', $value->id)}}" class="btn btn-warning btn-sm" data-id="{{$value->id}}" data-idno="{{$value->idno}}" data-fname="{{$value->body}}" data-lname="{{$value->lname}}" data-department="{{$value->department}}" data-batch="{{$value->batch}}">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="#" class="btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-trash "></i>
						</a>
					</td>
					
				</tr>
			@endforeach
                    	</thead>
                    </table>
                </div>
                
          </div>
        </div>
    </div>
</div>

@endsection


