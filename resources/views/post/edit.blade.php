@extends('master')

@section('content')
	<h2><b>Edit Post</b></h2>

	<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">

	{{ csrf_field() }}
  <input name="_method" type="hidden" value="PUT">


    @if ($errors->any())
    <div class="alert alert-danger">
            @if($errors->count() == 1)
              {{ $errors->first() }}
            @else
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            
        </ul>
        @endif
    </div>
@endif

@if(session()->has('message'))
 <div class="alert alert-success">
    {{ session('message')}}
 </div>
@endif


  <div class="form-group">
    <label for="categories">Categories</label>
      <select name="category_id" class="form-control">
        
            @foreach($categories->all() as $category)
            <option value="{{ $category->id}}">{{ $category->name }}</option>
            @endforeach
            
        
      </select>  
    </div>


 <div class="form-group">
    <label for="title">Syntomps of disease</label>
    <input type="text" class="form-control" name="title"  value="{{ $post->title }}" placeholder="Enter post title ">
  </div>

   <div class="form-group">
    <label for="content">Recovery Instructions</label>
    <textarea class="form-control" name="content"  value="{{ $post->content }}" placeholder="Enter post content "></textarea>
    
  </div>
  
  

  <div class="form-group">
    <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="1" @if($category->status ==1) selected @endif>Active</option>
        <option value="0" @if($category->status ==0) selected @endif>Inactive</option>
      </select>  

  </div>
  
  
  <button type="submit" class="btn btn-primary">Add Post</button>
	</form>

  <hr>
  <p>
      <a href="{{ route('posts.index')}}" class="btn btn-success">
        Back to Post
      </a>
    </p>
@endsection