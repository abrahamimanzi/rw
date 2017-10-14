<?php
// if (isset($_POST["request"]) && !empty($_POST["webToken"])) {   
// $_POST['request'] = $_POST['request'];
if (isset($_GET['request']) && ($_SERVER['REQUEST_METHOD'] == 'GET') && (trim($_GET["request"])) && !empty($_GET["request"])) { 


}

if (isset($_POST['request']) && ($_SERVER['REQUEST_METHOD'] == 'POST') && (trim($_POST["request"])) && !empty($_POST["request"])) { 
    $post_request = $_POST["request"];
			//echo $post_request;
	switch($post_request){
            
		case 'logout':

		break;
		case 'resetpassword':

		break;
		case 'user_sigggnup':

		break;
		case 'user_login':

			$username =  $_POST['username'];
			$password = $_POST['password'];

			// $username =  'rg@gmail.com';
			// $password = '#Cube2017@';


			$sql="SELECT * FROM app_users WHERE email='$username'";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
			if($count==1){
				$row = mysqli_fetch_row($result);
				$user_ID = $row[0];
				$username = $row[3];
				$user_password = $row[6];
				$salt = $row[7];
				$user_email = $row[8];
				$phone = $row[9];
				$user_groups = $row[18];
				// $user_ID = $row[0];
				// echo $row[5];
				if ($user_password === hash('sha256', $password. $salt)) {
					echo "User loged in";
					$_SESSION["username"] = $username;
					$_SESSION["user_ID"] = $user_ID;
					$_SESSION['start'] = time(); // Taking now logged in time.
					// Ending a session in 30 minutes from the starting time.
					$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
					header("Location: ./"); /* Redirect browser */
					exit;
				}else{
					echo "login decline";
				}
			}

			// $username =  'rg@gmail.com';
			// $sql="SELECT * FROM app_users WHERE email='$username'";
			// $result=mysqli_query($conn,$sql);
			// if (mysqli_num_rows($result) > 0 ){
			// 	while($row = mysqli_fetch_assoc($result)) {
			// 		echo $row["ID"]. "<br>";
			// 	}
			// } else {
			// 	echo "0 results";
			// }




			/*
			
			$password =  hash('sha256', $password. $salt);
			*/
		break;
		case 'recover-login':

		break;
		case 'user-new':

		break;
		case 'user-update':

		break;
		case 'reset-password':

		break;
		case 'user-state':

        break;
        // Ricta payment
        case 'make-payment':

        break;
    
    }
}
