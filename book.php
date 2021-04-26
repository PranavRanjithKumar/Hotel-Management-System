<?php
session_start();
if (( ! isset($_SESSION['userid'])) && (! isset($_SESSION['name']))) {
  die('Not logged in');
}
require_once "pdo.php";
$gather = $pdo->prepare("SELECT hotelid,sum(rooms_booked) as totalrooms from booking where checkoutdate < now() and b_status = :b group by hotelid");
$gather->execute(array(":b" => "Booked"));
while($row =  $gather->fetch(PDO::FETCH_ASSOC))
{
  $restore = $pdo->prepare("UPDATE hotels set availablerooms = availablerooms + :rooms WHERE hotelid = :hid");
  $restore->execute(array(":hid" => $row['hotelid'],":rooms" => $row['totalrooms']));
}
$gather = $pdo->prepare("UPDATE booking SET b_status = :c where checkoutdate < now() and b_status = :b");
$gather->execute(array(":c" => "Checked out",":b" => "Booked"));
$var = $_GET['hotel'];
if((isset($_POST['checkindate'])) && (isset($_POST['checkoutdate'])) && (isset($_POST['rooms'])) && (isset($_POST['hotelid'])))
{
  $hotelid = $_POST['hotelid'];
  $available = $pdo->query("SELECT availablerooms FROM hotels WHERE hotelid = $hotelid")->fetchColumn();
  if($available < $_POST['rooms'])
  {
    $_SESSION['error'] = "Only ".$available." number of rooms are available. Sorry for the inconvenience";
    header("Location:book.php?hotel=".urlencode($var));
    return;
  }
  else{
    $now_rooms = $available - $_POST['rooms'];
    $checkindate = date("Y-m-d",strtotime($_POST['checkindate']));
    $checkoutdate = date("Y-m-d",strtotime($_POST['checkoutdate']));
    $diff_dates = date_diff(date_create($checkindate),date_create($checkoutdate))->format("%a");
    $amount = $pdo->query("SELECT priceper24hrs FROM rooms WHERE hotelid = $hotelid")->fetchColumn();
    $tariff = $diff_dates * $amount;
    $stmt = $pdo->prepare("UPDATE hotels SET availablerooms = :n WHERE hotelid = :h");
    $stmt->execute(array(":n" => $now_rooms,":h" => $hotelid));
    $add = $pdo->prepare("UPDATE users SET no_of_bookings_done = no_of_bookings_done + 1 WHERE userid = :ui");
    $add->execute(array(":ui" => $_SESSION['userid']));
    $stmt = $pdo->prepare("INSERT INTO booking (userid,hotelid,checkindate,checkoutdate,rooms_booked,amount,b_status,noofdays) VALUES (:ui,:hi,:ci,:co,:rooms,:a,:s,:d)");
    $stmt->execute(array(":ui" => $_SESSION['userid'],
                          ":hi" => $hotelid,
                          ":ci" => $checkindate,
                          ":co" => $checkoutdate,
                          ":rooms" => $_POST['rooms'],
                          ":a" => $tariff,
                          ":s" => "Booked",
                          ":d" => $diff_dates));
    $_SESSION['success'] = "Your hotel rooms have been successfully boooked!!";
    header("Location:mybooking.php");
    return;
  }
}

