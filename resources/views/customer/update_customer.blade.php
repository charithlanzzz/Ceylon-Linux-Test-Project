@extends('layout')
@section('title', 'Update Customer')
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
                    Update Customer</h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" method="post" action="{{url('/customers/'.$customer->id)}}">
                        @method('PUT')
                        {{ csrf_field() }}

                        <fieldset>

                              <div class="row">
                                <div class="col-sm-6">
                                    <label for="customer_name">Customer Name:</label>
                                    <input type="text" style="color:black; background-color: #def7e2";
                                           class="form-control" name="customer_name" value="{{$customer->customer_name}}" required/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_code">Customer Code:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="customer_code"
                                           value="{{$customer->customer_code}}" required/><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="customer_address">Customer Address:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="customer_address" value="{{$customer->customer_address}}" required/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_contact">Customer Contact:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="customer_contact" value="{{$customer->customer_contact}}"
                                           required/><br>
                                </div>
                            </div>
                            <div class="row">



                                <input type="hidden" name="id" value="{{$customer->id}}"/>

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
