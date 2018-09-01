@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
        <div class="back container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <h1>PAY ADVANCE</h1>
                    <hr>
                    <h4><b>advance for a table : $20</b></h4><br><br>
                    <div id="charge-error" class="alert alert-danger {{!Session::has('error') ? 'hidden' : ''}}">
                        {{ Session::get('error') }}
                    </div>
                    <form action="{{ route('payment', $table->id) }}" method="post" id="checkout-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-name">Card Holder name</label>
                                    <input type="text" id="card-name" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-number">Credit Card Number</label>
                                    <input type="text" id="card-number" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="card-expiry-month">Card Expiry Month</label>
                                            <input type="text" id="card-expiry-month" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="card-expiry-year">Card Expiry Year</label>
                                            <input type="text" id="card-expiry-year" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" id="card-cvc" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">PAY</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection