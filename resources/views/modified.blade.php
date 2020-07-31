<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container-fluid">
    <div class="row justify-content-center">
        @if(Auth::guest())

        @else
        @if(Auth::user()->role == 'admin')
        <a href="{{ route('admin.community.add')}}">
            <button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i>&ensp;Add Community</button>
        </a>
        @else

        @endif
        @endif

        @foreach($communities as $community)
        <div class="col-md-4 col-sm-6">
            <div class="box">
                <svg class="curve1" x="0px" y="0px" viewBox="0 0 400 200">
                    <path d="M398.938,143.806c-24.004,26.063-155.373,104.33-224.724,7.328 C69.626,4.846,0.5,71.583,0.5,71.583V1.5h398.629L398.938,143.806z"></path>
                </svg>
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
                            @if($community->banner != NULL)
                            <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner.'/')}}" alt="Image" style="width:200px ;height:200px;">
                            @else
                            <img src="{{asset('storage/blank.png')}}" alt="Image" style="width:200px ;height:200px;">
                            @endif
                        
                        </a>
                        <div class="box-content">
                            <h3 class="title"> {{$community->title}}</h3>
                            <span class="post">{{$community->created_at}}</span>
                            @if(Auth::user()->role == 'admin')
                            @if($community->deleted_at == NULL)
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
        @endforeach
        {{ $communities->links() }}

    </div>
</div>