@extends('layouts.app')

@section('content')
<!---->

<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title">All Reports </h4>
        </div>

        <div class="card">
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Where</th>
                        <th scope="col">Created At </th>
                        <th scope="col">Last Updated</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <th scope="row">{{$report->id}}</th>
                        <td>{{$report->reason}}</td>
                        <th>{{$report->detail}}</th>
                        <th>{{$report->reportable_type}}</th>
                        <td>{{$report->created_at}}</td>
                        <td>{{$report->updated_at}}</td>
                        <td>{{$report->deleted_at}}</td>
                        @if($report->deleted_at != NULL)
                        <td>
                            <a href="{{ route('admin.report.delete', ['id'=> $report->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800);" class="btn btn-success btn-lg">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </a>
                        </td>
                        @else
                        <td>
                            <a href="{{ route('admin.notification.delete', ['id'=> $singlenotification->id])}}">
                                <button type="button" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" class="btn btn-danger btn-lg">
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
        {{$reports->links()}}
    </div>
</main>

@endsection