
<?php include_once './header.php' ?>
<section id="main">
<div class="container-fluid bg-overlay">
<h1>Book a City Texi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
                <link rel="stylesheet" href="./assets/styles/riderecords.css">
                <h1>
        Canceled Rides
    </h1>
    <table id="tbl">
        <th>From </th>
        <th>To </th>
        <th>Ride Date <a href="canceledRideRecord.php?status=0&sort=ASC&for=ride_date"><i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
        <a href="canceledRideRecord.php?status=0&sort=DESC&for=ride_date"><i class="fa fa-caret-up" aria-hidden="true"></i>  </a>
        </th>
        <th>Cab Type</th>
        <th>Total Distance</th>
        <th>Luggage (Kg)</th>
        <th>Fare<a href="canceledRideRecord.php?status=0&sort=ASC&for=total_fare"><i class="fa fa-caret-down" aria-hidden="true"></i>  </a>
        <a href="canceledRideRecord.php?status=0&sort=DESC&for=total_fare"><i class="fa fa-caret-up" aria-hidden="true"></i>  </a></th>
        <th>Status</th>
        <tbody>
            <?php 
            include_once './ride.class.php';
            include_once './user.class.php';
            $record=new Ride();
            $recordSort=new User();
          
            if(isset($_GET['status'])) {
                $status=$_GET['status'];
                $sort=$_GET['sort'];
                $action=$_GET['for'];
            
                $data=$recordSort->sortUserRides($status,$sort,$action);
                foreach($data as $element) {
                    $fromLocation=$element['fromLocation'];
                    $toLocation=$element['toLocation'];
                    $rideDate=$element['ride_date'];
                    $cabType=$element['cabtype'];
                    $distance=$element['total_distance'];
                    $luggage=$element['luggage'];
                    $fare=$element['total_fare'];
                    $status=$element['status'];
                    $currentStatus="";
                    if($status==1){
                        $currentStatus="Pending";
                    } else if($status==2){
                        $currentStatus="Completed";
                    } else if($status==0) {
                        $currentStatus="Cancelled";
                    }
    
                    $html="<tr>";
                    $html.="<td>$fromLocation</td>";
                    $html.="<td>$toLocation</td>";
                    $html.="<td>$rideDate</td>";
                    $html.="<td>$cabType</td>";
                    $html.="<td>$distance</td>";
                    $html.="<td>$luggage</td>";
                    $html.="<td>&#x20B9;&nbsp;$fare</td>";
                    $html.="<td>$currentStatus</td>";
                    $html.="</tr>";
                    echo $html;
                }
            
            } else {
                $data=$record->rideCanceledRecords();
                foreach($data as $element) {
                    $fromLocation=$element['fromLocation'];
                    $toLocation=$element['toLocation'];
                    $rideDate=$element['ride_date'];
                    $cabType=$element['cabtype'];
                    $distance=$element['total_distance'];
                    $luggage=$element['luggage'];
                    $fare=$element['total_fare'];
                    $status=$element['status'];
                    $currentStatus="";
                    if($status==1){
                        $currentStatus="Pending";
                    } else if($status==2){
                        $currentStatus="Completed";
                    } else if($status==0) {
                        $currentStatus="Cancelled";
                    }
    
                    $html="<tr>";
                    $html.="<td>$fromLocation</td>";
                    $html.="<td>$toLocation</td>";
                    $html.="<td>$rideDate</td>";
                    $html.="<td>$cabType</td>";
                    $html.="<td>$distance</td>";
                    $html.="<td>$luggage</td>";
                    $html.="<td>&#x20B9;&nbsp;$fare</td>";
                    $html.="<td>$currentStatus</td>";
                    $html.="</tr>";
                    echo $html;
                }
            }

            
            ?>
        </tbody>
    </table>

</div>
</section>
<?php include_once './footer.php' ?>