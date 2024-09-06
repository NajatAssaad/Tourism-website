<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guide reservation details</title>
    <style>
        body{
           margin:0;
           padding:0;
           box-sizing:border-box;
        }
        table {
  width: 50vw;
  margin: auto;
  height: auto;
  font-size: 18px;
  margin-top: 25vh;
  box-shadow: 0px 0px 10px gray;
  padding: 10px;
}
table td{
    height:50px;
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
$query ="SELECT * FROM booking_guides JOIN employees ON booking_guides.guide_id= employees.emp_id
JOIN user ON user.User_id=employees.emp_user_acc
WHERE booking_guides.booking_id=$bookingid";
$res = mysqli_query($con, $query);
$row=mysqli_fetch_assoc($res);
$Booking_date =$row['booking_date'];
$fname=$row['User_First_Name'];
$lname=$row['User_Last_Name'];
$email=$row['email'];
$phone=$row['Phone_nb'];
$time 	=$row['reservation_time'];
$workE = $row['work_end_time'];
$workS = $row['work_start_time'];

echo"<table border='0'>
<tr><td colspan='2'><h2> Booking Details</h2></td></tr>
<tr>
     <td><span>Guide First Name:</span> $fname </td>
     <td><span>Guide Last Name:</span> $lname </td>
</tr>

<tr>
<td> <span>Email: </span>$email</td>
<td> <span>Phone Number: </span>$phone</td>

</tr>   
<tr>
<td> <span>Work Start Time </span>$workS</td>
<td> <span>Work End Time </span>$workE</td>
</tr>
<tr>
<td> <span>Booking Date: </span>$Booking_date</td>
<td> <span>time of reservation: </span>$time</td>
     
</tr>

</table>
     ";
   




   

 
    }
}
?>
</body>
</html>
