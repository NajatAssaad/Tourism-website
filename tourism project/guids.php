<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="cars&trips.css">
</head>
<body>
<?php
require_once"connection.php";
$query = "SELECT * FROM
user
JOIN
 employees
 ON User_id=emp_user_acc
 WHERE employees.emp_type='guide' AND employees.available='yes'" ;
$res=mysqli_query($con,$query);
$nbr=mysqli_num_rows($res);
echo'<h1> Our available guides</h1>';
echo '<div class="conatiner">';
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

        <a href='booking guide.php?guideid=$row[emp_id]' >book now</a>
    </div>
</div>";

}
 echo"</div>";
?>
</body>
</html>