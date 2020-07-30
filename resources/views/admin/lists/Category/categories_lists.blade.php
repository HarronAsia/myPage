@extends('layouts.app')

@section('content')

<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Categories </h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>

                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Created At </th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->detail}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>{{$category->deleted_at}}</td>

                        @if($category->deleted_at != NULL)
                        <td>
                            <a href="{{ route('categories.admin.restore', ['categoryid'=> $category->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800)" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>

                        @else
                        <td>
                            <a href="{{ route('categories.admin.edit', ['categoryid'=> $category->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit"></i></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('categories.admin.delete', ['categoryid'=> $category->id])}}">
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
        {{$categories->links()}}
    </div>
</main>


@endsection