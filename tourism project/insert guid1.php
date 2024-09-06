<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert guid</title>
</head>
<body>
    <?php
 Session_start();
   if($_SESSION['isloggedin']!=1||$_SESSION['role']!=1){
    header('location:login.html');}
    ?>
    <form method="post" action="insert guid2.php">
    <h1>ADD NEW guid</h1>
        <table border="5">
           
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
        <td><input type='text' name="phone_nb" placeholder="phone number"  required/></td>
    </tr>
    <tr>
        <td>address</td>
        <td><input type='text' name="address" placeholder="address"  required/></td>
    </tr>
    <tr>
        <td>ADD</td>
        <td><input type='submit' value="ADD "/></td>
    </tr>
</table>
</form>
</body>
</html>