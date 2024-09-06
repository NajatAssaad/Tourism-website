<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show my booked trips</title>
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
$query1="SELECT emp_id FROM employees WHERE emp_user_acc=$userId";
$res1=mysqli_query($con,$query1);
$row=mysqli_fetch_assoc($res1);
$emp_id=$row['emp_id'];
$query = "SELECT * FROM user JOIN booking_emp ON user.User_id = booking_emp.user_id WHERE employees_id = ".$emp_id;
$res=mysqli_query($con,$query);
$nbr=mysqli_num_rows($res);
echo"<h1> your clients </h1>";
echo"<div class='conatiner'>";

        
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
   echo "<div class='cards'>
    <div class='image-section'>
    <img src='./photos/clients/$row[photo]' 
    style='position: absolute;
    height: 100%;
    width: 100%;' />
 
     </div>
    <div class='content'>   
        <h2>$row[User_First_Name] $row[User_Last_Name]</h2>
        <h3> $row[Phone_nb]</h3>

        
        <a href='view client booking details.php?userid=$row[User_id]&&empid=$emp_id class='button'>view booking details</a>
    </div>
</div>";

}
 echo"</div>";}

?>
</body>
</html>