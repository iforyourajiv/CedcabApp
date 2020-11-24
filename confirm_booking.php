<?php

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
    echo "Your Booking Order is Accepted!!!Thankyou";
} else {
    echo "Oops!!! Something Went Wrong,Book Not Accepted ')";
}

?>
