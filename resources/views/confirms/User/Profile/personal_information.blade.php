@extends('layouts.app')

@section('content')


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
                                    <img src="{{asset('storage/'.$user['name'].'/'.$user['photo'])}}" alt="preview image" style="max-width:1000px ; max-height:800px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <form action="{{route('account.profile.store',['name'=>Auth::user()->name?? '','id'=>Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Place: </label>
                                    <div>
                                        <input type="text" name="place" value="{{$profile->place?? ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Job: </label>
                                    <div>
                                        <input type="text" name="job" value="{{$profile->job?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Personal ID: </label>
                                    <div>
                                        <input type="text" name="personal_id" value="{{$profile->personal_id?? ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Issued ddate: </label>
                                    <div>
                                        <input type="date" name="issued_date" value="{{$profile->issued_date?? ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Issued By :</label>
                                    <div>
                                        <input type="text" name="issued_by" value="{{$profile->issued_by?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Supervisor Name: </label>
                                    <div>
                                        <input type="text" name="supervisor_name" value="{{$profile->supervisor_name?? ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Supervisor Date Of Birth: </label>
                                    <div>
                                        <input type="date" name="supervisor_dob" value="{{$profile->supervisor_dob?? ''}}">
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
                                        <input type="text" name="detail" value="{{$profile->detail?? ''}}">
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
                                        <input type="text" name="google_plus_name" value=" {{$profile->google_plus_name?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Google Plus Link: </label>
                                    <div>
                                        <input type="text" name="google_plus_link" value="{{$profile->google_plus_link?? ''}}">
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
                                        <input type="text" name="aim_link" value="{{$profile->aim_link?? ''}}">
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
                                        <input type="text" name="window_live_link" value="{{$profile->window_live_link?? ''}}">
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
                                        <input type="text" name="yahoo_link" value="{{$profile->yahoo_link?? ''}}">
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
                                        <input type="text" name="icq_link" value="{{$profile->icq_link?? ''}}">
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
                                        <input type="text" name="skype_link" value="{{$profile->skype_link?? ''}}">
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
                                        <input type="text" name="google_talk_link" value="{{$profile->google_talk_link?? ''}}">
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
                                        <input type="text" name="facebook_link" value="{{$profile->facebook_link?? ''}}">
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
                                        <input type="text" name="twitter_link" value="{{$profile->twitter_link?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Your Action: </label>

                                    <button onclick="window.history.back()" class="btn btn-danger">Cancel</button>
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


@endsection