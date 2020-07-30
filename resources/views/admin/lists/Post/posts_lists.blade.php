@extends('layouts.app')

@section('content')
<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Posts </h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Detail</th>
                        <th scope="col">From User ID</th>
                        <th scope="col">From Community ID</th>
                        <th scope="col">Created At </th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->detail}}</td>
                        <td>{{$post->user_id}}</td>
                        <td>{{$post->community_id}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>{{$post->deleted_at}}</td>
                        <td>
                            @if($post->image == NULL)
                            <img src="{{asset('storage/blank.png')}}" alt="Image">
                            @else
                            <img src="{{asset('storage/post/'.$post->user_id.'/'.$post->image.'/')}}" alt="Image" style="max-width: 200px ; max-height:200px;">
                            @endif
                        </td>

                        @if($post->deleted_at != NULL)
                        <td>
                            <a href="{{ route('posts.admin.restore', ['postid'=> $post->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800)" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>

                        @else
                        <td>
                            <a href="{{ route('posts.admin.edit', ['postid'=> $post->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit"></i></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('posts.admin.delete', ['postid'=> $post->id])}}">
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
        {{$posts->links()}}
    </div>
</main>

@endsection