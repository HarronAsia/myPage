@extends('layouts.app')

@section('content')
<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Comments </h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Where</th>
                        <th scope="col">Created At </th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($comments as $comment)
                    <tr>
                        <th scope="row">{{$comment->id}}</th>
                        <td>{{$comment->comment_detail}}</td>
                        <td>{{$comment->commentable_type}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>{{$comment->updated_at}}</td>
                        <td>{{$comment->deleted_at}}</td>

                        <td>
                            @if($comment->comment_image == NULL)
                            <img src="{{asset('storage/blank.png')}}" alt="Image" style="max-width: 200px ; max-height:200px;">
                            @else
                                @if($comment->commentable_type == 'App\Post')
                                <img src="{{asset('storage/comment/post/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                @else
                                <img src="{{asset('storage/comment/thread/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                @endif
                            @endif
                        </td>

                        @if($comment->deleted_at != NULL)
                        <td>
                            <a href="{{route('comments.admin.restore',['commentid'=>$comment->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800)" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>

                        @else
                        <td>
                            <a href="{{route('comments.admin.edit',['commentid'=>$comment->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('comments.admin.delete',['commentid'=>$comment->id])}}">
                                <button type="button"  onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" class="btn btn-danger btn-lg">
                                    <i class="fa fa-trash"></i>
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
        {{$comments->links()}}
    </div>
</main>

@endsection