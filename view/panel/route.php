<?php
    
    if (isset($_GET['request']) && ($_SERVER['REQUEST_METHOD'] == 'GET') && (trim($_GET["request"])) && !empty($_GET["request"])) { 

        $post_request = $_GET["request"];
                //echo $post_request;
        switch($post_request){
            case 'pay':
                include 'view/panel/make-payment.php';
            break;
            case 'return-pay':
                include 'view/panel/return-payment.php';
            break;
            case 'historical':
                include 'view/panel/historical.php';
            break;
            case 'users':
                include 'view/panel/users.php';
            break;
            case 'newuser':
                include 'view/panel/new-user.php';
            break;
            default:
                include 'view/panel/home.php';

        }
    } else {
        include 'view/panel/home.php';
    }

?>
