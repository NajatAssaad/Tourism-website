<?php
   Session_start();
   if($_SESSION['isloggedin']!=1 || $_SESSION['role']!=1){
    header('location:login.html');

                                                       }
   else{
    require_once'connection.php';

    if(isset($_POST['tripid']) && $_POST['tripid']!=""
      && isset($_POST['tripname']) && $_POST['tripname']!=""
      && isset($_POST['nblimit']) && $_POST['nblimit']!=""
      && isset($_POST['price']) && $_POST['price']!=""
      && isset($_POST['destination']) && $_POST['destination']!=""
      && isset($_POST['start_date']) && $_POST['start_date']!=""
      && isset($_POST['end_date'] )&& $_POST['end_date']!=""
      && isset($_POST['start_time'] )&& $_POST['start_time']!=""
      && isset($_POST['end_time'] )&& $_POST['end_time']!=""
      && isset($_POST['description'] )&& $_POST['description']!=""
      )
 {
$tripid= $_POST['tripid'];
$tripname=$_POST['tripname'];
$price= $_POST['price'];
$destination=$_POST['destination'];
$startdate=$_POST['start_date'];
$enddate=$_POST['end_date'];
$starttime=$_POST['start_time'];
$endtime=$_POST['end_time'];
$nblimit=$_POST['nblimit'];
$description=$_POST['description'];

$query = "UPDATE trips
          SET trip_name='$tripname',
              price = '$price' ,
              destination = '$destination',
              startDate = '$startdate',
              start_time='$starttime',
              End_date = '$enddate',
              end_time='$endtime',
              trip_limit='$nblimit',
              trip_description='$description'
          WHERE Trip_id = $tripid ";
            
            $res = mysqli_query($con, $query);
if($res){
       header("location:showalltrips.php");
        }
else{
    header("location:edittrips.php?id=$tripid");
  
    }
}
   }
?>