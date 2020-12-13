@extends('master')

@section('content')

<style type="text/css">
    	.blog-post{
    		text-align: center;
    	}
    </style>

    
	<h2>Hello <b>{{ auth()->user()->name }}</b> You are successfully logged in as <b>{{ auth()->user()->role }}</b></h2>
	
@if(session()->has('message'))
 <div class="alert alert-success">
    {{ session('message')}}
 </div>
@endif
<div class="blog-post">
<h2><b>All Recovery Instruction Posts</b></h2>
    <div >
    @foreach($posts as $post)
    <h2>-</h2>
    <h4> <b>{{ $post->user->name }}  :</b>About <b>{{ $post->category->name }}</b> </h4>
    <h4><b>Symptoms :</b>{{ $post->title }}</h4>
    <h4><b>Treatments :</b>{{ $post->content }} </h4>
    
    
    <cite style="float: right;">Posted on:{{date('M j, Y H:i' , strtotime($post->created_at))}}</cite>
    @endforeach
	</div>
</div>
@stop
