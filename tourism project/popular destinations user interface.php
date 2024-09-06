<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    min-height: 100vh;
    overflow-x: hidden;
}
h1{
 
  text-align: center;
  margin-top: 2%;
  letter-spacing: 2px;
  position:relative;
}
h1::after {
    content: '';
    background: #485b41;
    width: 400px;
    height: 3px;
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translate(-50%);
}

.main {
position: relative;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
  width: 70vw;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  column-gap: 10px;
  row-gap: 10px;
  grid-auto-rows: 200px;
  margin: auto;
  margin-top: 3%;
}

img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}



/* Add this CSS to make the first image take the full row height and width */
img:first-child {
    grid-column: span 2;
    grid-row: span 2;
}
@media (max-width:800px){
  .main{
    width: 90vw;
  }
}
</style>
</head>
<body>
  <!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="popdestination.css"/>
</head>
<body>
  <h1>Popular Destinations</h1>
   <div class="main">
<?php
 require_once'connection.php';
 $query='SELECT*FROM popular_destinations';
 $res=mysqli_query($con,$query);
 $nbr=mysqli_num_rows($res);
 for($i=0;$i<$nbr;$i++){
  $row=mysqli_fetch_assoc($res);
  echo"<img src='.\photos\popular destinations/$row[photo]'/>";
 }
?>
   </div> 
</body>
</html>
</body>
</html>