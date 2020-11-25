<?php include_once './header.php' ?>
<?php 
include_once './user.class.php';
$userData = new User();
$data=$userData->fetchUserDetail();

if(isset($_POST['submit'])){
$id=$_POST['id'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$rePassword=$_POST['confirm_password'];
   		 if($password == $rePassword) {
			$signup=$userData->updateData($id,$fullname,$email,$mobile,$password);
			if($signup) {
                echo "<script>alert('Profile Updated Successfully')</script>";
                header("loction:index.php");
			} else {
				echo "<script>alert('Profile Updation failed,Error')</script>";
			}
       	 }
     else {
        echo "<script>alert('Password Does not Matched')</script>";
    }

}

?>
<section id="main">
<div class="container-fluid bg-overlay">
<h1>Book a City Texi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
                <h1>
        Manage Profile
    </h1>
    <div class="container" style="margin-left:150px;">
	<div class="row justify-content-center ">
      <div class="col-md-9">
        <form action="" method="POST">
        <div class="form-group  ml-5">
            <div class="col-lg-8">
            <label class="control-label">Username: </label>
             <input type="text" class="form-control" name="id" value="<?php echo $data['user_id']?>" hidden>
              <input type="text" class="form-control form-inline" name="username"  value="<?php echo $data['username']?>" disabled>
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-lg-3 control-label">Full Name:</label>
            <div class="col-lg-8">
            <input type="text" class="form-control" name="fullname" value="<?php echo $data['name']?>" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
            <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-lg-3 control-label">Mobile:</label>
            <div class="col-lg-8">
            <input type="number" class="form-control" name="mobile" value="<?php echo $data['mobile']?>" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-md-3 control-label">Change Password:</label>
            <div class="col-md-8">
            <input type="password" class="form-control" name="password" value="" required="required">
            </div>
          </div>
          <div class="form-group ml-5">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
            <input type="password" class="form-control" name="confirm_password" value="" required="required">
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