<?php

include_once './user.class.php';

if (!isset($_SESSION)) {
    session_start();
   }
   
   if (!isset($_SESSION['username'])) {
    header('location:index.php');
   }

$action=$_POST['action'];
if($action=='send'){
        $mobile=$_POST['mobile'];
        $APIKey='0074c169-33a5-11eb-83d4-0200cd936042';
        $API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/$mobile/AUTOGEN"),false);
        $VerificationSessionId= $API_Response_json->Details; 
        echo $VerificationSessionId;     
} 

if($action=='verify'){
    $otpValue =$_POST['otp'];
    $APIKey   ='0074c169-33a5-11eb-83d4-0200cd936042';
    $result   = new User();
    if ($otpValue != '') { 
    
     $VerificationSessionId = $_POST['verificationSessionId'];
     $API_Response_json     = json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/VERIFY/$VerificationSessionId/$otpValue"), false);
     $VerificationStatus    = $API_Response_json->Details;
    

     if ($VerificationStatus == 'OTP Matched') {
      $check = $result->mobileVarificationSave();
      if ($check) {
        echo "<script type='text/javascript'>alert('Congratulations ,Your Mobile Number is Verified.');  window.location('manageProfile.php');  </script>";
       die();
      } else {
       echo "Status is Not Updated On Database";
       die();
      }
    
     } else {
      echo "<script type='text/javascript'>alert('Sorry, OTP entered was incorrect. Please enter correct OTP'); </script>";
      die();
     }
    }

}

   



