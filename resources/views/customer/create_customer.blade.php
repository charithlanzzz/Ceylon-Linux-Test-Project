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
                    Customer Registration </h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" id="customerForm">
                        {{csrf_field()}}


                        <fieldset>


                            <div class="row pb-3">

                                <div class="col-sm-6">
                                    <label for="customer_name">*Customer Name:</label>
                                    <input type="text" style="color:black; background-color: #def7e2;"

                                           class="form-control" name="customer_name" placeholder="Enter the Name" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_code">*Customer Code:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"

                                           class="form-control" name="customer_code" placeholder="Enter the code" required><br>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="customer_address">*Customer Address:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"

                                           class="form-control" name="customer_address" placeholder="Enter the address" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="customer_contact">*Customer Contact:</label>
                                    <input type="text" style="color:black; background-color: #def7e2"

                                           class="form-control" name="customer_contact" placeholder="Enter the contact number" required><br>

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

        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "Don't keep space");


        $(document).ready(function () {


            $('#customerForm').validate({


                rules: {
                    customer_name: {
                        letterswithspace: true,
                        minlength: 2

                    },

                    customer_code: {
                        noSpace: true,
                    },

                    customer_address: {
                        minlength: 5
                    },

                    customer_contact: {
                        digits: true,
                        minlength: 10,
                        maxlength: 10,
                        

                    },


                },

                messages: {
                    customer_name: {
                        lettersonly: "Please enter only letters"
                    },

                    contact_number: {
                        digits: "Please enter only digits",
                        minlength: "Enter a valid contact number"

                    },
                    customer_code: {
                        letterswithspace: "dont keep space"

                    },

                }
            });


            $('#saveButton').click(function(e) {

                e.preventDefault();
                var valid = $('#customerForm').valid();
                if (!valid) {
                    return false;
                }

                var data = {
                    formdata: $('#customerForm').serialize()
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
                                    url: '{{ url('/customers') }}',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: $.param(data),

                                    success: function(response) {

                                        save_confirm.close();
                                        //window.location.href = '{{ url('/customers') }}/' + response.id + '/edit';
                                        window.location.href = '{{ url('/customers') }}';
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
