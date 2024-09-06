<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my booked cars</title>
  <link rel="stylesheet" href="cars&trips.css">
</head>
<body>
    
<?php


if(!isset($_SESSION['isloggedin'])){
    header('location:login.html');
}
else{
    require_once "connection.php";

$userId = $_SESSION['user_id'];
$query = "SELECT * FROM cars JOIN booking_cars ON cars.Car_id = booking_cars.Car_id WHERE user_id = " . $userId;
$res = mysqli_query($con, $query);
$nbr = mysqli_num_rows($res);
echo'<h1> my booked cars</h1>';
echo ' <div class="conatiner">';
if($nbr==0){
    echo"No Reservations!";
}
     
        
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
    $carid=$row['Car_id'];
   echo "<div class='cards'>
    <div class='image-section'>
    <img src='./photos/cars/$row[photos]' 
    style='position: absolute;
    height: 100%;
    width: 100%;' />
 
     </div>
    <div class='content'>   
        <h2>$row[Car_name]</h2>
        <h3> $row[Year_of_manufacture]</h3> 
      
        <a href='my booked car details.php?bookingid=$row[Book_c_id]' >view booking details</a>
    </div>
</div>";

}
 echo"</div>";
}
?>
</body>
</html>