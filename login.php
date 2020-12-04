<?php
if (!isset($_SESSION)) {
 session_start();
}

if (isset($_SESSION['username'])) {
 if ($_SESSION['usertype'] == 'admin') {
  header("location:admin/index.php");
 } else {
  header("location:index.php");
 }
}

include_once './user.class.php';
$user = new User();
if (isset($_POST['submit'])) {
 $username = $_POST['username'];
 $password = $_POST['password'];
 if (isset($_POST['check'])) {
  $remember = $_POST['check'];
 } else {
  $remember = false;
 }

 $user->login($username, $password, $remember);
}

if (isset($_COOKIE['user']) && isset($_COOKIE['checked'])) {
 $cookieUser = $_COOKIE['user'];
 $check      = "checked";
} else {
 $cookieUser = "";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CedCab |Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/styles/style.css">
	<link rel="stylesheet" type="text/css" href="./assets/styles/userstyle.css">
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-md navbar-light">
            <a href="index.php" class="navbar-brand"><img class="img-responsive" src="./assets/images/logo.png" height="65%" width="78%" /></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <div class="navbar-nav">
				<a href='./index.php' class='btn nav-item btn-warning' style='border-radius: 50px;'>Book cab</a>
				<a href='#' class='nav-item'>About Us</a>
				<a href='#' class='nav-item'>Services</a>
                </div>
            </div>
        </nav>
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
						<input type="text" name="username" value="<?php echo $cookieUser ?>" class="form-control" placeholder="username" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" value="" class="form-control" placeholder="password" required>
						<br>
					</div>

					<div class="form-group">
						<input type="checkbox" name="check" <?php if (isset($_COOKIE['checked'])) {echo $check;} ?> > <h5 class="text-light text-inline">Remember Me</h5>
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Sign Up</a>
				</div>
			</div>
		</div>
	</div>

</div>
<footer class="page-footer  font-small bg-white">
            <div class="row">
                <div class="col-sm-4 text-center py-3">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
                <div class="col-sm-4">
                    <div class="footer-copyright text-center py-3">
                        © 2020 Copyright:
                        <a href="index.php">CedCabs</a>
                    </div>
                </div>
            </div>
        </footer>
</body>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>