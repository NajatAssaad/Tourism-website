<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all trips reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="show.css">
</head>
<body>

<?php require_once 'nav.php'; ?>

<div class="buttons-and-search-div">
    <ul class="buttons-ul" style='width:60%;'>
        <li><a href="show all trips reservations.php"><i class="far fa-eye"></i> Show All reservations</a></li>
        <li><a href=""><i class="fas fa-plus"></i> delete unpaid reservations</a></li>
        <?php
        if (isset($_GET['search-user'])) {
           //mnadef li da5alu bl search
            $sanitizedSearchTerm = htmlspecialchars($_GET['search-user'], ENT_QUOTES, 'UTF-8');
            $sanitizedSearchUserid=intval($sanitizedSearchTerm);
            // Prepare and execute SQL query
            $query = "SELECT * FROM booking_trips WHERE User='$sanitizedSearchUserid'";

        } else if(isset($_GET['search-trip'])) {
            $sanitizedSearchTerm = htmlspecialchars($_GET['search-trip'], ENT_QUOTES, 'UTF-8');
            $sanitizedSearchUserid=intval($sanitizedSearchTerm);
            // Prepare and execute SQL query
            $query = "SELECT * FROM booking_trips WHERE Trip_id='$sanitizedSearchUserid'";
        }
        else{
            $query='SELECT * FROM booking_trips';
        }
        $res = mysqli_query($con, $query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li><i class='far fa-calendar-check'></i> number of reservations: $rowsCount</li>";
        ?>
    </ul>
    <form action="show all trips reservations.php" method="GET">
        <input type="text" id="search" name="search-user" placeholder="Enter user id">
        <input type="submit" id="ok" value="Search" style="display:none;">
        <i class="fas fa-search" id="search-icon"></i>
    </form>
    <form action="show all trips reservations.php" method="GET">
        <input type="text" id="search2" name="search-trip" placeholder="Enter trip id">
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

<?php
if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header("location:login.html");
} else {
    require_once "connection.php";

    if (isset($_GET['search-user'])) {
        //mnadef li da5alu bl search
         $sanitizedSearchTerm = htmlspecialchars($_GET['search-user'], ENT_QUOTES, 'UTF-8');
         $sanitizedSearchUserid=intval($sanitizedSearchTerm);
         // Prepare and execute SQL query
         $query = "SELECT * FROM booking_trips WHERE User='$sanitizedSearchUserid'";
     } else if(isset($_GET['search-trip'])) {
         $sanitizedSearchTerm = htmlspecialchars($_GET['search-trip'], ENT_QUOTES, 'UTF-8');
         $sanitizedSearchUserid=intval($sanitizedSearchTerm);
         // Prepare and execute SQL query
         $query = "SELECT * FROM booking_trips WHERE Trip_id='$sanitizedSearchUserid'";
     }
     else{
         $query='SELECT * FROM booking_trips';
     }
    $res = mysqli_query($con, $query);
    $nbr = mysqli_num_rows($res);
?>

<table class="show-table">
    <tr>
        <th>Reservation ID</th>
        <th>Trip Id</th>
        <th>User Id</th>
        <th>Booking Date</th>
        <th>Person</th>
        <th>Total Amount</th>
        <th>Payed</th>
        <th colspan="2"><i class="fas fa-cog"></i></th>
    </tr>

<?php
    for ($i = 0; $i < $nbr; $i++) {
        $row = mysqli_fetch_assoc($res);
       if($i % 2 ==0) echo"<tr>";
       else echo"<tr class='impair'>";
        echo "<td>$row[book_t_id]</td>";
        echo "<td>$row[Trip_id]</td>";
        echo "<td>$row[User]</td>";
        echo "<td>$row[Booking_date]</td>";
        echo "<td>$row[Nb_of_persons]</td>";
        echo "<td>$row[Total_amount]</td>";
        echo "<td>$row[payed]</td>";
        echo "<td><a class='bin' href='delete trip reservation.php?reservationid=$row[book_t_id]'>
        <i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
