@extends('layouts.app')

@section('content')
@if(Auth::user()->role == 'admin')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="text-center">
                    Edit a Thread</h3>
                <form action="{{ route('admins.threads.update', ['threadid' =>$thread->id])}}" method="POST" enctype="multipart/form-data" class="form form-signup" role="form">
                    @csrf
                    <div class="form-group">

                        <input type="hidden" name="id" value="{{$thread->id}}">
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="user_id" value="{{$thread->user_id}}">
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="forum_id" value="{{$thread->forum_id}}">

                    </div>

                    <div class="form-group">

                        <label for="thumbnail">Upload Your Image</label>
                        <div>
                            <img src="{{asset('storage/thread/'.$thread->title.'/'.$thread->thumbnail.'/')}}" alt="Image" style="max-width: 500px ; max-height:500px;">
                            &nbsp;&nbsp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&nbsp;&nbsp;
                            <img id="image_preview_container" src="#" alt="preview image" style="max-width: 500px ; max-height:500px;">
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="title">Edit thread Title</label>
                        <div class="input-group">
                            <input class="form-control" name="title" placeholder="Enter Your title" value="{{ $thread->title}}">
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="detail">Edit thread Detail</label>
                        <div class="input-group">
                            <input class="form-control" name="detail" placeholder="Enter Your detail" value="{{ $thread->detail}}">
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="tag_id" class="col-md-4 control-label">Tag ( Current) : {{ucfirst(trans($threadtag->name))}}</label>
                        <div class="input-group">
                            <select class="form-control" name="tag_id" id="tag_id">
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{ucfirst(trans($tag->name))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="status" class="col-md-4 control-label">Status:</label>
                        <div class="input-group">
                            <select class="form-control" name="status" id="status">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-warning" value="Reset">Reset</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@else

@endif
@endsection