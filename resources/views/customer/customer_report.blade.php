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
    <h3 class="heading">Customer Details</h3>
    <br>
    <table class="table-bordered" style="font-size:14px">
        <thead>
        <tr>
            <th>Customer Id</th>
            <th>Customer Name:</th>
            <th>Customer Code:</th>
            <th>Customer Address:</th>
            <th>Customer Contact:</th>
        </tr>
        </thead>

        <tbody>
        @foreach($customer_details as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->customer_code}}</td>
                <td>{{$customer->customer_address}}</td>
                <td>{{$customer->customer_contact}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</center>
</body>
</html>
