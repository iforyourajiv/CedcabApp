<?php
include_once '../location.class.php';
include_once '../user.class.php';

$location = new Location();
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
$userData = new User();
if (isset($_POST['submit'])) {
 $oldPassword = md5($_POST['old_password']);
 $newPassword = $_POST['new_password'];
 $data        = $userData->fetchUserDetail();
 if ($data['password'] == $oldPassword) {
  $change = $userData->updatePassword($newPassword);
  if ($change) {
   echo "<script>alert('Password Changed Successfully')</script>";
   echo "<script>window.location.href='../logout.php';</script>";
  } else {
   echo "<script>alert('Password not Changed')</script>";
  }
 } else {
  echo "<script>alert('Old Password Is Incorrect')</script>";
 }

}

?>
<?php include_once './sidebar.php' ?>
<div class="container-fluid">
   <h2 class="ml-4">Change Password</h2>
   <div class="col-lg-8 col-xlg-9 col-md-12">
      <div class="card">
         <div class="card-body card-body-dark">
            <form action="" method="POST" class="form-horizontal form-material">
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Old Password</label>
                  <div class="col-md-12 border-bottom p-0">
                  <input type="password" id="password" class="form-control" name="old_password" required="required">
                  </div>
               </div>
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">New Password</label>
                  <div class="col-md-12 border-bottom p-0">
                  <input type="password" id="password" class="form-control" name="new_password" required="required">
                  </div>
               </div>
               <div class="form-group mb-4">
                  <div class="col-sm-12">
                     <input type="submit" name="submit" class="btn btn-success" value="Change Password"></input>
                  </div>
               </div>
            </form>
         </div>
      </div>
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
