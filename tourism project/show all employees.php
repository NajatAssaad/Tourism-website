<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="show.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>show all employees</title>
</head>
<body>
<?php 
require_once'connection.php';
require_once'nav.php';
if($_SESSION["isloggedin"]!=1 || $_SESSION["role"]!=1)
header("location: login.html");
else{?>

    <div class="buttons-and-search-div">
    <ul class="buttons-ul" style='width:60%;'>
        <li><a href="show all employees.php"><i class="far fa-eye"></i> show all</a></li>
        <li><a href="show all employees.php?type='driver'"><i class="far fa-eye"></i> show drivers</a></li>
        <li><a href="show all employees.php?type='guide'"><i class="far fa-eye"></i> show guids</a></li>
        <li><a href="insert emp1.php"><i class="fas fa-plus"></i> Add employee account</a></li>
        <?php
        if (isset($_GET['search'])) {
                //mnadef li da5alu bl search
                 $sanitizedSearchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
                 // Prepare and execute SQL query
                 $query = "SELECT * FROM employees JOIN user 
                 On User_id=emp_user_acc 
                 WHERE username LIKE '%$sanitizedSearchTerm%'";
        
        } else if(isset($_GET['type'])){
            $query = "SELECT * FROM employees JOIN user 
            On User_id=emp_user_acc 
            WHERE emp_type=$_GET[type]";
        }
        else{
            $query = "SELECT * FROM employees JOIN user 
            On User_id=emp_user_acc ";
        }
        $res = mysqli_query($con, $query);
        $rowsCount =mysqli_num_rows($res); // Count the number of rows from the query
        echo"<li><i class='fas fa-user'></i> number of employees: $rowsCount</li>";
        ?>
    </ul>
    <form action="show all employees.php" method="GET">
        <input type="text" id="search" name="search" placeholder="Enter employee username to search">
        <input type="submit" id="ok" value="Search" style="display:none;">
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
    <th>employee id</th>
    <th>employee account </td>
    <th>username</th>
    <th>first name</th>
    <th>last name</th>
    <th>email</th>
    <th>phone number</th>
    <th>address</th>
    <th>type</th>
    <th>available</th>
    <th>work start time</th>
    <th>work end time</th>
    
    <th colspan="2"><i class="fas fa-cog"></i></th>

</tr>
<?php for($i=0;$i<$rowsCount ;$i++){
   $row=mysqli_fetch_assoc($res);
   if($i % 2 ==0) echo"<tr>";
       else echo"<tr class='impair'>";
   echo "<td> $row[emp_id] </td>";
   echo "<td> $row[emp_user_acc] </td>";
   echo "<td> $row[username]</td>";
   echo "<td> $row[User_First_Name]</td>";
   echo "<td> $row[User_Last_Name] </td>";
   echo "<td> $row[email] </td>";
   echo "<td> $row[Phone_nb] </td>";
   echo "<td> $row[emp_addres] </td>";
   echo "<td> $row[emp_type] </td>";
   echo "<td> $row[available] </td>";
   echo "<td> $row[work_start_time] </td>";
   echo "<td> $row[work_end_time] </td>";
   echo"<td><a class='pen'href='edit emp1.php?id=$row[emp_id]'> <i class='fas fa-pencil'></i> </a></td>";
   echo"<td> <a class='bin' href='delete employe.php?id=$row[emp_id]'><i class='fas fa-trash-alt'></i> </a></td>";
   echo"</tr>";
}
echo"</table>" ; 
}
?>
  
</body>
</html>