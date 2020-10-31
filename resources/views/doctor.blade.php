@extends('master')
    
    @section('content')
          <div class="blog-post">
            <h2 >Hello there!</h2>
            <p>You are logged in {{ Auth::user()->name }} as {{ Auth::user()->role }}</p>
            
          </div>
          
@stop