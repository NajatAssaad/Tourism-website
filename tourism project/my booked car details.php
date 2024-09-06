<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booked car details</title>
    <style>
        body{
           margin:0;
           padding:0;
           box-sizing:border-box;
        }
        table {
  width: 50vw;
  margin: auto;
  height: 50vh;
  font-size: 18px;
  margin-top: 25vh;
  box-shadow: 0px 0px 10px gray;
  padding: 10px;
}
table td{
    height:20%;
}
span{ font-size:20px;
    font-weight: 600;
}
h2{
    text-align: left;
  border-bottom: 2px solid green;
  padding-bottom: 5px;
}
@media (max-width:900px){
    table{
        width:95vw;
        height:60vh;
    }
}
    </style>
</head>
<body>
    

<?php
session_start();
if(!isset($_SESSION['isloggedin'])){
    header('location:login.html');
}
else{
    if(isset($_GET['bookingid'])){
     $bookingid=$_GET['bookingid'];
    require_once "connection.php";

$userId = $_SESSION['user_id'];
$query = "SELECT * FROM cars JOIN booking_cars ON cars.Car_id = booking_cars.Car_id WHERE Book_c_id=$bookingid";
$res = mysqli_query($con, $query);
$row=mysqli_fetch_assoc($res);
$Booking_date =$row['Booking_date'];
$pick_up_date= $row['pick_up_date'];
$drop_off_date =$row['drop_off_date'];
$with_driver =$row['with_driver'];
$total_amount =$row['total_amount'];
$payed 	=$row['payed'];
$name = $row['Car_name'];

echo"<table border='0'>
<tr><td colspan='2'><h2> Booking Details</h2></td></tr>
<tr>
     <td><span>Car Name: </span> $name </td>
      <td> <span>Booking Date: </span>$Booking_date</td>
</tr>

<tr>
<td><span>Pick Up Date: </span>$pick_up_date</td>
<td><span>Drop Off Date: </span>$drop_off_date</td>
</tr>   
<tr>
     <td><span>Driver: </span> $with_driver</td>
     <td><span>Total Amount: </span>$total_amount $</td>
</tr>
<tr>
     <td><span>Payed:</span>$payed</td>
     
</tr>

</table>
     ";
   




   

 
    }
}
?>
</body>
</html>
