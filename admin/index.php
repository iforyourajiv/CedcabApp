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

include_once './tiles.class.php';
?>
<?php include_once './sidebar.php'?>
        <div class="container-fluid">
        <div class="row justify-content-center">
          <a href="rideRequest.php" class="text-purple">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Ride Requests</h3>
                            <ul class="list-inline two-part d-flex mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto">
                                <?php
                                $tilesRideRequest=new Tile();
                                $data=$tilesRideRequest->tilesrideRequest();
                                if(!$data) {
                                    $data='0';
                                }
                                ?>
                                <span class="counter text-success"><?php echo $data ?></span></li>
                            </ul>
                        </div>
                      </a>
                    </div>
                  
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <a href="pastRides.php" class="text-success">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Completed Rides</h3>
                            <ul class="list-inline two-part d-flex mb-0">
                            <?php
                                $tilesRideRequest=new Tile();
                                $data=$tilesRideRequest->tilesrideCompleted();
                                if(!$data) {
                                    $data='0';
                                }
                                ?>
                                <li class="ml-auto"><span class="counter text-purple"><?php echo $data ?></span></li>
                            </ul>
                        </div>
                        </a>
                    </div>
                 
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <a href="canceledRides.php" class="text-danger">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Cancelled Rides</h3>
                            <ul class="list-inline two-part d-flex mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <?php
                                $tilesRideRequest=new Tile();
                                $data=$tilesRideRequest->tilesrideCanceled();
                                if(!$data) {
                                    $data='0';
                                }
                                ?>
                                <li class="ml-auto"><span class="counter text-info"><?php echo $data ?></span>
                                </li>
                            </ul>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <a href="pendingUser.php" class="text-info">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Pending User For Approval</h3>
                            <ul class="list-inline two-part d-flex mb-0">
                            <?php
                                $tilesUserrequest=new Tile();
                                $data= $tilesUserrequest->tilesUserrequest();
                                if(!$data) {
                                    $data='0';
                                }
                                ?>
                                <li class="ml-auto"><span class="counter text-danger"><?php echo $data ?></span></li>
                            </ul>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-xs-12">
                    <a href="allUser.php" class="text-secondary">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">User's In Cedcabs</h3>
                            <ul class="list-inline two-part d-flex mb-0">
                            <?php
                                $tilesUserTotal=new Tile();
                                $data= $tilesUserTotal->tilesUserTotal();
                                if(!$data) {
                                    $data='0';
                                }
                                ?>
                                <li class="ml-auto"><span class="counter text-success"><?php echo $data ?></span></li>
                            </ul>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h1 class="text-center">Total Earned Till Today</h1>
                            <ul class="list-inline">
                            <?php
                                $tilesEarnedTotal=new Tile();
                                $data=$tilesEarnedTotal->tilesearnedTotal();
                                if(!$data) {
                                    $data='0';
                                }
                                ?>
                                <li class="text-center"><h1 class="text-purple">&#8377; <?php echo $data ?></h1></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-striped">
                            <tr>
                            <td><canvas id="line_canvas"></canvas><br>
                            <b>Line Chart</b>
                            </td>
                            </tr>
                            </table>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
 $.ajax({
  url: "getdataforchart.php",
  method: "GET",
  success: function(data) {
   var data = JSON.parse(data);
   var data_row = [];
   var date=[];
   for(var i in data) {
    data_row.push(data[i].data);
    date.push(data[i].date)
   }
   var chartdata = {
    labels:date,
    datasets : [
     {
      label: 'Rides:',
      backgroundColor: 'rgba(0,128,0, 0.75)',
      borderColor: 'rgba(0,0,205, 0.75)',
      hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
      hoverBorderColor: 'rgba(200, 200, 200, 1)',
      data: data_row
     }
    ]
   };
   var line_canvas = $("#line_canvas");
   var lineGraph = new Chart(line_canvas, {
    type: 'line',
    data: chartdata
   });
  },
  error: function(data) {
   console.log(data);
  }
 });
});
</script>

