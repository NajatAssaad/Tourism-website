<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="profile.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php session_start();
    if(!isset($_SESSION['isloggedin']) ){
        header("location:login.html");
    }
        else if($_SESSION['role']==2)//iza ken 3amel login w huwe client.
        {
            require_once'connection.php';
            $id=$_SESSION['user_id'];
            $query="SELECT * FROM user Where User_id='$id'";
            $result= mysqli_query($con,$query);
            $row=mysqli_fetch_assoc($result);
       
    
   echo"
    <div class='wrapper'>
        <div class='left'>
        <div class='menu'>        
            <i id='menu' class='fas fa-bars'></i>
            <i class='fas fa-times' id='x' style='display:none'></i>
        </div>
        
        <div class='ul-menu' id='ul-menu'>
        <h4>$row[username]</h4>
                <ul>
                <li><a href='show my booked cars.php'>show my booked cars</a></li>
                <li><a href='show my booked trips.php'>show my booked trips</a></li>
                <li><a href='show my booked guides.php'>show my booked guides</a></li>
                   <li><a href='index.php'>Home</a></li>
                   <li><a href='logout.php'>Logout</a></li>
                </ul>
            </div>
        <h3 class='information'>information</h3>
                    <img src='photos/clients/$row[photo]' width='100'/>
                    
    
       <div class='info_data'>
                    
                    <table>
                           <tr>
                          <td><h3>First Name</h3>
                             <p>$row[User_First_Name]</p>
                          <td> <h3>Last Name </h3>
                              <p>$row[User_Last_Name]</p>
                          </td>
                          </tr>
                    <tr>
                        <td><h3>Email </h3><p>$row[email]</p></td>
                        <td><h3>Phone Number</h3><p>$row[Phone_nb]</p></td>
                    </tr>
                    <tr>
                        <td colspan='2' aligne='right'> <a href='editprofile.php'><button> Edit profile</button></a></td>
                    </tr>
                   </table>
         </div>
                    
         </div>
    
    
                
    
                <div class='right'>
                <h4>$row[username]</h4>
                        <ul>
                        <li><a href='show my booked cars.php'>show my booked cars</a></li>
                        <li><a href='show my booked trips.php'>show my booked trips</a></li>
                        <li><a href='show my booked guides.php'>show my booked guides</a></li>
                           <li><a href='index.php'>Home</a></li>
                           <li><a href='logout.php'>Logout</a></li>
                        </ul>
                    </div>
        
    </div>";}
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
if($_SESSION['role']==4 )$type='drivers';
else $type='guides';
     echo"   <div class='wrapper'>
        <div class='left'>
        <div class='menu'>        
        <i id='menu' class='fas fa-bars'></i>
        <i class='fas fa-times' id='x' style='display:none'></i>
    </div>
    
    <div class='ul-menu' id='ul-menu'>
    <h4>$row[username]</h4>
            <ul>
            <li><a href='show my clients.php'>show my clients</a></li>
               <li><a href='logout.php'>Logout</a></li>
            </ul>
        </div>
        <h3 class='information'>information</h3>
                    <img src='photos/$type/$row[photo]' width='100'/>
                    
    
       <div class='info_data'>
                    
                    <table>
                           <tr>
                          <td><h3>First Name</h3>
                             <p>$row[User_First_Name]</p>
                          <td> <h3>Last Name </h3>
                              <p>$row[User_Last_Name]</p>
                          </td>
                          </tr>
                    <tr>
                        <td><h3>Email </h3>
                        <p>$row[email]</p></td>
                        <td><h3>Phone Number</h3>
                        <p>$row[Phone_nb]</p></td>
                    </tr>
                    <tr>
                    <td><h3>Address</h3>
                    <p>$row[emp_addres]</p></td>
                    <td><h3>Available</h3>
                    <p>$row[available]</p></td>
                    </tr>
                    <tr> <td colspan='2' aligne='right'> <a href='editprofile.php'><button> Edit profile</button></a></td></tr>
                   </table>
         </div>
                    
         </div>
    
    
                
    
                <div class='right'>
                <h4>$row[username]</h4>
                <ul>
                <li><a href='show my clients.php'>show my clients</a></li>
                   <li><a href='logout.php'>Logout</a></li>
                </ul>
                    </div>
        
    </div>";}
    
    


    
    
    ?>
  <script>
        const menu = document.getElementById('menu');
        const menuUl = document.getElementById('ul-menu');
        const x= document.getElementById('x');
        menu.addEventListener('click', function() {
                menuUl.style.display = 'block';
                menu.style.display='none';
                x.style.display='block';  
        });
        x.addEventListener('click', function() {
            if (menuUl.style.display === 'none') {
                menuUl.style.display = 'block';
              menu.style.display='none';
              x.style.display='block';
            } else {
                menuUl.style.display = 'none';
                menu.style.display='block';
               x.style.display='none';
            }
        });
    </script>



</body>

</html>