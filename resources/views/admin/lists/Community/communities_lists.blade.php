@extends('layouts.app')

@section('content')

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Communitite</h4>
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
                        <th scope="col">Banner</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($communities as $community)
                    <tr>
                        <th scope="row">{{$community->id}}</th>
                        <td>{{$community->title}}</td>
                        <td>{{$community->created_at}}</td>
                        <td>{{$community->updated_at}}</td>
                        <td>{{$community->deleted_at}}</td>
                        <td>
                            @if($community->banner != NULL)
                            <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner.'/')}}" alt="Image" style="width:200px ;height:200px;">
                            @else
                            <img src="{{asset('storage/blank.png')}}" alt="Image" style="width:200px ;height:200px;">
                            @endif
                        </td>
                        <td>
                            @if($community->deleted_at != NULL)
                        <td>
                            <a href="{{ route('communities.admin.restore', ['communityid'=> $community->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800)" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>

                        @else
                        <td>
                            <a href="{{ route('communities.admin.edit', ['communityid'=> $community->id])}}">
                                <button type="button" class="btn btn-info btn-lg">
                                    <i class="fa fa-edit"></i></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('communities.admin.delete', ['communityid'=> $community->id])}}">
                                <button class="btn btn-danger" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" type="button">
                                    <i class="fa fa-trash"></i></i></i>
                                </button>
                            </a>
                        </td>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Large modal -->
        {{$communities->links()}}
    </div>
</main>

@endsection