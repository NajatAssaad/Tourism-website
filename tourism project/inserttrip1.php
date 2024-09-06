<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add trip</title>
    <style>
         table{
            width: 50vw;
            height: 50vh;
            margin:auto;
            margin-top: 2%;
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
    header('location:login.html');}
    ?>
<form method="post" action="inserttrips.php" enctype='multipart/form-data' >
   
        <table >
        <tr><td colspan='2'> <h1>ADD NEW Trip</h1></td></tr>
        <tr>
                <td>trip name</td>
                <td><input type='text' name="tripname" placeholder="trip name" required/></td>
            </tr>
            <tr>
                <td>price</td>
                <td><input type='text' name="price" placeholder="price" required/></td>
            </tr>
    <tr>
        <td>destination</td>
        <td><input type='text' name="destination" placeholder="destination"  required/></td>
    </tr>
    <tr>
        <td>startdate</td>
        <td><input type='date'  name="startdate"  placeholder="year/month/day" required/></td>
    </tr>
    <tr>
        <td>end date</td>
        <td><input type='date' name="enddate" placeholder="year/month/day"  required/></td>
    </tr>
    <tr>
        <td>start time</td>
        <td><input type='text' name="starttime" placeholder="start time"  required/></td>
    </tr>
    <tr>
        <td>end time</td>
        <td><input type='text' name="endtime" placeholder="end time"  required/></td>
    </tr>
    <tr>
                <td>limit</td>
                <td><input type='text' name="nblimit" placeholder="limit" required/></td>
            </tr>
            <tr>
                <td>available places</td>
                <td><input type='text' name="available" placeholder="limit" required/></td>
            </tr>
            <tr>
                <td>photo</td>
                <td><input type='file' name="tphoto"  required/></td>
            </tr>
            <tr>
                <td>description</td>
                <td><textarea name="description"  cols="30" rows="10" required></textarea></td>
            </tr>
    <tr>

        <td>ADD</td>
        <td><input type='submit' value="ADD "/></td>
    </tr>
</table>
</form>

</html>
