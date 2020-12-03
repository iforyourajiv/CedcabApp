<?php include_once './header.php' ?>
<?php
   include_once './user.class.php';
   
   if (!isset($_SESSION)) {
    session_start();
   }
   
   if (!isset($_SESSION['username'])) {
    header('location:index.php');
   }
   
   $userData = new User();
   $data     = $userData->fetchUserDetail();



   ?>

<section id="main">
   <div class="container-fluid bg-overlay">
      <h1>Book a City Taxi to Your Destination in town</h1>
      <h3>Choose from A Range of categories and prices</h3>
      <div class="row mt-3">
         <div class="col-md-4 ml-5">
         </div>
         <div class="col-md-5">
         <p id="sent" class='text-black'></p>
            <div class="form-group">
               <div class="col-md-4">
                  <input type="number" id="number" class="form-control" name="mobile" value="<?php echo $data['mobile'] ?>" required="required" disabled>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-4">
                  <input type="text" id="otp" maxlength="6"  class="form-control" name="otp" value="" required="required" placeholder="Enter OTP ">
                  <input type="hidden" id="VerificationSessionId"  name="VerificationSessionId" value="" >
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-8">
                  <button id="sendotp" class="btn btn-sm btn-primary">Send OTP </button>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-8">
                  <button id="verifyOTP" class="btn btn-sm btn-primary">Verify OTP </button>
               </div>
            </div>
          
            <p id="message"></p>
         </div>
      </div>
   </div>
   </div>
   </div>
</section>
<?php include_once './footer.php' ?>
<script>
    $(document).ready(function() {

        $("#sendotp").click(function(){
          let mobile=$("#number").val();
          let action="send";
          $.ajax({
                    method: "POST",
                    url: "verifyOTP.php",
                    data: {
                        mobile:mobile,
                        action:action,
                    },
                }).done(function(data) {
                  $("#sendotp").css('display','none');
                  $("#VerificationSessionId").val(data);
                });
        })

        $("#verifyOTP").click(function() {
            let otp=$("#otp").val();
            let action="verify";
            let verificationSessionId=$("#VerificationSessionId").val();
                $.ajax({
                    method: "POST",
                    url: "verifyOTP.php",
                    data: {
                        otp: otp,
                        action:action,
                        verificationSessionId:verificationSessionId
                    },
                }).done(function(data) {
                   $("#message").html(data);

                });
        });
    });
</script>