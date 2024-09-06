<?php 
require_once('connection.php');
if( isset($_POST['username']) && $_POST['username']!=""&&   
     isset($_POST['password'])&& $_POST['password']!="")
     {
        $username= stripslashes($_POST['username']);
        $password=stripslashes($_POST['password']);
        $query = "SELECT * FROM `user` WHERE username='$username' and pass_word='$password'";
        $result = mysqli_query($con,$query);
        $nbrows = mysqli_num_rows($result);
        if($nbrows==1){
           
            $row= mysqli_fetch_assoc($result);
            if($row['ban']=='yes'){
echo"
<script>alert('Your account has been temporarily suspended due to your bad behavior. You are unable to log in.');
window.location.href='home page.php';
</script>";
exit();       }
            else{
            Session_start();
            $_SESSION['isloggedin']=1;
            $_SESSION['username']=$row['username'];
            $_SESSION['email']= $row['email'];
            $_SESSION['Phone_nb']= $row['Phone_nb'];
            $_SESSION['role']= $row['role'];
            $_SESSION['user_id'] =$row['User_id'];
            if($row['role']==2) 
            {
                header("location:index.php");
            }
            else if($row['role']==4||$row['role']==5){
                header("location:profile.php");
            }
            else{ header("location:dashboard.php");}
        }
        }
        else{
            echo' <script>
            alert("invalid username or password")
            window.location.replace("login.html")
            </script>';
        }
     }
     ?>