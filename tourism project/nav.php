
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

nav {
  height: 50px;
  background: #485b41;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0px 50px 0px 100px;
}

nav ul {
  display: flex;
  list-style-type: none;
  align-items:center;
}

nav ul li a {

  text-decoration: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  border-radius: 5px;
  padding: 8px 10px;
  transition: all 0.3 ease;


}



nav ul li a:hover {
  background-color: #fff;
  color: #485b41;
}

nav ul li {
  margin: 0 5px;


}

nav .logo {
  font-size: 25px;
  color: #fff;
  font-weight: 500;
  letter-spacing: 1px;

}



nav .menu-btn i {
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  display: none;
}

#click {
  display: none;
}
.mobile-profile{
  display:none;
}
nav ul img{
  border-radius:50%;
  margin-top:5px
}
@media (max-width: 800px) {
  
  nav {
    padding: 0 30px;
  }
  nav .logo{
    font-size:20px;
  }
.desctop-profile{
    display:none;
}
.mobile-profile{
    display:inline;
}
nav ul img {
  border-radius: 50%;
  height: 80px;
  width: 80px;
  margin-top: 40px;
 }
 nav ul {
      position: absolute;
      top: 50px;
      right: 0;
      background: #3f4d3a;
      height: auto;
      width: 40%;
      display: none;
      text-align: center;
      transition: all 0.3s ease;

  }

  #click:checked~.menu-btn i:before {
      content: "\f00d";
  }

  #click:checked~ul {
      
      z-index: 100;
      display:revert;

  }

  #click:checked~.container {
      opacity: 0;
  }


  nav ul li {
      margin: 20px 0;

  }

  nav ul li a {
      font-size: 20px;
      display: block;

  }

  nav ul li a:hover,
  nav ul li a.active {
      background: none;
      color: cyan;
  }

  nav .menu-btn i {
      display: block;
  }
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    


<?php session_start();
    if(!isset($_SESSION['isloggedin'])|| $_SESSION['role']!=1){
        header("location:login.html");
    }?>
 
        <nav>
        <div class="logo">Guide Me Lebanon <i class="fa-solid fa-location-dot"></i></div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        
           
           
             <?php  require_once 'connection.php';
                $query=" SELECT photo FROM user WHERE User_id= $_SESSION[user_id]";
                $res=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($res);
                $photo=$row['photo'];
                echo"
                <ul>
                <li class='mobile-profile'><a href='profile.php'><img src='./photos/admin/$photo' height='40px' width='40px' alt='profile'/></a></li>
                <li> <a  href='index.php'>Home</a></li>
                <li> <a href='dashboard.php'>dashboard</a></li>
                <li><a href='trips.php'>trips</a></li>
                <li><a href='cars.php'>cars</a></li>
                <li><a href='logout.php' class='login'>logout</a></li>
                <li class='desctop-profile'><img src='./photos/admin/$photo' height='40px' width='40px' alt='profile'/></li>
                </ul></nav>";?>
                     </body>
</html>