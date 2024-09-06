<?php
session_start();

if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header('location:login.html');
} else {
    require_once 'connection.php';

    if (isset($_POST['carId']) && $_POST['carId'] != ""
        && isset($_POST['Carname']) && $_POST['Carname'] != ""
        && isset($_POST['YearOfManufacture']) && $_POST['YearOfManufacture'] != ""
        && isset($_POST['CarColor']) && $_POST['CarColor'] != ""
        && isset($_POST['nbofseats']) && $_POST['nbofseats'] != ""
        && isset($_POST['priceperday']) && $_POST['priceperday'] != ""
        && isset($_POST['available']) && $_POST['available'] != "") {
            if (isset($_FILES['cphoto']['name'])) {
                if (!empty($_FILES['cphoto']['name'])) {
                    $extension = pathinfo($_FILES['cphoto']['name'], PATHINFO_EXTENSION);
                    if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
                        echo "<script>
                                alert('The file is not an image!');
                                window.location.replace('editpop.php');
                              </script>";
                        return;
                    }
                    $carpic = $_FILES['cphoto']['name'];
                    move_uploaded_file($_FILES['cphoto']['tmp_name'], "./photos/cars/$carpic");
                }
            }
        
        $car_id = $_POST['carId'];
        $car_name = $_POST['Carname'];
        $year = $_POST['YearOfManufacture'];
        $color = $_POST['CarColor'];
        $nbofseats = $_POST['nbofseats'];
        $priceperday = $_POST['priceperday'];
        $available = $_POST['available'];
        
        if (isset($pic)) {
            $query = "UPDATE `cars`
                      SET Car_name = '$car_name',
                          Year_of_manufacture = '$year',
                          Car_color = '$color',
                          nb_of_seats = '$nbofseats',
                          price_per_day = '$priceperday',
                          photos = '$carpic',
                          available = '$available'
                      WHERE Car_id = '$car_id'";
            
            $res = mysqli_query($con, $query);
            
            if ($res) {
                header("location:show cars.php");
            } else {
                header("location:editcars.php?id=$car_id");
            }
        } else {
            $query = "UPDATE `cars`
            SET Car_name = '$car_name',
                Year_of_manufacture = '$year',
                Car_color = '$color',
                nb_of_seats = '$nbofseats',
                price_per_day = '$priceperday',
                available = '$available'
            WHERE Car_id = '$car_id'";
  
  $res = mysqli_query($con, $query);
  
  if ($res) {
      header("location:show cars.php");
  } else {
      header("location:editcars.php?id=$car_id");
  }
            }
            
    
        }
        
   
    } 

?>