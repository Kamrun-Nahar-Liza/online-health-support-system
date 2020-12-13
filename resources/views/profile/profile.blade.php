@extends('profilelayout')

@section('title')
Doctor Profile
@endsection

@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>

                    <!-- <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div> -->
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="{{ asset('uploads/doctor/' . $data->profile_pic) }}" alt=""></a>

                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ $data->first_name }}{{ $data->last_name }}</h3>
                                                
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">{{ $data->phone }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">{{ $data->user->email }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Department:</span>
                                                    <span class="text"><a href="#">{{ $data->department }}</a></span>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Informations</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">{{ $data->designation }}</a>
                                                <div>MBBS</div>
                                                <!-- <span class="time">2001 - 2003</span> -->
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                        </div>
                        
                    </div>
                </div>
            

            @if( $data->user_id == Auth::user()->id)
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div><a href="{{ route('profile.edit', $data->id)}}" class="btn btn-info">
                            <i class="fa fa-external-link-square">  Edit</i>
                        </a></div>

                        

                        <div class="btn-group mr-2" role="group" aria-label="Second group">
             <form action="{{ route('profile.destroy' , $data->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
            
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
        <a href="{{ route('profile.index')}}" class="btn btn-primary lg">
        Back to Doctor List
      </a>
    </div>
          
        </div>
    </div>
    </div>

@endsection