<?php
include_once './define.php';
class Tile
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


    public function tilesrideRequest(){
        $query=mysqli_query($this->conn,"SELECT * FROM tbl_ride WHERE status='1'");
        $result=$query->num_rows;
        if($result>0) {
            return $result;
        } else {
            return false;
        }
    }

    public function tilesrideCompleted(){
        $query=mysqli_query($this->conn,"SELECT * FROM tbl_ride WHERE status='2' AND  is_deleted='0'");
        $result=$query->num_rows;
        if($result>0) {
            return $result;
        } else {
            return false;
        }
    }

    public function tilesrideCanceled(){
        $query=mysqli_query($this->conn,"SELECT * FROM tbl_ride WHERE status='0'");
        $result=$query->num_rows;
        if($result>0) {
            return $result;
        } else {
            return false;
        }
    }

    public function tilesUserrequest(){
        $query=mysqli_query($this->conn,"SELECT * FROM tbl_user WHERE isblock='1'");
        $result=$query->num_rows;
        if($result>0) {
            return $result;
        } else {
            return false;
        }
    }


}
?>