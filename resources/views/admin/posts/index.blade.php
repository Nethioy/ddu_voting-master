@extends('layouts.master')
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
				<th width="15px">No</th>
				<th > Title</th>
				<th> Body</th>
				<th >created at</th>
				<th class="text-center" width="150px">
					<a href="{{route('posts.create')}}" id="" class=" btn btn-success btn-md">
					<!--<i class="glyphicon glyphicon-plus"></i>	  -->
						
						<i class="fa fa-plus">Add Post</i>
					</a>
				</th>
			</tr>
			{{csrf_field()}}
			<?php $no=1; ?>
			<!--     // $post as $key => $value if return view('admin.post',compact('post'));-->
			@foreach ($posts as $key => $value)
				<tr class="post{{$value->id}}">
					<td>{{$no++}}</td>
					<td>{{$value->title}}</td>
					<td> {{ str_limit($value->body,300)}}</td> 
					<td>{{$value->created_at}}</td>
					<td>
					
                    <a href="{{route('posts.show', $value->id)}}" class="btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-eye"></i>
						</a>
						<a href="{{route('posts.edit', $value->id)}}" class="btn btn-warning btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-pencil"></i>
						</a>
					{{--	<a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
							<i class="fa fa-trash "></i>
                        </a>  --}}
                        <form onsubmit="return confirm('Are you you wanna delete this post?')" class="float-right" method="post" action="{{route('posts.destroy', $value->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>                
					</td>
				</tr>
			@endforeach
        </table>
        <div class="mt-4">
            {{$posts->links()}}
       </div>
   
	</div>
</div>

@endsection