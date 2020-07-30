@extends('layouts.app')

@section('content')

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Forums</h4>
        </div>

        <div class="card">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At </th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forums as $forum)
                    <tr>
                        <th scope="row">{{$forum->id}}</th>
                        <td>{{$forum->title}}</td>
                        <td>{{$forum->created_at}}</td>
                        <td>{{$forum->updated_at}}</td>
                        <td>{{$forum->deleted_at}}</td>

                        @if($forum->deleted_at != NULL)
                        <td>
                            <a href="{{ route('forums.admin.restore', ['forumid'=> $forum->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800)" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>

                        @else
                        <td>
                            <a href="{{ route('forums.admin.edit', ['forumid'=> $forum->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit"></i></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('forums.admin.delete', ['forumid'=> $forum->id])}}">
                                <button class="btn btn-danger" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" type="button">
                                    <i class="fa fa-trash"></i></i></i>
                                </button>
                            </a>
                        </td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Large modal -->
        {{$forums->links()}}
    </div>
</main>

@endsection