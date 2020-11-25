<?php

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

?>
<?php include_once './sidebar.php'?>

        <div class="container-fluid">
            <h2 class="text-center">Ride Requests</h2>
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
                                       include_once '../ride.class.php';
                                       $rideRequest=new Ride();
                                       $rideRequest->rideRequestAdmin(); 
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

