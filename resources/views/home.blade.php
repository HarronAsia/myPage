@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1>Harron.vm</h1>

        @if(Auth::guest())

        @foreach($categories as $category)
        <ol class="list-group">
            <li class="list-group-item">
                <div class="bg-danger text-dark">
                    <dl>

                        <div style="font-size: 25px;">
                            <dt>
                                <a href="{{ route('category.index', ['id'=> $category->id])}}">
                                    {{$category->name}}
                                </a>
                            </dt>
                        </div>

                        <dd style="font-size: 15px;">&nbsp;&nbsp;{{$category->detail}}</dd>
                    </dl>
                    <ol class="list-group">
                        @foreach($category->forums as $forum)
                        <li class="list-group-item">
                            <div>
                                <a href="{{ route('forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                    <h4>{{$forum->title}}</h4>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>

            </li>
        </ol>
        @endforeach
        @else
        <ol class="list-group">
            @if(Auth::user()->role == 'admin')
            <div class="text-right">
                <a href="{{ route('admin.category.add',['name' => Auth::user()->name])}}">
                    <button type="button" class="btn btn-primary" style="background-color: #D9A9BB; color:black; border:none;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add Category</button>
                </a>
            </div>
            @else

            @endif
            @foreach($categories as $category)

            <li class="list-group-item">
                <div style="background-color: #F2BDD0;;">

                    @if(Auth::user()->role == 'manager')
                    <a href="{{ route('manager.category.index', ['id'=> $category->id])}}" style="font-size: 25px; color: #012615;">
                        @elseif(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.category.index', ['id'=> $category->id])}}" style="font-size: 25px;color: #012615;">
                            @else
                            <a href="{{ route('member.category.index', ['id'=> $category->id])}}" style="font-size: 25px;color: #012615;">
                                @endif
                                &nbsp;&nbsp;{{$category->name}}
                            </a>
                            @if($category->deleted_at != NULL)

                            <a href="{{ route('admin.category.restore', ['id'=> $category->id])}}">
                                <button type="button" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>

                            @else

                            <a href="{{ route('admin.category.edit', ['id'=> $category->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit">&nbsp;&nbsp;</i>
                                </button>
                            </a>

                            <a href="{{ route('admin.category.delete', ['id'=> $category->id])}}">
                                <button type="button" class="btn btn-danger btn-lg">
                                    <i class="fa fa-trash">&nbsp;&nbsp;</i>
                                </button>
                            </a>

                            @endif

                            <p style="font-size: 15px; color: #012615;">&nbsp;&nbsp;{{$category->detail}}</p>
                </div>

                @foreach($category->forums as $forum)
                <ol class="list-group">
                    <li class="list-group-item">
                        @if(Auth::user()->role == 'manager')
                        <a href="{{ route('manger.forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                            @elseif(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                @else
                                <a href="{{ route('member.forum.show', ['categoryid'=> $category->id,'forumid' => $forum->id])}}">
                                    @endif
                                    <h4>{{$forum->title}}</h4>
                                </a>
                    </li>
                </ol>
                @endforeach
            </li>
            @endforeach
        </ol>

        @endif
    </div>
</div>

{{ $categories->links() }}






@endsection