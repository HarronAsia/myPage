@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="container">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light">Edit Comment</h4>
                    </div>

                    <div class="modal-body">


                        <form action="{{route('comments.admin.update',['commentid'=>$comment->id])}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label for="comment_detail">Edit Comment detail</label>
                                <input class="form-control" name="comment_detail" placeholder="Enter Your title" value="{{ $comment->comment_detail}}">
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Your Image</label>
                                <div>
                                    <img src="{{asset('storage/comment/'.Auth::user()->name.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                    &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                                    <img id="image_preview_container2" src="#" alt="preview image" style="max-width: 200px ; max-height:200px;">
                                </div>
                                <input type="file" class="form-control" name="comment_image" id="comment_image">
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