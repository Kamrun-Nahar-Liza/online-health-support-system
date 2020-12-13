@extends('master')

@section('content')


    
	<h2><b>User List :</b></h2>
	
@if(session()->has('message'))
 <div class="alert alert-success">
    {{ session('message')}}
 </div>
@endif
<table class="table table-bordered table-condensed">
			<thead class="thead-dark">
				<tr >
				
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>

				<th>Action</th>
				

				</tr>
			</thead>

			<tbody>

				@foreach($users as $user)
				 
				<tr>

					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->role }}</td>

					  <td>
				
				 <form action="{{action('RegisterController@destroy', $user['id'])}}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
            
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger ">
                <i class="fa fa-trash">  Delete Account</i>
            </button>

        </form> 
    </td>
				@endforeach
				
				</tr>
			</tbody>
		</table>


    
@stop
