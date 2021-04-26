<?php
session_start();
if (( ! isset($_SESSION['userid'])) && (! isset($_SESSION['name']))) {
  die('Not logged in');
}
require_once "pdo.php";
if(isset($_POST['bookingid']))
{
    $stmt = $pdo->prepare("SELECT booking.*,hotels.availablerooms FROM booking natural join hotels where booking_id = :bd");
    $stmt->execute(array(":bd" => $_POST['bookingid']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $rooms = $row['rooms_booked'] + $row['availablerooms'];
    $hid = $row['hotelid'];
    $cancel = $pdo->prepare("UPDATE booking SET b_status = :s WHERE booking_id = :bd");
    $cancel->execute(array(":s" => "Cancelled",":bd" => $_POST['bookingid']));
    $add = $pdo->prepare("UPDATE hotels SET availablerooms = :r WHERE hotelid = :hi");
    $add->execute(array(":r" => $rooms,":hi" => $hid));
    $_SESSION['success'] = "Your Booking has been Cancelled Successfully";
    header("Location:mybooking.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'bootstrap.php';?>
    <link rel="stylesheet" type="text/css" href="css/booking.css">
    <title>BookMee | My Bookings</title>
  </head>
  <body data-spy="scroll"  data-target="#navbarSupportedContent">
    <div class="navigation">
      <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top">
           <a class="navbar-brand" href="#">BookMee<span>.</span> </a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="main.php"><i class="fas fa-home home"></i> Home<span class="sr-only">(current)</span></a>
                 </li>
                   <li class="nav-item">
                       <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i>My Profile</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                   </li>
              </ul>
           </div>
      </nav>
    </div>
    <div class="jumbotron jumbotron-container">
        <div class="text-center">
          <h3 class="heading">my bookings</h3>
          <div class="heading-underline"></div>
        </div>
      </div>
      <section>
      <?php
      if(isset($_SESSION['success']))
      {
        echo '<div class="alert alert-success" style="margin-bottom:0px" role="alert">'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
      }
      echo '<h1 style="color:#ff0000">Welcome '.$_SESSION['name'].'</hi>';
      ?>
      <p><h3 style="padding-top:70px">Your Current Booking Details:</h3></p>
      <?php
      $stmt = $pdo->prepare("SELECT * FROM booking where userid = :ui and b_status = :s");
      $stmt->execute(array(":ui" => $_SESSION['userid'],":s" => "Booked"));
      if (! $row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="jumbotron jumbotron-fluid">
                 <div class="container">
                     <p style="font-weight:700;font-size:3rem;">No Current Booking Details Found.</p>
                 </div>
            </div>       
      <?php } else{ ?>
        <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Hotel Name</th>
        <th scope="col">Check-In date</th>
        <th scope="col">Check-Out date</th>
        <th scope="col">Rooms Booked</th>
        <th scope="col">No. of Days</th>
        <th scope="col">Amount</th>
        <th scope="col">Actions</th>
    </tr>
      </thead><tbody>
      <?php 
      $stmt = $pdo->prepare("SELECT booking.*,hotels.hotelname FROM booking join hotels on booking.hotelid = hotels.hotelid  where userid = :ui and b_status = :s");
      $stmt->execute(array(":ui" => $_SESSION['userid'],":s" => "Booked"));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo $row['hotelname'];
            echo "</td><td>";
            echo $row['checkindate'];
            echo "</td><td>";
            echo $row['checkoutdate'];
            echo "</td><td>";
            echo $row['rooms_booked'];
            echo "</td><td>";
            echo $row['noofdays'];
            echo "</td><td>";
            echo $row['amount'];
            echo "</td><td>";
            echo '<form method="post"><input type="hidden" name="bookingid" value='.$row['booking_id'].'><button type="submit" class="btn btn-danger">Cancel Booking</button></form>';
            echo("</td></tr>\n");

        }?>
       </tbody>
    </table>
    <?php } ?>
    <p><h3 style="padding-top:70px">Your Previous/Cancelled Booking Details:</h3></p>
    <?php
      $stmt = $pdo->prepare("SELECT * FROM booking where userid = :ui and b_status <> :s");
      $stmt->execute(array(":ui" => $_SESSION['userid'],":s" => "Booked"));
      if (! $row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="jumbotron jumbotron-fluid">
                 <div class="container">
                     <p style="font-weight:700;font-size:3rem;">No Previous/Cancelled Booking Details Found.</p>
                 </div>
            </div>       
      <?php } else{ ?>
        <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Hotel Name</th>
        <th scope="col">Check-In date</th>
        <th scope="col">Check-Out date</th>
        <th scope="col">Rooms Booked</th>
        <th scope="col">No. of Days</th>
        <th scope="col">Amount</th>
        <th scope="col">Status</th>
    </tr>
      </thead><tbody>
      <?php 
      $stmt = $pdo->prepare("SELECT booking.*,hotels.hotelname FROM booking join hotels on booking.hotelid = hotels.hotelid  where userid = :ui and b_status <> :s");
      $stmt->execute(array(":ui" => $_SESSION['userid'],":s" => "Booked"));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo $row['hotelname'];
            echo "</td><td>";
            echo $row['checkindate'];
            echo "</td><td>";
            echo $row['checkoutdate'];
            echo "</td><td>";
            echo $row['rooms_booked'];
            echo "</td><td>";
            echo $row['noofdays'];
            echo "</td><td>";
            echo $row['amount'];
            if($row['b_status'] == "Cancelled")
              echo '</td><td class="bg-danger text-white">';
            else
              echo '</td><td class="bg-success text-white">';
            echo $row['b_status'];
            echo("</td></tr>\n");

        }?>
       </tbody>
    </table>
    <?php } ?>
      </section>
</body>
</html>
