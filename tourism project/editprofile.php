<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editprofile.css">
    <title>edit profile</title>
   

</head>
<body>
    <?php 
    session_start();
    if( $_SESSION['isloggedin']!=1)
{
    header("location:login.html");
}    
else if($_SESSION['role']==2){
    require_once'connection.php';
    $id=$_SESSION['user_id'];
    $query="SELECT * FROM user Where User_id='$id'";
    $result= mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
     echo"
    <div class='container'>
        <div class='image'>
        <img src='photos/clients/$row[photo]' alt='' class='profile-img'>
        
        
        
        <h3>$row[username]</h3>
        </div>
            
        
        <div class='edit-form'>
            <h2>Account Settings</h2>
            <form action='editprofile2.php' method='post'>
            <table border='0'>
                <tr>
                    <td><span>First Name </span><br>
                       <input type='text' name='fname'value='$row[User_First_Name]' required/>
                    </td>
                    <td><span>Last Name </span><br>
                       <input type='text' name='lname' value='$row[User_Last_Name]'required/>
                    </td>
                </tr>
                <tr>
                    <td> <span>Email</span> <br>
                       <input type='email' name='email' value='$row[email]' required/>
                    </td>
                    <td><span>Phone Number</span><br>
                       <input type='text' name='phonenb' value='$row[Phone_nb]' required/>
                    </td>
                </tr>
                <tr>
                    <td><input class='sub' type='submit' value='update'/></td>
                    <td><a href='editpass.php'>change password</a></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
";}
else if($_SESSION['role']==4 ||$_SESSION['role']==5){
        require_once'connection.php';
        $id=$_SESSION['user_id'];
        $query = 'SELECT
        emp_addres,
        username,
        User_First_Name,
        User_Last_Name,
        email,
        Phone_nb,
        photo,
        available
    FROM
       user
    JOIN
        employees
        ON User_id = emp_user_acc
    
    
    WHERE
        user.User_id = ' . $id;
    
    
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
        $type='guides';
        if ($_SESSION['role']==4) $type='drivers';

        echo"
        <div class='container'>
            <div class='image'>
            <img src='photos/$type/$row[photo]' alt=''>
                <h3>$row[username]</h3>
            </div>
                
            
            <div class='edit-form'>
                <h2>Account Settings</h2>
                <form action='editprofile2.php' method='post'>
                <table border='0'>
                    <tr>
                        <td><span>First Name </span><br>
                           <input type='text' name='fname'value='$row[User_First_Name]' required/>
                        </td>
                        <td><span>Last Name </span><br>
                           <input type='text' name='lname' value='$row[User_Last_Name]'required/>
                        </td>
                    </tr>
                    <tr>
                        <td> <span>Email</span> <br>
                           <input type='email' name='email' value='$row[email]' required/>
                        </td>
                        <td><span>Phone Number</span><br>
                           <input type='text' name='phonenb' value='$row[Phone_nb]' required/>
                        </td>
                    </tr>
                    <tr>
                   <td>  <span>Adresse</span>
                   <input type='text' name='adr' value='$row[emp_addres]' required/></td>
                   <td><select name='available'>
                   <option value='$row[available]' selected>edit availibility</option>
                   <option value='yes'>YES</option>
                   <option value='no' >NO</option></select></td>
                       
                        
                    </tr>

                    <tr> <td><input class='sub' type='submit' value='update'/></td>
                    <td><a href='editpass.php'>change password</a></td>
                   
                    </tr>
    
                    
                </table>
                </form>
            </div>
        </div>
";}
?>
 <script>
        document.getElementById("editimg").addEventListener("click", function() {
            document.getElementById("photoInput").click();
        });
        </script>
</body>
</html>