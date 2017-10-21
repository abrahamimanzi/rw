<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | RICTA</title>
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

    <!-- Custom Css -->
    <link href="<?=DN?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo text-center">
            <img src="<?=DN?>images/ricta_logo.png" alt="ricta">
        </div>
        <?php
            if (isset($_GET['request']) && ($_SERVER['REQUEST_METHOD'] == 'GET') && (trim($_GET["request"])) && !empty($_GET["request"])) { 

                $post_request = $_GET["request"];
                
                switch($post_request){
                        
                    case 'login':
                        include 'view/login/login.php';
                    break;
                    case 'resetpassword':
                        include 'view/login/login-resetpassword.php';
                    break;
                    case NULL:
                        include 'view/login/login.php';
                    break;
                    default:
                        include 'view/login/login.php';
                }
            } else{
                include 'view/login/login.php';
            }
        ?>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=DN?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=DN?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=DN?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=DN?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=DN?>js/admin.js"></script>
    <script src="<?=DN?>js/pages/examples/sign-in.js"></script>
    <script src="<?=DN?>js/pages/examples/forgot-password.js"></script>
</body>

</html>