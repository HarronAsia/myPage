@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="container">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light">Add Category</h4>
                    </div>

                    <div class="modal-body">

                        <form action="{{ route('admin.category.create.confirm', ['name' => Auth::user()->name])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Name" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="detail" class="form-control form-control-lg" placeholder="Enter Detail" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" style="background-color: green; color: black;">
                                <input type="reset" style="background-color: yellow; color: black;">
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