@extends('layout')
@section('title', 'Update Customer Details')
@section('content')
    <br><br>
    <button style="margin-left:-150px;" class="btn btn1" onclick="history.back()"><i class="fa fa-arrow-left fa-2xl back_icon "
            aria-hidden="true"></i></button>



    <div class="col-sm-8 card" style="background-color: #F4F7F8; margin-top:40px;margin-left:250px;">

        <div class="row g-2">
            <div class="col">


                <h1 class="text-center"
                    style="font-family:'Trebuchet MS', sans-serif;margin-left:20px; margin-top:20px; color:#224957">
                    Update Free Issue Details</h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" method="post" action="{{ url('/freeissues/' . $freeissue->id) }}">
                        @method('PUT')
                        {{ csrf_field() }}

                        <fieldset>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="free_issue_label">Free Issue Label:</label>
                                    <input type="text" style="color:black; background-color: #def7e2";
                                        class="form-control" name="free_issue_label"
                                        value="{{ $freeissue->free_issue_label }}" required /><br>
                                </div>
                                <div class="col-sm-6">
                                    <label>Type</label>
                                    <select class="form-control" name="type">
                                        <option value="Flat" {{ $freeissue->type === 'Flat' ? 'Selected' : '' }}>Flat
                                        </option>
                                        <option value="Multiple" {{ $freeissue->type === 'Multiple' ? 'Selected' : '' }}>
                                            Multiple</option>
                                    </select>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="purchase_product">Purchase Product:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                        class="form-control" name="purchase_product"
                                        value="{{ $freeissue->purchase_product }}" required /><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="free_product">Free Product:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"
                                        class="form-control" name="free_product" value="{{ $freeissue->free_product }}"
                                        required /><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="purchase_quantity">Purchase Quantity:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"
                                        class="form-control" name="purchase_quantity"
                                        value="{{ $freeissue->purchase_quantity }}" required /><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="free_quantity">Free Quantity:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"
                                        class="form-control" name="free_quantity" value="{{ $freeissue->free_quantity }}"
                                        required /><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="lower_limit">Lower Limit:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"
                                        class="form-control" name="lower_limit" value="{{ $freeissue->lower_limit }}"
                                        required /><br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="upper_limit">Upper Limit:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"
                                        class="form-control" name="upper_limit" value="{{ $freeissue->upper_limit }}"
                                        required /><br>
                                </div>
                            </div>
                            <div class="row">



                                <input type="hidden" name="id" value="{{ $freeissue->id }}" />

                                <div class="col-sm-4">
                                    <input type="submit"
                                        style="color:white;width:140px;margin-top:30px; margin-left:115px;"
                                        class="btn btn-success" value="Update" />

                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
