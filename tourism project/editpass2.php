
<?php
 session_start();

 if($_SESSION['isloggedin']!=1){
    header("location:login.html");
}

else if(isset($_POST['old'])&&!empty($_POST['old'])&&
        isset($_POST['new'])&&!empty($_POST['new'])&&
        isset($_POST['conf'])&&!empty($_POST['conf']))
        {
    require_once'connection.php';
    $old=$_POST['old'];
    $new=$_POST['new'];
    $conf=$_POST['conf'];
    $id= $_SESSION['user_id'] ;
    $query="SELECT pass_word FROM user WHERE User_id=$id";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    $pass=$row['pass_word'];
    if($pass!=$old){
        echo"
        <script>
        alert('incorrect password!');
        window.location.replace ('editpass.php');
        </script>";

    }
     if($new!=$conf){ 
         echo"
            <script>
            alert('passwords do not match!');
            window.location.replace ('editpass.php');
            </script>";
    
        }
        $query = "UPDATE user SET pass_word='$new' WHERE User_id=$id";
    $result=mysqli_query($con,$query);
    if($result){
        echo"
        <script>
        alert('your password has been changed successfully!');
        window.location.replace ('profile.php');
        </script>";
    }
    else{
        echo"
        <script>
        alert('something went wrong please try again!');
        window.location.replace ('editpass.php');
        </script>";
    }
}
?>
