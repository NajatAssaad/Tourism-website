<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit employee</title>
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
    if($_SESSION['isloggedin']!=1 || $_SESSION['role']!=1){
        header('location:login.html');

    }
    else{
        require_once'connection.php';
        $id=$_GET['id'];
        $query="SELECT * FROM user JOIN employees  On User_id=emp_user_acc   WHERE emp_id= $id ";
        $res=mysqli_query($con,$query);
        if($res){
            $row=mysqli_fetch_assoc($res);
        ?>
        <form method="post" action="edit emp2.php">
            <table class ="show-table">
            <tr><td colspan='2'><h1>EDIT EMPLOYEE</h1></td></tr>
    
                <tr>
                    <td>employee id</td>
                    <td><input type="text"  name="emp_id" value='<?php echo"$row[emp_id]"?>' readonly/></td>
                </tr>
                <tr>
                    <td>first name</td>
                    <td><input type='text' name="first_name" value='<?php echo"$row[User_First_Name]"?>' required/></td>
                </tr>
        <tr>
            <td>last name</td>
            <td><input type='text' name="last_name" value='<?php echo"$row[User_Last_Name]"?>'  required/></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type='email'  name="email" value='<?php echo"$row[email]"?>' required/></td>
        </tr>
        <tr>
            <td>phone number</td>
            <td><input type='text'  name="phone_nb" value='<?php echo"$row[Phone_nb]"?>' required/></td>
        </tr>
        <tr>
            <td>address</td>
            <td><input type='text'  name="address" value='<?php echo"$row[emp_addres]"?>' required/></td>
        </tr>
        
        <tr>
            <td>emp_type</td>
            <td><input type='text' name="emp_type" value='<?php echo"$row[emp_type]"?>'  required/></td>
        </tr>
        <tr>
          <td>available</td>
          <td>    
            <select name='available' required>
                   <option value='<?php echo"$row[available]";?>'selected>edit availibility</option>
                   <option value='yes'>YES</option>
                   <option value='no' >NO</option>
           </select>
        </td>
 
        </tr>
        <tr><td> work start time:</td>
    <td><input type='text' name='start_time' value='<?php echo"$row[work_start_time]";?>'required/><td></tr>

    <tr><td> work end time:</td>
    <td><input type='text' name='end_time' value="<?php echo "$row[work_end_time]";?>" required/><td></tr>
        <tr>
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
