<?php
session_start();
if (( ! isset($_SESSION['userid'])) && (! isset($_SESSION['name']))) {
  die('Not logged in');
}
require_once "pdo.php";
if(((isset($_GET['category'])) && (isset($_GET['search']))) || ((isset($_GET['location1'])) && (isset($_GET['location2']))))
{

  if(((isset($_GET['category'])) && (isset($_GET['search']))) && (! isset($_SESSION['error']))) 
  {
    if((strlen($_GET['category']) < 1) || (strlen($_GET['search']) < 1))
    {
      $_SESSION['error'] = "Error message set";
      header("Location:search.php?category=".$_GET['category']."&search=".$_GET['search']);
      return;
    }
    if($_GET['category'] == 'hotelname')
      $stmt = $pdo->prepare("SELECT * FROM hotels where hotelname = :s");
    else
      $stmt = $pdo->prepare("SELECT * FROM hotels where hcity = :s");
    $stmt->execute(array(":s" => $_GET['search']));
    if (! $row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      $_SESSION['error'] = "Error message set";
      header("Location:search.php?category=".$_GET['category']."&search=".$_GET['search']);
      return;
    }
  }
  else if((isset($_GET['location1'])) && (isset($_GET['location2'])))
  {  
    if((strlen($_GET['location1']) < 1) || (strlen($_GET['location2']) < 1))
    {
      $_SESSION['error'] = "Error message set";
      header("Location:main.php#control");
      return;
    }
    $stmt = $pdo->prepare("SELECT * FROM hotels where hcity in (:c1,:c2)");
    $stmt->execute(array(":c1" => $_GET['location1'],":c2" => $_GET['location2']));
    if (! $row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      $_SESSION['error'] = "Error message set";
      header("Location:main.php#control");
      return;
    }
  }
}
else
{
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
    <link rel="stylesheet" type="text/css" href="css/hotellist.css">
    <title>BookMee | Results</title>
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
                      <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                   </li>
              </ul>
           </div>
      </nav>
    </div>
      <div class="jumbotron jumbotron-container">
        <div class="text-center">
          <h3 class="heading">SEARCH RESULTS</h3>
          <div class="heading-underline"></div>
        </div>
      </div>
      <?php 
    if(((isset($_GET['category'])) && (isset($_GET['search']))))
    {
      $search = htmlentities($_GET['search']);
      $category = htmlentities($_GET['category']);
        if(isset($_SESSION['error']))
        {
          echo '<div class="alert alert-danger" style="margin-bottom:0px" role="alert">';
          echo '<h4 class="alert-danger">Hotel/Location Not Found!!</h4>';
          echo 'No available Hotel/Location results available for the item you searched: '.$search.'</p>';
          echo '<p class="mb-0">The Hotel you are searching for is not available or the location you have specified is not under our servicing area. Try again searching using precise hotel/location names.</p> </div>';
          unset($_SESSION['error']);
        }
        else
        {
          echo '<div class="alert alert-success" style="margin-bottom:0px" role="alert">';
          echo 'Showing available hotel results for the Hotelname/location specified: "'.$search.'"';
          echo  '</div>';
          if($_GET['category'] == 'hotelname')
            $stmt = $pdo->prepare("SELECT hotelid,hotelname,hotelphone,hcity,customerrating FROM hotels WHERE hotelname = :s");
          else
            $stmt = $pdo->prepare("SELECT hotelid,hotelname,hotelphone,hcity,customerrating FROM hotels WHERE hcity = :s");
          $stmt->execute(array(":s" => $_GET['search']));
          $count1 = 0;
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($count1 % 2 == 0){
              echo '<div class="container contain"><div class="row">';
            }
            echo '<div class="col-sm-6 py-3 py-sm-20" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear">
            <div class="card box-shadow">
              <img src="hotel_images/'.$row['hotelid'].'.png" class="card-img-top" alt="hotel">
              <div class="card-body">
                <h5 class="card-title" style="font-weight:700">'.$row['hotelname'].'</h5>
                <p class="card-text"><span style="font-weight:400">Customer Rating:</span>'.$row['customerrating'].'<i class="fas fa-star"></i>/5</p>
                <p class="card-text"> <span style="font-weight:400">City:</span>'.$row['hcity'].'</p>
                <p class="card-text"> <span style="font-weight:400">Phone:</span>'.$row['hotelphone'].'</p>
                <a href="book.php?hotel='.urlencode($row['hotelname']).'" class="btn btn-primary">Check Availability</a> </div>
              </div>
            </div>';
            if($count1 % 2 == 1){
              echo '</div></div>';
            }
            $count1 = $count1 + 1;
          }
          if($count1 % 2 == 1){
            echo '</div></div>';
        }
      }
    }
    if(((isset($_GET['location1'])) && (isset($_GET['location2']))))
    {
          echo '<div class="alert alert-success" style="margin-bottom:0px" role="alert">';
          echo 'Showing available hotel results in the locations of "'.htmlentities($_GET['location1']).'" and "'.htmlentities($_GET['location2'].'":');
          echo  '</div>';
          $stmt = $pdo->prepare("SELECT hotelid,hotelname,hotelphone,hcity,customerrating FROM hotels where hcity in (:c1,:c2)");
          $stmt->execute(array(":c1" => $_GET['location1'],":c2" => $_GET['location2']));
          $count2 = 0;
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($count2 % 2 == 0){
              echo '<div class="container contain"><div class="row">';
            }
            echo '<div class="col-sm-6 py-3 py-sm-20" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear">
            <div class="card box-shadow">
              <img src="hotel_images/'.$row['hotelid'].'.png" class="card-img-top" alt="hotel">
              <div class="card-body">
                <h5 class="card-title" style="font-weight:700">'.$row['hotelname'].'</h5>
                <p class="card-text"><span style="font-weight:400">Customer Rating:</span>'.$row['customerrating'].'<i class="fas fa-star"></i>/5</p>
                <p class="card-text"> <span style="font-weight:400">City:</span>'.$row['hcity'].'</p>
                <p class="card-text"> <span style="font-weight:400">Phone:</span>'.$row['hotelphone'].'</p>
                <a href="book.php?hotel='.urlencode($row['hotelname']).'" class="btn btn-primary">Check Availability</a> </div>
              </div>
            </div>';
            if($count2 % 2 == 1){
              echo '</div></div>';
            }
            $count2 = $count2 + 1;
          }
          if($count2 % 2 == 1){
            echo '</div></div>';
        }
    }

    ?>

<section class="banner" id="banner">
          <div class="container">
          <form method="get">
            <div class="form-group">
          <label style="font-size: 1.3rem" for="category">Select A Category to Search</label>
          <select class="form-control" name="category" id="category" required>
            <option value="">--Choose a Category--</option>
            <option value="hotelname">Hotels</option>
            <option value="hcity">Locations</option>
          </select>
        </div>
        <div class="form-group">
          <label style="font-size: 1.3rem" for="search">Hotel/Location:</label>
          <div class="input-group">
           <input type="text" class="form-control" required placeholder="Search" id="search" name="search" aria-label="Hotel/Location" aria-describedby="basic-addon2">
          <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button"><i  class="fa fa-search"></i></button>
          </div>
        </div>
        </div>
         <button type="submit" style="margin-bottom:20px" class="btn btn-primary">Check for Rooms</button>
          </form>
          </div>
      </section>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>