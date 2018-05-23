@extends('layouts.app1')
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
				<tr class="post{{$value->id}}">
					<td>{{$no++}}</td>
					<td>{{$value->student_id}}</td>
					<th>{{$value->fname}}</th>
					<td>{{$value->lname}}</td>
					<td>{{$value->department}}</td>
					<td>{{$value->batch}}</td>
					
					
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
@section('script')

<script type="text/javascript">
	$('#read-data').on('click',function(){
		$.get("{{URL::to('add/new/student/read-data')}}",function(data){
			$('#student_info').empty()html(data);
		})
	})
</script>

@endsection
