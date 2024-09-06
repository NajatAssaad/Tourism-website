<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="dashboard.css">
  
     
</head>

<body>
    <?php
     session_start();
    if(!isset($_SESSION['isloggedin'])|| $_SESSION['role']!=1){
        header("location:login.html");
    }?>
 
        <nav>
        <div class="logo">Guide Me Lebanon <i class="fa-solid fa-location-dot"></i></div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        
           
           
             <?php 
                require_once 'connection.php';
                $query=" SELECT photo FROM user WHERE User_id= $_SESSION[user_id]";
                $res=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($res);
                $photo=$row['photo'];
                echo"
                <ul>
                <li class='mobile-profile'><a href='profile.php'><img src='./photos/admin/$photo' height='40px' width='40px' alt='profile'/></a></li>
                <li> <a class='active' href='index.php'>Home</a></li>

                
                <li><a href='trips.php'>trips</a></li>
                <li><a href='cars.php'>cars</a></li>
                <li><a href='logout.php' class='login'>logout</a></li>
                <li class='desctop-profile'><img src='./photos/admin/$photo' height='40px' width='40px' alt='profile'/></li>
                </ul></nav>";?>
                     
                            
    <div class="content">


        <div class="form-grid">

            <a href="show cars.php">
                <div class="mini-div">
                    <i class="fas fa-car"></i>
                    <h3>cars</h3>
                </div>
            </a>

            <a href="showallusers.php">
                <div class="mini-div">
                    <i class="fas fa-user"></i>
                    <h3>users</h3>
                </div>
            </a>

            <a href="showalltrips.php">
                <div class="mini-div">
                    <i class="fas fa-suitcase"></i>
                    <h3>trips</h3>
                </div>
            </a>

            <a href="show all trips reservations.php">
                <div class="mini-div">
                    <i class="fas fa-suitcase"></i>
                    <h3>trips reservations</h3>
                </div>
            </a>
            <a href="show all popular destinations  for admin .php">
            <div class="mini-div">
            <i class="fa-solid fa-location-dot"></i>
                <h3>Destinations</h3>
            </div>
            </a>

            <a href="show all cars reservations.php">
                <div class="mini-div">
                    <i class="fas fa-car"></i>
                    <h3>cars reservations</h3>
                </div>
            </a>

            <a href="show all drivers reservations.php">
                <div class="mini-div">
                    <i class="fas fa-user-tie"></i>
                    <h3>drivers reservations</h3>
                </div>
            </a>

            <a href="show all guides reservations.php">
                <div class="mini-div">

                    <i class="fas fa-map"></i>
                    <h3>guides reservations</h3>
                </div>
            </a>

            <a href="show all employees.php">
                <div class="mini-div">
                    <i class="fas fa-user"></i>
                    <h3>employees</h3>
                </div>
            </a>

        </div>
    </div>
</body>

</html>