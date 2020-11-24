<?php

include_once './define.php';
class Location{

    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Connection Error! ' . mysqli_error($this->conn));
        if (!$this->conn)
        {
            echo 'Database Connection Error' . mysqli_connect_error($this->conn);
        }
    }

    
    public function fetchLocation(){
        $location=mysqli_query($this->conn, "select * from tbl_location where is_available='1'");
        $result = $location->num_rows;
        if($result>0) {
            while ($data = mysqli_fetch_assoc($location)){
                $location_id=$data['id'];
                $location_name=$data['name'];
                $location_distance=$data['distance'];
                echo "<option value='$location_id'>$location_name</option>";
            }
           
        }

    }




}



?>