<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add driver reservation.php</title>
    <style>


       
        table{
            margin: auto;
            margin-top: 20vh;
            width:40vw;
            box-shadow: 0px 0px 10px black;
            padding: 10px;

}
table td{
    width: 50%;
  height: 50px;
  font-size: 19px;
  font-weight: 500;
}
table td h2{
    letter-spacing: 2px;
    text-align:center;
}


select{
    width:20vw;
    height: 30px;
    background: white;
border: 2px solid black;
font-size: 15px;
letter-spacing: 2px;

}
input[type='submit']{
    width: -moz-available;
    height: 40px;
    background: #485b41;
    font-size: 15px;
   letter-spacing: 2px;
   color:white;
   border:none;

}
        
    </style>
</head>
<body>
<?php session_start();
if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header("location:login.html");
}?>
    <form action="add driver reservation.php">
        <table border='0'>


<?php
require_once'connection.php';
$query="SELECT Book_c_id
FROM booking_cars 
WHERE with_driver = 'yes'
AND Book_c_id NOT IN (SELECT booking_car_id FROM booking_driver)";

$res=mysqli_query($con,$query); 
$nb=mysqli_num_rows($res);
echo"
<tr><td colspan='2'><h2>Select Driver Reservation</h2></td><tr>
<tr>
<td>choose booking car id:</td>
<td><select name='booking_car_id' required>
<option selected value=''>choose </option>";
for($i=0;$i<$nb;$i++){
    $row=mysqli_fetch_assoc($res);

    echo"<option value='$row[Book_c_id]'>$row[Book_c_id]</option>";
}

echo"</select></td></tr>";

$query2="SELECT emp_id FROM employees WHERE available='yes' and emp_type='driver'";
$res2=mysqli_query($con,$query2); 
$nb2=mysqli_num_rows($res2);
echo"
<tr><td>choose driver id:</td>
<td><select name='driver_id' required>
<option selected value=''>choose </option>";
for($i=0;$i<$nb2;$i++){
    $row2=mysqli_fetch_assoc($res2);

    echo"<option value='$row2[emp_id]'>$row2[emp_id]</option>";
}
echo"</select></td></tr>
<tr>
<td colspan='2'><input type='submit' value='add reservation'/></td>
</tr>
";
?>
</table>
    </form>

<?php
if(isset($_GET['booking_car_id']) && !empty($_GET['booking_car_id']) &&
isset($_GET['driver_id']) && !empty($_GET['driver_id'])) {
 $booking_car_id = $_GET['booking_car_id'];
 $driver_id = $_GET['driver_id'];
 $query = "INSERT INTO booking_driver VALUES(NULL, $booking_car_id, $driver_id)";
 $res = mysqli_query($con, $query);

 $query2="UPDATE employees SET available='no' WHERE emp_id=$driver_id";
 $res2=mysqli_query($con,$query2);
 if($res && $res2) {
     echo "
     <script>
     alert('Driver reservation has been added successfully!');
     window.location.href = 'show all drivers reservations.php';
     </script>";
 }
 else{
    echo "
    <script>
    alert('something went wrong please try again later');
    window.location.href = 'show all drivers reservations.php';
    </script>";
 }
}

?>

</body>
</html>