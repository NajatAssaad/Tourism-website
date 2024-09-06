<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booked trip details</title>
    <style>
        body{
           
        }
        table {
  width: 70vw;
  margin: auto;
 
  font-size: 18px;
  margin-top: 10vh;
  box-shadow: 0px 0px 10px gray;
  padding: 10px;
}
table td{
    height: 50px;
}
span{ font-size:20px;
    font-weight: 600;
}
h2{
    text-align: left;
  border-bottom: 2px solid green;
  padding-bottom: 5px;
}
@media (max-width:700px){
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
$query = "SELECT * FROM trips JOIN booking_trips ON trips.Trip_id = booking_trips.Trip_id WHERE book_t_id=$bookingid";
$res = mysqli_query($con, $query);
$row=mysqli_fetch_assoc($res);
$Booking_date =$row['Booking_date'];
$nbpersons= $row['Nb_of_persons'];
$total =$row['Total_amount'];
$payed=$row['payed'];
$total_amount =$row['Total_amount'];
$payed 	=$row['payed'];
$name = $row['trip_name'];
$destination=$row['destination'];
$startD=$row['startDate'];
$startT=$row['start_time'];
$endD=$row['end_date'];
$endT=$row['end_time'];

echo"<table border='0'>
<tr><td colspan='2'><h2> booking details</h2></td></tr>
<tr>
     <td><span>Trip Name: </span> $name </td>
      <td> <span>Destination: </span> $destination</td>
</tr>

<tr>
<td><span>Start Date:</span> $startD</td>
<td><span>End Date: </span> $endD</td>
</tr>   
<tr>
     <td><span>Start Time:</span> $startT</td>
     <td><span>End Time:</span> $endT </td>
</tr>
<tr>
     <td><span>Start Time:</span> $startT</td>
     <td><span>End Time:</span> $endT </td>
</tr>
<tr>
<td> <span>Booking Date: </span> $Booking_date</td>
     <td><span>Number Of Persons:</span> $nbpersons </td>
</tr>
<tr>
<td> <span>Total Amount:</span> $total$</td>
     <td><span>payed?:</span> $payed </td>
</tr>

</table>
     ";
   




   

 
    }
}
?>
</body>
</html>
