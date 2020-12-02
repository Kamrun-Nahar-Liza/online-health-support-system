@extends('master')

@section('content')

<div  class="row">
                        <div class="col-md-8"><h3><b>Search from synptoms : </b><h3></div>
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


	
    @stop