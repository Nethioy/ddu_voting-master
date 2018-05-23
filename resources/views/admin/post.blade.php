@extends('layouts.app1')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>News</h1>
	</div>
</div>
<div class="row">
	<div class="table table-responsive">
		<table class="table table-bordered" id="table">
			<tr>
				<th width="150px">No</th>
				<th > Title</th>
				<th> Body</th>
				<th >created at</th>
				<th class="text-center" width="150px">
					<a href="#" id="" class="create-modal btn btn-success btn-sm">
					<!--<i class="glyphicon glyphicon-plus"></i>	  -->
						
						<i class="fa fa-plus"></i>
					</a>
				</th>
			</tr>
			{{csrf_field()}}
			<?php $no=1; ?>
			
			@foreach ($post as $key => $value)
				<tr class="post{{$value->id}}">
					<td>{{$no++}}</td>
					<td>{{$value->title}}</td>
					<td>{{$value->body}}</td>
					<td>{{$value->created_at}}</td>
					<td>
						<a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-eye"></i>
						</a>
						<a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-trash "></i>
						</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>

  <!-- The Modal -->
  <div id="create" class="modal fade"  role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Modal Heading</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
					<form class="form-horizontal" role="form">
							<div class="form-group row add">
								<label class="control-label col-md-2" for="title">Title:</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="title" name="title" placeholder="your title here" required>
									<p class="error text-center alert alert-danger hidden" hidden></p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2" for="body">Body:</label>
								<div class="col-md-10">
									<!-- <textarea class="form-control" placeholder="your body here" required="" id="body" name="body"></textarea> -->
	   
									<!-- <input type="text area" > -->
									<input type="text" class="form-control" id="body" name="body" placeholder="your body here" required>
									<p class="error text-center alert alert-danger hidden" hidden=""></p>
								</div>
							</div>
						</form>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">				
 					<!--  <a class="btn btn-warning" href="#" type="submit" id="add">Save Post >></a>		-->	
					 <button class="btn btn-success" type="submit" id="add">
							<span class="glyphicon glyphicon-plus"></span>Save Post
						   </button>
						   
						 <button class="btn btn-warning" type="button" data-dismiss="modal">
						 <span class="glyphicon glyphicon-remove"></span>Close
						</button>
			</div>
			
		  </div>
		</div>
	  </div>
@endsection