if(isset($_GET['hotel'])){
  if(strlen($_GET['hotel']) < 1){
      $_SESSION['error'] = "Error message set";
      header("Location:main.php#control");
      return;
  }
  $stmt = $pdo->prepare("SELECT * FROM hotels where hotelname = :h");
  $stmt->execute(array(":h" => $_GET['hotel']));
  if (! $row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      $_SESSION['error'] = "Error message set";
      header("Location:main.php#control");
      return;
    }
}
else{
      $_SESSION['error'] = "Error message set";
      header("Location:main.php#control");
      return;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'bootstrap.php';?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/details.css">
    <title>BookMee | Hotels</title>
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
                      <a class="nav-link" href="mybooking.php"><i class="fas fa-book"></i>My Bookings</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="#contact"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                   </li>
              </ul>
           </div>
      </nav>
    </div>
    <div class="jumbotron jumbotron-container">
        <div class="text-center">
          <h3 class="heading">book now</h3>
          <div class="heading-underline"></div>
        </div>
      </div>
      <?php
      if(isset($_SESSION['error']))
      {
        echo '<div class="alert alert-danger" style="margin-bottom:0px" role="alert">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
      }
      ?>
    <section id="hotel">
        <div class="row">
          <div data-aos="fade-right" data-aos-duration="3000" class="col50">
            <div class="imgbx">
              <?php
                if(isset($_GET['hotel']))
                {
                  $stmt = $pdo->prepare("SELECT hotelid FROM hotels where hotelname = :h");
                  $stmt->execute(array(":h" => $_GET['hotel']));
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  echo '<img src="hotel_images/'.$row['hotelid'].'.png" alt="hotel">';
                }
              ?>
            </div>
          </div>
        <div data-aos="fade-left" data-aos-duration="3000" class="col50" id="back">
          <?php
            if(isset($_GET['hotel']))
            {
              $stmt = $pdo->prepare("SELECT * FROM hotels natural join rooms where hotelname = :h");
              $stmt->execute(array(":h" => $_GET['hotel']));
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              echo '<h1>'.$row['hotelname'].'</h1>';
              echo '<p>'.$row['stars'].'-<i class="fas fa-star"></i>Hotel<p>';
              echo '<p><span>Description:</span>'.$row['description'].'.<p>';
              echo '<p><span>Features & Facilities Avalilable:</span>'.$row['availablefacilities'].'.<p>';
              echo '<p><span>Address:</span>'.$row['address'].'.<p>';
              echo '<p><span>Hotel MailID:</span>'.$row['hotelmail'].'.<p>';
              echo '<p><span>Hotel Phone No:</span>'.$row['hotelphone'].'.<p>';
              echo '<p><span>Pincode:</span>'.$row['hpincode'].'.<p>';
              echo '<p><span>Customer Rating:</span>'.$row['customerrating'].'<i class="fas fa-star" style="padding-right:0px"></i>/5.<p><br>';
              echo '<h4>Room Details:</h4>';
              echo '<p><span>No. of Rooms:</span>'.$row['noofrooms'].'.<p>';
              echo '<p><span>Accomodation:</span>'.$row['accommodation'].'.<p>';
              echo '<p><span>Tariff per Day:</span><i class="fas fa-rupee-sign" style="padding-right:0px"></i>'.$row['priceper24hrs'].'<p>';
            }
          ?>
        </div>
    </div>
    </section>
    <div>
    <div style="background:linear-gradient(rgba(255,255,255,.5),rgba(255,255,255,.5)),url('img/resortspic.jpg') no-repeat center center;" class="container">
          <form method="post">
          <div class="form-group">
            <label style="font-size: 1.3rem" for="checkin">Check-in Date:</label>
             <input type="date" class="form-control" id="checkindate" required placehoder="yyyy-mm-dd" name="checkindate">
          </div>
          <div class="form-group">
            <label style="font-size: 1.3rem" for="checkout">Check-Out Date:</label>
             <input type="date" class="form-control" id="checkoutdate" required placehoder="yyyy-mm-dd" name="checkoutdate">
          </div>
          <div class="form-group">
        <label for="noofrooms">Enter the number of rooms to be booked:</label>
        <input type="number" class="form-control" min=1 max=100 name="rooms" required placeholder="Enter the number of rooms">
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" name="hotelid" value=<?= $row['hotelid'] ?>>
        </div>
         <button type="submit" style="margin-bottom:20px" class="btn btn-primary">Book Rooms</button>
          </form>
          </div>
          </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
</script>
<script>
  AOS.init();
</script>
</body>
</html>