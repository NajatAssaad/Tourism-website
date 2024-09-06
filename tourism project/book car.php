<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book car</title>
    
    
</head>
<body>
    <?php
      session_start();
      if(!isset($_SESSION['isloggedin'])){
         echo"<script>
         alert('you have to login first');
         window.location.replace('login.html')</script>";
      }
      //iza ken 3amel login mnsir n5ali y7joz
      // awal shi mnt2akad iza ken m3aba lform 
      //iza ken m3abeh badna nt2akad enu l from date manu yom mere2
      //badna nt2akad enu lfrom date huwe abl l to date
   
      else{//iza ken 3amel login
           require_once 'connection.php';

               if(isset($_GET['startDate'])&& !empty($_GET['startDate'])&&
                isset($_GET['endDate'])&& !empty($_GET['endDate'])){
                //iza ken m3aba lform
               $start =$_GET['startDate'];
                $end=$_GET['endDate'];
                $carid=$_GET['carid'];
                $date1 = new DateTime($start);
               $date2 = new DateTime($end);
               $todayDate = new DateTime();

                      if($date1<$todayDate){
                         //iza ken l from date yom mer2 abl
                         echo "
                         <script>
                             let carid = " . $carid . ";
                             let url = 'http://localhost/tourism%20project/cars%20details.php?carid=' + carid;
                         
                             alert('The from date you selected has passed. Please choose another date.');
                             window.location.replace(url);
                         </script>";
                       }
                       else if ($date1 > $date2) {
                        echo "
                        <script>
                            let carid = " . $carid . ";
                            let url = 'http://localhost/tourism%20project/cars%20details.php?carid=' + carid;
                        
                            alert('The from date you selected is later than the to date. Please choose another date.');
                            window.location.replace(url);
                        </script>";
                        }
       
                        else {
                          $price = $_GET['price'];
                          $price = str_replace('$', '', $price); // Remove the dollar sign
                          $price = intval($price); // Convert to an integer
                          $interval = $date1->diff($date2);//bt3ti interval l iyem ben l date1 wl date2.
                          $numberOfDays = $interval->days;//bt3ti nb l days bhayda l interval.
                          $totalAmount=$numberOfDays*$price;
                          $userid=$_SESSION['user_id'];
                       $formattedDate1 = $date1->format('Y-m-d'); // Format as 'YYYY-MM-DD'
                       $formattedDate2 = $date2->format('Y-m-d'); // Format as 'YYYY-MM-DD'
                        if(isset($_GET['with-driver'])){
                          $query = "INSERT INTO booking_cars 
                          (Book_c_id, user_id, Car_id, Booking_date, pick_up_date, drop_off_date,with_driver, total_amount, payed)
                          VALUES (null, $userid, $carid, NOW(),'$formattedDate1','$formattedDate2','yes', $totalAmount, 'no')";
                          $res1 = mysqli_query($con,$query);
                        }
                         else{
                           $query = "INSERT INTO booking_cars 
                          (Book_c_id, user_id, Car_id, Booking_date, pick_up_date, drop_off_date,with_driver, total_amount, payed)
                          VALUES (null, $userid, $carid, NOW(),'$formattedDate1','$formattedDate2','no', $totalAmount, 'no')";
                          }
                          $res1 = mysqli_query($con,$query);
                          
                          $query2="UPDATE cars SET available='no' Where Car_id=$carid";
                          $res2=mysqli_query($con,$query2);
                      
                              if ($res1 && $res2) {
                               header('location:show my booked cars.php');}

                                else{
                                  echo "
                                  <script>
                                  let carid = " . $carid . ";
                                  let url = 'http://localhost/tourism%20project/cars%20details.php?carid=' + carid;
                              
                                  alert('something went wrong please try again .');
                                  window.location.replace(url);
                              </script>";
                              
                                }
                        }
                       }
             else{//iza ma kenu set
                  echo "
                    <script>
                      alert('please fill the form!');
                   window.location.replace('show my booked cars.php');
                </script>";
                exit;
                }
        
    }
  
  

?>

 

</body>
</html>