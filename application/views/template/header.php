<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>You make a difference. We make it easy</title>
    <link href="<?php echo base_url('assets/css/style.default.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/morris.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-timepicker.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/select2.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.delay.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-override.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui-1.10.3.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/pace.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/toggles.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/weather-icons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.datatables.css'); ?>" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dropzone.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-jvectormap-2.0.5.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/daterangepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/retina.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.cookies.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.resize.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.spline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/raphael-2.1.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-wizard.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-timepicker.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.responsive.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dropzone.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/map.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-jvectormap-2.0.5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-jvectormap-us-aea-en.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.vmap.srilanka.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/require.js'); ?>"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/flot/jquery.flot.symbol.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.crosshair.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.categories.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/flot/jquery.flot.pie.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/charts.js'); ?>"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    <style>
        .pac-container {
            background-color: #FFF;
            z-index: 20;
            position: fixed;
            display: inline-block;
        }

        .modal {
            z-index: 20;
            top: 5% !important;

        }

        .modal-backdrop {
            z-index: 10;
        }

        ​ ::-moz-selection {
            /* Code for Firefox */
            color: white;
            background: #494d54;
        }

        ::selection {
            color: white;
            background: #494d54;
        }
    </style>
</head>



<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->