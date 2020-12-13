@extends('master')
    
    @section('content')
          <style type="text/css">
    	.blog-post{
    		text-align: center;
    	}
    </style>
          <div class="blog-post">
            <h2 ><b>Hello {{ Auth::user()->name }}</b></h2>
            <h2><b>Welcome to Online Health Support System</b></h2>
            </h4>
            
          </div>
@stop