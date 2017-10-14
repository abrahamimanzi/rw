<?php  

require_once 'init.php';
require_once 'controller.php';


if (empty($_SESSION['username']) && empty($_SESSION['username']) && !isset($_SESSION['username'])) {
	// echo "session not set";
    include 'view/login.layout.php';
    exit; 
} else {
    header("Location: DN"); /* Redirect browser */
    exit;
}
