<?php
Session_start();
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');}
else{

require_once'connection.php';

 if(isset($_POST['Carname']) && $_POST['Carname']!=""
    && isset($_POST['YearOfManufacture']) && $_POST['YearOfManufacture']!=""
    && isset($_POST['CarColor']) && $_POST['CarColor']!=""
    && isset($_POST['nbofseats']) && $_POST['nbofseats']!=""
    && isset($_POST['price_per_day'] )&& $_POST['price_per_day']!=""	
    && isset($_POST['available'] )&& $_POST['available']!="")
 
 {
    if(!empty($_FILES['cphoto'])){

        $extension=pathinfo($_FILES['cphoto']['name'],PATHINFO_EXTENSION);
        if($extension!="jpg"
        && $extension!="jpeg"
        && $extension!="png"
        && $extension!="gif"){

            echo"<script>
            alert('the file is not an image!');
            window.location.replace('insert car1.php');
                 </script>";

                 return;
                             }
    $carpic=$_FILES['cphoto']['name'];
    move_uploaded_file($_FILES['cphoto']['tmp_name'], "./photos/cars/$carpic");

    }

$car_name= $_POST['Carname'];
$year= $_POST['YearOfManufacture'];
$color= $_POST['CarColor'];
$nbofseats=$_POST['nbofseats'];
$price=$_POST['	price_per_day'];
$available= $_POST['available'];


$query = "INSERT INTO cars VALUES (NULL, '$car_name', '$year', '$color','$nbofseats', '$carpic','$price', '$available')";
$result=mysqli_query($con,$query);
if(!$result){
    die("ERROR");
}
else{
header("location:show cars.php");
}
 }
}
?>