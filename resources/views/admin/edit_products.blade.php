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
                <div class="panel panel-danger">
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => ['AdminController@update', $product->id], 'method' => 'POST']) !!}
                        {{--<form action="/update/{{ $product->id }}" method="POST">--}}
                            {{--{{ csrf_field() }}--}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $product->description }}" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="imagepath">Image Path</label>
                                <input type="text" name="imagepath" class="form-control" value="{{ $product->imagepath }}" required>
                            </div>
                            {{ Form::hidden('_method', 'PUT')}}
                            {{ Form::submit('Save changes', ['class' => 'btn btn-success']) }}
                            {!! Form::close() !!}
                        <br>
                        <a style="margin-left: -13px;" href="/product" class="btn btn-link">BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection