@extends('layouts.app')

@section('content')
@if(Auth::user()->role == 'admin')
<div class="container-fluid">

    <!-- Profile Page -->

    <div class="align-content-center">
        <form action="{{ route('profile.edit.confirm', ['name' => Auth::user()->name,'id'=> Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
            @csrf

            <div class="form-group">
                @if ($user->photo == NULL)
                <img src="{{asset('storage/default.png')}}" alt="Image" style="width:200px ;height:200px;">
                @else
                <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width:200px ;height:200px;">
                @endif
                &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="max-width: 500px ; max-height:500px;">
                <div>
                    <i class="fas fa-image"></i>&ensp;<label for="photo">Your Image</label>
                    <input type="file" class="form-control" name="photo" id="photo" value="{{ $user->photo}}">
                </div>
            </div>

            <div class="form-group">
                <i class="fas fa-user"></i> &ensp;<label for="name">Your name</label>
                <input class="form-control" name="name" placeholder="Enter Your Name" value="{{ $user->name}}" >
            </div>

            <div class="form-group">
                <i class="fas fa-calendar"></i>&ensp;<label for="dob">Your Birthday</label>
                <input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" value="{{ $user->dob }}" >
            </div>

            <div class="form-group">
                <i class="fas fa-phone"></i>&ensp;<label for="number">Your Phone Number</label>
                <input type="tel" class="form-control" name="number" placeholder="Enter Your Phone Number" value="{{ $user->number }}" >
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-warning" value="Reset">Reset</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
            </div>

        </form>
        <!-- Profile Page -->
    </div>

</div>
@else
    @if(Auth::user()->id != $user->id)


    @else
    <div class="container-fluid">
        <div class="align-content-center">
            <form action="{{ route('profile.edit.confirm', ['name' => Auth::user()->name,'id'=> Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                @csrf

                <div class="form-group">
                    @if ($user->photo == NULL)
                    <img src="{{asset('storage/default.png')}}" alt="Image" style="width:200px ;height:200px;">
                    @else
                    <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width:200px ;height:200px;">
                    @endif
                    &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                    <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="max-width: 500px ; max-height:500px;">
                    <div>
                        <i class="fas fa-image"></i>&ensp;<label for="photo">Your Image</label>
                        <input type="file" class="form-control" name="photo" id="photo" required>
                      
                    </div>
                </div>

                <div class="form-group">
                    <i class="fas fa-user"></i> &ensp;<label for="name">Your name</label>
                    <input class="form-control" name="name" placeholder="Enter Your Name" value="{{ $user->name}}" >
                </div>

                <div class="form-group">
                    <i class="fas fa-calendar"></i>&ensp;<label for="dob">Your Birthday</label>
                    <input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" value="{{ $user->dob }}" >
                </div>

                <div class="form-group">
                    <i class="fas fa-phone"></i>&ensp;<label for="number">Your Phone Number</label>
                    <input type="tel" class="form-control" name="number" placeholder="Enter Your Phone Number" value="{{ $user->number }}" >
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-warning" value="Reset">Reset</button>
                    <button onclick=" window.history.go(-1)" class="btn btn-danger">Cancel</button>
                </div>

            </form>
            <!-- Profile Page -->
        </div>
    </div>
    @endif
@endif

@endsection