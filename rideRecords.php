<?php include_once './header.php' ?>
<section id="main">
<div class="container-fluid bg-overlay">
<h1>Book a City Texi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
                <link rel="stylesheet" href="./assets/styles/riderecords.css">
                <h1>
        Ride Records
    </h1>
    <table id="tbl">
        <th>From </th>
        <th>To </th>
        <th>Ride Date </th>
        <th>Cab Type</th>
        <th>Total Distance</th>
        <th>Luggage (Kg)</th>
        <th>Fare</th>
        <th>Status</th>
        <tbody>
            <?php 
            include_once './ride.class.php';
            $record=new Ride();
            $record->rideRecords();
            ?>
        </tbody>
    </table>

</div>
</section>
<?php include_once './footer.php' ?>