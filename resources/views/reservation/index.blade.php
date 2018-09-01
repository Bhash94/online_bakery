@extends('layouts.master')

@section('title')
    Reservations
@endsection

@section('content')

    <div class="container" style="margin-top: 100px;">
        <h2>TABLE SETUP</h2>
        <hr>
        <div id="charge-error" class="alert alert-success {{!Session::has('success') ? 'hidden' : ''}}">
            {{ Session::get('success') }}
        </div>
        <div class="row">

                @foreach($tables as $table)<div class="col-lg-4">
                    <p style="margin-top: 50px;">{{ $table->name }}</p>
                    <img src="images/table.jpg" class="img-thumbnail" style="width: 200px; height: 200px; margin: 5px;"><br>

                    @if($table->status==0)
                        <br><a style="font-size: 16px;"  href="/table/{{ $table->id }}" class="btn btn-dark btn-sm">Reserve</a>
                        <!-- <br><center><input type="submit" value="Reserve" class="btn btn-dark btn-sm"></center> -->
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Details
                        </button> -->
                    @else
                        <br><p class="text-danger" style="font-size: 16px;" >Reserved<a href="/table/{{ $table->id }}" style="font-size: 16px;" class="btn btn-link btn-sm">Details</a></p>



                    <form action="cancel/{{ $table->id }}" method="POST" style=" margin-bottom: 50px;">
                            {{ csrf_field() }}
                            <input type="submit" value="Cancel" class="btn btn-danger btn-sm">
                        </form>
                    @endif
                </div>
                @endforeach

        </div>
        <br><br>
        <div class="row">
            <h2>My Reservations</h2><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Table ID</td>
                    <td>Date</td>
                    <!-- <td></td> -->
                </tr>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->table_id }}</td>
                        <td>{{ $reservation->created_at }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection