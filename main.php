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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>BookMee</title>
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
                 <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-home home"></i> Account <span class="sr-only">(current)</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="profile.php"><i class="fas fa-user-circle"></i>My Profile</a>
        <a class="dropdown-item" href="mybooking.php"><i class="fas fa-book"></i>My Bookings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a>
      </div>
    </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#destinations"><i class="fas fa-plane-departure"></i>Destinations</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="#hotels"><i class="fas fa-bed"></i>Popular Hotels</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="#contact"><i class="fa fa-address-card"></i>Contact Us</a>
                   </li>
              </ul>
           </div>
      </nav>
    </div>
      <section class="banner" id="banner">
        <div class="content">
          <h2>Travel. Explore. Discover.</h2>
          <p>With BookMee, you can easily find your ideal hotel and compare prices from different hotels. From budget hostels to luxury suites, BookMee makes it easy to book online. You can search from a large variety of rooms and locations across India, like Ooty and Alappuzha to popular cities and holiday destinations all over India!</p>
          <a href="#destinations" class="btn btn-outline-light btn-lg">Search Destinations</a>
        </div>
      </section>
      <div id="start">
        <div class="jumbotron jumbotron-container">
          <div class="text-center">
            <h3 class="heading">destinations</h3>
            <div class="heading-underline"></div>
          </div>
        </div>
      </div>
        <div class="container" id="destinations">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/temples.jpg" class="d-block w-100" alt="Temples">
      <div class="carousel-caption text-center">
        <h5>Hotels in Madurai & Tripati for the divine spirtual seeker in you</h5>
        <a class="btn btn-outline-light btn-lg" href="search.php?location1=Madurai&location2=Tirupati">starting at Rs.4,599!!</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/keralahotel.jpg" class="d-block w-100" alt="Resorts in Kerala">
      <div class="carousel-caption text-center">
        <h5>Relax in the beachside resorts at Kochi & Trivandrum</h5>
        <a class="btn btn-outline-light btn-lg" href="search.php?location1=Kochi&location2=trivandrum">starting at Rs.6,999!!</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/tajmahal.jpg" class="d-block w-100" alt="Taj Mahal">
      <div class="carousel-caption text-center">
        <h5>Visit the Monument of Love in Agra</h5>
        <a class="btn btn-outline-light btn-lg" href="search.php?location1=Agra&location2=New+Delhi">Hotels in Agra from Rs.2,999</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/mumbaicity.jpg" class="d-block w-100" alt="Mumbai Hotel">
      <div class="carousel-caption text-center">
        <h5>Star Hotels in Mumbai and Chennai cities for special Meetings</h5>
        <a class="btn btn-outline-light btn-lg" href="search.php?location1=Chennai&location2=Mumbai">starting at Rs.14,999!!</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/hills.jpg" class="d-block w-100" alt="Hill Stations">
      <div class="carousel-caption text-center">
        <h5>Enjoy the cool climate in mountain resorts of Ooty & Kodaikanal</h5>
        <a class="btn btn-outline-light btn-lg" href="search.php?location1=ooty&location2=Kodaikanal">starting at Rs.7,999!!</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
        <div>
          <div id="control" class="jumbotron jumbotron-container">
            <div class="text-center">
              <h3 class="heading">Book a Room</h3>
              <div class="heading-underline"></div>
            </div>
          </div>
          <div>
          <?php
          if(isset($_SESSION['error']))
        {
          echo '<div class="alert alert-danger" style="margin-bottom:0px" role="alert">';
          echo '<h4 class="alert-danger">Hotel/Location Not Found!!</h4>';
          echo 'No available Hotel/Location results available for the item you searched. </p>';
          echo '<p class="mb-0">The Hotel you are searching for is not available or the location you have specified is not under our servicing area. Try again searching using precise hotel/location names.</p> </div>';
          unset($_SESSION['error']);
            
        }?>
          </div>
          <div style="background:linear-gradient(rgba(255,255,255,.5),rgba(255,255,255,.5)),url('img/resortspic.jpg') no-repeat center center;" class="container">
          <form action="search.php" method="get">
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
           <input type="text" class="form-control" autocomplete="on" required placeholder="Search" id="search" name="search" aria-label="Hotel/Location" aria-describedby="basic-addon2">
          <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button"><i  class="fa fa-search"></i></button>
          </div>
        </div>
        </div>
         <button type="submit" style="margin-bottom:20px" class="btn btn-primary">Check for Rooms</button>
          </form>
          </div>
        </div>
        <div>
          <div class="jumbotron jumbotron-container">
            <div class="text-center">
              <h3 class="heading">Popular Hotels</h3>
              <div class="heading-underline"></div>
            </div>
          </div>
        </div>
        <div class="container" id="hotels">
    <div class="row">
      <div class="col-sm-6 py-3 py-sm-20" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear">
        <div class="card box-shadow">
          <img src="img/lavivanta.jpg" class="card-img-top" alt="lavivanta">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:700">Hotel La Vivanta</h5>
            <p>
              <span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </p>
            <p class="card-text"> <span style="font-weight:400">Address:</span>Opposite To Mattuthavani Bus Stand, Uthangudi, Tamil Nadu 625107. </p>
            <p class="card-text"> <span style="font-weight:400">Phone:</span>063844 46666</p>
            <a href="book.php?hotel=hotel+la+vivanta" class="btn btn-primary">Check Availability</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 py-3 py-sm-20" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear">
        <div class="card box-shadow">
          <img src="img/carltonn.jpg" class="card-img-top" alt="carlton">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:700">The Carlton</h5>
            <p>
              <span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </p>
            <p class="card-text"> <span style="font-weight:400">Address:</span>The Carlton, Lake Rd, Kodaikanal, Tamil Nadu, India 624101 </p>
            <p class="card-text"> <span style="font-weight:400">Phone:</span>063844 46666</p>
            <a href="book.php?hotel=the+carlton" class="btn btn-primary">Check Availability</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 py-3 py-sm-20">
        <div class="card box-shadow">
          <img src="img/greentree.jpg" class="card-img-top" alt="greentree">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:700">Green Tree Hotel</h5>
            <p>
              <span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </p>
            <p class="card-text"> <span style="font-weight:400">Address:</span>NO.13, 7, N Usman Rd, Panagal Park Market,T. Nagar, Chennai, Tamil Nadu 600017</p>
            <p class="card-text"> <span style="font-weight:400">Phone:</span>09488543488</p>
            <a href="book.php?hotel=green+tree+hotel" class="btn btn-primary">Check Availability</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 py-3 py-sm-20">
        <div class="card box-shadow">
          <img src="img/fortune.jpg" class="card-img-top" alt="fortune">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:700">Fortune Select Grand Ridge</h5>
            <p>
              <span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </p>
            <p class="card-text"> <span style="font-weight:400">Address:</span>Tiruchanoor Rd, Korramenugunta, Tirupati, Andhra Pradesh 517501</p>
            <p class="card-text"> <span style="font-weight:400">Phone:</span>0877 398 8444</p>
            <a href="book.php?hotel=fortune+select+grand+ridge" class="btn btn-primary">Check Availability</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 py-3 py-sm-20" data-aos="fade-up" data-aos-duration="1500">
        <div class="card box-shadow">
          <img src="img/gingery.jpg" class="card-img-top" alt="ginger">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:700">Ginger Mumbai</h5>
            <p>
              <span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </p>
            <p class="card-text"> <span style="font-weight:400">Address:</span>Rajashree Sahu Marg, Andheri East, Mumbai, Maharashtra 400069</p>
            <p class="card-text"> <span style="font-weight:400">Phone:</span>2226840333</p>
            <p class="card-text">30 % Discount On All Rooms!!<p><br>
            <a href="book.php?hotel=ginger+mumbai" class="btn btn-primary">Check Availability</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 py-3 py-sm-20" data-aos="fade-up" data-aos-duration="1500">
        <div class="card box-shadow">
          <img src="img/amarvilas.jpg" class="card-img-top" alt="oberoi">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:700">The Oberoi Amarvilas</h5>
            <p>
              <span>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </span>
            </p>
            <p class="card-text"> <span style="font-weight:400">Address:</span>18, B 18 C, Fatehabad Rd, Taj Nagari Phase 1, R.K. Puram Phase-2, Basai Khurd, Tajganj, Agra, Uttar Pradesh 282001</p>
            <p class="card-text"> <span style="font-weight:400">Phone:</span>1246201161</p>
            <a href="book.php?hotel=the+oberoi+amarvilas" class="btn btn-primary">Check Availability</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript">
      $("#search").autocomplete({
      source: "hotelfill.php"
      });
    </script>
  </body>
</html>
