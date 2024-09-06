<?php
 Session_start();
 if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
  header('location:login.html');

 }
 else{
    require_once'connection.php';
    $driverid=$_GET['id'];
    $query= " DELETE FROM employees WHERE emp_id='$driverid'" ;
    $result= mysqli_query($con,$query);
    if(!$result){
        echo'<script>
                     alert("error.....");
                     window.location.replace("show all guids.php")
             </script>';
                }
    else{
        header("location: show all drivers.php");
    }
 }
 ?>
