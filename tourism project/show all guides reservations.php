<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all guides reservations</title>
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
    <ul class="buttons-ul">
        <li><a href="show all guides reservations.php"><i class="far fa-eye"></i> Show All reservations</a></li>

        <?php
        if (isset($_GET['search-user'])) {
           //mnadef li da5alu bl search
            $sanitizedSearchTerm = htmlspecialchars($_GET['search-user'], ENT_QUOTES, 'UTF-8');
            $sanitizedSearchUserid=intval($sanitizedSearchTerm);
            // Prepare and execute SQL query
            $query = "SELECT * FROM booking_guides WHERE user_id='$sanitizedSearchUserid' ORDER BY booking_date";

        } else if(isset($_GET['search-guide'])) {
            $sanitizedSearchTerm = htmlspecialchars($_GET['search-guide'], ENT_QUOTES, 'UTF-8');
            $sanitizedSearchUserid=intval($sanitizedSearchTerm);
            // Prepare and execute SQL query
            $query = "SELECT * FROM booking_guides WHERE guide_id='$sanitizedSearchUserid' ORDER BY booking_date ";
        }
        else{
            $query="SELECT * FROM booking_guides ORDER BY booking_date";
        }
        $res = mysqli_query($con,$query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li><i class='far fa-calendar-check'></i> number of reservations: $rowsCount</li>";
        ?>
    </ul>
    <form action="show all guides reservations.php" method="GET">
        <input type="text" id="search" name="search-user" placeholder="Enter user id">
        <input type="submit" id="ok" value="Search" style="display:none;">
        <i class="fas fa-search" id="search-icon"></i>
    </form>
    <form action="show all guides reservations.php" method="GET">
        <input type="text" id="search2" name="search-guide" placeholder="Enter guide id">
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
        <th>Guide Id</th>
        <th>User Id</th>
        <th>Booking Date</th>
        <th>time</th>

    </tr>

<?php
    for ($i = 0; $i < $rowsCount; $i++) {
        $row = mysqli_fetch_assoc($res);
       if($i % 2 ==0) echo"<tr>";
       else echo"<tr class='impair'>";
        echo "<td>$row[booking_id]</td>";
        echo "<td>$row[guide_id]</td>";
        echo "<td>$row[user_id]</td>";
        echo "<td>$row[booking_date]</td>";
        echo "<td>$row[reservation_time]</td>";
    
       
        echo "</tr>";
    }

    echo "</table>";

?>

</body>
</html>
