<?php
\Debugbar::disable();
use Cartalyst\Sentinel\Users\UserInterface;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <!-- image favicon -->
        <link rel="icon" type="image/png" href="{{asset('uploads/assets/PoltekTEDC.png')}}">

        <title>E-PILPRESMA</title>

        <!-- Bootstrap core CSS     -->
        <link href="<?php echo asset('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo asset('assets/library/light_bootstrap/css/animate.min.css')?>" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo asset('assets/library/light_bootstrap/css/light-bootstrap-dashboard.css')?>" rel="stylesheet"/>


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo asset('assets/library/light_bootstrap/css/pe-icon-7-stroke.css')?>" rel="stylesheet" />
        <link href="<?php echo asset('assets/css/custom.css')?>" rel="stylesheet" />

        <!-- Material Icon  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Datepicker CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />

        <style>

          /* CSS custom for welcome page */
           #bg {
              background: url("<?php echo asset('assets/img/home_page_epilketos.gif')?>") no-repeat center center fixed;
            }

           .btn-primary {
              border-color: transparent;
             color: #FFFFFF;
             background-color: #fed330;
            }
            .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .btn-primary.dropdown-toggle {
              background-color: #fed330;
              color: #FFFFFF;
              border-color: transparent;
            }
            .btn-success {
             border-color: transparent;
             color: #FFFFFF;
             background-color: #2ecc71;
            }
            .btn-success:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .btn-primary.dropdown-toggle {
              background-color: #2ecc71;
              color: #FFFFFF;
              border-color: transparent;
            }

            .btn .caret {
              border-top-color: #FFFFFF;
            }

            .card-input {
              background-color: #ecf0f1;
            }

            .header {
              background-color: #fed330;
            }

            .border_logo {
              margin-top: 30px;
              padding: 20px;
              border: 2px solid #FFFFFF;
              width: 200px;
              height: 70px;
            }

            /* End CSS */
        </style>

    </head>
    <body>
    <!--   Core JS Files   -->

    <script src="<?php echo asset('assets/library/jquery/jquery-1.10.2.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/bootstrap-checkbox-radio-switch.js')?>"></script>
    <!--  Charts Plugin -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/chartist.min.js')?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/bootstrap-notify.js')?>"></script>


    <!--  Google Maps Plugin    -->
    <script type="text/library/light_bootstrap/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/light-bootstrap-dashboard.js')?>"></script>
    <script src="<?php echo asset('assets/js/custom.js')?>"></script>

    <!-- Datepicker JS -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript">

    </script>
    <div class="wrapper">
    <!-- Sidebar -->
    @include('shared.sidebar')
    <!-- Navbar -->
    <div class="main-panel" id="bg">
      @include('shared.header')
       <!-- Content -->
        @yield('content')
    </div>
</div>
    </body>
</html>

<!-- for content in class content -->
<!-- <div class="content">
    <div class="container-fluid">
        <div class="row">
        </div>
    </div>
</div> -->
