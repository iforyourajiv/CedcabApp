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
<div class="container-fluid">
   <h2 class="text-center text-dark">Invoice Table</h2>
   <div class="table-responsive">
      <table class="table no-wrap">
         <thead>
            <tr>
               <th class="border-top-0">Ride ID</th>
               <th class="border-top-0">From</th>
               <th class="border-top-0">To</th>
               <th class="border-top-0">Ride Date
                  <a href="invoiceTable.php?status=2&sort=ASC&for=ride_date">
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </a>
                  <a href="invoiceTable.php?status=2&sort=DESC&for=ride_date">
                  <i class="fa fa-caret-up" aria-hidden="true"></i>
                  </a>
               </th>
               <th class="border-top-0">CabType</th>
               <th class="border-top-0">Distance
                  <a href="invoiceTable.php?status=2&sort=ASC&for=total_distance">
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </a>
                  <a href="invoiceTable.php?status=2&sort=DESC&for=total_distance">
                  <i class="fa fa-caret-up" aria-hidden="true"></i></a>
               </th>
               <th class="border-top-0">Luggage</th>
               <th class="border-top-0">Fare
                  <a href="invoiceTable.php?status=2&sort=ASC&for=total_fare">
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </a>
                  <a href="invoiceTable.php?status=2&sort=DESC&for=total_fare">
                  <i class="fa fa-caret-up" aria-hidden="true"></i>
                  </a>
               </th>
               <th class="border-top-0">Action</th>
            </tr>
         </thead>
         <tbody id="tablebody">
            <?php
include_once '../ride.class.php';
$rideRequest = new Ride();
if (isset($_GET['status'])) {
 $status = $_GET['status'];
 $sort   = $_GET['sort'];
 $action = $_GET['for'];
 $data   = $rideRequest->sortInvoice($status, $sort, $action);
 if ($data) {
  foreach ($data as $element) {
   $rideID       = $element['ride_id'];
   $fromLocation = $element['fromLocation'];
   $toLocation   = $element['toLocation'];
   $rideDate     = $element['ride_date'];
   $cabType      = $element['cabtype'];
   $distance     = $element['total_distance'];
   $luggage      = $element['luggage'];
   $fare         = $element['total_fare'];
   // $status=$data['status'];
   // $currentStatus="";

   $html = "<tr>";
   $html .= "<td class='text-purple'>$rideID</td>";
   $html .= "<td class='text-purple'>$fromLocation</td>";
   $html .= "<td class='text-purple'>$toLocation</td>";
   $html .= "<td class='text-purple'>$rideDate</td>";
   $html .= "<td class='text-purple'>$cabType</td>";
   $html .= "<td class='text-purple'>$distance</td>";
   $html .= "<td class='text-purple'>$luggage</td>";
   $html .= "<td class='text-purple'>$fare</td>";
   $html .= "<td><a href='printInvoice.php?rideid=$rideID' class='btn btn-danger'>Print INVOICE</a></td>";
   $html .= "</tr>";
   echo $html;
  }
 } else {
  echo "<h3>No Record Found</h3>";
 }

} else {
 $data = $rideRequest->invoice();
 if ($data) {
  foreach ($data as $element) {
   $rideID       = $element['ride_id'];
   $fromLocation = $element['fromLocation'];
   $toLocation   = $element['toLocation'];
   $rideDate     = $element['ride_date'];
   $cabType      = $element['cabtype'];
   $distance     = $element['total_distance'];
   $luggage      = $element['luggage'];
   $fare         = $element['total_fare'];
   // $status=$data['status'];
   // $currentStatus="";

   $html = "<tr>";
   $html .= "<td class='text-purple'>$rideID</td>";
   $html .= "<td class='text-purple'>$fromLocation</td>";
   $html .= "<td class='text-purple'>$toLocation</td>";
   $html .= "<td class='text-purple'>$rideDate</td>";
   $html .= "<td class='text-purple'>$cabType</td>";
   $html .= "<td class='text-purple'>$distance</td>";
   $html .= "<td class='text-purple'>$luggage</td>";
   $html .= "<td class='text-purple'>$fare</td>";
   $html .= "<td><a href='printInvoice.php?rideid=$rideID' class='btn btn-danger'>Print INVOICE</a></td>";
   $html .= "</tr>";
   echo $html;
  }
 } else {
  echo "<h3>No Record Found</h3>";
 }

}

?>
         </tbody>
      </table>
   </div>
</div>
</div>
</div>
</div>
<footer class="footer text-center"> 2020 © Admin Panel | Cedcab.com
</footer>
</div>
</div>
</body>
</html>