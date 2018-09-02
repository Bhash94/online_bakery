@extends('layouts.master')

@section('title')
    Admin Home
@endsection

@section('content')
    <div class="container" style="margin-top: 100px;">
        @if(Session::has('success'))
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="charge-message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
        <h2 class="text-center">Product List</h2><br>
        <a href="/product/create" class="btn btn-primary">Add Product</a><br><br>
        <table class="table table-striped">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $pro)
                <tr>
                    <td><img src="{{ $pro->imagepath }}" class="img-thumbnail" style="width: 100px; height: 80px;"></td>
                    <td width="300">{{ $pro->title }}</td>
                    <td width="400">{{ $pro->description }}</td>
                    <td>Rs. {{ $pro->price }}</td>
                    <td colspan="2">
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="/product/{{ $pro->id }}/edit" class="btn btn-default">Edit</a>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::open(['action' => ['AdminController@destroy', $pro->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger float-right' ])}}
                                {!! Form::close() !!}
                            </div>


                        </div>

                    </td>
                </tr>

            @endforeach

        </table>
    </div>


@endsection