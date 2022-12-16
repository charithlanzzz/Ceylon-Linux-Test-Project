<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">



    <link rel="stylesheet" href="{{ asset('css/order_management/app.css') }}">


    <title>@yield('title')</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2962/2962084.png" type="image/x-icon">
</head>

<body style="overflow-x:hidden">
    <!-- Nav bar-->
    <nav class="topnav-right" style="background-color: #6EBD6C; height:60px">

        <li class="nav-item" type="none" style="float:left; margin-left: 20px">
            <a href="/" style="text-decoration: none">
                <h2 style="color: white;margin-top:10px">Agri Online</h2>
            </a>
        </li>

        <ul class="nav justify-content-end" style="">
            <li class="nav-item">
                <a class="nav-link active" href="#" style="color: white;margin-top:10px">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;margin-top:10px">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;margin-top:10px">Refund Inquiry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;margin-top:10px">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;margin-top:10px">Contact Us</a>
            </li>
            <li class="nav-item" style="margin-right: 10px">
                <a href="/auth/login"class="btn" style="margin-top: 12px; margin-right:25px; width:110px; background-color:white; color:#6EBD6C;">
                    <i class="fas fa-user-alt" style="float:left; margin-top:4px; margin-right: 4px; color:#6EBD6C"></i>
                <center>Sign In</center>
            </a>
            </li>
        </ul>
    </nav>
    <!-- Nav bar-->

    @yield('content')

    <!-- Footer -->

    <footer class="text-white"
        style="background-color: #6EBD6C; margin-top:50px; background-image: url('../images/Header and Footer/footer.png');">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row" style>
                <!--Grid column-->
                <div class="align-left" style="margin-left: -auto">
                    <h3 class="">Agri Online</h3>
                    <p>
                        Supporting Sustainable Greener Agriculture with Innovation,<br /> Quality Inputs and Extension
                        Services.
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="float-end" style="margin-left: 900px; margin-top: -100px;">
                    <h5 class="text-uppercase">Navigate</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="/" class="text-white" style="text-decoration: none;">Home</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white" style="text-decoration: none;">Product</a>
                        </li>
                        <li>
                            <a href="/aboutus" class="text-white" style="text-decoration: none;">About Us</a>
                        </li>
                        <li>
                            <a href="/contactus" class="text-white" style="text-decoration: none;">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                <div class="" style="margin-left: -10px; margin-top: -20px;">
                    <i class="fab fa-facebook" style="margin-left: 10px;"></i>
                    <i class="fab fa-linkedin" style="margin-left: 10px;"></i>
                    <i class="fab fa-instagram" style="margin-left: 10px;"></i>
                    <i class="fab fa-whatsapp" style="margin-left: 10px;"></i>
                </div>
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->


        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright: SER080
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

{{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}


<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    function goBack() {
        window.history.back();
    }
</script>



<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('javaScript')

</html>
