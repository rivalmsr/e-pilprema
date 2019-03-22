<?php
\Debugbar::disable();
use Cartalyst\Sentinel\Users\UserInterface;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="csrf-token" content="<?php echo csrf_token() ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> -->
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



             .main-panel {
              background: rgba(203, 203, 210, 0.15);
              position: relative;
              z-index: 2;
              width: calc(100%);
              min-height: 100%;
            }
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
            #bg {
              background: url("<?php echo asset('assets/img/home_page_epilketos.gif')?>") no-repeat center center fixed;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
            }
            .content_body_one {
              color: #FFFFFF;
              background-color: transparent;
              padding-top: 60px;
              padding-bottom: 30px;
              padding-left: 30px;
              padding-rigth: 30px;
              height: 80%;
              width: auto;
              /*background-color: #999;*/
            }

            .content_body_candidates {
              padding-top: 95px;
              padding-bottom: 70px;
              padding-right: 30px;
              padding-left: 30px;
              background-color: #ecf0f1;
              height: 90%;
              width: auto;
              /*background-color: #999;*/
            }

            .content_body_three {
              background-color: #fed330;
              height: 8%;
              width: auto;
              /*background-color: #999;*/
            }
            .thumbnail  {
              width: calc(80%);
              min-height: calc(80%);
            }

            .card-user {
              background-color: #ecf0f1;
            }



            @media only screen and (max-width: 768px) {
                /* For mobile phones: */
                [class*="col-"] {
                    width: 100%;
                }
            }

            /* End CSS */
        </style>

    </head>
    <body>
    <!--   Core JS Files   -->

    <script src="<?php echo asset('assets/library/jquery/jquery-1.10.2.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/bootstrap-notify.js')?>"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/bootstrap-checkbox-radio-switch.js')?>"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/chartist.min.js')?>"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/library/light_bootstrap/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/light-bootstrap-dashboard.js')?>"></script>
    <script src="<?php echo asset('assets/js/custom.js')?>"></script>

    <!-- Datepicker JS -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!--  JS Custom Original template    -->
    <script src="<?php echo asset('assets/library/custom/js/custom.js')?>"></script>
    <div class="wrapper">
    <div class="main-panel" id="bg">
      <!-- Navbar -->
      @include('shared.header_login')
       <!-- Content -->
       <div class="container" style="width:100%;">
          @yield('content')
        </div>
    </div>
    </div>
    <script type="text/javascript">
    </script>
    </body>
</html>
