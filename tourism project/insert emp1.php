<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert employee</title>
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
      input[type='radio']{
        width: 20px;
         height: 17px;
        margin-right: 5px;
    margin-left: 10px;
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
    <form method="post" action="insert emp2.php">
   
        <table>
        <tr><td colspan='2'> <h1>ADD NEW EMPLOYEE</h1></td></tr>
             <tr>
                <td>username</td>
                <td><input type='text' name="username" placeholder="username" required/></td>
             </tr>

          
  

            <tr>
                <td>password</td>
                <td><input type='password' name="pass" placeholder="password" required/></td>
            </tr>


            <tr>
                <td>first name</td>
                <td><input type='text' name="fname" placeholder="first name" required/></td>
            </tr>
    <tr>
                <td>last name</td>
                <td><input type='text' name="lname" placeholder="last name"  required/></td>
    </tr>
    <tr>
                <td>email</td>
                <td><input type='email'  name="email"  placeholder="email" required/></td>
    </tr>
    <tr>
               <td>phone number</td>
               <td><input type='text'  pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}" name="phone_nb" placeholder="phone number"  required/></td>
    </tr>
   
                  <td>address</td>
                 <td><input type='text' name="address" placeholder="address"  required/></td>
    </tr>
    <tr>
                   <td>type</td>
                  <td><input type='radio' name="type" value="driver" />driver
                     <input type='radio' name="type" value="guid"  />guid
    </td>
    <tr>
                  <td>work start time</td>
                 <td><input type='text' name="workstart" placeholder="work start time"  required/></td>
    </tr>
    <tr>
                  <td>work end time</td>
                 <td><input type='text' name="workend" placeholder="work end time"  required/></td>
    </tr>
<tr>
<td>available</td>
                  <td><input type='radio' name="available" value="yes" required/>yes
                     <input type='radio' name="available" value="no"  />no
    </td>
</tr>
    
    <tr>
        <td>ADD</td>
        <td><input type='submit' value="ADD "/></td>
    </tr>
</table>
</form>
</body>
</html>