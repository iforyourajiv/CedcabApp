<?php
include_once './ride.class.php';
if (!isset($_SESSION)) {
 session_start();
}

if (!isset($_SESSION['username'])) {
 header('location:index.php');
}

?>
<?php include_once './header.php' ?>
<section id="main">
            <div class="container-fluid bg-overlay">
                <h1>Book a City Taxi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
                <div class="row ml-2 mt-3">
                <div class="col-md-4">

                <div class="card" style="width: 18rem;">
                <a href="pendingRideRecords.php">
                <div class="card-body">
                <h5 class="card-title text-center text-dark">Pending Rides</h5>
                <p class="card-text text-center text-danger">
                <?php

$data  = new Ride();
$count = $data->ridePendingRecordscount();
if ($count) {
 echo "<h1 class='card-text text-center text-success font-20'>$count</h1>";
}
?>
                </p>
                </div>
                </a>
                </div>
                </div>


                <div class="col-md-4">

                <div class="card" style="width: 18rem;">
                <a href="completedRideRecords.php">
                <div class="card-body">
                <h5 class="card-title text-center text-dark">Completed Rides</h5>
                <p class="card-text text-center text-danger">
                <?php
$data  = new Ride();
$count = $data->rideCompletedRecordscount();
if ($count) {
 echo "<h1 class='card-text text-center text-warning font-20'>$count</h1>";
}
?>
                </p>
                </div>
                </a>
                </div>
                </div>



                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <a href="canceledRideRecord.php">
                <div class="card-body">
                <h5 class="card-title text-center text-dark">Cancelled Rides</h5>
                <p class="card-text text-center text-danger">
                <?php
$totalSpent = new Ride();
$count      = $totalSpent->rideCancelledRecordscount();
if ($count) {
 echo "<h1 class='card-text text-center text-danger font-20'>$count</h1>";
}
?>
                </p>
                </div>
                </a>
                </div>
                </div>

                </div>
                <div class="col-lg-11 col-sm-12 col-xs-12 ml-2 mt-4">
                        <div class="white-box analytics-info bg-white">
                            <h1 class="text-center text-dark">You Spent On Cab Till Today</h1>
                            <ul class="list-inline">
                            <?php
$totalSpent = new Ride();
$data       = $totalSpent->totalSpent();
if (!$data) {
 $data = '0';
}
?>
                                <li class="text-center mt-3 mb-4"><h1 class="text-primary">&#8377; <?php echo $data ?></h1></li>
                            </ul>
                        </div>
                    </div>


                </div>
        </section>
        <?php include_once './footer.php' ?>
    </div>