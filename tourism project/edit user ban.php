<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit user ban status</title>
    <style>
      body{
        background:rgba(72, 91, 65, 0.2);
      } 
      
      h2{border-bottom: 3px solid black;
      }
        table{
            margin:auto;
            height:50vh;
            margin-top:25vh;
            width:35%;
            box-shadow:0px 0px 5px gray;
        }
        table td{
            padding:2%
        }
        input,select{
            width:-moz-available;
            padding: 5px;
            background:transparent;
            border: 1px solid black;
            
        }
        input[type='submit']{
            background: rgb(72 91 65);;
            border: none;
            font-size: 15px;
            color: #daded9;
            letter-spacing: 2px;
        }
        input[type='submit']:hover{
            box-shadow:0px 0px 5px gray;
        }
        span{
            font-size: 20px;
        }
        @media (max-width:900px){
            table{
                width:90%;
            }
        }
    </style>
</head>
<body>
    


<?php
session_start();
if($_SESSION["isloggedin"]!=1 || $_SESSION["role"]!=1)
header("location: login.html");
else{
    if(isset($_GET['userid'])){
        $userid=$_GET['userid'];
        require_once'connection.php';
        $query="SELECT * FROM user WHERE User_id='$userid'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
        $username=$row['username'];
        $ban=$row['ban'];
        echo"
        
        <form action='edit user ban2.php'>
        <table border='0'>
        <tr><td colspan='2'><h2>Change user ban status</h2></td></tr>
        <tr>
            <td> <span>User Id:<span></td>
            <td><input type='text' name='userid' value='$userid' readonly/></td>
        </tr>
        <tr>
            <td><span>Username:<span></td>
            <td><input type='text' name='username' value='$username' readonly/></td>
        </tr>
        <tr>
              <td><span> User ban status:<span></td>
              <td><select name='ban'  required>
                   <option value='$ban' selected >choose</option>
                   <option value='yes'>yes</option>
                   <option value='no'>no</option>
                   </select>
              </td>
        </tr>
        <tr>
                <td colspan='2'>  
                   <input type='submit' value='edit'/>
                 
                </td>
        </tr>
        </table>
        </form>";
    }
}
?>
</body>
</html>