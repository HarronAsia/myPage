@extends('layouts.app')

@section('content')
<style>
    .demo {
        background-color: #e7e7e7;
    }

    .box {
        font-family: 'Roboto', sans-serif;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }

    .box:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .box .curve1 {
        opacity: 0;
        position: absolute;
        right: -2px;
        top: -100%;
        z-index: 1;
        transition: all 0.3s ease-in-out;
    }

    .box:hover .curve1 {
        opacity: 1;
        top: -1%;
    }

    .box path {
        fill: rgba(255, 255, 255, 0.8);
    }

    .box img {
        width: 100%;
        height: auto;
        transition: all 0.3s ease 0s;
    }

    .box:hover img {
        filter: blur(2px) grayscale(100%);
    }

    .box .box-content {
        color: #FC427B;
        text-align: right;
        width: 100%;
        height: 100%;
        position: absolute;
        right: 15px;
        top: 15px;
        z-index: 2;
    }

    .box .title {
        font-size: 22px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin: 0;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.5s ease 0.2s;
    }

    .box .post {
        color: #000;
        font-size: 14px;
        letter-spacing: 1px;
        text-transform: capitalize;
        margin: 0 2px 5px 0;
        opacity: 0;
        display: block;
        transform: translateX(-20%);
        transition: all 0.5s ease 0.2s;
    }

    .box .icon {
        list-style: none;
        text-align: right;
        padding: 0;
        margin: 0;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.5s ease 0.2s;
    }

    .box:hover .title,
    .box:hover .post,
    .box:hover .icon {
        opacity: 1;
        transform: translateX(0);
    }

    .box .icon li {
        margin: 0 2px;
        display: inline-block;
    }

    .box .icon li {
        margin-left: 20px;
    }

    .box .curve2 {
        opacity: 0;
        position: absolute;
        left: -2px;
        bottom: -100%;
        transition: all 0.3s ease-in-out;
    }

    .box:hover .curve2 {
        opacity: 1;
        bottom: -2px;
    }

    @media only screen and (max-width:990px) {
        .box {
            margin-bottom: 30px;
        }
    }

    @media only screen and (max-width:479px) {
        .box .title {
            font-size: 18px;
        }
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center" style="background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">

        @if(Auth::guest())

        @else
        @if(Auth::user()->role == 'admin')
        <a href="{{ route('admin.community.add')}}" style="float: right;">
            <button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i>&ensp;Add Community</button>
        </a>
        @else

        @endif
        @endif

        @foreach($communities as $community)

        @if(Auth::guest())
        <a href="{{ route('manager.community.show',['id' => $community->id])}}">
            @else

            @if(Auth::user()->role == 'manager')
            <a href="{{ route('manager.community.show',['id' => $community->id])}}">
                @elseif(Auth::user()->role == 'admin')
                <a href="{{ route('admin.community.show',['id' => $community->id])}}">
                    @else
                    <a href="{{ route('member.community.show',['id' => $community->id])}}">
                        @endif
                        @endif
                        @if($community->deleted_at == NULL)
                        <div class="col-md-4 col-sm-6">
                            <div class="box">
                                <svg class="curve1" x="0px" y="0px" viewBox="0 0 400 200">
                                    <path d="M398.938,143.806c-24.004,26.063-155.373,104.33-224.724,7.328 C69.626,4.846,0.5,71.583,0.5,71.583V1.5h398.629L398.938,143.806z"></path>
                                </svg>

                                @if($community->banner != NULL)
                                <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner.'/')}}" alt="Image" style="width:200px ;height:200px;">
                                @else
                                <img src="{{asset('storage/blank.png')}}" alt="Image" style="width:200px ;height:200px;">
                                @endif


                                <div class="box-content">
                                    <h3 class="title"> {{$community->title}}</h3>
                                    <span class="post">{{$community->created_at}}</span>
                                    @if(Auth::user()->role == 'admin')
                                    @if($community->deleted_at != NULL)
                                    <ul class="icon">
                                        <li>
                                            <a href="{{route('admin.community.restore',['id' => $community->id])}}">
                                                <button type="button" class="btn btn-success btn-lg">
                                                    <i class="fa fa-undo"></i>
                                                </button>
                                            </a>
                                        </li>
                                    </ul>
                                    @else
                                    <ul class="icon">
                                        <li>
                                            <a href="{{route('admin.community.edit',['id' => $community->id])}}">
                                                <button type="button" class="btn btn-info btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.community.delete',['id' => $community->id])}}">
                                                <button type="button" class="btn btn-danger btn-lg">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </li>
                                    </ul>
                                    @endif

                                    @else

                                    @endif
                                </div>
                                <svg class="curve2" x="0px" y="0px" width="150px" height="150px" viewBox="0 0 150 50">
                                    <path d="M1.114,7.567C87.544-33.817,150,150.5,150,150.5H1.361L1.114,7.567z"></path>
                                </svg>
                            </div>
                        </div>
                        @else

                        @endif
                    </a>

                    @endforeach

    </div>
    {{ $communities->links() }}
</div>
@endsection