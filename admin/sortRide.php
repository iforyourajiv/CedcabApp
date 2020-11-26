<?php
if (!isset($_SESSION))
{
    session_start();
}

include_once './define.php';
include_once '../ride.class.php';

class sortrequestRide
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

    public function sortDateAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='1' ORDER BY length(ride_date),`ride_date` ASC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function sortDateDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='1' ORDER BY length(ride_date),`ride_date` DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;  
        }
    }

    public function sortFareAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='1' ORDER BY CAST(total_fare AS SIGNED) ASC");
        $result=$query->num_rows;
        if($result>0){
           return $query;
        }
    }


    public function sortFareDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='1' ORDER BY CAST(total_fare AS SIGNED) DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function all(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='1'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }
   
    
}

class sortcompletedRide
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

    public function sortDateAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='2' AND is_deleted='0' ORDER BY length(ride_date),`ride_date` ASC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function sortDateDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='2' AND is_deleted='0' ORDER BY length(ride_date),`ride_date` DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;  
        }
    }

    public function sortFareAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='2' AND is_deleted='0' ORDER BY CAST(total_fare AS SIGNED) ASC");
        $result=$query->num_rows;
        if($result>0){
           return $query;
        }
    }


    public function sortFareDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='2' AND is_deleted='0' ORDER BY CAST(total_fare AS SIGNED) DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function all(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='2' AND is_deleted='0'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }
   
    
}

class canceledRide
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

    public function sortDateAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='0' AND is_deleted='0' ORDER BY length(ride_date),`ride_date` ASC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function sortDateDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='0' AND is_deleted='0' ORDER BY length(ride_date),`ride_date` DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;  
        }
    }

    public function sortFareAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='0' AND is_deleted='0' ORDER BY CAST(total_fare AS SIGNED) ASC");
        $result=$query->num_rows;
        if($result>0){
           return $query;
        }
    }


    public function sortFareDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='0' AND is_deleted='0' ORDER BY CAST(total_fare AS SIGNED) DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function all(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE status='0' AND is_deleted='0'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }
   
    
}

class all
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

    public function sortDateAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE is_deleted='0' ORDER BY length(ride_date),`ride_date` ASC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function sortDateDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE is_deleted='0' ORDER BY length(ride_date),`ride_date` DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;  
        }
    }

    public function sortFareAscending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE is_deleted='0' ORDER BY CAST(total_fare AS SIGNED) ASC");
        $result=$query->num_rows;
        if($result>0){
           return $query;
        }
    }


    public function sortFareDescending(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE  is_deleted='0' ORDER BY CAST(total_fare AS SIGNED) DESC");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }

    public function all(){
        $query=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE is_deleted='0'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        }
    }
   
    
}

?>