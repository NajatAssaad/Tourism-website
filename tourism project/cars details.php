<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car details</title>
    <link rel="stylesheet" href="cars details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    <?php
  require_once 'connection.php';
  $carid = $_GET['carid'];
  $query = "SELECT * FROM cars WHERE Car_id ='$carid'";
  $res = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($res);
  $name = $row['Car_name'];
  $yearofmanifacture = $row['Year_of_manufacture'];
  $color = $row['Car_color'];
  $photo =$row['photos'];
  $price =$row['price_per_day'];
  $nb_seats=$row['nb_of_seats'];
  $available=$row['available'];

  

    echo" 
  
    <div class='details-container'>


        <div class='car-img'>
        <img src='./photos/cars/$photo'/>
        </div>



        <div class='car-details' id='details'>
                                   <h1>Car Details</h1>
<table border='0'>
<tr>
     <td> <i class='fas fa-car'></i>$name</td>
      <td>  <i class='fas fa-industry'></i> $yearofmanifacture</td>
</tr>

<tr>
<td><i class='fa-solid fa-droplet' style='color: #373737;'></i> $color</td>
<td> <i class='fas fa-money-bill-wave'></i> $price</td>
</tr>   
<tr>
     <td><i class='fas fa-chair'></i>$nb_seats</td>";
    // 3am shuf iza l car available aw la 
    
     if($available=='yes') echo"<td><i class='fas fa-check-circle' style='color:green;'></i> Available </td></tr>";
    else echo"<td style='color:red;'> <i class='fas fa-ban' style='color:red;'></i> Not Available </td></tr>";





    if($available=='yes')echo"
<tr >
<td colspan='2'align='right'><button  id='showBookingFormButton' class='book'>Book Now</button></td>
</tr>";

echo"</table>";
echo"
<table id='bookingForm' class='bookingform' >
<form action='book car.php'>
<tr>
<td><h2 style='border-bottom: 2px solid black;letter-spacing: 2px;'>Booking Form</h2>
<i class='fas fa-times' id='x'></i></td>
</tr>
    <tr><td>Start Date
    <input type='date' id='startDate' name='startDate' required>
    <input type='hidden' name='carid' value='$carid'/>
    <input type='hidden' name='price' value='$price'/></td></tr>
    <tr><td>End Date:
    <input type='date' id='endDate' name='endDate' required></td></tr>
    <tr><td> <label><input type='checkbox' name='with-driver' value='yes'> with driver?</label><td></tr>
    <tr><td> <input type='submit' value='confirm' class='book'/></td></tr>
    <tr><td>
    <input type='reset' value='reset'class='book'
    
    </td></tr>

    </form>
</table>
</div>
</div>";
    ?>
   <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showBookingFormButton = document.getElementById('showBookingFormButton');
            const bookingForm = document.getElementById('bookingForm');
            const details=document.getElementById('details');
            const x=document.getElementById('x');



// lama yf2os 3al zer ytla3lu l form 

            showBookingFormButton.addEventListener('click', function() {
                bookingForm.style.display = 'revert';
                details.style.paddingTop = '5%';
                showBookingFormButton.style.display='none';
            });

// lama yf2os 3al x yru7 lform w yrja3 lbutton 
            x.addEventListener('click', function() {
                bookingForm.style.display = 'none';
                details.style.paddingTop = '10%';
                showBookingFormButton.style.display='revert';
        });
        });
       
        
       
        </script>
</body>
</html>