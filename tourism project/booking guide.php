<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      *{
        padding:0;
        margin:0;
        box-sizing:border-box;
      }
      .container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(90deg, rgba(190, 217, 188, 0.5),#408626);
 
}

.form-content {
  background-color: rgba(255, 255, 255, 0.9);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  max-width: 600px;
  width: 100%;
}

.form-content h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.form-content table {
  width: 100%;
}

.form-content td {
  padding: 10px 0;
}

.form-content span {
  font-weight: bold;
}

.form-content input[type="time"]{
  padding: 5px;
border: none;
background: transparent;}

.form-content input[type="submit"] {
  background: linear-gradient(90deg, rgba(190, 217, 188, 0.5),#408626);
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

.form-content input[type="submit"]:hover {
  background-color: #0056b3;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
      session_start();

      if(!isset($_SESSION['isloggedin'])){

       echo"<script>
            alert('you have to login before booking guide!');
            window.location.replace('login.html');
            </script>";
      }
      else{

        require_once'connection.php';
        $guideid=$_GET['guideid'];
        $query="SELECT *
         FROM user
         JOIN employees
         ON User_id=emp_user_acc
         WHERE emp_id=$guideid";
         $res=mysqli_query($con,$query);
         $row=mysqli_fetch_assoc($res);
         $fname=$row['User_First_Name'];
         $lname=$row['User_Last_Name'];
         $email=$row['email'];
         $phone=$row['Phone_nb'];
         $photo=$row['photo'];
         $work_start_time=$row['work_start_time'];
         $work_end_time=$row['work_end_time'];
       

       


echo" <div class='container'>
<div class='form-content'>
<h2>book your guide:</h2>
<form action='booking guide.php' onsubmit='return isTimeinWorkHours();'>
<table>
<tr>
<td><span>Guide Name:</span> $fname $lname</td>
</tr>
<tr>
<td><span>Guide Phone Number:</span> $phone</td>
</tr>
<tr>
<td><span>Guide Email:</span> $email</td>
</tr>
<tr>
<td><span>work time:</span>from: $work_start_time to: $work_end_time</td>
</tr>
<tr>
<td ><span>choose hour: </span><input type='text' name='choosenTime' placeholder='HH:MM:SS' id='choosenTime'required/>
<p id='error'></p>

</td>
</tr>
<tr>
<td><input type='submit' value='Confirm booking'/>
<input type='hidden'name='guideid' value='$guideid'/></td>
</tr>

</table>
</form>

</div>
 </div>  ";

 if(isset($_GET['choosenTime'])){
    $choosenTime=$_GET['choosenTime'];
    $userid=$_SESSION['user_id'];
    $sqlTimeFormat = date("H:i:s", strtotime($choosenTime));
    $query ="INSERT INTO `booking_guides` (`booking_id`, `guide_id`, `user_id`, `booking_date`, `reservation_time`) 
    VALUES (NULL, '$guideid', '$userid', now(), '$sqlTimeFormat')";
    $query2="UPDATE employees SET available='no' WHERE emp_id=$guideid";
      $res=mysqli_query($con,$query);
      $res2=mysqli_query($con,$query2);
      
    echo" 
    
    <form action='https://formsubmit.co/4f3e77d0dc4f3e2bddd2d756e960a73f' method='POST'>

      <input class='subject' type='hidden' name='_subject' value='new reservation'>
      <input type='hidden' name='content' value='you have a new reservation check your profile to see details.'/>

    <input type='submit' value='click to send email to guide'/>
    </form>";

  } else {
      echo "no";
  }
  
 }
      

     

      ?>



   
</body>
</html>