<?php
if (!isset($_SESSION)) {
 session_start();
}
if (!isset($_SESSION['username'])) {
 header('location:login.php');
}

if (isset($_POST['cancel'])) {
 $_SESSION['from']          = "";
 $_SESSION['to']            = "";
 $_SESSION['totalDistance'] = "";
 $_SESSION['cabType']       = "";
 $_SESSION['luggage']       = "";
 $_SESSION['fare']          = "";
 header('location:index.php');
}

if (time() - $_SESSION['user_start'] > 60) {
 $_SESSION['from']          = "";
 $_SESSION['to']            = "";
 $_SESSION['totalDistance'] = "";
 $_SESSION['cabType']       = "";
 $_SESSION['luggage']       = "";
 $_SESSION['fare']          = "";
 header('location:userdashboard.php');
}

?>
<?php include_once './header.php' ?>
<section id="main">
   <div class="container-fluid bg-overlay">
      <h1>Book a City Taxi to Your Destination in town</h1>
      <h3>Choose from A Range of categories and prices</h3>
      <link rel="stylesheet" href="./assets/styles/invoice.css">
      <!-- Invoice -->
      <div id="display">
         <table class="body-wrap">
            <tbody>
               <tr>
                  <td></td>
                  <td class="container" width="600">
                     <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                           <tbody>
                              <tr>
                                 <td class="content-wrap aligncenter">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td class="content-block">
                                                <h2>Thanks for Riding With Cedcabs !!! Happy Journey</h2>
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
                                                                  <td>Name:</td>
                                                                  <td class="alignright">
                                                                     <?php echo $_SESSION['username'] ?></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>From</td>
                                                                  <td class="alignright"><?php echo $_SESSION['from'] ?>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>To</td>
                                                                  <td class="alignright"><?php echo $_SESSION['to'] ?>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Total Distance</td>
                                                                  <td class="alignright">
                                                                     <?php echo $_SESSION['totalDistance'] ?>KM</td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Cab Type</td>
                                                                  <td class="alignright">
                                                                     <?php echo $_SESSION['cabtype'] ?></td>
                                                               </tr>
                                                               <tr>
                                                                  <td>Luggage</td>
                                                                  <td class="alignright">
                                                                     <?php echo $_SESSION['luggage'] ?>Kg</td>
                                                               </tr>
                                                               <tr class="total">
                                                                  <td class="alignright" width="80%">Total Fare</td>
                                                                  <td class="alignright">
                                                                     &#x20B9;<?php echo $_SESSION['fare'] ?></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                         <form method="post" action="booking.php">
                                                            <input class="btn btn-block mt-2" id="bookingbtn"
                                                               type="button" value="Confirm Booking">
                                                            <input type="submit" name="cancel"
                                                               class="btn-danger btn-block p-2" id="cancelbookingbtn"
                                                               value="Cancel Booking"></input>
                                                         </form>
                                                      </td>
                                                   </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      </td>
      <td></td>
      </tr>
      </tbody>
      </table>
   </div>
   </div>
</section>
<?php include_once './footer.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function () {
      $("#bookingbtn").click(function () {
         let user = "<?php echo $_SESSION['user_id'] ?>";
         let from = "<?php echo $_SESSION['from'] ?>";
         let to = "<?php echo $_SESSION['to'] ?>";
         let distance = "<?php echo $_SESSION['totalDistance'] ?>";
         let cabtype = "<?php echo $_SESSION['cabtype'] ?>";
         let luggage = "<?php echo $_SESSION['luggage'] ?>";
         let fare = "<?php echo $_SESSION['fare'] ?>";
         let status = "1";
         if (user == "" || from == "" || to == "" || distance == "" || cabtype == "" || luggage == "" || fare == "") {
            alert("Please Book Your Cab First");
         } else {
            $.ajax({
               method: "POST",
               url: "confirm_booking.php",
               data: {
                  user: user,
                  from: from,
                  to: to,
                  distance: distance,
                  cabtype: cabtype,
                  luggage: luggage,
                  fare: fare,
                  status: status
               },
            }).done(function (data) {
               $("#display").html("");
               $("#display").html("<h2 style='color:white'><center>" + data + "</center></h2>");
            });
         }



      })
   })

</script>