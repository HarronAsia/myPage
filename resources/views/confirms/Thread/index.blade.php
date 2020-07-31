@extends('layouts.app')
<style>
    .navbar {
        margin-bottom: 0;
    }

    section {
        width: 100%;
        float: left;
    }

    .banner-section {
        background-image: url("https://static.pexels.com/photos/373912/pexels-photo-373912.jpeg");
        background-size: cover;
        height: 500px;
        left: 0;
        position: absolute;
        top: 0;
        background-position: 0;
    }

    .post-title-block {
        padding: 100px 0;
    }

    .post-title-block h1 {
        color: #fff;
        font-size: 85px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .post-title-block li {
        font-size: 20px;
        color: #fff;
    }

    .image-block {
        float: left;
        width: 100%;
        margin-bottom: 10px;
    }

    .footer-link {
        float: left;
        width: 100%;
        background: #222222;
        text-align: center;
        padding: 30px;
    }

    .footer-link a {
        color: #A9FD00;
        font-size: 18px;
        text-transform: uppercase;
    }
</style>
@section('content')
<div class="container-fluid">
    @foreach($thread as $value)
    <section class="banner-section">
        @if($value->thumbnail == NULL)
        <img src="{{asset('storage/blank.png')}}" alt="Image" class="thread-thumbnail">
        @else
        <img src="{{asset('storage/thread/'.$value->title.'/'.$value->thumbnail.'/')}}" alt="Image" class="thread-thumbnail">
        @endif
    </section>
    <section class="post-content-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">

                    <h1 class="text-center">{{$value->title}}</h1>
                    <ul class="list-inline text-center">
                        @if(Auth::guest())
                        <li>
                            by Author |
                            <a href="{{ route('profile.index', ['id' => $user->id,'name' =>$user->name ])}}">{{$user->name}}</a>

                        </li>
                        @else
                        @if( Auth::user()->id == $value->user_id)
                        <li>
                            by Author |
                            {{$user->name}}

                        </li>
                        @else
                        <li>
                            by Author |
                            <a href="{{ route('profile.index', ['id' => $user->id,'name' =>$user->name ])}}">{{$user->name}}</a>
                        </li>
                        @endif
                        @endif
                        <li>
                            Category | {{$tag->name}}
                        </li>
                        <li>
                            Views: |{{$value->count_id}}
                        </li>
                        <li>Date | {{$value->created_at}}</li>
                    </ul>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <p>{{$value->detail}}</p>

                </div>

            </div>
        </div> <!-- /container -->
    </section>

    <div>

        <div>
            <div>
                @if(Auth::guest())
                <a href="{{route('login')}}" style="color: crimson;">
                    <button class="like"> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>Like</span>&ensp;{{$value->likes->count()}}</button>
                </a>

                <i class="fa fa-commenting-o" aria-hidden="true"></i><span>Comment
                    {{$value->comments('id')->count()}}</span>

                <a href="{{route('thread.report.create',['threadid' => $value->id])}}" style="color: blue;">
                    <button> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>Report</span></button>
                </a>
                @else

                @if($value->like->user_id?? '' == Auth::user()->id)
                @if(Auth::user()->role == 'manager')
                <a href="{{route('manager.unlike.post.thread',['threadid' => $value->id])}}" style="color: crimson;">
                    <button class="like"> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>UnLike</span>&ensp;{{$value->likes->count()}}</button>
                </a>
                @elseif(Auth::user()->role == 'admin')
                <a href="{{route('admin.unlike.post.thread',['threadid' => $value->id])}}" style="color: crimson;">
                    <button class="like"> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>UnLike</span>&ensp;{{$value->likes->count()}}</button>
                </a>
                @else
                <button class="like"> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>Like</span>&ensp;{{$value->likes->count()}}</button>
                @endif


                @else
                @if(Auth::user()->role == 'manager')
                <a href="{{route('manager.like.post.thread',['threadid' => $value->id])}}" style="color: green;">
                    @elseif(Auth::user()->role == 'admin')
                    <a href="{{route('admin.like.post.thread',['threadid' => $value->id])}}" style="color: green;">
                        @else
                        <a href="{{route('member.like.post.thread',['threadid' => $value->id])}}" style="color: green;">
                            @endif
                            <button class="like"> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>Like</span>&ensp;{{$value->likes->count()}}</button>
                        </a>
                        @endif
                        <i class="fa fa-commenting-o" aria-hidden="true"></i><span>Comment
                            {{$value->comments('id')->count()}}</span>
                        @if(Auth::user()->role == 'manager')
                        <a href="{{route('thread.report.create',['threadid' => $value->id])}}" style="color: blue;">
                            <button> <i class="fa fa-heart" aria-hidden="true"></i>&ensp;<span>Report</span></button>
                        </a>
                        @else

                        @endif
                        @endif
            </div>
        </div>
        @if(Auth::guest())
        <div>
            <a href="{{route('login')}}">
                <p>
                    Đăng nhập để comment !!!!
                </p>
            </a>
        </div>
        @else
        <div>
            @if(Auth::user()->email_verified_at == NULL)

            @else
            @if(Auth::user()->role == 'manager')
            <form action="{{route('manager.comment.create.thread',['threadid' => $value->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name='comment_detail' placeholder="Your Comment">
                </div>
                <div class="form-group">

                    <img id="image_preview_container2" src="{{asset('storage/blank.png')}}" alt="preview Banner" style="max-width: 200px ; max-height:200px;">
                    <div>
                        <label for="comment_image">Upload Your image</label>
                        <input type="file" class="form-control" name="comment_image" id="comment_image_thread">
                    </div>
                </div>
                <input type="submit" class="form-control form-control-lg" class="btn btn-success btn-block btn-lg">
            </form>
            @elseif (Auth::user()->role == 'admin')
            <form action="{{route('admin.comment.create.thread',['threadid' => $value->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name='comment_detail' placeholder="Your Comment">
                </div>
                <div class="form-group">

                    <img id="image_preview_container2" src="{{asset('storage/blank.png')}}" alt="preview Banner" style="max-width: 200px ; max-height:200px;">
                    <div>
                        <label for="comment_image">Upload Your image</label>
                        <input type="file" class="form-control" name="comment_image" id="comment_image">
                    </div>
                </div>
                <input type="submit" class="form-control form-control-lg" class="btn btn-success btn-block btn-lg">
            </form>
            @else
            <form action="{{route('member.comment.create.thread',['threadid' => $value->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name='comment_detail' placeholder="Your Comment">
                </div>
                <div class="form-group">

                    <img id="image_preview_container2" src="{{asset('storage/blank.png')}}" alt="preview Banner" style="max-width: 200px ; max-height:200px;">
                    <div>
                        <label for="comment_image">Upload Your image</label>
                        <input type="file" class="form-control" name="comment_image" id="comment_image">
                    </div>
                </div>
                <input type="submit" class="form-control form-control-lg" class="btn btn-success btn-block btn-lg">
            </form>
            @endif
            @endif
        </div>
        @endif

        <hr>

        <!-- Comments sections -->
        <div class="container">
            <h2 class="text-center">Comments <span>{{$value->comments('id')->count()}}</span></h2>

            @foreach($value->comments as $comment)
            @if(Auth::guest())
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                            <p class="text-secondary text-center">15 Minutes Ago</p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                            </p>
                            <div class="clearfix"></div>
                            <p>{{$comment->comment_detail}}</p>
                            <p>
                                <a href="#" class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>

                                <a href="{{route('login')}}" class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p>
                                <div class="flex-grow-1 pl-2">
                                    <a class="text-decoration-none" href="#">
                                        <h2 class="text-capitalize h5 mb-0">Shushant Singh</h2>
                                    </a>
                                    <p class="small text-secondary m-0 mt-1">1 day ago</p>
                                </div>
                            </p>

                            <div class="clearfix"></div>
                            <p>{{$comment->comment_detail}}</p>
                            <p>
                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                @if($value->like->user_id?? '' == Auth::user()->id)
                                @if(Auth::user()->role == 'manager')
                                <a href="{{route('manager.unlike.post.thread',['threadid' => $value->id])}}" class="float-right btn text-white btn-danger">
                                    <i class="fa fa-heart"></i> Unlike&ensp;{{$value->likes->count()}}
                                </a>
                                @elseif(Auth::user()->role == 'admin')
                                <a href="{{route('admin.unlike.post.thread',['threadid' => $value->id])}}" class="float-right btn text-white btn-danger">
                                    <i class="fa fa-heart"></i> Unlike&ensp;{{$value->likes->count()}}
                                </a>
                                @else

                                @endif

                                @else
                                @if(Auth::user()->role == 'manager')
                                <a href="{{route('manager.like.post.thread',['threadid' => $value->id])}}" class="float-right btn text-white btn-danger">
                                    @elseif(Auth::user()->role == 'admin')
                                    <a href="{{route('admin.like.post.thread',['threadid' => $value->id])}}" class="float-right btn text-white btn-danger">
                                        @else
                                        <a href="{{route('member.like.post.thread',['threadid' => $value->id])}}" class="float-right btn text-white btn-danger">
                                            @endif
                                            <i class="fa fa-heart"></i> like&ensp;{{$value->likes->count()}}
                                        </a>
                                        @endif
                                        @if(Auth::user()->role !='admin')
                                        <a href="{{route('thread.report.create',['threadid' => $value->id])}}" class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Report</a>
                                        @else

                                        @endif
                            </p>
                            <p>
                                @if($comment->comment_image == NULL)
                                <img src="{{asset('storage/blank.png')}}" alt="Image" style="max-width: 200px ; max-height:200px;">
                                @else
                                <img src="{{asset('storage/comment/thread/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown">
                                <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-chevron-down"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @if($comment->deleted_at != NULL)
                                    @if( Auth::user()->role == 'admin')
                                    <a class="dropdown-item text-primary" href="{{route('admin.comment.restore.thread',['threadid' => $value->id,'commentid'=>$comment->id])}}">
                                        <button type="button" class="btn btn-success btn-lg">
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </a>
                                    @else

                                    @endif
                                    @else
                                    @if(Auth::user()->role == 'admin')
                                    <a class="dropdown-item text-primary" href="{{route('admin.comment.edit.thread',['threadid' => $value->id,'commentid'=>$comment->id])}}">
                                        @else
                                        <a class="dropdown-item text-primary" href="{{route('manager.comment.edit.thread',['threadid' => $value->id,'commentid'=>$comment->id])}}">
                                            @endif
                                            <button type="button" class="btn btn-info btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        @if(Auth::user()->role =='admin')
                                        <a class="dropdown-item text-primary" href="{{route('admin.comment.delete.thread',['threadid' => $value->id,'commentid'=>$comment->id])}}">
                                            @else
                                            <a class="dropdown-item text-primary" href="{{route('admin.comment.delete.thread',['threadid' => $value->id,'commentid'=>$comment->id])}}">
                                                @endif
                                                <button type="button" class="btn btn-danger btn-lg">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            @endif


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
            @endforeach
        </div>
        <!-- Comment Section -->
    </div>

    @endforeach
</div>
@endsection