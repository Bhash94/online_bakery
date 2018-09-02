@extends('layouts.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                            <div id="charge-message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="panel panel-warning">
                    <div class="panel-heading">Add a Product</div>
                    <div class="panel-body">
                        <form action="/product" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="imagepath">Image Path</label>
                                <input type="text" name="imagepath" class="form-control" required>
                            </div>
                            <input type="submit" value="add" class="btn btn-primary">
                        </form>
                        <br>
                        <a style="margin-left: -13px;" href="/product" class="btn btn-link  ">View Product List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection