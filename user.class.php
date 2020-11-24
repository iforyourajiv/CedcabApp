<?php
if (!isset($_SESSION))
{
    session_start();
}

include_once './define.php';

class User
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
    public function signup($username, $fullname, $email, $mobile, $password, $isBlock, $isAdmin)
    {
        $enc_password = md5($password);
        $checkuser = mysqli_query($this->conn, "select * from tbl_user where username='$username'");
        $result = mysqli_num_rows($checkuser);
        if ($result == 0)
        {
            $sql = mysqli_query($this->conn, "INSERT INTO tbl_user (username,name,email,dateofsignup,mobile,isblock,password,is_admin)
            VALUES('$username','$fullname','$email',now(),'$mobile','$isBlock','$enc_password','$isAdmin')");
            return $sql;
        }
        else
        {
            return false;
        }

    }

    public function login($username, $password)
    {
        $enc_password = md5($password);
        $query = mysqli_query($this->conn, "select * from tbl_user where username='$username' and password='$enc_password'");
        $data = mysqli_fetch_assoc($query);
        $result = $query->num_rows;
        if ($result == 1)
        {   
            $user_id=$data['user_id'];
            $user = $data['username'];
            $isblock = $data['isblock'];
            $isadmin = $data['is_admin'];
            if ($isadmin == 0)
            {
                if ($isblock == "1")
                {
                    echo "<script>alert('You Are Blocked  !!! Please Wait For Approval')</script>";
                }
                else
                {
                    $_SESSION['usertype'] ="user";
                    $_SESSION['username'] = $user;
                    $_SESSION['user_id'] = $user_id;
                    if($_SESSION['current']) {
                        header("location:booking.php");
                    } else {
                        header("location:index.php");
                    }
                    
                }
            }
            else
            {
                $_SESSION['usertype'] = "admin";
                $_SESSION['username'] = $user;
                echo "admin";

            }
        }
        else
        {
            echo "<script>alert('Username Or Password Is Incorrect')</script>";
        }

    }

}

?>
