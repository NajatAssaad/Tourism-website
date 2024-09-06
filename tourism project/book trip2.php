<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
if($_SESSION['isloggedin']!=1){
    header("location:login.html");
}
else{ 
    require_once'connection.php';
    if(isset($_GET['nbofpersons'])&& $_GET['nbofpersons']!="")
    {   $today = date("Y m d", time());
        $tripid=$_GET['tripid'];
        $userid= $_SESSION['user_id'];
        $nbofpersons=$_GET['nbofpersons'];
        $query="SELECT *
                From trips 
                WHERE Trip_id='$tripid'";
        $res= mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($res);
        $price=intval($row['price']);

        $totalprice=$nbofpersons*$price;
        $availablep=$row['available_places'];
        if($nbofpersons>$availablep){
            echo" <script>
            alert('no enough available places!');
            window.location.replace('book trip.php?tripid=$tripid');
            </script>";
            return;
        }
        else{
        $availablep-=$nbofpersons;

        $query2="UPDATE trips
        SET available_places= $availablep
        WHERE Trip_id='$tripid'";
         $res2= mysqli_query($con,$query2);
       
         $query3 = "INSERT INTO booking_trips(Trip_id, User, Booking_date, Nb_of_persons, Total_amount)
           VALUES ('$tripid', '$userid', now(), '$nbofpersons', '$totalprice')";
           $res3 = mysqli_query($con, $query3);
           if($res2&&$res3){
            echo' <script>
            alert("the triphas been booked successfullf");
            window.location.replace("show my booked trips.php")
            </script>';
           }
           
           else{
            echo' <script>
            alert("something wrong! please try again");
            window.location.replace("book trip.php")
            </script>';
           }
        }


    }

}
    ?>
</body>
</html>