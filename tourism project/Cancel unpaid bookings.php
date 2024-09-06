<?php
// mna3ml query bts7ablna id lsiyarat li mre2 3ala 7ajzon aktar mn yawmen w manon madfu3in w mn7ton available
require_once'connection.php';
//mna3ml query 7ata nm7i l7ajz ba3d ma 3mlna lsiyara available
$query = "UPDATE cars SET available = 'yes' WHERE Car_id IN (
    SELECT Car_id FROM booking_cars WHERE booking_date < CURRENT_DATE - INTERVAL '2' DAY AND payed = 'no'
)";
$res=mysqli_query($con,$query);
$query2= "DELETE FROM booking_cars WHERE booking_date < CURRENT_DATE - INTERVAL '2' DAY AND payed = 'no'";
$res2=mysqli_query($con,$query2);
if($res && $res2){ 
    echo" <script>
    alert('Unpaid bookings have been canceled successfully !');
    window.location.replace('show all cars reservations.php');
    </script>";

}
?>