<?php
include_once 'sortRide.php';
$sort         = new sortrequestRide();
$sortComplete = new sortcompletedRide();
$sortCanceled = new canceledRide();
$sortAll      = new all();
$type         = $_POST['type'];
$action       = $_POST['action'];
if ($type == 'date_asc' && $action == 'pending') {
 $data = $sort->sortDateAscending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='rideRequest.php?c_id=$rideID' class='btn btn-success'>APPROVE</a>
                            <a onClick=\"javascript: return confirm('Please confirm Cancelation');\" href='rideRequest.php?del_id=$rideID' class='btn btn-danger'>Cancel</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} elseif ($type == 'date_desc' && $action == 'pending') {
 $data = $sort->sortDateDescending();

 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='rideRequest.php?c_id=$rideID' class='btn btn-success'>APPROVE</a>
                        <a onClick=\"javascript: return confirm('Please confirm Cancelation');\" href='rideRequest.php?del_id=$rideID' class='btn btn-danger'>Cancel</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} elseif ($type == 'fare_asc' && $action == 'pending') {
 $data = $sort->sortFareAscending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='rideRequest.php?c_id=$rideID' class='btn btn-success'>APPROVE</a>
                        <a onClick=\"javascript: return confirm('Please confirm Cancelation');\" href='rideRequest.php?del_id=$rideID' class='btn btn-danger'>Cancel</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} elseif ($type == 'fare_desc' && $action == 'pending') {
 $data = $sort->sortFareDescending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='rideRequest.php?c_id=$rideID' class='btn btn-success'>APPROVE</a>
                        <a onClick=\"javascript: return confirm('Please confirm Cancelation');\" href='rideRequest.php?del_id=$rideID' class='btn btn-danger'>Cancel</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} elseif ($type == 'All_Data' && $action == 'pending') {
 $data = $sort->all();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='rideRequest.php?c_id=$rideID' class='btn btn-success'>APPROVE</a>
                        <a onClick=\"javascript: return confirm('Please confirm Cancelation');\" href='rideRequest.php?del_id=$rideID' class='btn btn-danger'>Cancel</a></td>";
  $html .= "</tr>";
  echo $html;
 }
}

if ($type == 'date_asc' && $action == 'completed') {
 $data = $sortComplete->sortDateAscending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='pastRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} elseif ($type == 'date_desc' && $action == 'completed') {
 $data = $sortComplete->sortDateDescending();

 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='pastRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} elseif ($type == 'fare_asc' && $action == 'completed') {
 $data = $sortComplete->sortFareAscending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='pastRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} elseif ($type == 'fare_desc' && $action == 'completed') {
 $data = $sortComplete->sortFareDescending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare </td>";
  $html .= "<td><a href='pastRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} elseif ($type == 'All_Data' && $action == 'completed') {
 $data = $sortComplete->all();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>$fare &#x20B9;</td>";
  $html .= "<td><a href='pastRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
}

if ($type == 'date_asc' && $action == 'canceled') {
 $data = $sortCanceled->sortDateAscending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='canceledRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} elseif ($type == 'date_desc' && $action == 'canceled') {
 $data = $sortCanceled->sortDateDescending();

 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='canceledRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }

} elseif ($type == 'fare_asc' && $action == 'canceled') {
 $data = $sortCanceled->sortFareAscending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='canceledRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} elseif ($type == 'fare_desc' && $action == 'canceled') {
 $data = $sortCanceled->sortFareDescending();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='canceledRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
} elseif ($type == 'All_Data' && $action == 'canceled') {
 $data = $sortCanceled->all();
 foreach ($data as $element) {
  $rideID       = $element['ride_id'];
  $fromLocation = $element['fromLocation'];
  $toLocation   = $element['toLocation'];
  $rideDate     = $element['ride_date'];
  $cabType      = $element['cabtype'];
  $distance     = $element['total_distance'];
  $luggage      = $element['luggage'];
  $fare         = $element['total_fare'];
  $html         = "<tr>";
  $html .= "<td class='text-purple'>$rideID</td>";
  $html .= "<td class='text-purple'>$fromLocation</td>";
  $html .= "<td class='text-purple'>$toLocation</td>";
  $html .= "<td class='text-purple'>$rideDate</td>";
  $html .= "<td class='text-purple'>$cabType</td>";
  $html .= "<td class='text-purple'>$distance KM</td>";
  $html .= "<td class='text-purple'>$luggage KG</td>";
  $html .= "<td class='text-purple'>&#x20B9;$fare</td>";
  $html .= "<td><a href='canceledRides.php?del_id=$rideID' class='btn btn-danger'>DELETE RIDE</a></td>";
  $html .= "</tr>";
  echo $html;
 }
}

if ($type == 'date_asc' && $action == 'all') {
 $data = $sortAll->sortDateAscending();
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

} elseif ($type == 'date_desc' && $action == 'all') {
 $data = $sortAll->sortDateDescending();

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

} elseif ($type == 'fare_asc' && $action == 'all') {
 $data = $sortAll->sortFareAscending();
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
} elseif ($type == 'fare_desc' && $action == 'all') {
 $data = $sortAll->sortFareDescending();
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
} elseif ($type == 'All_Data' && $action == 'all') {
 $data = $sortAll->all();
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
}
