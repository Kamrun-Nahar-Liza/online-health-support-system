@extends('profilelayout')

@section('title')
Doctor Profile
@endsection

@section('content')

@if(session()->has('message'))
            <div class="alert alert-danger">
                 {{ session('message')}}
            </div>
        @endif
    
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    @if( Auth::user()->role == "doctor")
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('profile.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Create</a>

                    </div>
                    @endif
                </div>
            
                <div class="row doctor-grid">
                         @foreach($profiles as $profile)
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img src="{{ asset('uploads/doctor/' . $profile->profile_pic) }}" alt=""></a>
                            </div>

                            <h4 class="doctor-name text-ellipsis"><a href="">{{ $profile->first_name }}{{ $profile->last_name }}</a></h4>
                            <div class="doc-prof">{{ $profile->department }}</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> {{ $profile->designation }}
                            </div>

                            <div><a href="{{ route('profile.show', $profile->id)}}" class="btn btn-info">
                            <i class="fa fa-external-link-square">  Details</i>
                        </a></div>


                        @if( Auth::user()->role == "admin")
                        <hr>
                        <div><a href="{{ route('profile.edit', $profile->id)}}" class="btn btn-success">
                            <i class="fa fa-external-link-square">  Edit</i>
                        </a></div>

                        <!--<a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-success btn-xs">Edit</a>-->
                        <hr>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
             <form action="{{ route('profile.destroy' , $profile->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
            
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger ">
                <i class="fa fa-trash">  Delete </i>
            </button>

        </form>
  </div>
  @endif

                        </div>
                    </div>
                    
                @endforeach
                    </div>

				<div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
		<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="{{asset('DoctorPage/assets/img/sent.png')}}" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Doctor?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    @endsection
    