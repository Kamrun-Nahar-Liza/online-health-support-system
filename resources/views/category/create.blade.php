@extends('master')

@section('content')
    <h2><b>Add Diseases Name</b></h2>

    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}


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
    <label for="name">Disease name</label>
    <input type="text" class="form-control" name="name"  value="{{ old('name')}}" placeholder="Enter disease name">
  </div>

  <div class="form-group">
    <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>  

  </div>
  
  
  <button type="submit" class="btn btn-success">Add Category</button>
    </form>

  <hr>
  <p>
      <a href="{{ route('categories.index')}}" class="btn btn-primary">
        Back to Diseases List
      </a>
    </p>
@endsection