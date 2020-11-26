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
        header("location:pendingUser.php");
    } else {
        echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
    }
}
?>
<?php include_once './sidebar.php'?>

        <div class="container-fluid">
            <h2 class="text-center text-danger">Blocked Users</h2>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
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
                                        $data=$user->fetchUsersBlocked();
                                        foreach($data as $element) {
                                            $userID= $element['user_id'];
                                            $username= $element['username'];
                                            $fullname= $element['name'];
                                            $email= $element['email'];
                                            $mobile= $element['mobile'];
                                            // $status=$data['status'];
                                            // $currentStatus="";
                                            $html="<tr>";
                                            $html.="<td class='text-danger'>$userID</td>";
                                            $html.="<td class='text-danger'>$username</td>";
                                            $html.="<td class='text-danger'>$fullname</td>";
                                            $html.="<td class='text-danger'>$email</td>";
                                            $html.="<td class='text-danger'>$mobile</td>";
                                            $html.="<td><a href='pendingUser.php?unblock=$userID' class='btn btn-success'>UNBLOCK</a></td>";
                                            $html.="</tr>"; 
                                            echo $html; 
                                        } 
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