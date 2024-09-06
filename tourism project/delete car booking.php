
<?php
 Session_start();
 if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
  header('location:login.html');}
else{
if(isset($_GET['booking_id'])){
    $booking_id=$_GET['booking_id'];
    require_once'connection.php';
    $query="DELETE FROM booking_cars WHERE Book_c_id=$booking_id";
    $res=mysqli_query($con,$query);
    if($res){
        echo" <script>
        alert('the reservation has been deleted successfully.')
        window.location.href = 'show all booked cars.php';</script>
        ";
    }
}}
    
?>