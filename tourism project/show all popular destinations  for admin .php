<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all popular destinations gallery</title>
    <link rel="stylesheet" href="show.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php
require_once'nav.php';
if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header("location:login.html");
    
    
}
else{
    require_once'connection.php';
    $query='SELECT*FROM popular_destinations';
    $res=mysqli_query($con,$query);
    $nbr=mysqli_num_rows($res);
    ?>
    <h3 style='margin: 10px 2.5vw;'> popular destinations</h3>
    <table class="show-table">
    <tr>
    <th>destination_id</th>
    <th>name</th>
    <th>photo</th>
    <th colspan="2"><i class="fas fa-cog"></i></th>
    </tr>
<?php 
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
    echo"<tr>";
    echo"<td> $row[destination_id]</td>";
    echo"<td> $row[destination_name]</td>";
    echo"<td> $row[photo]</td>";
    echo"<td><a class='pen' href='edit popular destinations.php?id=$row[destination_id]'><i class='fas fa-pencil'></i></a></td>";
    

    echo"</tr>";}
   echo" </table>";
}
?>
</body>
</html>