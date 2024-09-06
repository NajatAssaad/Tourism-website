<?php
Session_start();
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');}
else{
?>

<?php
require_once'connection.php';

 if(isset($_POST['price']) && $_POST['price']!=""
    &&isset($_POST['tripname']) && $_POST['tripname']!=""
    &&isset($_POST['nblimit']) && $_POST['nblimit']!=""
    && isset($_POST['destination']) && $_POST['destination']!=""
    && isset($_POST['startdate']) && $_POST['startdate']!=""
    && isset($_POST['enddate'] )&& $_POST['enddate']!=""
    && isset($_POST['starttime'] )&& $_POST['starttime']!=""
    && isset($_POST['endtime'] )&& $_POST['endtime']!=""
    && isset($_POST['description'] )&& $_POST['description']!=""
    && isset($_POST['available'] )&& $_POST['available']!="")
 
 {
   if(!empty($_FILES['tphoto'])){

      $extension=pathinfo($_FILES['tphoto']['name'],PATHINFO_EXTENSION);
      if($extension!="jpg"
      && $extension!="jpeg"
      && $extension!="png"
      && $extension!="gif"){

          echo"<script>
          alert('the file is not an image!');
          window.location.replace('inserttrip1.php');
               </script>";

               return;
                           }

$trippic=$_FILES['tphoto']['name'];
move_uploaded_file($_FILES['tphoto']['tmp_name'], "./photos/trips/$trippic");

$tripprice=$_POST['price'];
$tripname=$_POST['tripname'];
$nblimit=$_POST['nblimit'];
$destination= $_POST['destination'];
$startdate = date("Y-m-d", strtotime($_POST['startdate']));
$enddate = date("Y-m-d", strtotime($_POST['enddate']));
$starttime= date("H:i:s", strtotime($_POST['starttime']));
$endtime= date("H:i:s", strtotime($_POST['endtime']));
$available=$_POST['available'];
$description= $_POST['description'];
$query="INSERT INTO `trips` (`Trip_id`, `trip_name`, `price`, `destination`, `startDate`, `start_time`, `end_date`, `end_time`, `trip_limit`, `available_places`, `photo`, `trip_description`) 
VALUES (NULL, '$tripname', '$tripprice', '$destination', '$startdate', '$tarttime', '$enddate', '$endtime', '$nblimit', '$available', '$trippic', '$description')"; 
$result=mysqli_query($con,$query);
if(!$result){
    die("ERROR");
}
else{
   header("location: showalltrips.php");
}
 }
}
}
?>