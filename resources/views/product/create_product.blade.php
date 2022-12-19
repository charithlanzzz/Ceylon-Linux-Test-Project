@extends('layout')

@section('title','Product Register')
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
                    Product Registration </h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" id="productForm">
                        {{csrf_field()}}


                        <fieldset>


                            <div class="row pb-3">

                                <div class="col-sm-6">
                                    <label for="product_name">*Product Name:</label>
                                    <input type="text" style="color:black; background-color: #def7e2;"

                                           class="form-control" name="product_name" placeholder="Enter the Name" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="product_code">*Product Code:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"

                                           class="form-control" name="product_code" placeholder="Enter the code" required><br>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="price">*Price:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"

                                           class="form-control" name="price" placeholder="Enter the price" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="expire_date">*Expire Date:</label>
                                    <input type="date" style="color:black; background-color: #def7e2"

                                           class="form-control" name="expire_date" placeholder="Enter the expire date" required><br>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button id="saveButton" class="btn btn-success save_btn">Save</button>
                                </div>
                            </div>
                        </fieldset>


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


        $(document).ready(function () {
            $('#productForm').validate({
                rules: {
                    product_name: {
                       letterswithspace: true,
                        minlength: 2
                    },

                    product_code: {
                        letterswithspace: false
                    },

                    price: {
                        digits: true
                    },

                    expire_date: {
                        date : true
                    },
                },

                messages: {
                    product_name: {
                        lettersonly: "Please enter only letters"
                    },
                }
            });


            $('#saveButton').click(function(e) {

                e.preventDefault();
                var valid = $('#productForm').valid();
                if (!valid) {
                    return false;
                }

                var data = {
                    formdata: $('#productForm').serialize()
                }

                var save_confirm = $.confirm({
                    title: 'Confirm Save!',
                    content: 'Are you sure you want to save?',
                    buttons: {

                        cancel: function() {},

                        somethingElse: {
                            text: 'Save',
                            type: 'Green',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function() {

                                $.ajax({
                                    url: '{{ url('/products') }}',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: $.param(data),

                                    success: function(response) {

                                        save_confirm.close();
                                        //window.location.href = '{{ url('/products') }}/' + response.id + '/edit';
                                        window.location.href = '{{ url('/products') }}';
                                    },
                                    error: function(errors) {

                                        alert(response.msg);
                                    }
                                });
                                return false;

                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
