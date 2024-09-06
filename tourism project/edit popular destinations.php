<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit popular destinations</title>
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
            text-align: left;
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
require_once'nav.php';
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');

   }
   else{
    require_once'connection.php';
    $id=$_GET['id'];
    $query="SELECT * FROM popular_destinations WHERE destination_id=$id ";
    $res=mysqli_query($con,$query);
    if($res){
        $row=mysqli_fetch_assoc($res);
    ?>
    <form method="POST" action="edit popular destinations2.php">
        <table >
        <tr><td colspan='2'><h1>EDIT POPULAR DESTINATIONS</h1></td></tr>
            <tr>
                <td>destination id:</td>
                <td><input type="text"  name="destination_id" value='<?php echo"$row[destination_id]"?>' readonly/></td>
            </tr>
            <tr>
                <td>name:</td>
                <td><input type='text' name="name" value='<?php echo"$row[destination_name]"?>' required/></td>
            </tr>

    <tr>
        <td>photo:</td>
        <td><input type='file' name="pic"  /></td>
   

    </tr>
        <td>Update</td>
        <td><input type='submit' value="update"/></td>
    </tr>
    </table>
    </form>
    <?php
    
    }
}
?>
</body>
</html>
