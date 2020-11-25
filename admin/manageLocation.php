<?php
include_once '../location.class.php';

$location=new Location();
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

// if(isset($_GET['unblock'])) {
//     $id=$_GET['unblock'];
//     $isDone=$user->unblockUser($id);
//     if($isDone) {
//         header("location:manageUsers.php");
//     } else {
//         echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
//     }
// }

// if(isset($_GET['block'])) {
//     $id=$_GET['block'];
//     $isDone=$user->blockUser($id);
//     if($isDone) {
//         header("location:manageUsers.php");
//     } else {
//         echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
//     }
// }


?>
<?php include_once './sidebar.php'?>

        <div class="container-fluid">
            <h2 class="text-center">Manage Location</h2>
            <a href="addLocation.php" class="btn btn-success px-4 py-3 btn-dark">Add Location</a>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Location Name</th>
                                            <th class="border-top-0">Distance</th>
                                            <th class="border-top-0">Is Available</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $location->displayLocationAdmin();
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