<?php
Session_start();
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');}
else{

require_once'connection.php';

 if(isset($_POST['username']) && $_POST['username']!=""
    && isset($_POST['pass']) && $_POST['pass']!=""
    && isset($_POST['fname']) && $_POST['fname']!=""
    && isset($_POST['lname']) && $_POST['lname']!=""
    && isset($_POST['workstart']) && $_POST['workstart']!=""
    && isset($_POST['workend']) && $_POST['workend']!=""
    && isset($_POST['email']) && $_POST['email']!=""
    && isset($_POST['available']) && $_POST['available']!=""
    && isset($_POST['phone_nb'] )&& $_POST['phone_nb']!=""
    && isset($_POST['address'] )&& $_POST['address']!=""
    && isset($_POST['type'] )&& $_POST['type']!="")
 
 {

$username=$_POST['username'];
$pass=$_POST['pass'];
$fname= $_POST['fname'];
$work_start = date("H:i:s", strtotime($_POST['workstart']));
$work_end = date("H:i:s", strtotime($_POST['workend']));
$lname= $_POST['lname'];
$email= $_POST['email'];
$phone_nb= $_POST['phone_nb'];
$address=$_POST['address'];
$type=$_POST['type'];
$available=$_POST['available'];
if($type=='guid')$role=5;
else{$role=4;} 

$query = "INSERT INTO user( User_id ,username ,	role ,	User_First_Name ,	User_Last_Name ,email ,Phone_nb ,pass_word,photo)
 VALUES (NULL,'$username','$role', '$fname', '$lname', '$email', '$phone_nb','$pass','default client pic.avif')";
$result=mysqli_query($con,$query);

$last_id= mysqli_insert_id($con);
$query2="INSERT INTO employees (emp_id ,emp_user_acc ,emp_addres ,emp_type,available,work_start_time,work_end_time )
VALUES(NULL,'$last_id','$address','$type','$available','$work_start','$work_end')";
$result2=mysqli_query($con,$query2);

if(!$result||!$result2){
    die("ERROR");
}
else{
    echo"
    <script>
    
    alert('a new employee has been inserted seccessfully!');
    window.location.replace('show all employees.php');
    </script>";

}
 }
}
?>