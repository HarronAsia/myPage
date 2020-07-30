@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="container">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light">Edit Post</h4>
                    </div>

                    <div class="modal-body">

                        @if( Auth::user()->role == "manager")
                        <form action="{{ route('manager.post.update',['id' => $community->id,'postid'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.post.update',['id' => $community->id,'postid'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="detail" class="form-control form-control-lg" placeholder="Enter Name" value="{{$post->detail}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload Your Image</label>
                                    <div>
                                        <img src="{{asset('storage/post/'.$post->user_id.'/'.$post->image.'/')}}" alt="image" style="max-width: 150px ; max-height:150px;">
                                        &nbsp;&nbsp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&nbsp;&nbsp;
                                        <img id="image_preview_container" src="#" alt="preview image" style="max-width: 150px ; max-height:150px;">
                                    </div>
                                    <input type="file" class="form-control" name="image" id="image">
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


@endsection