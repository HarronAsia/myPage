@extends('layouts.app')
<style>
label{
    color: #E8E1CC;
}
    </style>
@section('content')

<div class="container-fluid">

    <div class="col-xl order-xl-1">
        <div class="card bg-secondary bg-dark">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><strong>Personal Information</strong></h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Avatar</strong></label>
                                <div>
                                    <img src="{{asset('storage/'.$user['name'].'/'.$user['photo'])}}" alt="preview image" style="max-width:1000px ; max-height:800px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Place: </strong></label>
                                <div>{{$profile->place?? ''}}</div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group text-white">
                                <label class="form-control-label"><strong>Job: </strong></label>
                                <div>{{$profile->job?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group text-white">
                                <label class="form-control-label"><strong>Personal ID: </strong></label>
                                <div>{{$profile->personal_id?? ''}}</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group text-white">
                                <label class="form-control-label"><strong>Issued ddate:</strong> </label>
                                <div>{{$profile->issued_date?? ''}}</div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group text-white">
                                <label class="form-control-label"><strong>Issued By :</strong></label>
                                <div>{{$profile->issued_by?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Supervisor Name:</strong> </label>
                                <div>{{$profile->supervisor_name?? ''}}</div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group text-white">
                                <label class="form-control-label"><strong>Supervisor Date Of Birth: </strong></label>
                                <div>{{$profile->supervisor_dob?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Introduction: </strong></label>
                                <div>{{$profile->detail?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Google Plus Name:</strong></label>
                                <div>{{$profile->google_plus_name?? ''}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Google Plus Link: </strong></label>
                                <div>{{$profile->google_plus_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>AIM Link: </strong></label>
                                <div>{{$profile->aim_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Window Live Link:</strong> </label>
                                <div>{{$profile->window_live_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Yahoo Link:</strong> </label>
                                <div>{{$profile->yahoo_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>ICQ Link: </strong></label>
                                <div>{{$profile->icq_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Skype Link:</strong> </label>
                                <div>{{$profile->skype_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Google Talk Link:</strong> </label>
                                <div>{{$profile->google_talk_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong> Link: </strong></label>
                                <div>{{$profile->facebook_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group text-white ">
                                <label class="form-control-label"><strong>Twitter Link: </strong></label>
                                <div>{{$profile->twitter_link?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group text-white">
                                <label class="form-control-label"><strong>Your Action: </strong></label>

                                <button onclick="window.history.back()" class="btn btn-danger">Back</button>
                            </div>
                        </div>
                        @if($profile->user_id?? '' == Auth::user()->id)
                        <div class="col-lg-6">
                            <div class="form-group text-white">
                                <a href="{{route('account.profile.edit',['name'=>Auth::user()->name?? '','id'=>Auth::user()->id])}}">
                                    <button class="btn btn-info">Edit Profile</button>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-6">
                            <div class="form-group text-white">
                                <a href="{{route('account.profile.add',['name'=>Auth::user()->name?? '','id'=>Auth::user()->id])}}">
                                    <button class="btn btn-info">Add Profile</button>
                                </a>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection