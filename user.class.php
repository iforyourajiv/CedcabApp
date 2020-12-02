<?php
if (!isset($_SESSION)) {
    session_start();
}
// Class For All User Activities
include_once './dbcon.php';
class User {
    public $conn;
    public $user_id;
    public function __construct() {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Connection Error! ' . mysqli_error($this->conn));
        if (!$this->conn) {
            echo 'Database Connection Error' . mysqli_connect_error($this->conn);
        }
    }
    public function signup($username, $fullname, $email, $mobile, $password, $isBlock, $isAdmin) {
        $enc_password = md5($password);
        $checkuser = mysqli_query($this->conn, "select * from tbl_user where username='$username'");
        $result = mysqli_num_rows($checkuser);
        if ($result == 0) {
            $sql = mysqli_query($this->conn, "INSERT INTO tbl_user (username,name,email,dateofsignup,mobile,isblock,password,is_admin)
            VALUES('$username','$fullname','$email',now(),'$mobile','$isBlock','$enc_password','$isAdmin')");
            return $sql;
        } else {
            return false;
        }
    }
    public function login($username, $password, $remember) {
        $enc_password = md5($password);
        $query = mysqli_query($this->conn, "select * from tbl_user where username='$username' and password='$enc_password'");
        $data = mysqli_fetch_assoc($query);
        $result = $query->num_rows;
        if ($result == 1) {
            $user_id = $data['user_id'];
            $user = $data['username'];
            $isblock = $data['isblock'];
            $isadmin = $data['is_admin'];
            if ($isadmin == 0) {
                if ($isblock == "1") {
                    echo "<script>alert('You Are Blocked  !!! Please Wait For Approval')</script>";
                } else {
                    $_SESSION['usertype'] = "user";
                    $_SESSION['username'] = $user;
                    $_SESSION['user_id'] = $user_id;
                    if ($remember) {
                        setcookie("user", $user, time() + (86400 * 30), "/");
                        setcookie("checked", "remember", time() + (86400 * 30), "/");
                    } else {
                        setcookie("user", "", time() - 3600, "/");
                        setcookie("checked", "", time() - 3600, "/");
                    }
                    if ($_SESSION['current']) {
                        header("location:booking.php");
                    } else {
                        header("location:userdashboard.php");
                    }
                }
            } else {
                $_SESSION['usertype'] = "admin";
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $user;
                header("location:admin/index.php");
            }
        } else {
            echo "<script>alert('Username Or Password Is Incorrect')</script>";
        }
    }
    public function fetchUserDetail() {
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "SELECT *FROM tbl_user WHERE user_id='$this->user_id'");
        $result = $query->num_rows;
        if ($result > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
                return $data;
            }
        }
    }
    public function updateData($id, $fullname, $email, $mobile) {
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "UPDATE tbl_user SET name='$fullname',email='$email',mobile='$mobile' WHERE user_id='$this->user_id'");
        return $query;
    }
    public function updatePassword($newPassword) {
        $enc_password = md5($newPassword);
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "UPDATE tbl_user SET password='$enc_password' WHERE user_id='$this->user_id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function fetchUsersBlocked() {
        $query = mysqli_query($this->conn, "SELECT *FROM tbl_user where isblock='1' AND is_admin='0'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        }
    }
    public function blockUser($user_id) {
        $query = mysqli_query($this->conn, "UPDATE tbl_user SET isblock='1' WHERE user_id='$user_id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function fetchUsersUnblocked() {
        $query = mysqli_query($this->conn, "SELECT *FROM tbl_user where isblock='0' AND is_admin='0'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        }
    }
    public function allUsers() {
        $query = mysqli_query($this->conn, "SELECT *FROM tbl_user where is_admin='0'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        }
    }
    public function unblockUser($user_id) {
        $query = mysqli_query($this->conn, "UPDATE tbl_user SET isblock='0' WHERE user_id='$user_id'");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
    function sortUserRides($status, $sort, $action) {
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "SELECT * FROM `tbl_ride` WHERE `customer_user_id` = '" . $this->user_id . "' AND `status`='" . $status . "' ORDER BY cast(`$action` AS unsigned) $sort");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function filterPendingUserRideDate($startDate, $endDate) {
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id ='$this->user_id' AND ride_date BETWEEN '$startDate' AND '$endDate' AND (status='1')");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function filterPendingUserRideWeek($filterWeek) {
        $this->user_id = $_SESSION['user_id'];
        $weekTrimmed = (substr($filterWeek, -2) - 1);
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id = '$this->user_id' AND WEEK(`ride_date`) = '$weekTrimmed' AND (status='1')");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function filterCompletedUserRideDate($startDate, $endDate) {
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id ='$this->user_id' AND ride_date BETWEEN '$startDate' AND '$endDate' AND (status='2')");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function filterCompletedUserRideWeek($filterWeek) {
        $this->user_id = $_SESSION['user_id'];
        $weekTrimmed = (substr($filterWeek, -2) - 1);
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id = '$this->user_id' AND WEEK(`ride_date`) = '$weekTrimmed' AND (status='2')");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function filterCanceledUserRideDate($startDate, $endDate) {
        $this->user_id = $_SESSION['user_id'];
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id ='$this->user_id' AND ride_date BETWEEN '$startDate' AND '$endDate' AND (status='0')");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function filterCanceledUserRideWeek($filterWeek) {
        $this->user_id = $_SESSION['user_id'];
        $weekTrimmed = (substr($filterWeek, -2) - 1);
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id = '$this->user_id' AND WEEK(`ride_date`) = '$weekTrimmed' AND (status='0')");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    function sortBlockedUser($status, $sort, $action) {
        $query = mysqli_query($this->conn, "SELECT * FROM `tbl_user` WHERE `isblock`='" . $status . "' AND `is_admin`='0' ORDER BY `$action` $sort");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    function sortApprovedUser($status, $sort, $action) {
        $query = mysqli_query($this->conn, "SELECT * FROM `tbl_user` WHERE `isblock`='" . $status . "' AND `is_admin`='0' ORDER BY `$action` $sort");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    function sortAllUser($sort, $action) {
        $query = mysqli_query($this->conn, "SELECT * FROM `tbl_user` WHERE `is_admin`='0' ORDER BY `$action` $sort");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
?>
