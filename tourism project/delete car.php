<?php
 Session_start();
 if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
  header('location:login.html');

 }
 else{
    require_once'connection.php';
    $carid=$_GET['carid'];
    $query= " DELETE FROM cars WHERE Car_id='$carid'" ;
    $result= mysqli_query($con,$query);
    if(!$result){
        echo'<script>
                     alert("error.....");
                     window.location.replace("show cars.php")
             </script>';
                }
    else{
        header("location:show cars.php");
    }
 }
 ?>
