<?php
if (!isset($_SESSION)) {
 session_start();
}
include_once './dbcon.php';
class Location
{
 public $conn;
 public function __construct()
 {
  $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Connection Error! ' . mysqli_error($this->conn));
  if (!$this->conn) {
   echo 'Database Connection Error' . mysqli_connect_error($this->conn);
  }
 }

 public function fetchLocation()
 {
  $location = mysqli_query($this->conn, "select * from tbl_location where is_available='1'");
  $result   = $location->num_rows;
  if ($result > 0) {
   return $location;
  }
 }

 public function displayLocationAdmin()
 {
  $query  = mysqli_query($this->conn, "SELECT *FROM tbl_location");
  $result = $query->num_rows;
  if ($result > 0) {
   return $query;
  }
 }

 public function addLocation($locationName, $locationDistance, $isavailbale)
 {
  $find   = mysqli_query($this->conn, "SELECT name FROM tbl_location WHERE name='$locationName'");
  $result = $find->num_rows;
  if ($result > 0) {
   return false;
  } else {
   $query = mysqli_query($this->conn, "INSERT INTO tbl_location (name,distance,is_available)
            VALUES('$locationName','$locationDistance','$isavailbale')");
   if ($query) {
    return true;
   }
  }
 }

 public function fetchLocationDetail($id)
 {
  $query  = mysqli_query($this->conn, "SELECT *FROM tbl_location WHERE id='$id'");
  $result = $query->num_rows;
  if ($result > 0) {
   while ($data = mysqli_fetch_assoc($query)) {
    return $data;
   }
  }
 }

 public function updateLocation($id, $locationName, $locationDistance, $isavailable)
 {
//   $find   = mysqli_query($this->conn, "SELECT name FROM tbl_location WHERE name='$locationName' OR distance=' $locationDistance' ");
//   $result = $find->num_rows;
//   if ($result > 0) {
//    echo "<script>alert('Location Already Exist')</script>";
//   } else {
   $query = mysqli_query($this->conn, "UPDATE tbl_location SET name='$locationName',
                 distance='$locationDistance',is_available='$isavailable' WHERE id='$id'");
   if ($query) {
    return true;
   } else {
    return false;
   }
//   }

 }

 public function deleteLocation($locationID)
 {
  $query = mysqli_query($this->conn, "DELETE FROM tbl_location  WHERE id='$locationID'");
  if ($query) {
   return true;
  } else {
   return false;
  }
 }

 public function sortLocation($sort, $action)
 {
  $query  = mysqli_query($this->conn, "SELECT * FROM `tbl_location` ORDER BY cast(`$action` AS unsigned) $sort");
  $result = $query->num_rows;
  if ($result > 0) {
   return $query;
  } else {
   return false;
  }

 }
}
