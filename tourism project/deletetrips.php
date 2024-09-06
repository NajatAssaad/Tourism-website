<?php
 Session_start();
 if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
  header('location:login.html');

 }
 else{
    require_once'connection.php';
    $tripid=$_GET['tripid'];
    $query= " DELETE FROM trips WHERE Trip_id='$tripid'" ;
    $result= mysqli_query($con,$query);
    if(!$result){
        echo'<script>
                     alert("error.....");
                     window.location.replace("showalltrips.php")
             </script>';
                }
    else{
        header("location:showalltrips.php");
    }
 }
 ?>