<?php

if (!isset($_SESSION))
{
    session_start();
}
// if(!isset($_SESSION['username'])){
//     header('location:index.php');
//   }

include_once './dbcon.php';

if(isset($_POST['action'])){
    $_SESSION['from']="";
    $_SESSION['to']="";
    $_SESSION['totalDistance']="";
    $_SESSION['cabType']="";
    $_SESSION['luggage']="";
    $_SESSION['fare']="";
}
$_SESSION['current']="booking";
$_SESSION['user_start'] = time();
// Getting Data With Post
$cabType = $_POST['cabType'];
$luggage = $_POST['luggage'];


//Global Variable
$pickupDistance=$dropDistance=$luggageTotal = 0;

class fetchDistance {
    public $conn;
    private  $pickup;
    private  $drop;

   
    public function __construct()
    {
          $this->pickup = $_POST['pickup'];
          $this->drop = $_POST['drop'];
        
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('Connection Error! ' . mysqli_error($this->conn));
        if (!$this->conn)
        {
            echo 'Database Connection Error' . mysqli_connect_error($this->conn);
        }
    }
        public function pickupdistance(){
            
            $fetchPickupDistance=mysqli_query($this->conn,"select * from tbl_location where id='$this->pickup'");
            $result=$fetchPickupDistance->num_rows;
            if($result==1) {
               
                while ($data = mysqli_fetch_assoc($fetchPickupDistance)){
                    $_SESSION['from']=$data['name'];
                    return $data['distance'];
                }
            }


        }
        public function dropdistance(){
            $fecthDropDistance=mysqli_query($this->conn,"select * from tbl_location where id='$this->drop'");
            $result=$fecthDropDistance->num_rows;
            if($result==1) {
                $_SESSION['to']=$this->drop;
                while ($data = mysqli_fetch_assoc($fecthDropDistance)){
                    $_SESSION['to']=$data['name'];
                    return $data['distance'];
                }
            }


        }
      
    }


$pickupData=new fetchDistance();
$dropData=new fetchDistance();

$pickupDistance= $pickupData-> pickupdistance();
$dropDistance=$dropData->dropdistance();


//Calaculating Total Distance
$totalDistance = abs($dropDistance - $pickupDistance);
$_SESSION['totalDistance']=$totalDistance;



//Calculating Luggage
if($luggage==0){
    $luggageTotal =0;
}
else if ($luggage>0 && $luggage <= 10)
{
    $luggageTotal = 50;
}
else if ($luggage > 10 && $luggage <= 20)
{
    $luggageTotal = 100;
}
else
{
    $luggageTotal = 200;
}
$_SESSION['cabtype']=$cabType;
$_SESSION['luggage']=$luggage;

//Calculating Fare For Cedmicro
if ($cabType == 'CedMicro')
{
    $fixedfare = 50;
    if ($totalDistance <= 10)
    {
        $fare = $totalDistance * 13.50 + $fixedfare;
        $_SESSION['fare']=$fare;
        echo $fare;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 13.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 12);
        $fare = $temp + $fixedfare;
        $_SESSION['fare']=$fare;
        echo $fare;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 13.50) + (50 * 12.00) + ($next50 * 10.20);
        $_SESSION['fare']=$fare;
        echo $fare;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 13.50) + (50 * 12.00) + (100 * 10.20) + ($next100 * 8.50);
        $_SESSION['fare']=$fare;
        echo $fare;
    }
}


//Calculating Fare For CedMini
if ($cabType == 'CedMini')
{
    $fixedfare = 150;
    if ($totalDistance <= 10)
    {
        $fare = $totalDistance * 14.50 + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 14.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 13);
        $fare = $temp + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 14.50) + (50 * 13) + ($next50 * 11.20);
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 14.50) + (50 * 13) + (100 * 11.20) + ($next100 * 9.50);
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }

}

//Calculating Fare For CedRoyal
if ($cabType == 'CedRoyal')
{
    $fixedfare = 200;
    if ($totalDistance <= 10)
    {
        $fare = ($totalDistance * 15.50) + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {           
        $first10 = 10 * 15.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 14);
        $fare = $temp + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 15.50) + (50 * 14) + ($next50 * 12.20);
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 15.50) + (50 * 14) + (100 * 12.20) + ($next100 * 10.50);
        $fareWithLuggage = $fare + $luggageTotal;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }

}


//Calculating Fare For CedSUV
if ($cabType == 'CedSUV')
{
    $fixedfare = 250;
    if ($totalDistance <= 10)
    {
        $fare = ($totalDistance * 16.50) + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal * 2;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 10 && $totalDistance <= 60)
    {
        $first10 = 10 * 16.50;
        $next50 = $totalDistance - 10;
        $temp = $first10 + ($next50 * 15);
        $fare = $temp + $fixedfare;
        $fareWithLuggage = $fare + $luggageTotal * 2;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else if ($totalDistance > 60 && $totalDistance <= 160)
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $fare = $fixedfare + (10 * 16.50) + (50 * 15) + ($next50 * 13.20);
        $fareWithLuggage = $fare + $luggageTotal * 2;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }
    else
    {
        $first10 = $totalDistance - 10;
        $next50 = $first10 - 50;
        $next100 = $next50 - 100;
        $fare = $fixedfare + (10 * 16.50) + (50 * 15) + (100 * 13.20) + ($next100 * 11.50);
        $fareWithLuggage = $fare + $luggageTotal * 2;
        $_SESSION['fare']=$fareWithLuggage;
        echo $fareWithLuggage;
    }

}

?>
