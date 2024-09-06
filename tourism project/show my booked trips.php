<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> my booked trips</title>
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
$query = "SELECT * FROM trips JOIN booking_trips ON trips.Trip_id = booking_trips.Trip_id WHERE User = " . $userId;
$res=mysqli_query($con,$query);
$nbr=mysqli_num_rows($res);
echo'<h1> your booked trips</h1>';
echo '<div class="conatiner">';

        
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
   echo "<div class='cards'>
    <div class='image-section'>
    <img src='./photos/trips/$row[photo]' 
    style='position: absolute;
    height: 100%;
    width: 100%;' />
 
     </div>
    <div class='content'>   
        <h2>$row[trip_name]</h2>
        <h3> $row[price]</h3> 
        
      
        <a href='view booking trip details.php?bookingid=$row[book_t_id]'>view booking details</a>
    </div>
</div>";

}
 echo"</div>";}
?>
</body>
</html>