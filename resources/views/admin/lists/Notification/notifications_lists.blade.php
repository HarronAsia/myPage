@extends('layouts.app')

@section('content')
<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Notifications </h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Notification Type</th>
                        <th scope="col">Where</th>
                        <th scope="col">ID</th>
                        <th scope="col">Data At </th>
                        <th scope="col">Created At</th>
                        <th scope="col">Read At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Allnotifications as $singlenotification)
                    <tr>
                        <td>{{$singlenotification->id}}</td>
                        <td>{{$singlenotification->type}}</td>
                        <th>{{$singlenotification->notifiable_type}}</th>
                        <th>{{$singlenotification->notifiable_id}}</th>
                        <td>{{json_decode($singlenotification->data)->data}}</td>
                        <td>{{$singlenotification->created_at}}</td>
                        <td>{{$singlenotification->read_at}}</td>
                        <td>
                            <a href="{{ route('admin.notification.delete', ['id'=> $singlenotification->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" class="btn btn-danger btn-lg">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Large modal -->
        {{$Allnotifications->links()}}
    </div>
</main>

@endsection