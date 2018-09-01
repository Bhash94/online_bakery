@extends('layouts.master')

@section('title')
    Reservations
@endsection

@section('content')

    <div class="container" style="margin-top: 100px;">
        <h1 class="text-center">Table Details</h1><br><br>
        <div class="row">
            <div class="reserveTable">
                <h4>{{ $table->name }}</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="/images/table.jpg" class="img-thumbnail" style="width: 200px; height: 200px; margin: 5px;">
                    </div>
                    <div class="col-lg-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Table ID : {{ $table->id }}
                            </li>
                            <li class="list-group-item">
                                No of people : {{ $table->people }}
                            </li>
                            <li class="list-group-item">
                                Reservation status :

                                @if(($table->status) == 1)
                                    <b>Reserved</b>
                                @else
                                   <b>Not reserved</b>
                                @endif
                            </li>
                        </ul>
                        <form action="reserve/{{ $table->id }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $table->id }}">
                            <input type="hidden" value="{{ $table->status }}">
                            @if($table->status==0)
                                <br><input type="submit" value="Reserve" class="btn btn-primary">

                                <a href="/table/{{ $table->id }}/payment" class="btn btn-success">Pay advance</a>
                            @else
                                <br><p class="text-danger">Reserved</p>
                            @endif
                            <br><br>
                            <a href="/reserve">Back to reserve</a>
                        </form>
                    @if($table->status==1)
                        <!-- <form action="cancel/{{ $table->id }}" method="POST">
                        {{ csrf_field() }}
                                <center><input type="submit" value="Cancel" class="btn btn-danger btn-sm"></center>
                            </form> -->
                        @endif
                    </div>
                </div>
                {{--<br>--}}

            </div>
            <br>
        </div>
    </div>

@endsection