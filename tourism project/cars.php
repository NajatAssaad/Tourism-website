

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cars and trips css</title>
  <link rel="stylesheet" href="cars&trips.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>

    h1{
        margin-bottom:2%;
    }
    .search{
       justify-content: space-between;
        width: 85%;
       display: flex;
       margin: auto;
}
    
    .search select {
        height: 35px;
        text-align: center;
        width: 88%;
       font-size:16px;
       border: 2px solid black;
       text-align:center;}
       
       .search select option:hover{
        background:green;

       }
       .search select option{
        text-align:center;
       }
    
        .search i{
    width: 2%;
    font-size: 20px;
    cursor: pointer;
}
.search i:hover{
    transform: scale(1.1);
}
    form{
        width:100%;
        text-align:right;
    }
    button{
        position:absolute;
        width:7%;
        height:35px;
        border:1px solid;
        background:white;
        border: 2px solid black;
        cursor:pointer;
    }
    button:hover{
        box-shadow: 0px 0px 1px 0px;
        transform: scale(1.1);
    }
    @media(max-width:700px){
        button{
            width:10%;
        }
        .search select{
            width:85%;
        }
    }
  </style>
</head>
<body>
<?php

require_once"connection.php";

echo'<h1>OUR CARS</h1>';
$query2="SELECT distinct Car_name FROM cars ";
$res2=mysqli_query($con,$query2);
$nbr2=mysqli_num_rows($res2);
echo"<div class='search'>

<a href='cars.php'><button>All</button></a>
<form action='cars.php'>

<select name='car-name'>";
echo"<option value='' disabled selected> Select a car name</option>";
$array=array();
for($i=0;$i<$nbr2;$i++){
    $row2=mysqli_fetch_assoc($res2);
    $carname=$row2['Car_name'];
    $words = explode(" ", $carname);
    $model=$words[0];
    //7ata nt2akad enu l option ynkatab mara 1 bas.
    if(!in_array($model,$array)){
        $array[]=$model;
        echo"<option value='$model'>$model</option>";
    }

}
echo"

</select>
 <i id='search-icon' class='fas fa-search'></i>
 <input  type='submit' id='ok' value='search' style='display:none;'/>
</form>
</div>

<script>
    
      document.getElementById('search-icon').addEventListener('click', function() {
      document.getElementById('ok').click();
    });
  </script>";
//mna3ml l js enu tsir l icon lama ynfa2as 3laya tsha8el lsubmit la ynba3at lform.
echo ' <div class="conatiner">';
     if(isset($_GET['car-name'])){
        $choice=$_GET['car-name'];
        $query="SELECT * FROM cars WHERE Car_name LIKE '%$choice%' ";
        $res=mysqli_query($con,$query);
        $nbr=mysqli_num_rows($res);
        for($i=0;$i<$nbr;$i++){
            $row=mysqli_fetch_assoc($res);
            $carid=$row['Car_id'];
           echo "<div class='cards'>
            <div class='image-section'>
            <img src='./photos/cars/$row[photos]' 
            style='position: absolute;
            height: 100%;
            width: 100%;' />
         
             </div>
            <div class='content'>   
                <h2>$row[Car_name]</h2>
            
              
                <a href='cars details.php?carid=$carid' class='button'>view details</a>
            </div>
        </div>";
        
        }
         echo"</div>";
     }
        else{
            $query="SELECT * FROM cars ";
            $res=mysqli_query($con,$query);
            $nbr=mysqli_num_rows($res);
for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($res);
    $carid=$row['Car_id'];
   echo "<div class='cards'>
    <div class='image-section'>
    <img src='./photos/cars/$row[photos]' 
    style='position: absolute;
    height: 100%;
    width: 100%;' />
 
     </div>
    <div class='content'>   
        <h2>$row[Car_name]</h2>
    
      
        <a href='cars details.php?carid=$carid' class='button'>view details</a>
    </div>
</div>";

}
 echo"</div>";
}
?>
</body>
</html>

