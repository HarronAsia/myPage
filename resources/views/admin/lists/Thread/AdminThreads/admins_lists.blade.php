@extends('layouts.app')

@section('content')
<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Threads by Admins</h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                        <th scope="col">Created At </th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($threads as $thread)
                    <tr>
                        <th scope="row">{{$thread->id}}</th>
                        <td>{{$thread->title}}</td>
                        <td>{{$thread->detail}}</td>
                        <td>{{$thread->status}}</td>
                        <td>{{$thread->count_id}}</td>
                        <td>{{$thread->created_at}}</td>
                        <td>{{$thread->updated_at}}</td>
                        <td>{{$thread->deleted_at}}</td>
                        <td>
                            @if ($thread->thumbnail == NULL)
                            <img src="{{asset('storage/blank.png')}}" alt="Image" style="width:200px ;height:200px;">
                            @else
                            <img src="{{asset('storage/thread/'.$thread->title.'/'.$thread->thumbnail.'/')}}" alt="Image" style="width:200px ;height:200px;">
                            @endif
                        </td>

                        @if($thread->deleted_at != NULL)
                        <td>
                            <a href="{{ route('admins.threads.restore', ['threadid' =>$thread->id])}}">
                                <button type="button" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>

                        @else
                        <td>
                            <a href="{{ route('admins.threads.edit', ['threadid' =>$thread->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit"></i></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admins.threads.delete', ['threadid' =>$thread->id])}}">
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
        {{$threads->links()}}
    </div>
</main>

@endsection