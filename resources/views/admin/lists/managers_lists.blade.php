@extends('layouts.app')

@section('content')
<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Managers</h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password </th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td> {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td> {{$user->password}}</td>
                        <td>{{$user->dob}}</td>
                        <td> {{$user->number}}</td>
                        <td>
                            @if ($user->photo == NULL)
                            <img src="{{asset('storage/default.png')}}" alt="Image" style="width:150px ;height:150px;">
                            @else
                            <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width:150px ;height:150px;">
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-info ">
                                <a class="btn btn-sm btn-primary" href="{{route('manager.edit',['id'=>$user->id])}}"><i class="fa fa-edit"></i> </a>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" type="button">
                                <a href="{{route('manager.delete',['id'=>$user->id])}}"> <i class="fa fa-trash"></i></a>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Large modal -->
        {{$users->links()}}
    </div>
</main>

@endsection