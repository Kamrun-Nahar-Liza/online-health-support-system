@extends('master')

@section('content')

	<div class="weLl">
		<h2><b>Recovery Instructions List</b></h2>
		@if( Auth::user()->role == "doctor")
		<p>
			<a href="{{ route('posts.create')}}" class="btn btn-success">
				<i class="fa fa-plus">  Add Recovery Instructions Post</i>
			</a>
		</p>
		<marquee>Add recovery instruction post for patient.</marquee>
		@endif

		



		@if(session()->has('message'))
 			<div class="alert alert-danger">
   				 {{ session('message')}}
 			</div>
		@endif
		<div>
		<table class="table table-bordered table-condensed">
			<thead class="thead-dark">
				<tr >
				
				<th>Disease Category</th>
				<th>Syntomps of disease</th>
				<th>Recovery Instruction</th>
				<th>Recommand by</th>
				<th>Status</th>
				<th>Action</th>
				@if( Auth::user()->role == "admin")
				<th>Action</th>
				<th>Action</th>
				@endif
				</tr>
			</thead>

			<tbody>

				@foreach($posts as $post)
				 
				<tr>
					<td>{{ $post->category->name }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->content }}</td>
					   <!-- Post model relation name category,name can be on uour wish-->
					<td>{{ $post->user->name }}</td>
					<td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
					<td>
						<a href="{{ route('posts.show', $post->id)}}" class="btn btn-info">
							<i class="fa fa-external-link-square">  Details</i>
						</a>

		@if( Auth::user()->role == "admin")
						<td>
		<div class="btn-group mr-2" role="group" aria-label="First group">
    	<a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"> Edit </i></a>
  		</div>
  					</td>
  					<td>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <form action="{{ route('posts.destroy' , $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
			
			{{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger ">
            	<i class="fa fa-trash">  Delete </i>
            </button>

		</form>
  </div>
</td>
@endif

					</td>
				</tr>
				
				@endforeach
			</tbody>
		</table>

	</div>
	</div>
@stop