<?php
   include_once '../location.class.php';
   
   $location=new Location();
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
   
   if(isset($_GET['id'])) {
       $id=$_GET['id'];
       $data=$location->fetchLocationDetail($id);
   
       if(!$data){
           echo "<script>alert('Something Went Wrong,Location Not Fetched ')</script>";
       } 
   }
   
   
   if(isset($_POST['submit'])){
       $id=$_POST['id'];
       $locationName=$_POST['locationName'];
       $locationDistance=$_POST['locationDistance'];
       $isavailable=$_POST['availiblity'];
       $isDone=$location->updateLocation($id,$locationName,$locationDistance,$isavailable);
       if($isDone){
           header("location:manageLocation.php");
       }  else {
           echo "<script>alert('Something Went Wrong,Location Not Updated ')</script>";
       }   
   }
   
   
   
   ?>
<?php include_once './sidebar.php'?>
<div class="container-fluid">
   <h2 class="text-center">Edit Location</h2>
   <div class="col-lg-8 col-xlg-9 col-md-12">
      <div class="card">
         <div class="card-body">
            <form action="" method="POST" class="form-horizontal form-material">
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Location Name</label>
                  <div class="col-md-12 border-bottom p-0">
                     <input type="text" name="id"  value="<?php echo $data['id']?>"
                        class="form-control p-0 border-0" hidden> 
                     <input type="text" name="locationName"  value="<?php echo $data['name']?>"
                        class="form-control p-0 border-0" required> 
                  </div>
               </div>
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Distance</label>
                  <div class="col-md-12 border-bottom p-0">
                     <input type="number" name="locationDistance" value="<?php echo $data['distance']?>"
                        class="form-control p-0 border-0" required> 
                  </div>
               </div>
               <div class="form-group mb-4">
                  <label class="col-md-12 p-0">Availiblity</label>
                  <div class="col-md-12 border-bottom">
                     <select name="availiblity" class="form-control p-0 border-0">
                        <?php 
                           $statusId="";
                           $statusOption="";
                           $statusId2="";
                           $statusOption2="";
                           if($data['is_available']=="1"){
                               $statusId="1";
                               $statusOption="Available";
                               $statusId2="0";
                               $statusOption2="Not Available";
                           } else {
                               $statusId="0";
                               $statusOption="Not Available";
                               $statusId2="1";
                               $statusOption2="Available";
                           }
                           ?>
                        <option value="<?php echo $statusId ?>"> <?php echo $statusOption ?> </option>
                        <option value="<?php echo $statusId2 ?>"><?php echo $statusOption2 ?></option>
                     </select>
                  </div>
               </div>
               <div class="form-group mb-4">
                  <div class="col-sm-12">
                     <input type="submit" name="submit" class="btn btn-success" value="Update Location"></input>
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