<?php

if (!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['username'])){
  header('location:index.php');
}

?>
<?php include_once './header.php' ?>
<section id="main">
<div class="container-fluid bg-overlay">
<h1>Book a City Taxi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
                <link rel="stylesheet" href="./assets/styles/riderecords.css">
                <h1>
        You Spent On Cab Till Today 
        <br>
        <?php 
        include_once './ride.class.php';
        $totalSpent=new Ride();
        echo "<p class='text-warning'>&#x20B9;&nbsp;".$totalSpent->totalSpent()."</p>";
        ?>
    </h1>

</div>
</section>
<?php include_once './footer.php' ?>