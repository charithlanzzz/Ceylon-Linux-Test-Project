@extends('layout')
@section('title','All Free Issues')
@section('content')

    <br><br>
    <div class="col-sm-11 card" style="background-color: #F4F7F8; margin-top:40px;margin-left:50px;">

        <div class="row g-2" >
            <div class="col" >


    <h1 class="text-center" style="font-family:'Trebuchet MS', sans-serif;margin-left:50px; margin-top:20px"> All Free Issues </h1>
    <br><br>
    <div class="container" style="margin-bottom:20px">
                <a style="float: right;" href="/freeissue-pdf" class="btn btn-success" role="button">Genarate Report <i class="fa fa-download"></i></a>
<br><br><br>
                <table id="freeissuetable" class="display" style="width: 100%; ">
                    <thead>
                    <tr>
                        <th>Free Issue Id:</th>
                        <th>Free Issue Label:</th>
                        <th>Type:</th>
                        <th>Purchase Product:</th>
                        <th>Free Product:</th>
                        <th>Purchase Quantity:</th>
                        <th>Free Quantity:</th>
                        <th>Lower Limit:</th>
                        <th>Upper Limit:</th>
                        <th style="width: 100px">Action</th>
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
            window.freeissue_table = $('#freeissuetable').DataTable({
                processing: true,
                serverSide: true,
                columns: [
                    {data: 'id', 'bVisible': false},
                    {data: 'free_issue_label'},
                    {data: 'type'},
                    {data: 'purchase_product'},
                    {data: 'free_product'},
                    {data: 'purchase_quantity'},
                    {data: 'free_quantity'},
                    {data: 'lower_limit'},
                    {data: 'upper_limit'},
                    {data: 'action'},
                ],
                ajax: {
                    "url": '{{url('/get_freeissue_list')}}',
                    "type": "POST",

                }
            });
        });

        $('#freeissuetable').on('click', '.btn_delete', function () {
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
                                url: '{{url('/freeissues')}}' + '/' + id,
                                type: 'DELETE',
                                dataType: 'JSON',
                                success: function (response) {

                                    freeissue_table.ajax.reload();
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

