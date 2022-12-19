@extends('layout')
@section('title', 'View Order')
@section('content')
    <br><br>
    <button style="margin-left:-150px;" class="btn btn1" onclick="history.back()"><i
            class="fa fa-arrow-left fa-2xl back_icon "
            aria-hidden="true"></i></button>



    <div class="col-sm-8 card" style="background-color: #F4F7F8; margin-top:40px;margin-left:250px;">

        <div class="row g-2">
            <div class="col">


                <h1 class="text-center"
                    style="font-family:'Trebuchet MS', sans-serif;margin-left:20px; margin-top:20px; color:#224957">
                    {{ $order->customer->customer_name }}'s Order</h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" method="post" action="{{url('/orders/'.$order->id)}}">
                        @method('PUT')
                        {{ csrf_field() }}

                        <fieldset>

                              <div class="row">
                                <div class="col-sm-6">
                                    <label for="order_no">Order Number:</label>
                                    <input type="text" style="color:black; background-color: #def7e2";
                                           class="form-control" name="order_no" value="{{$order->order_no}}" readonly/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_name">Customer Name:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="customer_name"
                                           value="{{$order->customer->customer_name}}" readonly/><br>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                    <label for="order_date">Order date:</label>
                                    <input type="text" style="color:black; background-color: #def7e2";
                                        class="form-control" name="order_date"
                                        value="{{ $order->order_date }}" readonly /><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="net_amount">Net Amount:</label>
                                    <input type="text" style="color:black; background-color: #def7e2";
                                        class="form-control" name="net_amount"
                                        value="{{ $order->net_amount }}" readonly /><br>
                                </div>
                            </div>


                                <input type="hidden" name="id" value="{{$order->id}}"/>

                                {{-- <div class="col-sm-4">
                                    <input type="submit"
                                           style="color:white;width:140px;margin-top:30px; margin-left:115px;"
                                           class="btn btn-success" value="Update"/>

                                </div> --}}
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
