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
					<!-- <a href="#" id="" class="create-modal btn btn-success btn-sm">  -->
					<!--<i class="glyphicon glyphicon-plus"></i>	  -->
						<button class="btn btn-info"  data-toggle="modal" data-target="#myModal">+ add post </button>
						<i class="fa fa-plus"></i>
					</a>
				</th>
			</tr>
			{{csrf_field()}}
			<?php $no=1; ?>
			
			@foreach ($posts as $key => $value)
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
 <!-- new modal test -->
<!-- The Modal -->
<div class="modal fade" id="myModal">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Modal Heading</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
		<form action="{{ URL::to('post/store') }}" method="POST" id="frm_insert">
				<div class="modal-body">
			    <div class="col-6-md">
					<div class="form-group">
						<label> Title </label>
						<input type="text" name="title" class="form-control">
					</div>
			    </div>
			    <div class="col-6-md">
						<div class="form-group">
							<label> Description </label>
							<input type="text" name="body" class="form-control">
						</div>
					</div>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<input type="submit" class="btn btn-success pull-left" value="Save">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		  </div>


 <!-- new modal test -->

@endsection


@section('script')
	<script type="text/javascript"
	$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	}

	});
	$(#frm-insert).on('submit',function(e){
		alert('test')
		e.preventDefault();
		var data = $(this).serialize();
		var url = $(this).attr('action');
		var post = $(this).attr('method');
		$.ajax({
			type : post,
			url : url,
			data : data,
			dataType : 'json',
			success:function(data)
			  {
                  console.log(data)
			  }
		})
	})
	</script>
@endsection