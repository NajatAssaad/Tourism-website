
<?php 
 require_once('connection.php');
//input validation
if (
    isset($_POST['username']) && $_POST['username']!="" &&
    isset($_POST['fname']) && $_POST['fname']!="" &&
    isset($_POST['lname']) && $_POST['lname']!="" &&
    isset($_POST['email']) && $_POST['email']!="" &&
    isset($_POST['phonenb']) && $_POST['phonenb']!="" &&
    isset($_POST['password'])&& $_POST['password']!="" &&
    isset($_POST['password2']) && $_POST['password2']!=""
)
{


$username= stripslashes($_POST['username']);
$fname= stripslashes($_POST['fname']);
$lname= stripslashes($_POST['lname']);
$email= stripslashes($_POST['email']);
$phonenb= stripslashes($_POST['phonenb']);
$password= stripslashes($_POST['password']);
$password2= stripslashes($_POST['password2']);

// mnshuf iza hal username msta3mal abl. mn2lu yda5l 8ayru.

$query="SELECT * FROM `user` WHERE username='$username' ";
$res= mysqli_query($con,$query);
$nbrows= mysqli_num_rows($res);
if($nbrows==1){

   echo'  <script>
                  alert( "the username is already used, try another one");
                   window.location.replace ("registration.html");
          </script>';
          
    
             }

else{ 
    //iza ma msta3mal abll mnzidu.

 $query2 = "INSERT into `user` (username , pass_word , email , role , phone_nb , User_Last_Name , User_First_Name,photo)
            VALUES ('$username', '$password' , '$email', 2 , '$phonenb' ,'$lname', '$fname','default client pic.avif')";
 $result = mysqli_query($con,$query2);
 if($result){
    header("location:login.html");
 }
 else{
    header("location:registrtion.html");
 }
}
}
 


 ?>

 

