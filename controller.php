<?php
// if (isset($_POST["request"]) && !empty($_POST["webToken"])) {   
// $_POST['request'] = $_POST['request'];
if (isset($_GET['request']) && ($_SERVER['REQUEST_METHOD'] == 'GET') && (trim($_GET["request"])) && !empty($_GET["request"])) { 

	$post_request = $_GET["request"];
			//echo $post_request;
	switch($post_request){
            
		case 'return-pay':
			
		break;

	}
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

			$request =  $_POST['request'];
			$username =  $_POST['username'];
			$password = $_POST['password'];

			// $username =  'rg@gmail.com';
			// $password = '#Cube2017@';

				// echo $request." ". $username." ".$password;

			$sql="SELECT * FROM app_users WHERE email='$username'";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
			if($count==1){
				$row = mysqli_fetch_row($result);
				echo $user_ID = $row[0];
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
					//header("Location: ./"); /* Redirect browser */
					exit;
				}else{
					echo "login decline";
				}
			}

			// $username =  'rg@gmail.com';
			// $sql="SELECT * FROM app_users WHERE email='$username'";

			// $sql="SELECT * FROM app_users";
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
			$request = mysqli_real_escape_string($conn, $_POST['request']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$groups = mysqli_real_escape_string($conn, $_POST['group']);
			echo $request;

			$salt = mcrypt_create_iv(32);

			// make strong password
			$length = 6; 
			$add_dashes = false; 
			$available_sets = 'luds';

			$sets = array();
			if(strpos($available_sets, 'l') !== false)
				$sets[] = 'abcdefghjkmnpqrstuvwxyz';
			if(strpos($available_sets, 'u') !== false)
				$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
			if(strpos($available_sets, 'd') !== false)
				$sets[] = '23456789';
			if(strpos($available_sets, 's') !== false)
				$sets[] = '!@#$%&*?';
			$all = '';
			$password = '';
			foreach($sets as $set){
				$password .= $set[array_rand(str_split($set))];
				$all .= $set;
			}
			$all = str_split($all);
			for($i = 0; $i < $length - count($sets); $i++){
				$password .= $all[array_rand($all)];
			}
			$password = str_shuffle($password);
			if(!$add_dashes){
				$generate_password = $password;
			}else{
				$dash_len = floor(sqrt($length));
				$dash_str = '';
				while(strlen($password) > $dash_len)
				{
					$dash_str .= substr($password, 0, $dash_len) . '-';
					$password = substr($password, $dash_len);
				}
				$dash_str .= $password;
	            $generate_password = $dash_str;
			}
			// End of strong password

			$password = hash('sha256', $generate_password. $salt);

			echo '<br>'.$password.'<br>'.$generate_password.'<br>'.$salt;

			$sql = "INSERT INTO `app_users` (`firstname`, `phone`, `email`, `groups`, `password`, `salt`)
			VALUES ('$name', '$phone', '$email', '$groups', '$password', '$salt')";

			// if (mysqli_query($conn, $sql)) {
			//     echo "New record created successfully";
			// } else {
			//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			// }\
			if (!mysqli_query($conn,$sql)) {
				die('Error: ' . mysqli_error($conn));
			}
			echo "1 record added";


                $link = DN."/login/";

                $subject = "Your User Account for RICTA has been created";

                $messageText_0= 'Dear <b>'.$name.'</b>,';

                // $messageText_1= 'Your account has been successfully created by '.$session_user_data->firstname.' '.$session_user_data->lastname;

                $messageText_1= 'Your account as a user on the RICTA system has been created.';

                // $messageText_2= 'Your default password is: '.$generate_password.' You can easily change it once have logged in.';
                
                $messageText_2= '
                    <b>Your Username:</b> '.$email.'<br>
                    <b>Your Password:</b> '.$generate_password.'<br>
                    <b>Link:</b> <a href="'.$link.'">[LINK]</a>
                ';

                $messageText_3= '<b>Key information:-</b>';

                $messageText_4= 'Change your password immediately<br>
                Do not share your username and/or password with anyone including your colleagues, family or friends.<br>
                Should you find that your password has been compromised, send an email immediately 
                to noc@ricta.org.rw and call RICTA contact + 250 788 424 148. Should you not 
                reach the contact by phone, please send a message by SMS.';

                $messageText_5= 'Any changes made to any data should be logged and kept for referral.';


                $message_body = '
                    <body>
                        <div style="padding: 10px; margin-left: 10px; margin-right: 10px">

                            <section>
                                <p style="margin-bottom: 25px; font-size: 13px;">
                                    '.$messageText_0.'
                                </p>
                                <p style="font-size: 13px;">
                                    '.$messageText_1.'
                                </p>
                                <p style="font-size: 13px;">
                                     '.$messageText_2.'
                                </p>
                                <p style="font-size: 13px;">
                                     '.$messageText_3.'
                                </p>
                                <p style="font-size: 13px;">
                                     '.$messageText_4.'
                                </p>
                                <p style="font-size: 13px;">
                                     '.$messageText_5.'
                                </p>
                            
                                <p style="font-size: 13px;">
                                    <b>Stay connected</b> <br>
                                    <b>Twitter / Facebook:</b> RICTA <br>
                                    <b>Connect with our official tag:</b> #rw<br>
                                    <b>Youtube:</b> ricta<br>
                                </p>
                                <br>
                            </section>
                            <div style="font-size: 13px; padding: 0px; color: #222; position: relative">
                                <div style="background: #fff;text-align: left; color: #222; border-top: 1px solid #ddd; padding: 10px 5px">
                                    Regards,<br><br>

                                    RICTA Team<br>
                                    E:  noc@ricta.org.rw<br>
                                    T:  + 250 788 424 148<br>
                                    <a href="'.DN.'/tcs">Terms & Conditions</a> | 
                                    <a href="'.DN.'/privacy">Privacy Policy</a>
                                </div>
                            </div>
                        </div>
                    </body>
                ';

                $message_alt = $messageText_0.' '.$messageText_1.' '.$messageText_2;

                $contactDetails['from_email'] = 'abrahamahoshakiye@gmail.com';
                $contactDetails['from_names'] = 'RICTA';
                $contactDetails['to_email'] = $email;

                $contactDetails['attach'] = false;

                // $email_status = Functions::smartMailer($contactDetails,$subject,$message_body,$message_alt);

                // Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$to = $email;

				// More headers
				$headers .= 'From: <abrahamahoshakiye@gmail.com>' . "\r\n";
				$headers .= 'Cc: abrahamahoshakiye@gmail.com' . "\r\n";

				mail($to,$subject,$message_body,$headers);

		break;
		case 'user-update':

		break;
		case 'reset-password':

		break;
		case 'user-state':

        break;
        // Ricta payment
        case 'make-payment':
			$request = mysqli_real_escape_string($conn, $_POST['request']);
			$currency = mysqli_real_escape_string($conn, $_POST['currency']);
			$amount = mysqli_real_escape_string($conn, $_POST['amount']);

	        // $validate_array = array_merge($validate_array_0);

	        // $validation = $validate->check($_SUBMIT, $validate_array);


	            $admin_ID = 1;

	            echo $amount;
	            echo $currency;
	            
	            // $amount = 1;
	            // $currency = 'USD';
	            $orderInfo = 'ORDER34525';


	            // active
	            // $accountData = array(
	            //     'merchant_id' => 'BOK000017',
	            //     'access_code' => '6E1D4213',
	            //     'secret'      => '64D39353B699D231D047AF7585A56E64'
	            // );

	            //test
	            $accountData = array(
	                'merchant_id' => 'TESTBOK000017',
	                'access_code' => '9E7C9D4E',
	                'secret'      => '1C57A53FDDDE4B812AAA452A10FC8545'
	            );

	            // multi currency

	            if($currency=="RWF"){
	                // $_PDT['vpc_Currency']=646;
	                $mult = 1;
	            }elseif($currency=="USD"){
	                // $_PDT['vpc_Currency']=840;
	                $mult = 100;
	            }
	            /**
	             * Query data..
	             */

	            $queryData = array(
	                'vpc_AccessCode' => $accountData['access_code'],
	                'vpc_Merchant' => $accountData['merchant_id'],

	                'vpc_Amount' => ($amount * $mult), // Multiplying by 100 to convert to the smallest unit
	                'vpc_OrderInfo' => $orderInfo,

	                'vpc_MerchTxnRef' => Payment::generateMerchTxnRef(), // See functions.php file

	                'vpc_Command' => 'pay',
	                'vpc_Currency' => $currency,
	                'vpc_Locale' => 'en',
	                'vpc_Version' => 1,
	                'vpc_ReturnURL' => (DN.'/index.php?request=return-pay'),

	                'vpc_SecureHashType' => 'SHA256'
	            );

	            // Add secure secret after hashing
	            $queryData['vpc_SecureHash'] = Payment::generateSecureHash($accountData['secret'], $queryData); // See functions.php file

	            // 
	            $migsUrl = 'https://migs.mastercard.com.au/vpcpay?'.http_build_query($queryData);

	            // Redirect to the bank website to continue the 
	            header("Location: " . $migsUrl);
	        
        break;
    
    }
}
