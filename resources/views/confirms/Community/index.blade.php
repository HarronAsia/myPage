@extends('layouts.app')

@section('content')
<style>
    .h7 {
        font-size: 0.8rem;
    }

    @media (min-width: 100%) {
        .gedf-main {
            padding-left: 4rem;
            padding-right: 4rem;
        }

        .gedf-card {
            margin-bottom: 2.77rem;
        }
    }

    /**Reset Bootstrap*/
    .dropdown-toggle::after {
        content: none;
        display: none;
    }

    li {
        color: #685958;
    }

    select {
        border: none;
        background-color: #00000008;
        opacity: 0.6;
    }

    .responsive {
        width: 100%;
        height: auto;
    }

    .comments-section {
        background: #fff;
    }

    .comment-area {
        background: none repeat scroll 0 0 #fff;
        border: medium none;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        -ms-border-radius: 4px 4px 0 0;
        -o-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
        color: #777777;
        float: left;
        font-family: Lato;
        font-size: 14px;
        letter-spacing: 0.3px;
        padding: 10px 20px;
        width: 100%;
        resize: vertical;
        outline: none;
        border: 1px solid #F2F2F2;
    }

    .camera {
        height: 100%;
        border: none;
        font-size: 15px;
        background-color: #338EB5;
        color: white;

    }

    .comment-btn {
        float: right;
        background: #338EB5;
        padding: 6px 15px;
        color: #fff;
        letter-spacing: 1.5px;
        outline: none;
        border-radius: 4px;
        box-shadow: none;
    }

    .comment-btn:hover,
    .comment-btn:focus {
        background: #29ABE2;
        outline: none;
        border-radius: 4px;
        box-shadow: none;
    }

    .comment-box-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin: 5px 0px;
    }

    .comment-box {
        display: flex;
        width: 100%;
    }

    .comment-box a {
        color: #242475;
    }

    .commenter-image {
        height: 40px;
        width: 40px;
        border-radius: 50%;
    }

    .comment-content {
        display: flex;
        flex-direction: column;
        background: #f2f3f5;
        margin-left: 5px;
        padding: 4px 20px;
        border-radius: 10px;
    }

    .commenter-head {
        display: block;
    }


    .commenter-head .commenter-name {
        font-size: 0.9rem;
        font-weight: 600;
    }




    .comment-date {
        font-size: 0.7rem;
    }

    .comment-date i {
        margin: 0 5px 0 10px;
    }

    .comment-body {
        padding: 0 0 0 5px;
        display: flex;
        font-size: 1rem;
        font-size: 0.8rem;
        font-weight: 400;
    }

    .comment-footer {
        font-size: 0.8rem;
        font-weight: 600;
    }

    .comment-footer span {
        margin: 0 15px 0 0;
    }

    .comment-footer span a {
        margin: 0 0px 0 2px;
    }


    .comment-footer span.comment-likes .active .fa-heart {
        color: black;
        font-size: 1rem;
    }

    .comment-footer span.comment-likes .active .fa-heart {
        color: red;
    }

    .nested-comments {
        margin-left: 50px;
    }

    #upload-photo {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
</style>

