<?php include_once './header.php' ?>
<?php
include_once './user.class.php';

if (!isset($_SESSION)) {
 session_start();
}

if (!isset($_SESSION['username'])) {
 header('location:index.php');
}
$userData = new User();
if (isset($_POST['submit'])) {
 $oldPassword = md5($_POST['old_password']);
 $newPassword = $_POST['new_password'];
 $re_password = $_POST['re_password'];

 if ($newPassword == $re_password) {
  $data = $userData->fetchUserDetail();
  if ($data['password'] == $oldPassword) {
   $change = $userData->updatePassword($newPassword);
   if ($change) {
    echo "<script>alert('Password Changed Successfully')</script>";
    echo "<script>window.location.href='logout.php';</script>";
   } else {
    echo "<script>alert('Password not Changed')</script>";
   }
  } else {
   echo "<script>alert('Old Password Is Incorrect')</script>";
  }

 } else {
  echo "<script>alert('Password Not Matched With Confirm Password')</script>";
 }
}

?>
<section id="main">
   <div class="container-fluid bg-overlay">
      <h1>Book a City Taxi to Your Destination in town</h1>
      <h3>Choose from A Range of categories and prices</h3>
      <h1>
         Manage Profile
      </h1>
      <div class="container" style="margin-left:150px;">
         <div class="row justify-content-center ">
            <div class="col-md-9">
               <form action="" method="POST">
                  <div class="form-group ml-5">
                     <label class="col-lg-3 control-label">Old Password:</label>
                     <div class="col-lg-8">
                        <input type="password" id="password" class="form-control" name="old_password" required="required">
                     </div>
                  </div>
                  <div class="form-group ml-5">
                     <label class="col-lg-3 control-label">New Password:</label>
                     <div class="col-lg-8">
                        <input type="password" id="password" class="form-control" name="new_password" required="required">
                     </div>
                  </div>
                  <div class="form-group ml-5">
                     <label class="col-lg-3 control-label">Confirm Password:</label>
                     <div class="col-lg-8">
                        <input type="password" id="password" class="form-control" name="re_password" required="required">
                     </div>
                  </div>
                  <div class="form-group ml-5">
                     <label class="col-md-3 control-label"></label>
                     <div class="col-md-8">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update Password">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include_once './footer.php' ?>