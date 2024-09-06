<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book trip</title>
    <link rel="stylesheet" href="view trip details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    <?php
     session_start();
     if($_SESSION['isloggedin']!=1){
      echo"
      <script>
      alert('you have to login before booking trip');
      window.location.href='login.html'</script>";
     }
    else{

  require_once 'connection.php';
  $trip_id = $_GET['tripid'];
  $query = "SELECT * FROM trips WHERE Trip_id ='$trip_id'";
  $res = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($res);
  $name = $row['trip_name'];
  $destination = $row['destination'];
  $price = $row['price'];
  $startdate = $row['startDate'];
  $enddate = $row['end_date'];
  $starttime = $row['start_time'];
  $endtime = $row['end_time'];
  $limit = $row['trip_limit'];
  $photo = $row['photo'];
  $availablep=$row['available_places'];
  

    echo" 
  
    <div class='details-container'>
        <div class='trip-img'>
        <img src='./photos/trips/$photo'/>
        </div>
        <div class='trip-details'>
        <h1>Trip Details</h1>
<table>
<tr>
<td> <i class='fas fa-suitcase'></i>$name</td>
<td>  <i class='fas fa-map-marker-alt'></i> $destination</td>
</tr>
<tr>
<td><i class='far fa-calendar-alt'></i> $startdate</td>
<td><i class='far fa-calendar-alt'></i> $enddate</td>
</tr>
<tr>
<td>  <i class='fas fa-clock'></i> $starttime</td>
<td>  <i class='fas fa-clock'></i> $endtime</td>
</tr>
<tr>
<td><i class='fas fa-user'></i> $limit</td>
<td> <i class='fas fa-money-bill-wave'></i> $price</td>
</tr>
<tr> 
<td>
<form action='book trip2.php' method='get'>
<i class='fas fa-user'></i> persons
 <input name='nbofpersons' class='number' type=number min='0' max='$limit' step='1'value='0'/>
<input type='hidden' name='tripid' value='$trip_id'/>
</td>
<td>
<i class='fas fa-check-circle'></i> available places:$availablep</td>
</tr>

<tr>
<td colspan='2'align='right'><input type='submit'value='Confirm booking' class='book'/></td>
</tr>
</table>
</form>

        </div>
    </div>";

    }
    ?>
</body>
</html>