<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="h5">{{$community->title}}</div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="h6 text-muted">Followers</div>
                        <div class="h5">5.2342</div>
                    </li>
                    <li class="list-group-item">
                        <div class="h6 text-muted">Following</div>
                        <div class="h5">6758</div>
                    </li>
                    <!-- Get notifications -->
                    <li class="list-group-item">
                        @if(Auth::guest())

                        @else

                        @if (Auth::user()->role == 'member')
                        <p>
                            <strong>To get Notifications you need to be Manager or above</strong>
                        </p>

                        @else
                        @if ($follower->follower_id?? '' == Auth::user()->id)
                        <a href="{{route('unfollow.community',['userid'=>Auth::user()->id,'communityid'=>$community->id])}}" class="btn btn-danger"> <i class="fa fa-bell-slash-o"></i> &ensp;Stop getting Notification</a>
                        @else
                        <a href="{{route('follow.community',['userid'=>Auth::user()->id,'communityid'=>$community->id])}}" class="btn btn-primary"> <i class="fa fa-bell"></i>&ensp;Get Notification</a>
                        @endif
                        @endif
                        @endif
                    </li>
                    <!-- Get notifications -->
                </ul>
            </div>
        </div>

        <div class="col-md-6 gedf-main">

            <!--- \\\\\\\Post-->
            <div class="card gedf-card">
                <div class="card-header">
                    @if(Auth::guest())
                    <p>You have to <a href="{{url('/login')}}">Login</a> or <a href="{{url('/register')}}">Register</a>
                        to use this</p>
                    @else
                    <!-- Form start -->


                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make a Post</a>
                        </li>
                    </ul>
                    @if(Auth::user()->role == 'admin')
                    <form action="{{ route('admin.post.create',['id'=>$community->id])}}" method="POST" enctype="multipart/form-data">
                        @elseif(Auth::user()->role == 'manager')
                        <form action="{{ route('manager.post.create',['id'=>$community->id])}}" method="POST" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('member.post.create',['id'=>$community->id])}}" method="POST" enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">

                                        <div class="form-group has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}">
                                            <label class="sr-only" for="detail">post</label>
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input class="form-control" id="detail" name="detail" placeholder="What are you thinking?" value="{{ old('detail') }}">
                                            @if ($errors->has('detail'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('detail') }}</strong>
                                            </span>
                                            @endif
                                        </div>



                                        <div class="form-group has-feedback{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" required>
                                                <label class="custom-file-label" for="image">Upload image</label>
                                                @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="py-4"></div>

                                    </div>

                                    <div class="btn-toolbar justify-content-between">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-paper-plane"></i> &ensp;Submit
                                            </button>
                                        </div>


                                        <div class="btn-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}"">
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-globe"></i> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <i class="fa fa-globe-asia"></i> Public
                                                        <input type="hidden" name="status" value="Public">
                                                    </a>

                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <i class="fa fa-lock"></i> Private
                                                        <input type="hidden" name="status" value="Private">
                                                    </a>
                                                </li>

                                            </ul>
                                            @if ($errors->has('status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                            @endif
                                        </div>




                                    </div>

                                </div>
                            </form>
                            <!-- Form end -->
                            @endif
                </div>

            </div>
            <!-- Post /////-->
            <br>
            @foreach($posts as $post)
            <!--- \\\\\\\Post-->
            @if($post->deleted_at == NULL)
            <div class="card gedf-card" id='post'>
                @else
                <div class="card gedf-card " style="opacity: 0.2;">
                    @endif
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    @if ($post->user->photo == NULL)
                                    <img src="{{asset('storage/default.png')}}" alt="Image" class="rounded-circle resposnsive" width="45">
                                    @else
                                    <img src="{{asset('storage/'.$post->user->name.'/'.$post->user->photo)}}" alt="Image" class="rounded-circle resposnsive" width="45">
                                    @endif
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">
                                        <a href="{{route('profile.index',['name'=>$post->user->name,'id'=>$post->user->id])}}" style="color: #685958;">
                                            {{ucfirst($post->user->name)}}
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @if(Auth::guest())

                            @else
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">

                                    <div class="h6 dropdown-header" style="overflow-y: initial/visible;">Settings</div>

                                    @if($post->deleted_at != NULL)
                                    @if(Auth::user()->role == 'admin')
                                    <a class="dropdown-item" onClick="$(this).getElementById('post').fadeOut(800);" href="{{route('admin.post.restore',['id' => $community->id,'postid'=>$post->id])}}">Restore</a>
                                    @else

                                    @endif
                                    @else
                                    @if(Auth::user()->role =='admin')
                                    <a class="dropdown-item" href="{{route('admin.post.edit',['id' => $community->id,'postid'=>$post->id])}}">Edit</a>
                                    <a class="dropdown-item" onClick="$(this).getElementById('post').fadeOut(800,function(){$(this).remove();});" href="{{route('admin.post.delete',['id' => $community->id,'postid'=>$post->id])}}">Delete</a>
                                    @else
                                    <a class="dropdown-item" href="{{route('manager.post.edit',['id' => $community->id,'postid'=>$post->id])}}">Edit</a>
                                    <a class="dropdown-item" onClick="$(this).getElementById('post').fadeOut(800,function(){$(this).remove();});" href="{{route('manager.post.delete',['id' => $community->id,'postid'=>$post->id])}}">Delete</a>
                                    <a class="dropdown-item" href="#">Report</a>
                                    @endif
                                    @endif

                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock"></i>&ensp;{{$post->created_at}}</div>
                        <p class="card-text">
                            {{$post->detail}}
                        </p>


                        <div class="d-flex justify-content-between align-items-center">
                            @if($post->image == NULL)
                            <div>

                            </div>
                            @else
                            <img src="{{asset('storage/post/'.$post->user_id.'/'.$post->image.'/')}}" class="responsive" alt="Image" style="max-width: 490px ; max-height:500px; ">
                            @endif
                        </div>

                    </div>
                    @if(Auth::guest())

                    @else
                    @if($post->deleted_at == NULL)
                    <div class="card-footer bg-white">



                        @if($post->like->user_id?? '' == Auth::user()->id)
                        @if(Auth::user()->role == 'manager')
                        <a href="{{route('manager.unlike.post',['postid' => $post->id])}}" class="card-link"><i class="fas fa-thumbs-up"></i></i> Like&ensp;{{$post->likes->count()}}</a>
                        @elseif((Auth::user()->role == 'admin'))
                        <a href="{{route('admin.unlike.post',['postid' => $post->id])}}" class="card-link"><i class="fas fa-thumbs-up"></i> Like&ensp;{{$post->likes->count()}}</a>
                        @else
                        @endif
                        @else
                        @if(Auth::user()->role == 'manager')
                        <a href="{{route('manager.like.post',['postid' => $post->id])}}" class="card-link"><i class="far fa-thumbs-up"></i> Like&ensp;{{$post->likes->count()}}</a>
                        @elseif(Auth::user()->role =='admin')
                        <a href="{{route('admin.like.post',['postid' => $post->id])}}" class="card-link"><i class="far fa-thumbs-up"></i> Like&ensp;{{$post->likes->count()}}</a>
                        @else
                        <a href="{{route('member.like.post',['postid' => $post->id])}}" class="card-link"><i class="far fa-thumbs-up"></i> Like&ensp;{{$post->likes->count()}}</a>
                        @endif
                        @endif
                        <a href="{{route('login')}}" class="card-link"><i class="fa fa-comment"></i> Comment &ensp;{{$post->comments('id')->count()}}</a>

                    </div>
                    @else

                    @endif
                    @endif
                </div>
                @if($post->deleted_at == NULL)


                <div class="card-body bg-white ">

                    <!-- =======COMMENTS START=======-->
                    <div class="row">
                        <div class="col-12">

                            @foreach($post->comments as $comment)
                            <div class="comment-box-wrapper">
                                <div class="comment-box">

                                    @if ($post->user->photo == NULL)
                                    <img src="{{asset('storage/default.png')}}" alt="Image" class="commenter-image" alt="commenter_image" width="45">
                                    @else
                                    <img src="{{asset('storage/'.$comment->user->name.'/'.$comment->user->photo)}}" alt="Image" class="commenter-image" alt="commenter_image" width="45">
                                    @endif
                                    <div class="comment-content">
                                        <div class="commenter-head"><span class="commenter-name"><a href="">{{ucfirst($comment->user->name)}}</a></span> <span class="comment-date"><i class="far fa-clock"></i>{{$comment->created_at}}</span></div>
                                        <div class="comment-body">
                                            <span class="comment">{{$comment->comment_detail}}</span>
                                        </div>
                                        <div>
                                            @if($comment->comment_image == NULL)
                                            <div></div>
                                            @else
                                            <img src="{{asset('storage/comment/post/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                            @endif
                                        </div>
                                        <div class="comment-footer">
                                            <span class="comment-likes">55 <a href="" class="comment-action active"> <i class="far fa-heart"></i></a></span> <span class="comment-reply">66 <a href="" class="comment-action">Replies</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                    </div>

                    <!--====COMMENT AREA START====-->
                    <div class="row">
                        <div class="col-12">
                            @if(Auth::user()->role == 'admin')
                            <form action="{{route('admin.comment.create',['postid' => $post->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @endif
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <label class="btn btn-file camera">
                                            <i class="fa fa-camera" style="margin-top:10px;"></i>
                                            <input type="file" name="comment_image" style="display: none;" />
                                        </label>

                                    </span>
                                    <input class="form-control" name="comment_detail" placeholder="Write your comment here">
                                    <span class="input-group-addon">
                                        <button type="submit" class="btn  comment-btn " style="height: 100%;">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </span>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>

                @else

                @endif

                <br>
                <!-- Post /////-->
                @endforeach
                {{$posts->links()}}
            </div>

        </div>
    </div>
</div>
@endsection