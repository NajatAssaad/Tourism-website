<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="show.css">
</head>
<body>

<?php require_once 'nav.php'; ?>

<div class="buttons-and-search-div">
    <ul class="buttons-ul" style='width:50%'>
        <li><a href="showallusers.php"><i class="far fa-eye"></i> Show all users</a></li>
        <li><a href="insert emp1.php"><i class="fas fa-plus"></i> Add employee account</a></li>
        <?php
        if (isset($_GET['search'])) {
           //mnadef li da5alu bl search
            $sanitizedSearchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
            // Prepare and execute SQL query
            $query = "SELECT * FROM user WHERE username LIKE '%$sanitizedSearchTerm%'";
        } else {
            $query = 'SELECT * FROM user';
        }
        $res = mysqli_query($con, $query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li><i class='fas fa-user'></i> number of users: $rowsCount</li>";
        ?>
    </ul>
    <form action="showallusers.php" method="GET">
        <input type="text" id="search" name="search" placeholder="Enter username to search">
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
        $query = "SELECT * FROM user WHERE username LIKE '%$sanitizedSearchTerm%'";
    } else {
        $query = 'SELECT * FROM user';
    }

    $res = mysqli_query($con, $query);
    $nbr = mysqli_num_rows($res);
?>

<table class="show-table">
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>ban</th>
        
        <th colspan="2"><i class="fas fa-cog"></i></th>
    </tr>

<?php
    for ($i = 0; $i < $nbr; $i++) {
        $row = mysqli_fetch_assoc($res);
       if($i % 2 ==0) echo"<tr>";
       else echo"<tr class='impair'>";
        echo "<td>$row[User_id]</td>";
        echo "<td>$row[username]</td>";
        echo "<td>$row[role]</td>";
        echo "<td>$row[User_First_Name]</td>";
        echo "<td>$row[User_Last_Name]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[Phone_nb]</td>";
        echo "<td>$row[ban]</td>";
        echo "<td><a class='pen' href='edit user ban.php?userid=$row[User_id]'><i class='fas fa-pencil'></i></a></td>";
       
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
