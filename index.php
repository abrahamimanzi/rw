<?php

require_once 'init.php';
require_once 'controller.php';


// Set session variables

if (empty($_SESSION['username']) && empty($_SESSION['username']) && !isset($_SESSION['username'])) {
	// echo "session not set";
    header("Location: login.php");
    exit(); 
}

// echo " session set";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>RICTA</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=DN?>images/ricta_logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=DN?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=DN?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=DN?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?=DN?>plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?=DN?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?=DN?>plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?=DN?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?=DN?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?=DN?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=DN?>css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?=DN?>css/themes/theme-blue.css" rel="stylesheet" />
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <?php include 'view/panel/header.php'; ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include 'view/panel/aside-left.php'; ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <?php include 'view/panel/aside-right.php'; ?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <?php include 'view/panel/route.php'; ?>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?=DN?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=DN?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=DN?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=DN?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=DN?>plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?=DN?>plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?=DN?>plugins/momentjs/moment.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?=DN?>plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?=DN?>plugins/raphael/raphael.min.js"></script>
    <script src="<?=DN?>plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?=DN?>plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?=DN?>plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?=DN?>plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?=DN?>plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?=DN?>plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?=DN?>plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?=DN?>plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?=DN?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=DN?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?=DN?>js/admin.js"></script>
    <script src="<?=DN?>js/pages/index.js"></script>
    <!-- <script src="<?=DN?>js/pages/forms/basic-form-elements.js"></script>-->
    <script src="<?=DN?>js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?=DN?>js/demo.js"></script>
</body>

</html>