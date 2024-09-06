<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trips</title>
  <link rel="stylesheet" href="cars&trips.css">

  <style>
    form{
        margin-top: 1%;
    }
    .search-div{

width: 80%;
margin: auto;
display:flex;
justify-content:space-between;
}
#search{

    height: 35px;
border: 2px solid black;
text-indent: 5px;
width: 90%;
font-size: 15px;
}
#search-icon{
    
    font-size: 30px;
margin-left: 2px;
   

}
.all{
    
border: 2px solid black;
text-decoration: none;
color: black;
padding: 6px;
}
.empty{
    margin-top: 5%;
  margin-left: 10%;
}
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<h1> Our Trips</h1>
<form action="trips.php" method="GET" style='width:100%'>
       <div class='search-div'> 
        <a href='trips.php' class='all'>ALL</a>
        <input type="text" id="search" name="search" placeholder="Enter to search...">
        <input type="submit" id="ok" value="Search" style="display:none;">
        <i class="fas fa-search" id="search-icon"></i></div>
    </form>
    <script>
    document.getElementById('search-icon').addEventListener('click', function() {
        document.getElementById('ok').click();
    });
</script>
<?php
require_once"connection.php";
$today = date("Y m d", time());
if (isset($_GET['search'])) {
    //mnadef li da5alu bl search
     $sanitizedSearchTerm = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
     // Prepare and execute SQL query
     $query = "SELECT * FROM trips WHERE startDate >'$today'and trip_description LIKE '%$sanitizedSearchTerm%'";}
     else{
$query = "SELECT * FROM trips WHERE startDate > '$today'";}
$res=mysqli_query($con,$query);
$nbr=mysqli_num_rows($res);
if($nbr==0){echo"
    <div class='empty'>
    <h3>no result!<?h3>
<div>";}
echo '<div id="trips" class="conatiner">';

        
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
   echo "<div class='cards'>
    <div class='image-section'>
    <img src='./photos/trips/$row[photo]' 
    style='position: absolute;
    height: 100%;
    width: 100%;' />
 
     </div>
    <div class='content'>   
        <h2>$row[trip_name]</h2>
        <h3> $row[price]</h3> 
        
      
        <a href='view trip details.php?tripid=$row[Trip_id]' class='button'>view details</a>
    </div>
</div>";

}
 echo"</div>";
?>
</body>
</html>

