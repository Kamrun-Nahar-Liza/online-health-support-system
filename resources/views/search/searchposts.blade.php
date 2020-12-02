@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($errors) > 0)
              @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
              @endforeach
          @endif

          @if(session('response'))
              <div class="alert alert-success">{{session('response')}}</div>
          @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div  class="row">
                        <div class="col-md-4">Search Bar</div>
                        <div class="col-md-8">
                            <form  method="POST" action='{{ url("/search") }}' >
                        {{ csrf_field() }}

                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for .....">
                            <span class="input-group-btn">
                            
                                <button type="submit" class="btn btn-default">
                                   Go!!
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                </div>
                </div>

                <div class="panel-body">
                    
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts-> all() as $post)
                            <h2>{{ $post->category->name }}</h2> 
                            <h4><b>{{ $post->title }}</b></h4>
                            <h5> {{ $post->content }}</h5>  

                            
                            <cite style="float: right;">Posted on:{{ $post->created_at }}</cite>
                            <hr>
                            @endforeach
                        @else
                            <p>No Recovery Instruction Avilable!</p>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
