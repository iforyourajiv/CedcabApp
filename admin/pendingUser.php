<?php
include_once '../ride.class.php';
include_once '../user.class.php';
require_once "Mail.php";
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
if (isset($_GET['unblock'])) {
 $id     = $_GET['unblock'];
 $email  = $_GET['email'];
 $isDone = $user->unblockUser($id);
 if ($isDone) {
  error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
  $host          = "ssl://smtp.gmail.com";
  $username      = "sddrajiv@gmail.com";
  $password      = "9931392583";
  $port          = "465";
  $to            = $email;
  $email_from    = $username;
  $email_subject = "Registration Request Approved:";
  $email_body    = "Congratulations !! Your Registration has been Approved By CedCab. Now you can Login";
  $email_address = "sddrajiv@gmail.com";

  $headers = array('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
  $smtp    = Mail::factory('smtp', array('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
  $mail    = $smtp->send($to, $headers, $email_body);
  if (PEAR::isError($mail)) {
   echo ("<p>" . $mail->getMessage() . "</p>");
  } else {
   header("location:pendingUser.php");
   echo ("<h3>Email Sent successfully sent!</h3>");
  }

 } else {
  echo "<script>alert('Something Went Wrong,Cant Perform Action')</script>";
 }
}
?>
<?php include_once './sidebar.php' ?>

        <div class="container-fluid">
            <h2 class="text-center text-danger">Blocked Users</h2>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">User ID</th>
                                            <th class="border-top-0">User Name
                                            <a href="pendingUser.php?status=1&sort=ASC&for=username">
                                             <i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
                                             <a href="pendingUser.php?status=1&sort=DESC&for=username">
                                             <i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
                                            <th class="border-top-0">Full Name
                                             <a href="pendingUser.php?status=1&sort=ASC&for=name">
                                             <i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
                                             <a href="pendingUser.php?status=1&sort=DESC&for=name">
                                             <i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
                                            <th class="border-top-0">Email
                                            <a href="pendingUser.php?status=1&sort=ASC&for=email">
                                             <i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
                                             <a href="pendingUser.php?status=1&sort=DESC&for=email">
                                             <i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
                                            <th class="border-top-0">Mobile</th>
                                            <th class="border-top-0">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
include_once '../user.class.php';
$recordSort = new User();
if (isset($_GET['status'])) {
 $status = $_GET['status'];
 $sort   = $_GET['sort'];
 $action = $_GET['for'];
 $data   = $recordSort->sortBlockedUser($status, $sort, $action);
 foreach ($data as $element) {
  $userID   = $element['user_id'];
  $username = $element['username'];
  $fullname = $element['name'];
  $email    = $element['email'];
  $mobile   = $element['mobile'];
  // $status=$data['status'];
  // $currentStatus="";
  $html = "<tr>";
  $html .= "<td class='text-danger'>$userID</td>";
  $html .= "<td class='text-danger'>$username</td>";
  $html .= "<td class='text-danger'>$fullname</td>";
  $html .= "<td class='text-danger'>$email</td>";
  $html .= "<td class='text-danger'>$mobile</td>";
  $html .= "<td><a href='pendingUser.php?unblock=$userID&email=$email' class='btn btn-success'>APPROVE</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} else {
 $data = $user->fetchUsersBlocked();
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
   $html .= "<td class='text-danger'>$userID</td>";
   $html .= "<td class='text-danger'>$username</td>";
   $html .= "<td class='text-danger'>$fullname</td>";
   $html .= "<td class='text-danger'>$email</td>";
   $html .= "<td class='text-danger'>$mobile</td>";
   $html .= "<td><a href='pendingUser.php?unblock=$userID&email=$email' class='btn btn-success'>APPROVE</a></td>";
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
            <footer class="footer text-center"> 2020 © Admin Panel | Cedcab.com
            </footer>
        </div>
    </div>
</body>
</html>