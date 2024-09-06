


<?php
 Session_start();
 if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
  header('location:login.html');

 }
 else{
    require_once'connection.php';
    $empid=$_GET['id'];
    $query= " DELETE FROM employees WHERE emp_id='$empid'" ;
    $result= mysqli_query($con,$query);
    if(!$result){
        echo'<script>
                     alert("error.....");
                     window.location.replace("show all employees.php")
             </script>';
                }
    else{
        header("location:show all employees.php");
    }
 }
 ?>
