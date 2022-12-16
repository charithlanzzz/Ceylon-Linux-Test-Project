@extends('layout')
@section('title', 'Update Delivery Details')
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
                    Order Details</h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" method="post" action="{{url('/orders/'.$order->order_id)}}">
                        @method('PUT')
                        {{ csrf_field() }}

                        <fieldset>

                              <div class="row">
                                <div class="col-sm-6">
                                    <label for="name">Name:</label>
                                    <input type="text" style="color:black; background-color: #def7e2; class="
                                           form-control" name="name" value="{{$order->name}}" required/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contact_number">Contact Number:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="contact_number"
                                           value="{{$order->contact_number}}" required/><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="email">Email:</label>
                                    <input type="email" style="color:black; background-color: #def7e2"
                                           class="form-control" name="email" value="{{$order->email}}" required/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="address">Address:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="address" value="{{$order->address}}"
                                           required/><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="zip_code">Zip code:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="zip_code" value="{{$order->zip_code}}"
                                           required/><br>
                                </div>
                                <div class="col-sm-3">
                                    <label for="city">City:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="city" value="{{$order->city}}" required/><br>
                                </div>


                                <input type="hidden" name="order_id" value="{{$order->order_id}}"/>

                                <div class="col-sm-4">
                                    <input type="submit"
                                           style="color:white;width:140px;margin-top:30px; margin-left:115px;"
                                           class="btn btn-success" value="Update"/>

                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
