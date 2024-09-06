<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my guides reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="cars&trips.css">
</head>
<body>

<?php
if(!isset($_SESSION['isloggedin'])){
    header('location:login.html');
}
else{
    require_once "connection.php";
$userid=$_SESSION['user_id'];
$query ="SELECT * FROM booking_guides JOIN employees ON booking_guides.guide_id= employees.emp_id
JOIN user ON user.User_id=employees.emp_user_acc
WHERE booking_guides.user_id='$userid' ORDER BY booking_guides.booking_date DESC"; 
$res=mysqli_query($con,$query);
$nbr=mysqli_num_rows($res);
echo"<h1>Your Guides</h1>";
echo "<div class='conatiner'>";
if($nbr==0){
    echo"No Reservations!";
}
else{
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
    $fname=$row['User_First_Name'];
    $lname=$row['User_Last_Name'];
    $email=$row['email'];
    $phone=$row['Phone_nb'];
   echo"<div class='cards'>
    <div class='image-section'>
    <img src='./photos/guides/$row[photo]' 
    style='position: absolute;
    height: 100%;
    width: 100%;' />
 
     </div>
    <div class='content'>   
      <h2>$fname $lname</h2>
   <p> <i class='far fa-envelope'></i> $email</p>
   <p> <i class='fas fa-phone'></i> $phone</p>

        <a href='my booked guide details.php?bookingid=$row[booking_id]'>view booking details</a>
    </div>
</div>";

}
 echo"</div>";
}
}
?>
</body>
</html>
