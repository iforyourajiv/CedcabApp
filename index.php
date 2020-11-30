<?php include_once './header.php' ?>
<section id="main">
            <div class="container-fluid bg-overlay">
                <h1>Book a City Texi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
                <div class="col-md-4 col-md-pull-7">
                    <div class="booking-form">
                        <form action="#" method="POST">
                            <h4>
                                <img src="./assets/images/logo.png" height="40%" width="25%" />
                            </h4>
                            <h5>Your everyday travel partner</h5>
                            <p>AC Cabs for point to point travel</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Pickup</span>
                                        <select id="pickup" name="pickup" class="form-control" aria-placeholder="Current Location">  
                                        <option value="">Select Pick-up Location</option>
                                        <?php
                                         include_once './location.class.php'; 
                                        $location=new Location();
                                        $data=$location->fetchLocation();
                                        foreach($data as $element){
                                            $location_id=$element['id'];
                                            $location_name=$element['name'];
                                            // $location_distance=$data['distance'];
                                            echo "<option value='$location_id'>$location_name</option>";
                                        }
                                       
                                        ?>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Drop</span>
                                        <select id="drop" name="drop" class="form-control" aria-placeholder="Enter Drop For Ride Estimate">
                                            <option value="">Select Drop Location</option>
                                            <?php
                                                include_once './location.class.php'; 
                                                $location=new Location();
                                                $data=$location->fetchLocation();
                                                foreach($data as $element){
                                                    $location_id=$element['id'];
                                                    $location_name=$element['name'];
                                                    // $location_distance=$data['distance'];
                                                    echo "<option value='$location_id'>$location_name</option>";
                                                }
                                       
                                        ?>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <span class="form-label">Cab Type</span>
                                        <select id="cab" name="cabtype" class="form-control">
                                            <option value="">Select Cab Type</option>
                                            <option value="CedMicro">CedMicro</option>
                                            <option value="CedMini">CedMini</option>
                                            <option value="CedRoyal">CedRoyal</option>
                                            <option value="CedSUV">CedSUV</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Luggage (Kg)</span>
                                <input class="form-control" id="luggage" type="text" value="0" name="weight" placeholder="Enter Weight in KG" />
                            </div>
                            <h4 id="calculatedPrice"></h4>
                            <div class="row my-3">
                                <div class="col-sm-12">
                                    <input class="btn btn-block" type="button" id="submitbtn" value="Calculate Fare" />
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-12">
                                    <a href="booking.php" class="btn btn-block" type="button" id="bookingbtn" hidden>Book Now </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once './footer.php' ?>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#submitbtn").click(function() {
          
            let pickup = $("#pickup option:selected").val();
            let drop = $("#drop option:selected").val();
            let cabType = $("#cab option:selected").val();
            let luggage = $("#luggage").val();
            let action  ="calculate";
            if (pickup == "" || drop == "" || cabType == "") {
                alert("Plz fill All the Fields");
            } else {
                $("#bookingbtn").removeAttr('hidden');
                $.ajax({
                    method: "POST",
                    url: "calculate.php",
                    data: {
                        pickup: pickup,
                        drop: drop,
                        cabType: cabType,
                        luggage: luggage,
                    },
                }).done(function(data) {
                    $("#calculatedPrice").html("Total Fare &nbsp;	&#x20B9;" + data);
                });
            }
        });
    });
</script>

</html>