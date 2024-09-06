<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trip details</title>
    <link rel="stylesheet" href="view trip details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    <?php
      
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
  $description=$row['trip_description'];

  

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
<td><i class='far fa-calendar-alt'></i>start: $startdate</td>
<td><i class='far fa-calendar-alt'></i>end: $enddate</td>
</tr>
<tr>
<td>  <i class='fas fa-clock'></i>start: $starttime</td>
<td>  <i class='fas fa-clock'></i>end: $endtime</td>
</tr>
<tr>
<td><i class='fas fa-user'></i>limit: $limit</td>
<td> <i class='fas fa-money-bill-wave'></i> $price</td>
</tr>
<tr>
<td colspan='2'align='right'><a href='book trip.php?tripid=$trip_id'><button class='book'>Book Now</button></a></td>
</tr>
</table>
        </div>
    </div>";
    echo"<div class='moredetails'>
    <h2>More Details</h2>
          $description
    </div>";
    ?>
</body>
</html>