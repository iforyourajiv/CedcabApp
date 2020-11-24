<?php
if (!isset($_SESSION))
{
    session_start();
}

include_once './define.php';

class Ride
{

    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Connection Error! ' . mysqli_error($this->conn));
        if (!$this->conn)
        {
            echo 'Database Connection Error' . mysqli_connect_error($this->conn);
        }
    }


        public function saveRide($fromLocation,$toLocation,$cabType,$distance,$luggage,$fare,$status,$user_id){
            $query=mysqli_query($this->conn,"INSERT INTO tbl_ride (ride_date,fromLocation,toLocation,cabtype,
                   total_distance,luggage,total_fare,status,customer_user_id) VALUES (now(),'$fromLocation',
                   '$toLocation','$cabType','$distance','$luggage','$fare','$status','$user_id')");

                if($query){
                    return true;
                } else {
                   return false;
                }
        }



}



?>