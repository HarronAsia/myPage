@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Profile Page -->

    <div class="align-content-center">
        <form action="{{ route('user.edit.confirm', ['id'=>$user->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
            @csrf

            <div class="form-group">
                @if ($user->photo == NULL)
                <img src="{{asset('storage/default.png')}}" alt="Image" style="width:200px ;height:200px;">
                @else
                <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width:200px ;height:200px;">
                @endif
                &nbsp;&nbsp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&nbsp;&nbsp;
                <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="max-width: 500px ; max-height:500px;">
                <div>
                    <i class="fas fa-image"></i>&nbsp;&nbsp;<label for="photo">User Avatar</label>
                    <input type="file" class="form-control" name="photo" id="photo" value="{{ $user->photo}}" required>
                </div>
            </div>

            <div class="form-group">
                <i class="fas fa-user"></i> &nbsp;&nbsp;<label for="name">User Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="{{ $user->name}}"required>
            </div>

            <div class="form-group">
                <i class="far fa-envelope"></i>&nbsp;&nbsp;<label for="number">User Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Phone Number" value="{{ $user->email }}"required>
            </div>

            <div class="form-group">
                <i class="fas fa-key"></i></i>&nbsp;&nbsp;<label for="number">User Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Your Phone Number" value="{{ $user->password }}"required>
            </div>

            <div class="form-group">
                <i class="fas fa-calendar"></i>&nbsp;&nbsp;<label for="dob">User Birthday</label>
                <input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" value="{{ $user->dob }}"required>
            </div>

            <div class="form-group">
                <i class="fas fa-phone"></i>&nbsp;&nbsp;<label for="number">User Phone Number</label>
                <input type="tel" class="form-control" name="number" placeholder="Enter Your Phone Number" value="{{ $user->number }}"required>
            </div>

            <div class="form-group">
                <i class="fas fa-user-tag"></i>&nbsp;
                <label for="role" class="col-md-4 control-label">User Type:</label>
                <select class="form-control" name="role" id="role"required>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="member">Member</option>
                </select>
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

@endsection