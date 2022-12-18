@extends('layout')
@section('title','All Products')
@section('content')

    <br><br>
    <div class="col-sm-11 card" style="background-color: #F4F7F8; margin-top:40px;margin-left:50px;">

        <div class="row g-2" >
            <div class="col" >


    <h1 class="text-center" style="font-family:'Trebuchet MS', sans-serif;margin-left:50px; margin-top:20px"> All Products </h1>
    <br><br>
    <div class="container" style="margin-bottom:20px">
                <a style="float: right;" href="/products/create" class="btn btn-dark" role="button"><i class="fa-plus fa-xl"></i></a> <br><br>
                <a style="float: right;" href="/product-pdf" class="btn btn-success" role="button">Genarate Report <i class="fa fa-download"></i></a>

                <table id="producttable" class="display" style="width: 100%; ">
                    <thead>
                    <tr>
                        <th>Product ID Id</th>
                        <th>Product Name:</th>
                        <th>Product Code:</th>
                        <th>Price:</th>
                        <th>Expire Date:</th>
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
            window.product_table = $('#producttable').DataTable({
                processing: true,
                serverSide: true,
                columns: [
                    {data: 'id', 'bVisible': false},
                    {data: 'product_name'},
                    {data: 'product_code'},
                    {data: 'price'},
                    {data: 'expire_date'},
                    {data: 'action'},
                ],
                ajax: {
                    "url": '{{url('/get_product_list')}}',
                    "type": "POST",

                }
            });
        });

        $('#producttable').on('click', '.btn_delete', function () {
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
                                url: '{{url('/products')}}' + '/' + id,
                                type: 'DELETE',
                                dataType: 'JSON',
                                success: function (response) {

                                    product_table.ajax.reload();
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

