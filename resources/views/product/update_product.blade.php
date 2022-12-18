@extends('layout')
@section('title', 'Update Product Details')
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
                    Update Product Details</h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" method="post" action="{{url('/products/'.$product->id)}}">
                        @method('PUT')
                        {{ csrf_field() }}

                        <fieldset>

                              <div class="row">
                                <div class="col-sm-6">
                                    <label for="product_name">Product Name:</label>
                                    <input type="text" style="color:black; background-color: #def7e2";
                                           class="form-control" name="product_name" value="{{$product->product_name}}" required/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="product_code">Product Code:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="product_code"
                                           value="{{$product->product_code}}" required/><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="price">Price:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                           class="form-control" name="price" value="{{$product->price}}" required/><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="expire_date">Expire Date:</label>
                                    <input type="date" style="color:black; background-color: #def7e2"
                                           class="form-control" name="expire_date" value="{{$product->expire_date}}"
                                           required/><br>
                                </div>
                            </div>
                            <div class="row">



                                <input type="hidden" name="id" value="{{$product->id}}"/>

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
