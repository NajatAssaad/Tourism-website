<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit trip</title>
    <style>
          table{
            width: 40vw;
            height: 50vh;
            margin:auto;
            margin-top: 2%;
            box-shadow: 0px 0px 5px 1px #485b41;
            padding: 10px;
        border:none;}
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

@media (max-width:700px){
      table{
            width:95%;
      }
}
    </style>
</head>
<body>
    


<?php
require_once"nav.php";
if($_SESSION["isloggedin"]!=1 || $_SESSION["role"]!=1)
header("location: login.html");
else{
    require_once"connection.php";
    if(isset($_GET['tripid'])){
         $id= $_GET['tripid'];
    $query="SELECT * FROM trips where Trip_id=$id";
    $res=mysqli_query($con,$query);
    if($res){
    $row=mysqli_fetch_assoc($res);
    ?>
    <form method="post" action="edittrips2.php">
    <table>
    <tr><td colspan='2'><h1>EDIT TRIP</h1></td></tr>
        <tr>
            <td>Trip id:</td>
            <td><input type="text"  name="tripid" value='<?php echo"$row[Trip_id]"?>' readonly/></td>
        </tr>
        <tr>
            <td>Trip name:</td>
            <td><input type="text"  name="tripname" value='<?php echo"$row[trip_name]"?>' required/></td>
        </tr>
        <tr>
            <td>price:</td>
            <td><input type='text' name="price" value='<?php echo"$row[price]"?>' required/></td>
        </tr>
<tr>
    <td>destination:</td>
    <td><input type='text'  name="start_date"value='<?php echo"$row[startDate]"?>' required/></td>
</tr>
<tr>
    <td>End_date:</td>
    <td><input type='text' name="start_time" value='<?php echo"$row[start_time]"?>'  required/></td>
</tr>
<tr>
    <td>End time:</td>
    <td><input type='text' name="end_time" value='<?php echo"$row[end_time]"?>'  required/></td>
</tr>
    <tr>
            <td>nb limit:</td>
            <td><input type="text"  name="nblimit" value='<?php echo"$row[trip_limit]"?>' required/></td>
    

    </tr>
    <tr>
            <td>description:</td>
            <td>
                <textarea name="description"  cols="30" rows="10">
                <?php echo"$row[trip_description]";?>
            </textarea></td>
    

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
else{
    echo" error ";
}


}
?>
</body>
</html>