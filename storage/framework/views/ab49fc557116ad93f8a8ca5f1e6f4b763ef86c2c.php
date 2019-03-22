<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>
        <!-- Bootstrap core CSS     -->
        <link href="<?php echo asset('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo asset('assets/library/light_bootstrap/css/animate.min.css')?>" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo asset('assets/library/light_bootstrap/css/light-bootstrap-dashboard.css')?>" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .containerku {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="containerku">
            <div class="content">
                <div class="title">404 Not Found.</div>
                <center>
                <a href="/" class="btn btn-primary" role="button">Back</a>
                </center>
            </div>
        </div>
    </body>
</html>
