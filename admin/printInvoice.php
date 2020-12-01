<?php
include_once '../ride.class.php';
$rideRequest=new Ride();
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


if(isset($_GET['rideid'])){
    $rideid=$_GET['rideid'];
    $isDone=$rideRequest->fetchInvoiceDetail($rideid);
        foreach($isDone as $element){
            $rideID=$element['ride_id'];
            $fromLocation=$element['fromLocation'];
            $toLocation=$element['toLocation'];
            $rideDate=$element['ride_date'];
            $cabType=$element['cabtype'];
            $distance=$element['total_distance'];
            $luggage=$element['luggage'];
            $fare=$element['total_fare'];
       
        }
            
    if(!$isDone) {
        echo "<script>alert('Something Went Wrong,Cant Generate Invoice')</script>";
    }
}


?>
<?php include_once './sidebar.php'?>
        <div class="container-fluid">
                           
        <link rel="stylesheet" href="../assets/styles/invoice.css">
<!-- Invoice -->
<div >
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
                                        <h1>INVOICE</h1>
                                        <form method="post" action="booking.php">
                                        <a href="javascript:void(0);" class="btn  btn-info mt-2" onclick="printPageArea('display')" type="button">PRINT</a>
                                        </form>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" id="display">
                                        <table class="invoice">
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                      
                                                            <h3>Date : <p style="display:inline;"><?php echo $rideDate ?></p></h3>
                                                           
                                                      
                                                        <tr>
                                                            <td>Ride Id:</td>
                                                             <td class="alignright"> <?php echo $rideID ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>From</td>
                                                            <td class="alignright"><?php echo  $fromLocation ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>To</td>
                                                            <td class="alignright"><?php echo $toLocation ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Distance</td>
                                                            <td class="alignright"><?php echo $distance ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cab Type</td>
                                                            <td class="alignright"><?php echo $cabType ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luggage</td>
                                                            <td class="alignright"><?php echo $luggage ?> Kg</td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total Fare</td>
                                                            <td class="alignright">&#8377; <?php echo $fare ?></td>
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
function printPageArea(display){
    var printContent = document.getElementById(display);
   

    var WinPrint = window.open('', '', 'width=100,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
</script>


