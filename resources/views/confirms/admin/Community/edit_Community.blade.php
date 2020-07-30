@extends('layouts.app')

@section('content')
@if(Auth::user()->role != 'admin')

@else
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="container">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light">Edit Community</h4>
                    </div>

                    <div class="modal-body">

                        <form action="{{ route('communities.admin.update', ['communityid'=> $community->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" value="{{$community->title}}" required>
                            </div>

                            <div class="form-group">
                                <label for="banner">Upload Your Banner</label>
                                <div>
                                    <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner.'/')}}" alt="Image" style="max-width:250px ; max-height:250px;">
                                    &nbsp;&nbsp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&nbsp;&nbsp;
                                    <img id="image_preview_container" src="#" alt="preview image" style="max-width: 250px ; max-height:250px;">
                                </div>
                                <input type="file" class="form-control" name="banner" id="banner">
                            </div>

                            <div class="form-group">
                                <input type="submit" style="background-color: green; color: black;">
                                <input type="reset" style="background-color: yellow; color: black;">
                                <input type="button" onclick=" window.history.go(-1)" style="background-color: red; color: black;" value="Cancel">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endif

@endsection