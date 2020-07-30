@extends('layouts.app')

@section('content')

<div class="container-fluid ">
    <div class="row justify-content-center">

        <main>
            <div class="container my-5">
                <div class="card-body text-center">
                    <h4 class="card-title">All Threads by Managers</h4>

                    <a href="{{ route('admin.tag.add')}}" style="color: white;">
                        <button type="button" class="btn btn-success btn-lg">
                            <i class="fa fa-plus"></i></i> Add Tag
                        </button>
                    </a>
                </div>

                <div class="card">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At </th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Deleted At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <th scope="row">{{$tag->id}}</th>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->created_at}}</td>
                                <td>{{$tag->updated_at}}</td>
                                <td>{{$tag->deleted_at}}</td>

                                @if($tag->deleted_at != NULL)
                                <td>
                                    <a href="{{ route('admin.tag.restore', ['id'=> $tag->id])}}">
                                        <button type="button" onClick="$(this).closest('tr').fadeOut(800);" class="btn btn-success btn-lg">
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </a>
                                </td>

                                @else
                                <td>
                                    <a href="{{ route('admin.tag.edit', ['id'=> $tag->id])}}">
                                        <button type="button" class="btn btn-info btn-lg">
                                            <i class="fa fa-edit"></i></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.tag.delete', ['id'=> $tag->id])}}">
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
                {{$tags->links()}}
            </div>
        </main>

    </div>

</div>

@endsection