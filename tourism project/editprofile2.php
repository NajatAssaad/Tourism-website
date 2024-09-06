<?php
 session_start();
 if(!isset($_SESSION['isloggedin']))
{
 header("location:login.html");
}    
else if( $_SESSION['role']==2){
    require_once'connection.php';
    $id=$_SESSION['user_id'];
    
    if(isset($_POST['fname'])&& !empty($_POST['fname'])&&
    isset($_POST['lname'])&& !empty($_POST['lname'])&&
    isset($_POST['email'])&&!empty($_POST['email'])&&
    isset($_POST['phonenb'])&&!empty($_POST['phonenb'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phonenb'];

        
          $query="UPDATE user 
            SET User_First_Name='$fname',
             User_Last_Name='$lname',
             Email='$email',
             Phone_nb='$phone'  
              WHERE User_id=$id";}


$result=mysqli_query($con,$query);
if($result){
    echo"
    <script>
    alert('your profile have been updated successfully!');
    window.location.replace ('profile.php');
    </script>";
}
    }
    

else if($_SESSION['role']==4 ||$_SESSION['role']==4){
    require_once'connection.php';
    $id=$_SESSION['user_id'];
    
    if(isset($_POST['fname'])&& !empty($_POST['fname'])&&
    isset($_POST['lname'])&& !empty($_POST['lname'])&&
    isset($_POST['email'])&&!empty($_POST['email'])&&
    isset($_POST['phonenb'])&&!empty($_POST['phonenb'])&&
    isset($_POST['adr'])&&!empty($_POST['adr'])&&
    isset($_POST['available'])&&!empty($_POST['available'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phonenb'];
        $adr=$_POST['adr'];
        $available=$_POST['available'];
    }

$query1="UPDATE user 
         SET User_First_Name='$fname',
          User_Last_Name='$lname',
          Email='$email',
          Phone_nb='$phone'
           WHERE User_id=$id";
$result1=mysqli_query($con,$query1);
$query2=" UPDATE employees SET emp_addres='$adr',available='$available'WHERE emp_user_acc=$id";
$result2=mysqli_query($con,$query2);
if($result1 && $result2){
    echo"
    <script>
    alert('your profile have been updated successfully!');
    window.location.replace ('profile.php');
    </script>";
}}



?>