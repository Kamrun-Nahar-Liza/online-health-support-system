@extends('master')

@section('content')

   

	<h2>Syntomps: {{ $post->title }}</h2>

	<p>
		Id: {{ $post->id }}
	</p>

	<p>
		Recovery Instructions: {{ $post->content }}
	</p>
	
    <p>
		Status: {{ $post->status == 1 ?'Active' : 'Inactive'}}
	</p>

	<p>
		Created At: {{ $post->created_at->diffforHumans() }}
	</p>
	

	<!-- <div>
		<a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-success"> Edit </a>
	</div>

	<hr>

	<div>
		<form action="{{ route('posts.destroy' , $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
			
			{{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger ">
            	Delete
            </button>

		</form>
	</div> -->


<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"> Edit </i></a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <form action="{{ route('posts.destroy' , $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
			
			{{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger ">
            	<i class="fa fa-trash">  Delete </i>
            </button>

		</form>
  </div>
</div>



	<hr>
	<div>
		<a href="{{ route('posts.index')}}" class="btn btn-primary lg">
        Back to Post
      </a>
	</div>


@endsection