<?php
if (!isset($_SESSION)) {
    session_start();
   }
   
   if (!isset($_SESSION['username'])) {
    header("location:../login.php");
   }

include '../ride.class.php';
$record=new Ride();
$data=$record->rideChart();
foreach($data as $element){
$data_date=$element['ride_date'];
$data_row=$element['count(*)'];
$result_array[] =['data'=>$data_row,'date'=>$data_date];
}
echo json_encode($result_array);



?>