<?php
include_once './user.class.php';
$user=new User();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password =$_POST['password'];
	$password2 =$_POST['confirm_password'];
	$isBlock=1;
	$isAdmin=0;
   		 if($password == $password2) {
			$signup=$user->signup($username,$fullname,$email,$mobile,$password,$isBlock,$isAdmin);
			if($signup) {
				echo "Registration Successful!";  
				header('location:index.php');
			} else {
				echo "Entered Username already exist!"; 
			}
       	 }
     else {
        echo "Password Does not Matched";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>CedCab | Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./assets/styles/signupstyle.css">
</head>
<body>
<img class="img-responsive logo justify-content-left mt-4"  src="./assets/images/logo.png">
<div class="signup-form">
    <form action="signup.php" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="username" placeholder="Username" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-user"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-mobile"></i>
					</span>                    
				</div>
				<input type="number" class="form-control" name="mobile" placeholder="Mobile Number" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
			</div>
        </div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up</button>
			<div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
        </div>
    </form>
	
</div>
</body>
</html>