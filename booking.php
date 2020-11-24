<?php
if (!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>

<?php include_once './header.php' ?>
<section id="main">
<div class="container-fluid bg-overlay">
<h1>Book a City Texi to Your Destination in town</h1>
                <h3>Choose from A Range of categories and prices</h3>
<link rel="stylesheet" href="./assets/styles/invoice.css">
<!-- Invoice -->
<div id="display">
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for Riding With Cedcabs !!! Happy Journey</h2>
                                        <a href="#" class="btn btn-block mt-2" type="button" id="bookingbtn">Confirm Booking </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td>Username:</td>
                                                             <td class="alignright"> <?php echo $_SESSION['username'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>From</td>
                                                            <td class="alignright"><?php echo $_SESSION['from'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>To</td>
                                                            <td class="alignright"><?php echo $_SESSION['to'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Distance</td>
                                                            <td class="alignright"><?php echo $_SESSION['totalDistance'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cab Type</td>
                                                            <td class="alignright"><?php echo $_SESSION['cabtype'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luggage</td>
                                                            <td class="alignright"><?php echo $_SESSION['luggage'] ?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total Fare</td>
                                                            <td class="alignright"><?php echo $_SESSION['fare'] ?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
               </div>
        </td>
        <td></td>
    </tr>
</tbody></table>
</div>
</div>

</section>

<?php include_once './footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>\
<script>
    $(document).ready(function(){
        $("#bookingbtn").click(function(){
            let user=$_SESSION['user_id'];
            let from=$_SESSION['from'];
            let to=$_SESSION['to'];
            let distance=$_SESSION['totalDistance'];
            let cabtype=$_SESSION['cabtype'];
            let luggage=$_SESSION['luggage'];
            let fare=$_SESSION['fare'];
            let status="1";
                $.ajax({
                    method: "POST",
                    url: "confirm_booking.php",
                    data: {
                        user: user,
                        from: from,
                        to: to,
                        distance:distance,
                        cabtype=cabtype,
                        luggage: luggage,
                        fare=fare,
                        status:status
                    },
                }).done(function(data) {
                    $("#display").html("Total Fare &nbsp;	&#x20B9;" + data);
                });
        })
    })
   
</script>