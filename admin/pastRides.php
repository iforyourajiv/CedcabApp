<?php
include_once '../ride.class.php';
$rideRequest=new Ride();
if (!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['username'])){
    header("location:../login.php");
}

if(isset($_SESSION['username'])){
    if($_SESSION['usertype']=="user"){
        header("location:../index.php");
    }
}


if(isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    $isDone=$rideRequest->deleteRide($id);
    if($isDone) {
        header("location:pastRides.php");
    } else {
        echo "<script>alert('Something Went Wrong,Ride Not Confirmed')</script>";
    }
}


?>
<?php include_once './sidebar.php'?>

        <div class="container-fluid">
            <h2 class="text-center">Past Rides</h2>
                            <div class="table-responsive">
                                <table class="table no-wrap">
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
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $rideRequest->pastRide(); 
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

