@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <h1>WELCOME {{Auth::user()->name}}</h1>

        <h3>Let's review and confirm your Category before add to the website</h3>

        <h3 style="color: red;"><b>Don't worry the information here can only be seen by you !</b></h3>

        <div class="container">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light">Confirm Edit Category</h4>
                    </div>

                    <div class="modal-body">

                        <form action="{{ route('admin.category.create', ['name' => Auth::user()->name])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Name</label>
                                <p>{{$category->name}}</p>
                            </div>

                            <div class="form-group">
                            <label for="title">Detail</label>
                                <p>{{$category->detail}}</p>
                            </div>

                            <div class="form-group">
                                <input type="submit" style="background-color: green; color: black;">
                                <input type="button" onclick=" window.history.go(-1)" style="background-color: red; color: black;" value="Cancel">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection