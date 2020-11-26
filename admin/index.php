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
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
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
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
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
                    </div>

                    <div class="col-lg-4 col-sm-6 col-xs-12">
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
                                <li class="ml-auto"><span class="counter text-purple"><?php echo $data ?></span></li>
                            </ul>
                        </div>
                    </div>

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

