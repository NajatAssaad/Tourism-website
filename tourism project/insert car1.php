<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert.css">
    <title>add car</title>
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
         text-align: left;
         margin-bottom: 10px;
         border-bottom: 2px solid #485b41;
}
      select{ width:-moz-available;
        height:30px;
        text-indent:5px;
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
    <form method="post" action="insert car.php" enctype='multipart/form-data'>
    
        <table>
           <tr><td colspan='2'><h1>ADD NEW CAR</h1></td></tr>
          <tr>
                <td>Car Name</td>
                <td><input type='text' name="Carname" placeholder="car name"   required/></td>
         </tr>
         
          <tr>
                <td>Year of manufacture</td>
                <td><input type='text' name="YearOfManufacture" placeholder="year of manufacture"  required/></td>
          </tr>

           <tr>
                 <td>Car color</td>
                 <td><input type='text'  name="CarColor"  placeholder="color" required/></td>
           </tr>
           <tr>
                 <td>Nombre of seats </td>
                 <td><input type='text'  name="nbofseats"  placeholder="nombre of seats" required/></td>
           </tr>

            
            <tr>
                 <td>Price per day</td>
                 <td><input type='text' name="price_per_day" placeholder= "price per day "required/></td>
            </tr>

             <tr>
                <td>car photo</td>
                <td><input type='file' name="cphoto"  required/></td>
             </tr>
             <tr>
                 <td>Available</td>
                 <td><select name='available'>
                  <option value='yes' selected>choose</option>
                  <option value='yes'>yes</option>
                  <option value='no'>no</option>
                 </select></td>
            </tr>

              <tr>
                 <td>ADD</td>
                 <td><input type='submit' value="ADD "/></td>
              </tr>
</table>
</form>
</body>
</html>