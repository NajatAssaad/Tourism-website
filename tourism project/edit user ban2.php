<?php
session_start();
if($_SESSION["isloggedin"]!=1 || $_SESSION["role"]!=1)
header("location: login.html");
else{
    if(isset($_GET['userid'])&& $_GET['userid']!=''&&
       isset($_GET['ban'])&& $_GET['ban']!='')
       {
        $userid=$_GET['userid'];
        $newban=$_GET['ban'];
        require_once'connection.php';
        $query="UPDATE user SET ban='$newban' WHERE User_id=$userid";
        $result=mysqli_query($con,$query);
        if($result){

           if( $newban=='yes') {
            echo" <script>
            alert('This user is currently banned!')
            window.location.href = 'showallusers.php';
            </script>";}

            else{ echo" <script>
            alert('This user is currently not banned!')
            window.location.href = 'showallusers.php';
            </script>";
        }
        }

    
    }
}