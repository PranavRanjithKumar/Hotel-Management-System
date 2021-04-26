<?php session_start();
if (( ! isset($_SESSION['userid'])) && (! isset($_SESSION['name']))) {
  die('Not logged in');
}
require_once "pdo.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'bootstrap.php';?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/booking.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <title>BookMee | My Profile</title>
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
                      <a class="nav-link" href="mybooking.php"><i class="fas fa-book"></i>My Bookings</a>
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
          <h3 class="heading">My Profile</h3>
          <div class="heading-underline"></div>
        </div>
      </div>
      <section>
      <h1>Welcome <?= $_SESSION['name'] ?>,</h1>
      <?php
      $stmt = $pdo->prepare("SELECT * FROM users where UserID = :ui");
      $stmt->execute(array(":ui" => $_SESSION['userid']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form>
        <div class="container">
          <form>
          <div class="form-group">
          <label  style="font-size: 1.3rem" for="Name">Name:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['UserName']?>">
         </div>
         <div class="form-group">
          <label  style="font-size: 1.3rem" for="email">Email ID:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['UserMail']?>">
         </div>
         <div class="form-group">
          <label  style="font-size: 1.3rem" for="phone">Phone Number:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['UserPhone']?>">
         </div>
         <div class="form-group">
          <label  style="font-size: 1.3rem" for="city">City:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['City']?>">
         </div>
         <div class="form-group">
          <label  style="font-size: 1.3rem" for="state">State:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['State']?>">
         </div>
         <div class="form-group">
         <label  style="font-size: 1.3rem" for="state">Pin Code:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['PinCode']?>">
         </div>
         <div class="form-group">
         <label  style="font-size: 1.3rem" for="state">No. Of Bookings Done:</label>
          <input readonly type="text" class="form-control" value ="<?= $row['No_of_bookings_done']?>">
         </div>
          </form>
          </div>
      </form>
      </section>
      </body>
      </html>  