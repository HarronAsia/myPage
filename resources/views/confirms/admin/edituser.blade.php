@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Profile Page -->

        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary bg-dark">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">User Account</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h6 class="heading-small text-white mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <hr>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Avatar</label>
                                    <div>
                                        <img src="{{asset('storage/'.$user['name'].'/'.$user['photo'])}}" alt="preview image" style="max-width: 500px ; max-height:500px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white ">
                                    <label class="form-control-label">Username</label>
                                    <div>{{$user->name?? ''}}</div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Email address</label>
                                    <div>{{$user->email?? ''}}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Password</label>
                                    <div>{{$user->password?? ''}}</div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Phone Number</label>
                                    <div>{{$user->number?? ''}}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Date Of Birth</label>
                                    <div>{{$user->dob?? ''}}</div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Role: </label>
                                    <div>{{$user->role?? ''}}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Created At</label>
                                    <div>{{$user->created_at?? ''}}</div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group text-white">
                                    <label class="form-control-label">Last Updated</label>
                                    <div>{{$user->updated_at?? ''}}</div>
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
                                <div>
                                    <form action="{{ route('user.update', ['id'=> $user->id?? ''])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                                        @csrf

                                        <input type="hidden" name='name' value="{{$user->name?? ''}}">
                                        <input type="hidden" name='email' value="{{$user->email?? ''}}">
                                        <input type="hidden" name='password' value="{{$user->password?? ''}}">
                                        <input type="hidden" name='dob' value="{{$user->dob}}">
                                        <input type="hidden" name='number' value="{{$user->number}}">
                                        <input type="hidden" name='photo' value="{{$user->photo}}">
                                        <input type="hidden" name='role' value="{{$user->role?? ''}}">

                                        <button type="submit" class="btn btn-default" id="editprofilebtn">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Profile Page -->
        </div>
    </div>
</div>
@endsection