<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all cars reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="show.css">
</head>
<body>

<?php require_once 'nav.php'; 

if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header("location:login.html");
}
 else {
    require_once "connection.php";}?>

<div class="buttons-and-search-div">
    <ul class="buttons-ul" style='width:60%;'>
        <li><a href="show all cars reservations.php"><i class="far fa-eye"></i> All reservations</a></li>
        <li><a href="Cancel unpaid bookings.php"><i class="fas fa-plus"></i> delete unpaid reservations</a></li>
        <li><a href="show all cars reservations.php?today='yes'"><i class="far fa-eye"></i> reservations of today</a></li>
        <?php
        if (isset($_GET['search-user'])) {
           //mnadef li da5alu bl search
            $sanitizedSearchTerm = htmlspecialchars($_GET['search-user'], ENT_QUOTES, 'UTF-8');
            $sanitizedSearchUserid=intval($sanitizedSearchTerm);
            // Prepare and execute SQL query
            $query = "SELECT * FROM booking_cars WHERE user_id='$sanitizedSearchUserid' ORDER BY Booking_date";

        } else if(isset($_GET['search-car'])) {
            $sanitizedSearchTerm = htmlspecialchars($_GET['search-car'], ENT_QUOTES, 'UTF-8');
            $sanitizedSearchUserid=intval($sanitizedSearchTerm);
            // Prepare and execute SQL query
            $query = "SELECT * FROM booking_cars WHERE Car_id='$sanitizedSearchUserid' ORDER BY Booking_date ";
        }
        else if(isset($_GET['today'])){
            $query = "SELECT * FROM booking_cars
            WHERE DATE(pick_up_date) = CURDATE()
            ORDER BY Booking_date";

        }
        else{
            $query="SELECT * FROM booking_cars ORDER BY Booking_date";
        }
        $res = mysqli_query($con, $query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li><i class='far fa-calendar-check'></i> number of reservations: $rowsCount</li>";
        ?>
    </ul>
    <form action="show all cars reservations.php" method="GET">
        <input type="text" id="search" name="search-user" placeholder="Enter user id">
        <input type="submit" id="ok" value="Search" style="display:none;">
        <i class="fas fa-search" id="search-icon"></i>
    </form>
    <form action="show all cars reservations.php" method="GET">
        <input type="text" id="search2" name="search-car" placeholder="Enter car id">
        <input type="submit" id="ok2" value="Search" style="display:none;">
        <i class="fas fa-search" id="search-icon2"></i>
    </form>
</div>

<script>
    document.getElementById('search-icon').addEventListener('click', function() {
        document.getElementById('ok').click();
    });

    document.getElementById('search-icon2').addEventListener('click', function() {
        document.getElementById('ok2').click();
    });
</script>



<table class="show-table">
    <tr>
        <th>Reservation ID</th>
        <th>CarId</th>
        <th>User Id</th>
        <th>Booking Date</th>
        <th>Pick up date</th>
        <th>Drop off date</th>
        <th>Total amount</th>
        <th>Payed</th>
        <th colspan="2"><i class="fas fa-cog"></i></th>
    </tr>

<?php
    for ($i = 0; $i < $rowsCount; $i++) {
        $row = mysqli_fetch_assoc($res);
       if($i % 2 ==0) echo"<tr>";
       else echo"<tr class='impair'>";
        echo "<td>$row[Book_c_id]</td>";
        echo "<td>$row[Car_id]</td>";
        echo "<td>$row[user_id]</td>";
        echo "<td>$row[Booking_date]</td>";
        echo "<td>$row[pick_up_date]</td>";
        echo "<td>$row[drop_off_date]</td>";
        echo "<td>$row[total_amount]</td>";
        echo "<td>$row[payed]</td>";
        echo "<td><a class='bin' href='delete car reservation.php?reservationid=$row[Book_c_id]'>
        <i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }

    echo "</table>";

?>

</body>
</html>
