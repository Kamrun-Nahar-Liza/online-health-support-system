@extends('master')

@section('content')

	<h2>{{ $category->name }}</h2>

	

	

	<p>
		Status: {{ $category->status == 1 ?'Active' : 'Inactive'}}
	</p>

	<p>
		Created At: {{ $category->created_at }}
	</p>

	<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
	<div class="btn-group mr-2" role="group" aria-label="First group">
		<a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-success"> Edit </a>
	</div>


	<div class="btn-group mr-2" role="group" aria-label="Second group">
		<form action="{{ route('categories.delete' , $category->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
			
			{{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger">
            	Delete
            </button>

		</form>
	</div>
</div>

	<hr>
	<div>
		<a href="{{ route('categories.index')}}" class="btn btn-primary">
        Back to Category
      </a>
	</div>

<hr>
	<h2>Post under {{ $category->name }}</h2>
		

		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
				
				<th>Category</th>
				<th>Synptoms</th>
				<th>Recovery Instructions</th>
				<th>Author</th>
				<th>Status</th>
				<th>Action</th>
				</tr>
			</thead>

			<tbody>

				@foreach($category->posts as $post)
				<tr>
					<td>{{ $post->category->name }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->content }}</td>   
					<td>{{ $post->user->name }}</td>
					<td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
					<td>
						<a href="{{ route('posts.show', $post->id)}}" class="btn btn-info">
							<i>Details</i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table> 






	

@endsection