<?php
include_once '../user.class.php';
$user = new User();
if (!isset($_SESSION)) {
 session_start();
}

if (!isset($_SESSION['username'])) {
 header("location:../login.php");
}

if (isset($_SESSION['username'])) {
 if ($_SESSION['usertype'] == "user") {
  header("location:../index.php");
 }
}

if (isset($_GET['block'])) {
 $id     = $_GET['block'];
 $isDone = $user->blockUser($id);
 if ($isDone) {
  header("location:approvedUser.php");
 } else {
  echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
 }
}


if (isset($_GET['del'])) {
    $id          = $_GET['del'];
    $delete_user = new User();
    $check       = $delete_user->userdelete($id);
    if ($check) {
     header('location:allUser.php');
    } else {
     echo "<script>alert('Something Went Wrong ,User Not Deleted, Please try Again')</script>";
    }
   
   }

?>
<?php include_once './sidebar.php' ?>

        <div class="container">
            <h2 class="text-center">All Users</h2>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                    <tr>
                                        <th class="border-top-0">User ID</th>
                                            <th class="border-top-0">User Name
                                            <a href="allUser.php?sort=ASC&for=username">
                                             <i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
                                             <a href="allUser.php?sort=DESC&for=username">
                                             <i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
                                            <th class="border-top-0">Full Name
                                             <a href="allUser.php?sort=ASC&for=name">
                                             <i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
                                             <a href="allUser.php?sort=DESC&for=name">
                                             <i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
                                            <th class="border-top-0">Email
                                            <a href="allUser.php?sort=ASC&for=email">
                                             <i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
                                             <a href="allUser.php?sort=DESC&for=email">
                                             <i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
                                            <th class="border-top-0">Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
include_once '../user.class.php';
$recordSort = new User();
if (isset($_GET['sort'])) {
 $sort   = $_GET['sort'];
 $action = $_GET['for'];
 $data   = $recordSort->sortAllUser($sort, $action);
 foreach ($data as $element) {
  $userID   = $element['user_id'];
  $username = $element['username'];
  $fullname = $element['name'];
  $email    = $element['email'];
  $mobile   = $element['mobile'];
  // $status=$data['status'];
  // $currentStatus="";
  $html = "<tr>";
  $html .= "<td class='text-dark'>$userID</td>";
  $html .= "<td class='text-dark'>$username</td>";
  $html .= "<td class='text-dark'>$fullname</td>";
  $html .= "<td class='text-dark'>$email</td>";
  $html .= "<td class='text-dark'>$mobile</td>";
  $html .= "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Please confirm deletion');\" href='allUser.php?del=$userID'>Delete Permanently</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} else {
 $data = $user->allUsers();
 if ($data) {
  foreach ($data as $element) {
   $userID   = $element['user_id'];
   $username = $element['username'];
   $fullname = $element['name'];
   $email    = $element['email'];
   $mobile   = $element['mobile'];
   // $status=$data['status'];
   // $currentStatus="";
   $html = "<tr>";
   $html .= "<td class='text-dark'>$userID</td>";
   $html .= "<td class='text-dark'>$username</td>";
   $html .= "<td class='text-dark'>$fullname</td>";
   $html .= "<td class='text-dark'>$email</td>";
   $html .= "<td class='text-dark'>$mobile</td>";
   $html .= "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Please confirm deletion');\" href='allUser.php?del=$userID'>Delete Permanently</a></td>";
   $html .= "</tr>";
   echo $html;
  }
 } else {
  echo "<h3>No Record Found</h3>";
 }

}

?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center fixed-bottom"> 2020 © Admin Panel | Cedcab.com
            </footer>
        </div>
    </div>
</body>
</html>