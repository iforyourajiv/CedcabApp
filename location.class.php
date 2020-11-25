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
                // $location_distance=$data['distance'];
                echo "<option value='$location_id'>$location_name</option>";
            }
           
        }

    }

    public function displayLocationAdmin(){
        $query=mysqli_query($this->conn,"SELECT *FROM tbl_location");
        $result=$query->num_rows;
        if($result>0){
            while($data=mysqli_fetch_assoc($query)){
                $locationID=$data['id'];
                $locationName=$data['name'];
                $distance=$data['distance'];
                $available=$data['is_available'];
                $currentStatus="";
                if($available=="0"){
                    $currentStatus="NOT AVAILABLE";
                } else {
                    $currentStatus="AVAILABLE";
                }

                $html="<tr>";
                $html.="<td class='text-dark'>$locationName</td>";
                $html.="<td class='text-dark'>$distance</td>";
                $html.="<td class='text-dark'>$currentStatus</td>";
                $html.="<td><a href='manageLocation.php?id=$locationID' class='btn btn-warning'>EDIT</a>
                            <a href='manageLocation.php?del_id=$locationID' class='btn btn-danger'>DELETE</a></td>";
                $html.="</tr>"; 
                echo $html; 
            }
        }
    }

    public function addLocation($locationName,$locationDistance,$isavailbale) {
        
    }




}



?>