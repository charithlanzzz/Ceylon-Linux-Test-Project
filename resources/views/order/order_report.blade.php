<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    </head>
<body>

    <nav class="topnav-right" style="background-color: #6EBD6C; height:60px">
    <center>
<div class="body-section">
    <h3 class="heading">Order Details</h3>
    <br>
    <center>
    <table class="table-bordered" text-align="center" style="font-size:14px;border:solid;width:100%;">
        <thead>
        <tr>
            <th style="width:70px;">Order Id</th>
            <th style="width:120px;">Order Number</th>
            <th style="width:120px;">Customer Name:</th>
            <th style="width:150px;">Order Date:</th>
            <th style="width:130px;">Net Amount:</th>
        </tr>
        </thead>

        <tbody>
        @foreach($order_details as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->order_no}}</td>
                <td>{{$order->customer_id}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->net_amount}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </center>
</div>
</center>
</body>
</html>
