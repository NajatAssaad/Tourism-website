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
session_start();
if($_SESSION["isloggedin"]!=1 || $_SESSION["role"]!=1)
header("location: login.html");
else{
    require_once"connection.php";
   $query=" SELECT
    employees.emp_id,
    employees.emp_addres,
    employees.emp_type,
    employees.salary,
    user.User_First_Name,
    user.User_Last_Name,
    user.email,
    user.Phone_nb,
    user.password
FROM
   user
 JOIN
    employees
    ON User_id=emp_user_acc
    WHERE employees.emp_type='driver'";
    

    $res=mysqli_query($con,$query);
    $nbr= mysqli_num_rows($res);
    ?>
<h1>show all drivers</h1> 
<table class="show-table">
 <tr>
    <th>employee id</th>
    <th>first name</th>
    <th>last name</th>
    <th>email</th>
    <th>phone number</th>
    <th>address</th>
    <th>EDIT</th>
    <th>DELETE</th>

</tr>
<?php for($i=0;$i<$nbr;$i++){
   $row=mysqli_fetch_assoc($res);
   echo"<tr>";
   echo "<td> $row[emp_id] </td>";
   echo "<td> $row[User_First_Name] </td>";
   echo "<td> $row[User_Last_Name] </td>";
   echo "<td> $row[email] </td>";
   echo "<td> $row[Phone_nb] </td>";
   echo "<td> $row[emp_addres] </td>";
   echo"<td><a class='pen'href='edit emp1.php?id=$row[emp_id]'><i class='fas fa-pencil'></i></a></td>";
   echo"<td> <a class='bin' href='delete employe.php?id=$row[emp_id]'><i class='fas fa-trash-alt'></i></a></td>";
   echo"</tr>";
}
echo"</table>" ; 
echo'<a href="insert emp1.php"><button>add employee</button></a> ';

}
?>
  
</body>
</html>