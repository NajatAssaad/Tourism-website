<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all trips</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="show.css">
</head>
<body>

<?php require_once 'nav.php'; ?>

<div class="buttons-and-search-div">
    <ul class="buttons-ul">
        <li><a href="showalltrips.php"><i class="far fa-eye"></i> Show All trips</a></li>
        <li><a href="inserttrip1.php"><i class="fas fa-plus"></i> Add trip</a></li>
        <?php
        if (isset($_GET['search'])) {
           //mnadef li da5alu bl search
            $sanitizedSearchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
            // Prepare and execute SQL query
            $query = "SELECT * FROM trips WHERE trip_name LIKE '%$sanitizedSearchTerm%'";
        } else {
            $query = 'SELECT * FROM trips';
        }
        $res = mysqli_query($con, $query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li>number of trips: $rowsCount</li>";
        ?>
    </ul>
    <form action="showalltrips.php" method="GET">
        <input type="text" id="search" name="search" placeholder="Enter trip name to search">
        <input type="submit" id="ok" value="Search" style="display:none;">
        <i class="fas fa-search" id="search-icon"></i>
    </form>
</div>

<script>
    document.getElementById('search-icon').addEventListener('click', function() {
        document.getElementById('ok').click();
    });
</script>

<?php
if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header("location:login.html");
} else {
    require_once "connection.php";

    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
          //mnadef li da5alu bl search
          $sanitizedSearchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
        // Prepare and execute SQL query
        $query = "SELECT * FROM trips WHERE trip_name LIKE '%$sanitizedSearchTerm%'";
    } else {
        $query = 'SELECT * FROM trips';
    }

    $res = mysqli_query($con, $query);
    $nbr = mysqli_num_rows($res);
?>

<table class="show-table">
    <tr>
        <th>Trip ID</th>
        <th>Trip Name</th>
        <th>Destination</th>
        <th>Price</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>limit of persons</th>
        <th>available places</th>
        <th>Photo</th>
        <th>description</th>
        <th colspan="2"><i class="fas fa-cog"></i></th>
    </tr>

<?php
    for ($i = 0; $i < $nbr; $i++) {
        $row = mysqli_fetch_assoc($res);
        if($i % 2 ==0) echo"<tr>";
        else echo"<tr class='impair'>";
        echo "<td>$row[Trip_id]</td>";
        echo "<td>$row[trip_name]</td>";
        echo "<td>$row[destination]</td>";
        echo "<td>$row[price]</td>";
        echo "<td>$row[startDate]</td>";
        echo "<td>$row[end_date]</td>";
        echo "<td>$row[start_time]</td>";
        echo "<td>$row[end_time]</td>";
        echo "<td>$row[trip_limit]</td>";
        echo "<td>$row[available_places]</td>";
        echo "<td>$row[photo]</td>";
        echo "<td>$row[trip_description]</td>";
        echo "<td><a class='pen' href='edittrips.php?tripid=$row[Trip_id]'><i class='fas fa-pencil'></i></a></td>";
        echo "<td><a class='bin' href='deletetrips.php?tripid=$row[Trip_id]'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
