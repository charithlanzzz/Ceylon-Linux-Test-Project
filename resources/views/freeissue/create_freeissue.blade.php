@extends('layout')

@section('title','Define Free Issue')
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
                    Define Free Issue </h1>

                <div class="container" style="margin-bottom:10px">
                    <form class="form-group form1" id="freeissueForm">
                        {{csrf_field()}}


                        <fieldset>


                            <div class="row pb-3">

                                <div class="col-sm-6">
                                    <label for="free_issue_label">*Free Issue Label:</label>
                                    <input type="text" style="color:black; background-color: #def7e2;"

                                           class="form-control" name="free_issue_label" placeholder="Enter the Issue Label" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="type">*Type:</label>
                                      <select  style="color:black; background-color: #def7e2;"
                                           class="form-control" id="type" name="type" required>
                                         <option value="">Select Type</option>
                                         <option value="Flat">Flat</option>
                                         <option value="Multiple">Multiple</option>
                                      </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="purchase_product">*Purchase Product:</label>
                                    <select  style="color:black; background-color: #def7e2;"
                                           class="form-control" id="purchase_product" name="purchase_product" required>
                                         <option value="">Select Product</option>
                                         <option value="Soap">Soap</option>
                                         <option value="Shampoo">Shampoo</option>
                                      </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="free_product">*Free Product                                                                                                                                                                                                                                                                                                                      :</label>
                                    <input type="text" style="color:black; background-color: #def7e2"

                                           class="form-control" name="free_product" placeholder="Enter the free product name" required><br>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="purchase_quantity">*Purchase Quantity:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"

                                           class="form-control" name="purchase_quantity" placeholder="Enter the purchase quantity" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="free_quantity">*Free Quantity                                                                                                                                                                                                                                                                                                                      :</label>
                                    <input type="number" style="color:black; background-color: #def7e2"

                                           class="form-control" name="free_quantity" placeholder="Enter the Free quantity" required><br>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="lower_limit">*Lower Limit:</label>
                                    <input type="number" style="color:black; background-color: #def7e2"

                                           class="form-control" name="lower_limit" placeholder="Enter the lower limit" required><br>

                                </div>
                                <div class="col-sm-6">
                                    <label for="upper_limit">*Upper Limit                                                                                                                                                                                                                                                                                                                      :</label>
                                    <input type="number" style="color:black; background-color: #def7e2"

                                           class="form-control" name="upper_limit" placeholder="Enter the upper limit" required><br>

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


            $('#freeissueForm').validate({


                rules: {
                    free_issue_label: {
                        letterswithspace: true,
                        minlength: 2

                    },

                    purchase_product: {
                        letterswithspace: true,
                        minlength: 2
                    },

                    free_product: {
                        letterswithspace: true,
                        minlength: 2,
                    },
                },

                messages: {
                    free_issue_label: {
                        lettersonly: "Please enter only letters"
                    },

                    type: {
                        digits: "Please enter only digits",
                        minlength: "Enter a valid contact number"

                    },

                }
            });


            $('#saveButton').click(function(e) {

                e.preventDefault();
                var valid = $('#freeissueForm').valid();
                if (!valid) {
                    return false;
                }

                var data = {
                    formdata: $('#freeissueForm').serialize()
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
                                    url: '{{ url('/freeissues') }}',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: $.param(data),

                                    success: function(response) {

                                        save_confirm.close();
                                        //window.location.href = '{{ url('/customers') }}/' + response.id + '/edit';
                                        window.location.href = '{{ url('/freeissues') }}';
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
