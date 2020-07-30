@extends('layouts.app')



@section('content')

<div class="container-fluid">
    <div class="row">

    @if($user->background_photo == NULL)
   
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="width:100%; height:600px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    @else

    @endif
        <!-- Header -->
     
         
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-dark" style="opacity: 0.6;">Hello {{ucfirst($user->name)}}</h1>
                        <p class="text-dark mt-0 mb-5">This is your profile page. You can see the progress you've made.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">

                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    @if ($user->photo == NULL)
                                    <img src="{{asset('storage/default.png')}}" alt="Image" style="width:200px ;height:200px;">
                                    @else
                                    <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width:200px ;height:200px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                @if(Auth::user()->id != $user->id)
                                <a href="#" class="btn btn-sm btn-info mr-4">Follow</a>

                                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                                @else

                                @endif
                            </div>
                        </div>

                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading">1</span>
                                            <span class="description">Threads</span>
                                        </div>
                                        <div>
                                            <span class="heading">1</span>
                                            <span class="description">Posts</span>
                                        </div>
                                        <div>
                                            <span class="heading">1</span>
                                            <span class="description">Comments</span>
                                        </div>
                                        <div>
                                            <span class="heading">1</span>
                                            <span class="description">Likes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    {{$user->name}}
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>{{$profile->place?? ''}}
                                </div>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>{{$profile->job?? ''}}
                                </div>
                                <hr class="my-4">
                                <p>{{$profile->detail?? ''}}</p>
                                <a href="#">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary bg-dark">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <h3 class="mb-0">My account</h3>
                                </div>

                                <div class="col-3">
                                    <a href="{{ route('profile.edit', ['name' => Auth::user()->name?? '','id'=> Auth::user()->id])}}" class="btn btn-info"><i class="fas fa-user-ninja"></i> &nbsp;&nbsp;Edit Profile</a>
                                </div>
                            
                                <div class="col-2">
                                    <a href="{{ route('account.profile', ['name' => Auth::user()->name?? '','id'=> Auth::user()->id])}}" class="btn btn-info"><i class="fas fa-user-secret"></i> &nbsp;&nbsp;Personal Profile</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h6 class="heading-small text-white mb-4">User information</h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text-white ">
                                            <label class="form-control-label">Username</label>
                                            <div>{{$user->name}}</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group text-white">
                                            <label class="form-control-label">Email address</label>
                                            <div>{{$user->email}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text-white">
                                            <label class="form-control-label">Date Of Birth</label>
                                            <div>{{$user->dob}}</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group text-white">
                                            <label class="form-control-label">Phone Number</label>
                                            <div>{{$user->number}}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="my-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection