<?php
if (!isset($_SESSION))
{
    session_start();
}

include_once './define.php';

class Ride
{

    public $conn;
    public $user_id;
    
    public function __construct()
    {   
        $this->user_id=$_SESSION['user_id'];
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Connection Error! ' . mysqli_error($this->conn));
        if (!$this->conn)
        {
            echo 'Database Connection Error' . mysqli_connect_error($this->conn);
        }
    }


        public function saveRide($fromLocation,$toLocation,$cabType,$distance,$luggage,$fare,$status,$user_id){
            $query=mysqli_query($this->conn,"INSERT INTO tbl_ride (ride_date,fromLocation,toLocation,cabtype,
                   total_distance,luggage,total_fare,status,customer_user_id,is_deleted) VALUES (now(),'$fromLocation',
                   '$toLocation','$cabType','$distance','$luggage','$fare','$status','$user_id','0')");
                if($query){
                    return true;
                } else {
                   return false;
                }
        }

        public function rideRecords(){
            $query=mysqli_query($this->conn,"select *from tbl_ride where customer_user_id='$this->user_id'");
            $result=$query->num_rows;
            if($result>0) {
                return $query;   
            }
        }

        public function totalSpent() {
            $query=mysqli_query($this->conn,"select total_fare from tbl_ride where customer_user_id='$this->user_id' AND
                                (status='1' OR status='2')");
            $result=$query->num_rows;
            if($result>0) {
                $total=0;
                while($data=mysqli_fetch_assoc($query)){
                        $fare=$data['total_fare'];
                        $total+=$fare;
                }
                return $total;
            }
        }


        public function rideRequestAdmin(){
            $query=mysqli_query($this->conn,"SELECT *FROM tbl_ride where status='1'");
            $result=$query->num_rows;
            if($result>0){
                return $query;
            }
        }

        public function confirmRide($rideID){
            $query=mysqli_query($this->conn,"UPDATE tbl_ride SET status='2' WHERE ride_id='$rideID'");
            if($query) {
                return true;
            } else {
                return false;
            }
        }

        public function cancelRide($rideID){
            $query=mysqli_query($this->conn,"UPDATE tbl_ride SET status='0' WHERE ride_id='$rideID'");
            if($query) {
                return true;
            } else {
                return false;
            }
        }

        public function pastRide(){
            $query=mysqli_query($this->conn,"SELECT *FROM tbl_ride where status='2' AND is_deleted='0'");
            $result=$query->num_rows;
            if($result>0){
               return $query;
            }
        }


        public function canceledRide(){
            $query=mysqli_query($this->conn,"SELECT *FROM tbl_ride where status='0' AND is_deleted='0'");
            $result=$query->num_rows;
            if($result>0){
               return $query;
            }
        }

        public function allRides(){
            $query=mysqli_query($this->conn,"SELECT *FROM tbl_ride where is_deleted='0'");
            $result=$query->num_rows;
            if($result>0){
               return $query;
            }
        }

        public function deleteRide($rideID){
            $query=mysqli_query($this->conn,"UPDATE tbl_ride SET is_deleted='1' WHERE ride_id='$rideID'");
            if($query) {
                return true;
            } else {
                return false;
            }
        }
}



?>