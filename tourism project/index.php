<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="home page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>


    <nav>
        <div class="logo">Guide Me Lebanon <i class="fa-solid fa-location-dot"></i></div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
        </label>
        
           
            <?php
            if(isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']==1){
    
                require_once 'connection.php';
                $query=" SELECT photo FROM user WHERE User_id= $_SESSION[user_id]";
                $res=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($res);
                $photo=$row['photo'];
                echo"<ul>";
                if($_SESSION['role']==1)
                echo"<li class='mobile-profile'><a href='profile.php'><img src='./photos/admin/$photo' height='40px' width='40px' alt='profile'/></a></li>";
                else {echo"<li class='mobile-profile'><a href='profile.php'><img src='./photos/clients/$photo' height='40px' width='40px' alt='profile'/></a></li>";}
                
                echo"<li> <a  href='index.php'>Home</a></li>";

               if($_SESSION['role']==1){echo"<li> <a  href='dashboard.php'>dashboard</a></li>";}

             echo"<li><a href='#about'>About</a></li>
                <li><a href='contact.html'>contact</a></li>
                <li><a href='#services'>Services</a></li>
                <li><a href='trips.php'>trips</a></li>
                <li><a href='cars.php'>cars</a></li>
                <li><a href='logout.php' >logout</a></li>";
                if($_SESSION['role']==2){
                echo"
                <li class='desctop-profile'><a href='profile.php'><img src='./photos/clients/$photo' height='40px' width='40px' alt='profile'/></li></a>";}

                else if($_SESSION['role']==1)echo"<li class='desctop-profile'><a href='#'><img src='./photos/admin/$photo' height='40px' width='40px' alt='profile'/></li></a>";
              echo"</ul>";
                ;
                     
                                                                            }
            else{ echo"
                <ul>
                <li> <a class='active' href='index.php'>Home</a></li>
                <li><a href='#about'>About</a></li>
                <li><a href='contact.html'>contact</a></li>
                <li><a href='#services'>Services</a></li>
                <li><a href='trips.php'>trips</a></li>
                <li><a href='cars.php'>cars</a></li>
                <li><a href='login.html' class='login'>login</a></li>
                </ul>";

            }
                                                                                        ?>
           
            

       
    </nav>
    <div class="container">
        <div class="arrow l">
            <img src="l.png" alt="l" onclick="prev()" />
        </div>
        <div class="slide slide-1">
            <div class="caption">
                <h3>Welcome !</h3>
                <?php  if(isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']==1){
                echo"<p>$_SESSION[username]</p>";}
                ?>
            </div>
        </div>
        <div class="slide slide-2">
            <div class="caption">
                <h3>Discover</h3>
                <p>The Beauty Of Lebanon With Us!!</p>
            </div>
        </div>
        <div class="slide slide-3">
            <div class="caption">
                <h3>Enjoy</h3>
                <p> Best Trips In Your Budget!</p>
            </div>
        </div>
        <div class="arrow r">
            <img src="r.png" alt="r" onclick="next()" />
        </div>
    </div>
    <script>
        let slide = document.querySelectorAll('.slide');
        var current = 0;
        function cls() {
            for (let i = 0; i < slide.length; i++) {
                slide[i].style.display = 'none';
            }
        }
        function next() {
            cls();
            if (current === slide.length - 1) current = -1;
            current++;
            slide[current].style.display = 'block';
            slide[current].style.opacity = '0.4';
            var x = 0.4;
            var intX = setInterval(function () {
                x += 0.1;
                slide[current].style.opacity = x;
                if (x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100)

        }
        function prev() {
            cls();
            if (current === 0) current = slide.length;
            current--;
            slide[current].style.display = 'block';
            slide[current].style.opaity = '0.4';
            var x = 0.4;
            var intX = setInterval(function () {
                x += 0.1;
                slide[current].style.opacity = x;
                if (x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100)

        }

        function start() {
            cls();
            slide[current].style.display = 'block';

        }
        start();
    </script>
    <?php require_once'about us.html';
     require_once'services.html';
     require_once'popular destinations user interface.php';

     require_once'footer.php';
     ?>

    
</body>

</html>