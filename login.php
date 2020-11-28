<?php
if(!isset($_SESSION)){
session_start();
}

if(isset($_SESSION['username'])){
	if($_SESSION['usertype']=='admin'){
		header("location:admin/index.php");
	} 
	else {
		header("location:index.php");
	}
}



include_once './user.class.php';

$user=new User();
$check="";
if (isset($_POST['submit'])) {
$username=$_POST['username'];
$password=$_POST['password'];
$remember=$_POST['check'];
$user->login($username,$password,$remember);
}

if(isset($_COOKIE['user']) && isset($_COOKIE['checked'])){
$cookieUser=$_COOKIE['user'];
$check="checked";
} else {
	$cookieUser="";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>CedCab |Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./assets/styles/style.css">
</head>
<body>
<div class="container">
    <img class="img-responsive justify-content-left mt-4"  src="./assets/images/logo.png">
	<div class="d-flex justify-content-center h-90">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form action="login.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" value="<?php echo $cookieUser ?>" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" value="" class="form-control" placeholder="password">
						<br>
					</div>
					
					<div class="form-group">
						<input type="checkbox" name="check" <?php echo $check;?>> <h5 class="text-light text-inline">Remember Me</h5>
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center links">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>