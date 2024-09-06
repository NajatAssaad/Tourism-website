<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all cars</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="show.css">
</head>
<body>

<?php require_once 'nav.php'; 
if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header("location:login.html");
} else {
    require_once "connection.php";?>

<div class="buttons-and-search-div">
    <ul class="buttons-ul">
        <li><a href="show cars.php"><i class="far fa-eye"></i> Show All Cars</a></li>
        <li><a href="insert car1.php"><i class="fas fa-plus"></i> Add Car</a></li>
        <?php
        if (isset($_GET['search'])) {
           //mnadef li da5alu bl search
            $sanitizedSearchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
            // Prepare and execute SQL query
            $query = "SELECT * FROM cars WHERE Car_name LIKE '%$sanitizedSearchTerm%'";
        } else {
            $query = 'SELECT * FROM cars';
        }
        $res = mysqli_query($con, $query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li><i class='fas fa-car'></i> number of cars: $rowsCount</li>";
        ?>
    </ul>
    <form action="show cars.php" method="GET">
        <input type="text" id="search" name="search" placeholder="Enter car name to search">
        <input type="submit" id="ok" style="display:none;">
        <i class="fas fa-search" id="search-icon"></i>
    </form>
</div>

<script>
    document.getElementById('search-icon').addEventListener('click', function() {
        document.getElementById('ok').click();
    });
</script>

<table class="show-table">
    <tr>
        <th>Car ID</th>
        <th>Car Model</th>
        <th>Year of Manufacture</th>
        <th>Car Color</th>
        <th>Number of Seats</th>
        <th>Photos</th>
        <th>Price per Day</th>
        <th>Available</th>
        <th colspan="2"><i class="fas fa-cog"></i></th>
    </tr>

<?php
    for ($i = 0; $i < $rowsCount ; $i++) {
        $row = mysqli_fetch_assoc($res);
       if($i % 2 ==0) echo"<tr>";
       else echo"<tr class='impair'>";
        echo "<td>$row[Car_id]</td>";
        echo "<td>$row[Car_name]</td>";
        echo "<td>$row[Year_of_manufacture]</td>";
        echo "<td>$row[Car_color]</td>";
        echo "<td>$row[nb_of_seats]</td>";
        echo "<td>$row[photos]</td>";
        echo "<td>$row[price_per_day]</td>";
        echo "<td>$row[available]</td>";
        echo "<td><a class='pen' href='editcars.php?carid=$row[Car_id]'><i class='fas fa-pencil'></i></a></td>";
        echo "<td><a class='bin' href='delete car.php?carid=$row[Car_id]'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
