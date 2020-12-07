<?php
include_once '../ride.class.php';
$rideRequest = new Ride();
if (!isset($_SESSION)) {
 session_start();
}

if (!isset($_SESSION['username'])) {
 header("location:../login.php");
}

if (isset($_SESSION['username'])) {
 if ($_SESSION['usertype'] == "user") {
  header("location:../index.php");
 }
}

if (isset($_GET['del_id'])) {
 $id     = $_GET['del_id'];
 $isDone = $rideRequest->deleteRide($id);
 if ($isDone) {
  header("location:allRides.php");
 } else {
  echo "<script>alert('Something Went Wrong,Ride Not Confirmed')</script>";
 }
}

?>
<?php include_once './sidebar.php' ?>
<div class="container">
   <h2 class="text-center text-dark">All Rides</h2>
   <div class="table-responsive">
      <table class="table no-wrap">
         <label>Sort</label>
         <select id="sort" name="sort">
            <option value="All_Data">All</option>
            <option value="date_asc">By Ascending Date</option>
            <option value="date_desc">By Descending Date</option>
            <option value="fare_asc">By Ascending fare</option>
            <option value="fare_desc">By Descending fare</option>
         </select>
         <thead>
            <tr>
               <th class="border-top-0">Ride ID</th>
               <th class="border-top-0">From</th>
               <th class="border-top-0">To</th>
               <th class="border-top-0">Ride Date</th>
               <th class="border-top-0">CabType</th>
               <th class="border-top-0">Distance</th>
               <th class="border-top-0">Luggage</th>
               <th class="border-top-0">Fare</th>
               <th class="border-top-0">Status</th>
               <th class="border-top-0">Action</th>
            </tr>
         </thead>
         <tbody id="tablebody">
            <?php
$data = $rideRequest->allRides();
if ($data) {
 foreach ($data as $element) {
  $rideID        = $element['ride_id'];
  $fromLocation  = $element['fromLocation'];
  $toLocation    = $element['toLocation'];
  $rideDate      = $element['ride_date'];
  $cabType       = $element['cabtype'];
  $distance      = $element['total_distance'];
  $luggage       = $element['luggage'];
  $fare          = $element['total_fare'];
  $status        = $element['status'];
  $currentStatus = "";
  if ($status == 1) {
   $currentStatus = "<h4 class='text-warning'>Pending</h4>";
  } elseif ($status == 2) {
   $currentStatus = "<h4 class='text-success'>Completed </h4>";
  } elseif ($status == 0) {
   $currentStatus = "<h4 class='text-danger'>Cancelled</h4>";
  }
  $html = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td class='text-purple'>$currentStatus</td>";
  $html .= "<td><a onClick=\"javascript: return confirm('Are You Sure Want to delete Ride ');\" href='allRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} else {
 echo "<h3>No Record Found</h3>";
}

?>
         </tbody>
      </table>
   </div>
</div>
</div>
</div>
</div>
<footer class="footer text-center fixed-bottom"> 2020 © Admin Panel | Cedcab.com
</footer>
</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
       $("#sort").on('change',function(){
           let type = $(this).children("option:selected").val();
           let action="all";
           $.ajax({
                   method: "POST",
                   url: "sorting.controller.php",
                   data: {type:type,action:action},

               }).done(function(data) {
                  $("#tablebody").html("");
                  $("#tablebody").html(data);
               });
       })
   })
</script>