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
    <table class="table-bordered" style="font-size:14px">
        <thead>
        <tr>
            <th>Order Id</th>
            <th>Order Number</th>
            <th>Customer Name:</th>
            <th>Order Date:</th>
            <th>Net Amount:</th>
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
</div>
</center>
</body>
</html>
