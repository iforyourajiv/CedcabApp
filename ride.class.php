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
                   total_distance,luggage,total_fare,status,customer_user_id) VALUES (now(),'$fromLocation',
                   '$toLocation','$cabType','$distance','$luggage','$fare','$status','$user_id')");

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
                while($data=mysqli_fetch_assoc($query)) {
                    $fromLocation=$data['fromLocation'];
                    $toLocation=$data['toLocation'];
                    $rideDate=$data['ride_date'];
                    $cabType=$data['cabtype'];
                    $distance=$data['total_distance'];
                    $luggage=$data['luggage'];
                    $fare=$data['total_fare'];
                    $status=$data['status'];
                    $currentStatus="";
                    if($status==1){
                        $currentStatus="Pending";
                    } else if($status==2){
                        $currentStatus="Completed";
                    } else if($status==0) {
                        $currentStatus="Cancelled";
                    }

                    $html="<tr>";
                    $html.="<td>$fromLocation</td>";
                    $html.="<td>$toLocation</td>";
                    $html.="<td>$rideDate</td>";
                    $html.="<td>$cabType</td>";
                    $html.="<td>$distance</td>";
                    $html.="<td>$luggage</td>";
                    $html.="<td>&#x20B9;&nbsp;$fare</td>";
                    $html.="<td>$currentStatus</td>";
                    $html.="</tr>";
                    echo $html;
                }
                
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
                while($data=mysqli_fetch_assoc($query)){
                    $rideID=$data['ride_id'];
                    $fromLocation=$data['fromLocation'];
                    $toLocation=$data['toLocation'];
                    $rideDate=$data['ride_date'];
                    $cabType=$data['cabtype'];
                    $distance=$data['total_distance'];
                    $luggage=$data['luggage'];
                    $fare=$data['total_fare'];
                    // $status=$data['status'];
                    // $currentStatus="";

                    $html="<tr>";
                    $html.="<td class='text-purple'>$rideID</td>";
                    $html.="<td class='text-purple'>$fromLocation</td>";
                    $html.="<td class='text-purple'>$toLocation</td>";
                    $html.="<td class='text-purple'>$rideDate</td>";
                    $html.="<td class='text-purple'>$cabType</td>";
                    $html.="<td class='text-purple'>$distance</td>";
                    $html.="<td class='text-purple'>$luggage</td>";
                    $html.="<td class='text-purple'>$fare</td>";
                    $html.="<td><a href='rideRequest.php?c_id=$rideID' class='btn btn-success'>APPROVE</a>
                                <a href='rideRequest.php?del_id=$rideID' class='btn btn-danger'>Cancel</a></td>";
                    $html.="</tr>"; 
                    echo $html; 
                }
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
            $query=mysqli_query($this->conn,"SELECT *FROM tbl_ride where status='2'");
            $result=$query->num_rows;
            if($result>0){
                while($data=mysqli_fetch_assoc($query)){
                    $rideID=$data['ride_id'];
                    $fromLocation=$data['fromLocation'];
                    $toLocation=$data['toLocation'];
                    $rideDate=$data['ride_date'];
                    $cabType=$data['cabtype'];
                    $distance=$data['total_distance'];
                    $luggage=$data['luggage'];
                    $fare=$data['total_fare'];
                    // $status=$data['status'];
                    // $currentStatus="";

                    $html="<tr>";
                    $html.="<td class='text-purple'>$rideID</td>";
                    $html.="<td class='text-purple'>$fromLocation</td>";
                    $html.="<td class='text-purple'>$toLocation</td>";
                    $html.="<td class='text-purple'>$rideDate</td>";
                    $html.="<td class='text-purple'>$cabType</td>";
                    $html.="<td class='text-purple'>$distance</td>";
                    $html.="<td class='text-purple'>$luggage</td>";
                    $html.="<td class='text-purple'>$fare</td>";
                    $html.="<td><a href='pastRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
                    $html.="</tr>"; 
                    echo $html; 
                }
            }
        }

        public function deleteRide($rideID){
            $query=mysqli_query($this->conn,"DELETE FROM tbl_ride  WHERE ride_id='$rideID'");
            if($query) {
                return true;
            } else {
                return false;
            }
        }
}



?>