<?php
session_start();

if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header('location: login.html');
} 
else {
    require_once 'connection.php';

    if (isset($_POST['destination_id']) && $_POST['destination_id'] != "" &&
        isset($_POST['name']) && $_POST['name'] != "") {

        if (isset($_FILES['pic']['name'])) {
            if (!empty($_FILES['pic']['name'])) {
                $extension = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
                if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
                    echo "<script>
                            alert('The file is not an image!');
                            window.location.replace('editpop.php');
                          </script>";
                    return;
                }
                $pic = $_FILES['pic']['name'];
                move_uploaded_file($_FILES['pic']['tmp_name'], "./photos/popular destinations/$pic");
            }
        }

        $destination_id = $_POST['destination_id'];
        $name = $_POST['name'];
        
        if (isset($pic)) {
            $query = "UPDATE popular_destinations
                      SET destination_name = '$name',
                          photo = '$pic'
                      WHERE destination_id = '$destination_id'";
        } else {
            $query = "UPDATE popular_destinations
                      SET destination_name = '$name'
                      WHERE destination_id = '$destination_id'";
        }

        $res = mysqli_query($con,$query);
        if ($res) {
            header("location:show all popular destinations  for admin .php");
        } else {
            header("location:edit popular destinations.php?id=$destination_id");
        }
    }
  
}
?>
