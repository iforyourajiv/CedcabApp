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
$data     = $userData->fetchUserDetail();
if (isset($_POST['submit'])) {
 $id       = $_POST['id'];
 $fullname = $_POST['fullname'];
 $email    = $_POST['email'];
 $mobile   = $_POST['mobile'];
 $signup   = $userData->updateData($id, $fullname, $email, $mobile);
 if ($signup) {
  echo "<script>alert('Profile Updated Successfully')</script>";
  header("loction:index.php");
 } else {
  echo "<script>alert('Profile Not Updated')</script>";
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
    <div class="row justify-content-center mb-4">
      <div class="col-md-4">
        Email Verified : <?php
$get = $userData->emailVarificationDisplay();
if ($get) {
 echo "<i class='fa fa-check text-success' aria-hidden='true'></i>";
} else {
 echo "<i class='fa fa-times text-danger' aria-hidden='true'></i>";
}
?>
      </div>
      <div class="col-lg-4">
        Mobile Verified :<?php
$get = $userData->mobileVarificationDisplay();
if ($get) {
 echo "<i class='fa fa-check text-success' aria-hidden='true'></i>";
} else {
 echo "<i class='fa fa-times text-danger' aria-hidden='true'></i> <a href='verify.php' class='btn-xs p-1 btn-primary'>Verify Now</a>";
}
?>
      </div>
    </div>
	<div class="row justify-content-center ">
      <div class="col-md-9">
        <form action="" method="POST">
        <div class="form-group  ml-5">
            <div class="col-lg-8">
            <label class="control-label">Username: </label>
             <input type="text" class="form-control" name="id" value="<?php echo $data['user_id'] ?>" hidden>
              <input type="text" class="form-control form-inline" name="username"  value="<?php echo $data['username'] ?>" disabled>
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-lg-3 control-label">Full Name:</label>
            <div class="col-lg-8">
            <input type="text" id="fullname" class="form-control" name="fullname" value="<?php echo $data['name'] ?>" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
            <input type="email" class="form-control" name="email" value="<?php echo $data['email'] ?>" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-lg-3 control-label">Mobile:</label>
            <div class="col-lg-8">
            <input type="text" id="number" class="form-control" maxlength="10" name="mobile" value="<?php echo $data['mobile'] ?>" title="Enter Valid Number" pattern="[1-9]{1}[0-9]{9}" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="submit" class="btn btn-primary" value="Update Profile">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

</div>
</section>
<?php include_once './footer.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
            $( document ).ready(function() {
                $( "#fullname" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 65 && key <= 90 || key>=97 && key<=122 || key==32) {

                    } else {
						e.preventDefault();
					}
				});


            });
        </script>