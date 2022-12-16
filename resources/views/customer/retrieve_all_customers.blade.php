@extends('layout')
@section('title','All Customers')
@section('content')

    <br><br>
    <div class="col-sm-11 card" style="background-color: #F4F7F8; margin-top:40px;margin-left:50px;">

        <div class="row g-2" >
            <div class="col" >


    <h1 class="text-center" style="font-family:'Trebuchet MS', sans-serif;margin-left:50px; margin-top:20px"> All Customers </h1>
    <br><br>
    <div class="container" style="margin-bottom:20px">
                <a style="float: right;" href="/customer-pdf" class="btn btn-success" role="button">Genarate Report <i class="fa fa-download"></i></a>

                <table id="customertable" class="display" style="width: 100%; ">
                    <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Customer Name:</th>
                        <th>Customer Code:</th>
                        <th>Customer Address:</th>
                        <th>Customer Contact:</th>
                        <th style="width: 80px">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    </tbody>

                </table>


            </div>
        </div>
    </div>
</div>


    </center>

    <br><br><br><br><br>


@endsection

{{--footer--}}

@section('javaScript')
    <script type="text/javascript">

        $(document).ready(() => {
            window.customer_table = $('#customertable').DataTable({
                processing: true,
                serverSide: true,
                columns: [
                    {data: 'id', 'bVisible': false},
                    {data: 'customer_name'},
                    {data: 'customer_code'},
                    {data: 'customer_address'},
                    {data: 'customer_contact'},
                    {data: 'action'},
                ],
                ajax: {
                    "url": '{{url('/get_customer_list')}}',
                    "type": "POST",

                }
            });
        });

        $('#customertable').on('click', '.btn_delete', function () {
            var id = $(this).data('id');

            var delete_confirm = $.confirm({
                title: 'Confirm Delete!',
                content: 'Are you sure you want to delete?',
                buttons: {

                    cancel: function () {
                    },

                    somethingElse: {
                        text: 'Delete',
                        type: 'red',
                        btnClass: 'btn-red',
                        keys: ['enter', 'shift'],
                        action: function () {

                            $.ajax({
                                url: '{{url('/customers')}}' + '/' + id,
                                type: 'DELETE',
                                dataType: 'JSON',
                                success: function (response) {

                                    customer_table.ajax.reload();
                                    delete_confirm.close();

                                },
                                error: function (errors) {

                                }
                            });
                            return false;
                        }
                    }
                }
            });


        });
    </script>

@endsection

