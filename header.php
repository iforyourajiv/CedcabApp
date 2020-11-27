<?php


if (!isset($_SESSION))
{   
    session_start();
}

if(isset($_SESSION['username']) && $_SESSION['usertype']=="admin"){
    header("location:admin/index.php");
}

if(!isset($_SESSION['username'])){
$html="<a href='index.php' class='nav-item'>Home</a>";
$html.="<a href='login.php' class='nav-item'>Login</a>";
$html.="<a href='#' class='nav-item'>About Us</a>";
$html.="<a href='#' class='nav-item'>Services</a>";
} else {
    $html="<h4>Welcome :".$_SESSION['username']."</h4>";
    $html.="<a href='index.php' class='nav-item'>Home</a>";
    $html.="<a href='manageProfile.php' class='nav-item'>Manage Profile</a>";
    $html.="<li class='nav-item dropdown'>
                <a class='nav-item dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Ride Records
                 </a>
                 <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                 <a class='nav-item dropdown-item' href='pendingRideRecords.php'>Pending Rides</a>
                 <a class='nav-item dropdown-item' href='completedRideRecords.php'>Completed Rides</a>
                <a class='nav-item dropdown-item' href='canceledRideRecord.php'>Canceled Rides</a>
                </div>
                </li>";
    $html.="<a href='totalSpents.php' class='nav-item'>Total Spents</a>";
    $html.="<a href='./logout.php' class='btn btn-danger p-3 ml-3'>Logout</a>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./assets/styles/userstyle.css" />
    <title>CedCab : We Believe in Safty & Comfort</title>
    <link rel="icon" href="./assets/images/logo.png" type="image/x-icon">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <a href="#" class="navbar-brand"><img class="img-responsive" src="./assets/images/logo.png" height="65%" width="78%" /></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <div class="navbar-nav">

               
     
                 <?php echo $html ?>   
                </div>
            </div>
        </nav>