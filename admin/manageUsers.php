<?php
include_once '../ride.class.php';
include_once '../user.class.php';
$user=new User();
if (!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['username'])){
    header("location:../login.php");
}

if(isset($_SESSION['username'])){
    if($_SESSION['usertype']=="user"){
        header("location:../index.php");
    }
}

if(isset($_GET['unblock'])) {
    $id=$_GET['unblock'];
    $isDone=$user->unblockUser($id);
    if($isDone) {
        header("location:manageUsers.php");
    } else {
        echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
    }
}

if(isset($_GET['block'])) {
    $id=$_GET['block'];
    $isDone=$user->blockUser($id);
    if($isDone) {
        header("location:manageUsers.php");
    } else {
        echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
    }
}


?>
<?php include_once './sidebar.php'?>

        <div class="container-fluid">
            <h2 class="text-center">Manage Users</h2>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                    <h3 class="text-center mt-3 text-danger">Blocked Users</h3>
                                        <tr>
                                            <th class="border-top-0">User ID</th>
                                            <th class="border-top-0">User Name</th>
                                            <th class="border-top-0">Full Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Mobile</th>
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $user->fetchUsersBlocked();
                                       ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                    <h3 class="text-center mt-3 text-success">Unblocked Users</h3>
                                        <tr>
                                            <th class="border-top-0">User ID</th>
                                            <th class="border-top-0">User Name</th>
                                            <th class="border-top-0">Full Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Mobile</th>
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $user->fetchUsersUnblocked();
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2020 © Admin Panel | Cedcab.com 
            </footer>
        </div>
    </div> 
</body>
</html>