@extends('layouts.app')
<style>
label{
    color: #E8E1CC;
}
    </style>
@section('content')

@if(Auth::user()->id != $profile->user_id?? '')

@else
<div class="container-fluid">

    <div class="col-xl order-xl-1">
        <div class="card bg-secondary bg-dark">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Personal Information</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="form-group text-white ">
                                <label class="form-control-label">Avatar</label>
                                <div>
                                    <img src="{{asset('storage/'.$user['name'].'/'.$user['photo'])}}" alt="preview image" style="max-width:100% ; max-height:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <form action="{{route('account.profile.update',['name'=>Auth::user()->name?? '','id'=>Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label>Place: </label>
                                    <div>
                                        <input class="form-control input1" type="text" name="place" value="{{$profile->place?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label>Job: </label>
                                    <div>
                                        <input class="form-control" type="text" name="job" value="{{$profile->job?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group text-white">
                                    <label>Personal ID: </label>
                                    <div>
                                        <input class="form-control" type="text" name="personal_id" value="{{$profile->personal_id?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group text-white">
                                    <label>Issued ddate: </label>
                                    <div>
                                        <input class="form-control" type="date" name="issued_date" value="{{$profile->issued_date?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group text-white">
                                    <label>Issued By :</label>
                                    <div>
                                        <input class="form-control" type="text" name="issued_by" value="{{$profile->issued_by?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label>Supervisor Name: </label>
                                    <div>
                                        <input class="form-control" type="text" name="supervisor_name" value="{{$profile->supervisor_name?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label>Supervisor Date Of Birth: </label>
                                    <div>
                                        <input class="form-control" type="date" name="supervisor_dob" value="{{$profile->supervisor_dob?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Introduction: </label>
                                    <div>
                                        <input class="form-control" type="text" name="detail" value="{{$profile->detail?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Google Plus Name: </label>
                                    <div>
                                        <input class="form-control" type="text" name="google_plus_name" value=" {{$profile->google_plus_name?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Google Plus Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="google_plus_link" value="{{$profile->google_plus_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">AIM Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="aim_link" value="{{$profile->aim_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Window Live Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="window_live_link" value="{{$profile->window_live_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Yahoo Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="yahoo_link" value="{{$profile->yahoo_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">ICQ Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="icq_link" value="{{$profile->icq_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Skype Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="skype_link" value="{{$profile->skype_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Google Talk Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="google_talk_link" value="{{$profile->google_talk_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Facebook Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="facebook_link" value="{{$profile->facebook_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Twitter Link: </label>
                                    <div>
                                        <input class="form-control" type="text" name="twitter_link" value="{{$profile->twitter_link?? ''}}" style="border-radius: 50px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Your Action: </label>

                                    <button onclick="window.history.back()" class="btn btn-danger">Back</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endif

@endsection