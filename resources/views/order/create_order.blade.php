@extends('layout')

@section('title','Customer Register')
<link rel="icon" href=
    "https://cdn-icons-png.flaticon.com/512/2713/2713479.png"
      type="image/x-icon">
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
                    Placing Order </h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" id="orderForm" method="post" action="/orders">
                        {{csrf_field()}}
                        <fieldset>
                        <div class="row pb-4">
                            <div class="col-sm-3">
                                <label for="customer_id">*Customer Name:</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-sm-4">
                                <label for="customer_name">Product:</label>
                                <select style="color:black; background-color: #def7e2;" class="form-control" id="product_select">
                                    <option value="">Select product</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                            <button id="add_product" class="btn btn-primary" style="margin-top:27px;margin-left:-20px;">Add</button>
                            </div>
                        </div>

                        <div class="row pb-3">
                            <table id="order_table" class="display" style="width: 100%; ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name:</th>
                                    <th>Product Code:</th>
                                    <th>Price:</th>
                                    <th>Quantity:</th>
                                    <th>Free</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody id="order_table_body"></tbody>
                                <tr>
                                    <td colspan="6" class="text-right">Net Amount:</td>
                                    <td id="net_amount">0</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row pb-3">
                            <div>
                              <center>
                                <button id="saveBtn" class="btn btn-primary">Save</button>
                              </center>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

{{-- footer --}}

@section('javaScript')

    <script>
        jQuery.validator.addMethod("letterswithspace", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "letters only");

        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "Don't keep space");

        var net_amount = 0;
        $(document).ready(function () {

            $('#add_product').on('click', function (e) {
                e.preventDefault();
                let data = {
                    product:$("#product_select option:selected").val()
                }
                $.ajax({
                    url: '{{ url('/add_order_item') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: $.param(data),

                    success: function(response) {
                        // console.log(response.row);
                        $('#order_table_body').append(response.row);
                    },
                    error: function(errors) {
                        alert(response.msg);
                    }
                });
                return false;
            });

            $('#saveBtn').on('click', function () {
                $('#orderForm').submit();
            });

            {{--$('#saveButton').click(function(e) {--}}
            {{--    e.preventDefault();--}}
            {{--    var valid = $('#customerForm').valid();--}}
            {{--    if (!valid) {--}}
            {{--        return false;--}}
            {{--    }--}}

            {{--    var data = {--}}
            {{--        formdata: $('#customerForm').serialize()--}}
            {{--    }--}}

            {{--    var save_confirm = $.confirm({--}}
            {{--        title: 'Confirm Save!',--}}
            {{--        content: 'Are you sure you want to save?',--}}
            {{--        buttons: {--}}

            {{--            cancel: function() {},--}}

            {{--            somethingElse: {--}}
            {{--                text: 'Save',--}}
            {{--                type: 'Green',--}}
            {{--                btnClass: 'btn-green',--}}
            {{--                keys: ['enter', 'shift'],--}}
            {{--                action: function() {--}}

                                {{--$.ajax({--}}
                                {{--    url: '{{ url('/customers') }}',--}}
                                {{--    type: 'POST',--}}
                                {{--    dataType: 'JSON',--}}
                                {{--    data: $.param(data),--}}

                                {{--    success: function(response) {--}}

                                {{--        save_confirm.close();--}}
                                {{--        //window.location.href = '{{ url('/customers') }}/' + response.id + '/edit';--}}
                                {{--        window.location.href = '{{ url('/customers') }}';--}}
                                {{--    },--}}
                                {{--    error: function(errors) {--}}

                                {{--        alert(response.msg);--}}
                                {{--    }--}}
                                {{--});--}}
                                {{--return false;--}}

            {{--                }--}}
            {{--            }--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}
        });


        function calculateTotal(qty, price, product)
        {
            let amount = parseInt(qty)*parseInt(price);
            console.log(qty, price, product);
            $('#tot_'+product).text(amount);
            net_amount += amount;
            $('#net_amount').text(net_amount);
        }
    </script>
@endsection
