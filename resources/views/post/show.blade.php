@extends('master')

@section('content')

   

	<h2><b>Syntomps:</b> {{ $post->title }}</h2>

	<p>
		
	</p>

	<h3>
		<b>Recovery Instructions:</b> {{ $post->content }}
	</h3>
	
    <p>
		Status: {{ $post->status == 1 ?'Active' : 'Inactive'}}
	</p>

	<p>
		Posted at: {{ $post->created_at->diffforHumans() }}
	</p>

	<p>
	<h4><b>Comment :</b></h4>	<form  method="POST" action='{{ url("/comment/{$post->id}") }}' >
                        {{ csrf_field() }}

                        @if(session()->has('message'))
                       <div class="alert alert-success">
                      {{ session('message')}}
                       </div>
                       @endif

                        <div class="form-group">
                            <textarea id="Comment" rows="5" class="form-control" name="comment" required="autofocus"></textarea>

                                <button type="submit" class="btn btn-success">
                                    Comment
                                </button>
     
                </div>
            </form>
                     <h3><b>  Comments</b></h3>
                     @if(count($comments) > 0)
                            @foreach($comments as $comment)
                            <p><b> {{ $comment->name}} </b> : '{{ $comment->comment}}' &nbsp;&nbsp; Commented at: {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} </p>
                            
                               @if($comment->user_id ==  Auth::user()->id)
                            <p><div>
    <form action="{{ route('comment.delete' , $comment->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
      
      {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger ">
              Delete Comment
            </button>

    </form>
  </div></p>
  @endif
                            
                            @endforeach
                    @else
                            <p>No Comments Avilable!</p>
                    @endif
                </hr>

                </hr>
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

   @if( Auth::user()->id == $post->user_id)

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

  @endif

	<hr>
	<div>
		<a href="{{ route('posts.index')}}" class="btn btn-primary lg">
        Back to Post
      </a>
	</div>


@endsection