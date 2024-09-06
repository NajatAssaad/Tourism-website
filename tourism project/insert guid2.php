<?php
Session_start();
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');}
else{

require_once'connection.php';

 if(isset($_POST['fname']) && $_POST['fname']!=""
    && isset($_POST['lname']) && $_POST['lname']!=""
    && isset($_POST['email']) && $_POST['email']!=""
    && isset($_POST['phone_nb'] )&& $_POST['phone_nb']!=""
    && isset($_POST['address'] )&& $_POST['address']!="")
 
 
 {

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$phone_nb= $_POST['phone_nb'];
$address=$_POST['address'];
$type="guid";

$query = "INSERT INTO employees VALUES (NULL, '$fname', '$lname', '$email', '$phone_nb','$address','$type')";
$result=mysqli_query($con,$query);
if(!$result){
    die("ERROR");
}
else{
header("location:show all guids.php");
}
 }
}
?>