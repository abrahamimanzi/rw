
            <?php
                require_once 'classes/Payment.php';
                $transaction['status'] = Payment::getInput('vpc_TxnResponseCode');
                $transaction['key']    = Payment::getInput('vpc_TransactionNo');
                $transaction['message'] = Payment::getInput('vpc_Message');

                // $reference = getInput('vpc_MerchTxnRef');
                // Get order from the database by the `$reference` generated random number in the request process

                //&vpc_Version=1
                $vpc_3DSXID = Payment::getInput('vpc_3DSXID');
                $vpc_3DSenrolled = Payment::getInput('vpc_3DSenrolled');
                $vpc_AVSResultCode = Payment::getInput('vpc_AVSResultCode');
                $vpc_AcqAVSRespCode = Payment::getInput('vpc_AcqAVSRespCode');
                $vpc_AcqCSCRespCode = Payment::getInput('vpc_AcqCSCRespCode');
                $vpc_AcqResponseCode = Payment::getInput('vpc_AcqResponseCode');
                $vpc_Amount = Payment::getInput('vpc_Amount');
                $vpc_AuthorizeId = Payment::getInput('vpc_AuthorizeId');
                $vpc_BatchNo = Payment::getInput('vpc_BatchNo');
                $vpc_CSCResultCode = Payment::getInput('vpc_CSCResultCode');
                $vpc_Card = Payment::getInput('vpc_Card');
                $vpc_Command = Payment::getInput('vpc_Command');
                $vpc_Currency = Payment::getInput('vpc_Currency');
                $vpc_MerchTxnRef = Payment::getInput('vpc_MerchTxnRef');
                $vpc_Merchant = Payment::getInput('vpc_Merchant');
                $vpc_Message = Payment::getInput('vpc_Message');
                $vpc_OrderInfo = Payment::getInput('vpc_OrderInfo');
                $vpc_ReceiptNo = Payment::getInput('vpc_ReceiptNo');
                $vpc_RiskOverallResult = Payment::getInput('vpc_RiskOverallResult');
                $vpc_SecureHash = Payment::getInput('vpc_SecureHash');
                $vpc_SecureHashType = Payment::getInput('vpc_SecureHashType');
                $vpc_TransactionNo = Payment::getInput('vpc_TransactionNo');
                $vpc_TxnResponseCode = Payment::getInput('vpc_TxnResponseCode');
                $vpc_VerSecurityLevel = Payment::getInput('vpc_VerSecurityLevel');
                $vpc_VerStatus = Payment::getInput('vpc_VerStatus');
                $vpc_VerType = Payment::getInput('vpc_VerType');
                $vpc_Version = Payment::getInput('vpc_Version');
                $vpc_CardNum = Payment::getInput('vpc_CardNum');

                // echo $vpc_3DSXID.'<br>';
                // echo $vpc_3DSXID.'<br>';
                // echo $vpc_3DSenrolled;
                // echo $vpc_AVSResultCode;
                // echo $vpc_AcqAVSRespCode;
                // echo $vpc_AcqCSCRespCode;
                // echo $vpc_AcqResponseCode;
                // echo $vpc_Amount;
                // echo $vpc_AuthorizeId;
                // echo $vpc_BatchNo;
                // echo $vpc_CSCResultCode;
                // echo $vpc_Card;
                // echo $vpc_Command;
                // echo $vpc_Currency;
                // echo $vpc_MerchTxnRef;
                // echo $vpc_Merchant;
                // echo $vpc_Message;
                // echo $vpc_OrderInfo;
                // echo $vpc_ReceiptNo;
                // echo $vpc_RiskOverallResult;
                // echo $vpc_SecureHash;
                // echo $vpc_SecureHashType;
                // echo $vpc_TransactionNo;
                // echo $vpc_TxnResponseCode;
                // echo $vpc_VerSecurityLevel;
                // echo $vpc_VerStatus;
                // echo $vpc_VerType;
                // echo $vpc_Version;
                if ($vpc_Currency != 'RWF') {
                    $vpc_Amount = $vpc_Amount/100;
                }
                $user_ID = $_SESSION["user_ID"];
                $registrar = $_SESSION["username"];
                $email = $_SESSION["user_email"];
                $payment_rn = $user_ID;
                // $seconds = \Config::get('time/seconds');
                $seconds = date("Y-m-d");
                $payment_log_token = md5($user_ID.$seconds);

                    if($transaction['status'] == "0" && $transaction['message'] == "Approved") {

                        $sql = "INSERT INTO `payment_receive` (`user_ID`, `registrar`, `command`, `amount`, `currency`, `receipt_number`, `transaction_number`, `payment_rn`, `payment_date`, `payment_state`, `type`, `card_issue`, `card_number`, `token`)
                        VALUES ('$user_ID', '$registrar', '$vpc_Command', '$vpc_Amount', '$vpc_Currency', '$vpc_ReceiptNo', '$vpc_TransactionNo', '$payment_rn', '$seconds', '$vpc_Message', 'Single', '$vpc_Card', '$vpc_CardNum', '$payment_log_token')";

                        if (!mysqli_query($conn,$sql)) {
                            die('Error: ' . mysqli_error($conn));
                        }

                        echo '<span style="display: none;">';

                        $subject= 'Receipt: RICTA Payment';
        
                        $currency = $vpc_Currency;

                        $messageText_0= 'Dear <b>'.$registrar.'</b>,';

                        $messageText_1= 'Your payment has been successfully processed.';
                        

                        $messageText_2= 'Your Payment details are:';

                        $messageText_3= 'Kindly email us on noc@rict.org.rw, if you have not received your receipt.';



                        $message_body = '
                            <body>
                                <div style="padding: 10px; margin-left: 10px margin-right: 10px">

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
                                            User ID: '.$user_ID.'<br>
                                            Names: '.$registrar.'<br>
                                            Price: '.$currency.' '.$vpc_Amount.'<br>
                                            Payment Receipt: <a href="'.DN.'receipt.php?id='.$payment_log_token.'"> [Click here to view your Receipt]</a>
                                        </p>
                                        <p style="font-size: 13px;">
                                             '.$messageText_3.'
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

                        $message_alt = $messageText_0.' '.$messageText_1.' '.$messageText_2.' '.$messageText_3;

                        $contactDetails['from_email'] = 'abrahamahoshakiye@gmail.com';
                        $contactDetails['from_names'] = 'RICTA';
                        $contactDetails['to_email'] = $email;

                        $contactDetails['attach'] = false;
                        require_once 'classes/Functions.php';
                        $email_status = Functions::smartMailer($contactDetails,$subject,$message_body,$message_alt);

                        echo '</span>';
                        /*
                        $participant_code = Input::get('id','get');
                        $discount = 0;
                        $participantTable = new \User();
                        $participantTable->selectQuery("SELECT * FROM `app_users` WHERE `code`=? ORDER BY `ID` DESC LIMIT 1",array($user_ID));

                        if(!$participantTable->count()){
                            Redirect::to(DN.'/404');
                        }else{
                            $participant_data = $participantTable->first(); 
                        }

                        $payment_host_data = $participant_data;

                        // Save transaction information in the database
                        // Display transaction details
                            //https://migs.mastercard.com.au/ssl?paymentId=9080421090351159358&currentTimeStamp=1487579404418
                                $member_reg_data = $participant_data;
                                $member_other_data = $memberOtherDatas;
                                // $member_payment_data = $paymentResult['payment_data'];
                                $member_payment_data = Input::get('vpc_AcqResponseCode',
                                    'vpc_Amount','vpc_AuthorizeId','vpc_BatchNo','vpc_Currency',
                                    'vpc_Locale','vpc_MerchTxnRef','vpc_Merchant','vpc_Message',
                                    'vpc_ReceiptNo','vpc_SecureHash','vpc_SecureHashType',
                                    'vpc_TransactionNo','vpc_TxnResponseCode','vpc_3DSXID',
                                    'vpc_Command','vpc_OrderInfo');
                                $seconds = \Config::get('time/seconds');  
                                
                                // $participantTable = new \Participant();
                                // $participantTable->update(array(
                                //     'payment_state'=>'Confirmed',
                                //     'payment_date'=>$seconds,
                                //     'payment_rn'=>$payment_host_data->ID,
                                //     'receipt_number'=>$vpc_ReceiptNo,
                                //     'card_issue'=>$vpc_Card,
                                //     'card_number'=>$vpc_CardNum,
                                //     'transaction_number'=>$vpc_TransactionNo
                                // ),$participant_data->ID);

                                //&vpc_AcqAVSRespCode=Unsupported&vpc_AcqCSCRespCode=Unsupported&vpc_AcqResponseCode=00&vpc_Amount=635000&vpc_AuthorizeId=515010&vpc_BatchNo=20170220&vpc_CSCResultCode=Unsupported&vpc_Card=VC&vpc_Command=pay&vpc_Currency=RWF&vpc_Locale=en&vpc_MerchTxnRef=5899070691348419&vpc_Merchant=TESTBOK000003&vpc_Message=Approved&vpc_OrderInfo=TAS-PLA-000018&vpc_ReceiptNo=705120515010&vpc_RiskOverallResult=ACC&vpc_SecureHash=9004458FA1A92DD73EF225836C687BE9BC32A00BD59687C3A863C17DA5A7DCAC&vpc_SecureHashType=SHA256&vpc_TransactionNo=1100000034&vpc_TxnResponseCode=0&vpc_VerSecurityLevel=06&vpc_VerStatus=E&vpc_VerType=3DS&vpc_Version=1

                                $payment_log_token = md5($payment_host_data->ID.$seconds);
                                
                                $participantItemTable = new PaymentResponse();
                                $participantItemTable->insert(array( 
                                    'user_ID'=>$payment_host_data->ID, 
                                    'registrar'=>$payment_host_data->username, 
                                    'command'=>$vpc_Command,
                                    'amount'=>$vpc_Amount,
                                    'currency'=>$vpc_Currency,
                                    // 'order_info'=>$member_payment_data->vpc_OrderInfo,
                                    // 'receipt_string'=>$member_payment_data->receipt_string,
                                    'receipt_number'=>$vpc_ReceiptNo,
                                    'transaction_number'=>$vpc_TransactionNo,
                                    'payment_rn'=>$payment_host_data->code,
                                    'payment_date'=>$seconds,
                                    'payment_state'=>$vpc_Message,
                                    'type'=>'Single',
                                    'card_issue'=>$vpc_Card,
                                    'card_number'=>$vpc_CardNum,
                                    'token'=>$payment_log_token
                                ));
                            */
                        // $email_status = Payment::paymentConfirmedEmail(array($participant_data->ID));

                        // include 'views/register/success.php';
                        ?>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="card">
                                <div class="header bg-green">
                                    <h2>
                                        Payment successful
                                    </h2>
                                    <!-- <ul class="header-dropdown m-r--5">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="amber">
                                                <i class="material-icons">loop</i>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul> -->
                                </div>
                                <div class="body">
                                    The transaction was completed successfully. Your payment confirmation and receipt will be sent to <span><?=$email?></span> momentarily. <br>Please contact info@ricta.org.rw if you do not receive your  email within 12 hours.<br>Check your spam folder too.
                                </div>
                                <div class="header bg-blue-grey">
                                    <a href="<?=DN?>receipt.php?id=<?=$payment_log_token?>" class="btn btn-info waves-effect">RECEIPT</a>
                                </div>
                            </div>
                        </div>

                        <?php

                    } else {

                        $sql = "INSERT INTO `payment_receive` (`user_ID`, `registrar`, `command`, `amount`, `currency`, `receipt_number`, `transaction_number`, `payment_rn`, `payment_date`, `payment_state`, `type`, `card_issue`, `card_number`, `token`)
                        VALUES ('$user_ID', '$registrar', '$vpc_Command', '$vpc_Amount', '$vpc_Currency', '$vpc_ReceiptNo', '$vpc_TransactionNo', '$payment_rn', '$seconds', '$vpc_Message', 'Single', '$vpc_Card', '$vpc_CardNum', '$payment_log_token')";

                        if (!mysqli_query($conn,$sql)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                        /*
                        // Display error
                        // echo $transaction['status'] = getInput('vpc_TxnResponseCode') .'<br>';
                        // echo $transaction['key']    = getInput('vpc_TransactionNo') .'<br>';
                        // echo $transaction['message'] = getInput('vpc_Message');

                        $participant_code = Input::get('id','get');
                        $discount = 0;
                        $participantTable = new \User();
                        $participantTable->selectQuery("SELECT * FROM `app_users` WHERE `code`=? ORDER BY `ID` DESC LIMIT 1",array($user_ID));

                        if(!$participantTable->count()){
                            Redirect::to(DN.'/404');
                        }else{
                            $participant_data = $participantTable->first(); 
                        }
                        
                        $payment_host_data = $participant_data;

                        $member_reg_data = $participant_data;
                        // $member_other_data = $memberOtherDatas;
                        // $member_payment_data = $paymentResult['payment_data'];
                        $member_payment_data = Input::get('vpc_AcqResponseCode',
                            'vpc_Amount','vpc_AuthorizeId','vpc_BatchNo','vpc_Currency',
                            'vpc_Locale','vpc_MerchTxnRef','vpc_Merchant','vpc_Message',
                            'vpc_ReceiptNo','vpc_SecureHash','vpc_SecureHashType',
                            'vpc_TransactionNo','vpc_TxnResponseCode','vpc_3DSXID',
                            'vpc_Command','vpc_OrderInfo');
                        $seconds = \Config::get('time/seconds');  
                        
                        // $participantTable = new \Participant();
                        // $participantTable->update(array(
                        //     'payment_state'=>'Cancelled',
                        //     'payment_date'=>$seconds,
                        //     'payment_rn'=>$payment_host_data->ID,
                        //     'receipt_number'=>$vpc_ReceiptNo,
                        //     'transaction_number'=>$vpc_TransactionNo
                        // ),$participant_data->ID);

                        $payment_log_token = md5($payment_host_data->ID.$seconds);
                        
                        $participantItemTable = new PaymentResponse();
                        $participantItemTable->insert(array( 
                            'user_ID'=>$payment_host_data->ID, 
                            'registrar'=>$payment_host_data->username, 
                            'command'=>$vpc_Command,
                            'amount'=>$vpc_Amount,
                            'currency'=>$vpc_Currency,
                            // 'order_info'=>$member_payment_data->vpc_OrderInfo,
                            // 'receipt_string'=>$member_payment_data->receipt_string,
                            'receipt_number'=>$vpc_ReceiptNo,
                            'transaction_number'=>$vpc_TransactionNo,
                            'payment_rn'=>$payment_host_data->ID,
                            'payment_date'=>$seconds,
                            'payment_state'=>'Cancelled',
                            'type'=>'Single',
                            'token'=>$payment_log_token
                        ));
                        */
                        // $email_status = Payment::paymentCancelledEmail(array($participant_data->ID));

                        // include 'views/register/decline.php';

                        if($transaction['message'] == 'Cancelled'){ 

                            ?>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="header bg-amber">
                                        <h2>
                                            Payment cancelled
                                        </h2>
                                        <!-- <ul class="header-dropdown m-r--5">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="amber">
                                                    <i class="material-icons">loop</i>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </div>
                                    <div class="body">
                                        You seem to have cancelled your payment. 
                                    </div>
                                </div>
                            </div>



                            <?php
                        }elseif($transaction['message'] != 'Approved'){
                            ?>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="header bg-red">
                                        <h2>
                                            Payment decline
                                        </h2>
                                        <!-- <ul class="header-dropdown m-r--5">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="amber">
                                                    <i class="material-icons">loop</i>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </div>
                                    <div class="body">
                                        You seem to entered an incorrect card details, please try again.
                                    </div>
                                </div>
                            </div>

                          <?php
                        }else{
                            ?>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="header bg-amber">
                                        <h2>
                                            Payment decline
                                        </h2>
                                        <!-- <ul class="header-dropdown m-r--5">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="amber">
                                                    <i class="material-icons">loop</i>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </div>
                                    <div class="body">
                                        You seem to have cancelled your payment.
                                    </div>
                                </div>
                            </div>


                          <?php

                        }

                    }
            ?>