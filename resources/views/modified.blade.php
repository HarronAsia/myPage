<div class="container">
    <div class="row">
        <li class="list-group-item">
            <div class="bg-danger text-dark">
                @if(Auth::user()->role == 'admin')
                <div class="col-md-4">
                    <a href="{{ route('admin.category.add',['name' => Auth::user()->name])}}">
                        <button type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add Category</button>
                    </a>
                </div>
                @else

                @endif
                @foreach($categories as $category)
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <div class="media-body">
                                        @if(Auth::guest())
                                        <a href="{{ route('category.index', ['id'=> $category->id])}}">
                                            @elseif(Auth::user()->role == 'manager')
                                            <a href="{{ route('manager.category.index', ['id'=> $category->id])}}">
                                                @elseif(Auth::user()->role == 'admin')
                                                <a href="{{ route('admin.category.index', ['id'=> $category->id])}}">
                                                    @else
                                                    <a href="{{ route('member.category.index', ['id'=> $category->id])}}">
                                                        @endif
                                                        <h1 class="mt-0 mb-1"> {{$category->name}}</h1>
                                                    </a>
                                                    @if(Auth::user()->role== 'admin')
                                                    @if($category->deleted_at != NULL)
                                                    <div class="pull-right">
                                                        <a href="{{ route('admin.category.restore', ['id'=> $category->id])}}">
                                                            <button type="button" class="btn btn-success btn-lg">
                                                                <i class="fa fa-undo"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div class="pull-right">
                                                        <a href="{{ route('admin.category.edit', ['id'=> $category->id])}}">
                                                            <button type="button" class="btn btn-info btn-lg">
                                                                <i class="fa fa-edit">&nbsp;&nbsp;</i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a href="{{ route('admin.category.delete', ['id'=> $category->id])}}">
                                                            <button type="button" class="btn btn-danger btn-lg">
                                                                <i class="fa fa-trash">&nbsp;&nbsp;</i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                    @endif
                                                    @else

                                                    @endif
                                                    <p>{{$category->detail}}</p>
                                    </div>
                                </li>

                                @foreach($category->forums as $forum)
                                <li class="media spacer">
                                    <div class="media-body">
                                        @if(Auth::guest())
                                        <a href="{{ route('forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                            @elseif(Auth::user()->role == 'manager')
                                            <a href="{{ route('manger.forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                                @elseif(Auth::user()->role == 'admin')
                                                <a href="{{ route('admin.forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                                    @else
                                                    <a href="{{ route('member.forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                                        @endif

                                                        <h5 class="mt-0 mb-1">{{$forum->title}}</h5>
                                                    </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </li>
    </div>
</div>