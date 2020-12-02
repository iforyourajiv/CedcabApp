<?php
include_once '../location.class.php';

$location = new Location();
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

if (isset($_POST['submit'])) {
 $locationName     = $_POST['locationName'];
 $locationDistance = $_POST['locationDistance'];
 $isavailable      = $_POST['availiblity'];
 $isDone           = $location->addLocation($locationName, $locationDistance, $isavailable);
 if ($isDone) {
  header("location:manageLocation.php");
 } else {
  echo "<script>alert('Location Already Exist ')</script>";
 }

}

?>
<?php include_once './sidebar.php' ?>
<div class="container-fluid">
   <h2 class="text-center">Add Location</h2>
   <div class="col-lg-8 col-xlg-9 col-md-12">
      <div class="card">
         <div class="card-body card-body-dark">
            <form action="" method="POST" class="form-horizontal form-material">
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Location Name</label>
                  <div class="col-md-12 border-bottom p-0">
                     <input type="text" id="locationName" name="locationName" placeholder="Enter Location Name"
                        class="form-control p-0 border-0" required>
                  </div>
               </div>
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Distance</label>
                  <div class="col-md-12 border-bottom p-0">
                     <input type="text" id="distance" name="locationDistance" placeholder="Enter Location Distance"
                        class="form-control p-0 border-0" required>
                  </div>
               </div>
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Availiblity</label>
                  <div class="col-md-12 border-bottom">
                     <select name="availiblity" class="form-control p-0 border-0">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                     </select>
                  </div>
               </div>
               <div class="form-group mb-4">
                  <div class="col-sm-12">
                     <input type="submit" name="submit" class="btn btn-success" value="Add Location"></input>
                  </div>
               </div>
            </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $( document ).ready(function() {
       $( "#locationName" ).keypress(function(e) {
           var key = e.keyCode;
           if (key >= 48 && key <= 57) {
               e.preventDefault();
           }
       });
       $( "#distance" ).keypress(function(e) {
           var key = e.keyCode;
           if (key >= 48 && key <= 57) {

           } else {
               e.preventDefault();
           }
       });
   });
</script>
