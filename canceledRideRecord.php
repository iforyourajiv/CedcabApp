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
        Cancelled Rides
    </h1>
    <form method="post" action="canceledRideRecord.php">
    <div class="row mb-1">
       <div class="col-md-6 col-lg-6 col-sm-6">
            <lable>Start Date:</lable><input type="date" name="startDate">
            <lable>End Date :</lable><input type="date" name="endDate">
            <input type="submit" name="filterdate" value="Filter By Date">
         </div>

         <div class="col-md-6 col-lg-6 col-sm-6">
         <lable>Week :</lable><input type="week" name="weekSelected">
         <input type="submit" name="filterweek" value="Filter By Week">
         </div>
    </div>
    </form>
    <table id="tbl">
        <th>From </th>
        <th>To </th>
        <th>Ride Date <a href="canceledRideRecord.php?status=0&sort=ASC&for=ride_date"><i class="fa fa-caret-down" style="color:black" aria-hidden="true"></i>  </a>
        <a href="canceledRideRecord.php?status=0&sort=DESC&for=ride_date"><i class="fa fa-caret-up" style="color:black" aria-hidden="true"></i>  </a>
        </th>
        <th>Cab Type</th>
        <th>Total Distance</th>
        <th>Luggage (Kg)</th>
        <th>Fare<a href="canceledRideRecord.php?status=0&sort=ASC&for=total_fare"><i class="fa fa-caret-down" style="color:black" aria-hidden="true"></i>  </a>
        <a href="canceledRideRecord.php?status=0&sort=DESC&for=total_fare"><i class="fa fa-caret-up" style="color:black" aria-hidden="true"></i>  </a></th>
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
            
            } else if(isset($_POST['filterdate'])) {
                $startDate=$_POST['startDate'];
                $endDate=$_POST['endDate'];
                $filterDate=new User();
                $data=$filterDate->filterCanceledUserRideDate($startDate,$endDate);
                if($data){
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
                    }}
                    else {
                        echo "<h2>No Record Found</h2>";
                    }
                } else if(isset($_POST['filterweek'])){
                    $filterWeek=new User();
                    $weekSelected=$_POST['weekSelected'];
                    $data=$filterWeek->filterCanceledUcanceledRideRecordserRideWeek($weekSelected);
                    if($data){
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
                        }}
                        else {
                            echo "<h2>No Record Found</h2>";
                        }

                }  else {
                $data=$record->rideCanceledRecords();
                if($data){
                    $total=0;
                    foreach($data as $element) {
                        $fromLocation=$element['fromLocation'];
                        $toLocation=$element['toLocation'];
                        $rideDate=$element['ride_date'];
                        $cabType=$element['cabtype'];
                        $distance=$element['total_distance'];
                        $luggage=$element['luggage'];
                        $fare=$element['total_fare'];
                        $status=$element['status'];
                        $total+=$fare;
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
                 }else {
                        echo "<h3>No Record Found</h3>";
                    }
                }
               
            

            
            ?>
        </tbody>
    </table>

</div>
</section>
<?php include_once './footer.php' ?>