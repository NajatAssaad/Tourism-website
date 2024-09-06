<?php
session_start();

if ($_SESSION['isloggedin'] != 1 || $_SESSION['role'] != 1) {
    header('location: login.html');
} else {
    require_once 'connection.php'; // Make sure your connection file is included here

    if (
        isset($_POST['emp_id']) && $_POST['emp_id'] != "" &&
        isset($_POST['first_name']) && $_POST['first_name'] != "" &&
        isset($_POST['last_name']) && $_POST['last_name'] != "" &&
        isset($_POST['email']) && $_POST['email'] != "" &&
        isset($_POST['phone_nb']) && $_POST['phone_nb'] != "" &&
        isset($_POST['address']) && $_POST['address'] != "" &&
        isset($_POST['emp_type']) && $_POST['emp_type'] != "" &&
        isset($_POST['available']) && $_POST['available'] != "" &&
        isset($_POST['start_time']) && $_POST['start_time'] != "" &&
        isset($_POST['end_time']) && $_POST['end_time'] != ""
    ) {
        $emp_id = $_POST['emp_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_nb = $_POST['phone_nb'];
        $address = $_POST['address']; // Corrected column name
        $emp_type = $_POST['emp_type'];
        $available = $_POST['available'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        // Update user table
        $query = "UPDATE user
                  SET User_First_Name = '$first_name',
                      User_Last_Name = '$last_name',
                      email = '$email',
                      phone_nb = '$phone_nb'
                  WHERE User_id = (SELECT emp_user_acc FROM employees WHERE emp_id = '$emp_id')";

        $res1 = mysqli_query($con, $query);

        // Update employees table
        $query2 = "UPDATE employees
                   SET emp_addres = '$address', 
                       emp_type = '$emp_type', 
                       available = '$available', 
                       work_start_time = '$start_time', 
                       work_end_time = '$end_time' 
                   WHERE emp_id = '$emp_id'";

        $res2 = mysqli_query($con, $query2);

        if ($res1 && $res2) {
            header("Location: show all employees.php");
            exit;
        } else {
            header("Location: edit emp1.php?id=$emp_id");
            exit;
        }
    }
}
?>
