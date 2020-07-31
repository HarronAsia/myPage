@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

        <header>
            <h1> <i class="fa fa-envelope"></i>&ensp;All Unread Messages</h1>
        </header>

        <div class="pull-right">
            <a href="{{ route('notification.read.all')}}">
                <button class="btn btn-danger">
                    Read All
                </button>
            </a>
        </div>
        
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allnotifications as $singlenotification)
                <tr>
                    <th scope="row">{{json_decode($singlenotification->data)->data}}</td>
                    <td>{{$singlenotification->created_at}}</td>
                    <td>
                        <a href="{{ route('notification.read', ['id'=> $singlenotification->id])}}">
                            <button class="btn btn-danger">
                                &times;
                            </button>
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection