<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit cars</title>
    <style>
          table{
            width: 50vw;
            height: 50vh;
            margin:auto;
            margin-top: 5%;
            box-shadow: 0px 0px 5px 1px #485b41;
            padding: 10px;}
      td{
            width:50%;
            height: 40px;
      }
      input[type='submit']{
            background: #485b41;
            border: none;
             color: white;
             font-size: 15px;
            letter-spacing: 2px;
      }
      input{
            width:-moz-available;
            height:30px;
            text-indent:5px;
      }
      h1{
            ext-align: left;
  margin-bottom: 10px;
  border-bottom: 2px solid #485b41;
}
select{
    width: -moz-available;
    height: 30px;
    text-indent: 3px;
}
@media (max-width:700px){
      table{
            width:95%;
      }
}
    </style>
</head>
<body>
    



<?php
   require_once'nav.php';
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');

   }
   else{
    require_once'connection.php';
    $id=$_GET['carid'];
    $query="SELECT * FROM cars WHERE Car_id=$id ";
    $res=mysqli_query($con,$query);
    if($res){
        $row=mysqli_fetch_assoc($res);
    ?>
    <form method="POST" action="editcars2.php"  enctype='multipart/form-data'>
        <table >
        <tr><td colspan='2'><h1>EDIT CAR</h1></td></tr>
            <tr>
                <td>car id</td>
                <td><input type="text"  name="carId" value='<?php echo"$row[Car_id]"?>' readonly/></td>
            </tr>
            <tr>
                <td>Car name</td>
                <td><input type='text' name="Carname" value='<?php echo"$row[Car_name]"?>' required/></td>
            </tr>
    <tr>    
        <td>Year of manufacture</td>
        <td><input type='text' name="YearOfManufacture" value='<?php echo"$row[Year_of_manufacture]"?>'  required/></td>
    </tr>
    <tr>
        <td>Car color</td>
        <td><input type='text'  name="CarColor"value='<?php echo"$row[Car_color]"?>' required/></td>
    </tr>
    <tr>
        <td>nombre of seats</td>
        <td><input type='text'  name="nbofseats"value='<?php echo"$row[nb_of_seats]"?>' required/></td>
    </tr>
    <tr>
        <td>Price per day</td>
        <td><input type='text'  name="priceperday"value='<?php echo"$row[price_per_day]"?>' required/></td>
    </tr>
    <tr>
                <td>car photo</td>
                <td><input type='file' name="cphoto" value='<?php echo"./photos/cars/$row[photos]"?>' /></td>
             </tr>
    
    <tr>
        <td>Available</td>
        <td><select name='available' >
        <option value="<?php echo"$row[available]";?>" selected>edit avaibility</option>
            <option value='yes'>yes</option>
            <option value='no'>no</option>
             </select>
        </td>
    </tr>

    <tr>
        <td>Update</td>
        <td><input type='submit' value="update"/></td>
    </tr>
    </table>
    </form>
    <?php
    
    }
}
?></body>
</html>