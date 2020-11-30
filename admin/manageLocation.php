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

if(isset($_GET['del_id'])){
    $locationID=$_GET['del_id'];
    $isdone=$location->deleteLocation($locationID);
    if($isdone){
        header("location:manageLocation.php");
    } else {
        echo "<script>alert('Something Went Wrong,Location Not Deleted')</script>";
    }

}

?>
<?php include_once './sidebar.php'?>
        <div class="container-fluid">
            <h2 class="text-center">Manage Location</h2>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Location Name</th>
                                            <th class="border-top-0">Distance</th>
                                            <th class="border-top-0">Is Available</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $data=$location->displayLocationAdmin();
                                       if($data){
                                        foreach($data as $element){
                                            $locationID=$element['id'];
                                            $locationName=$element['name'];
                                            $distance=$element['distance'];
                                            $available=$element['is_available'];
                                            $currentStatus="";
                                            if($available=="0"){
                                                $currentStatus="NOT AVAILABLE";
                                            } else {
                                                $currentStatus="AVAILABLE";
                                            }
                            
                                            $html="<tr>";
                                            $html.="<td class='text-dark'>$locationName</td>";
                                            $html.="<td class='text-dark'>$distance</td>";
                                            $html.="<td class='text-dark'>$currentStatus</td>";
                                            $html.="<td><a href='editLocation.php?id=$locationID' class='btn btn-warning'>EDIT</a>
                                                        <a href='manageLocation.php?del_id=$locationID' class='btn btn-danger'>DELETE</a></td>";
                                            $html.="</tr>"; 
                                            echo $html; 
                                        } 
                                       }else {
                                                echo "<h3>No Record Found</h3>";
                                            }

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