<?php

if (!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
include_once './ride.class.php';

$ride=new Ride();

$user_id=$_POST['user'];
$fromLocation=$_POST['from'];
$toLocation=$_POST['to'];
$cabType=$_POST['cabtype'];
$distance=$_POST['distance'];
$luggage=$_POST['luggage'];
$fare=$_POST['fare'];
$status=$_POST['status'];

$response=$ride->saveRide($fromLocation,$toLocation,$cabType,$distance,$luggage,$fare,$status,$user_id);

if($response) {
    $_SESSION['from']="";
    $_SESSION['to']="";
    $_SESSION['totalDistance']="";
    $_SESSION['cabType']="";
    $_SESSION['luggage']="";
    $_SESSION['fare']="";
    echo "Your Booking Order is Accepted!!!Thankyou";
  
} else {
    echo "Oops!!! Something Went Wrong,Book Not Accepted ')";
}

?>
