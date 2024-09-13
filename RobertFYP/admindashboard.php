<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petrol Station Link</title>
    <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/my.png" rel="icon">
  <link href="assets/img/my.png" rel="con">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    
    <style>
      body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.logo img {
    margin-top: 20px;
    width: 80%;
}

nav ul {
    list-style-type: none;
    padding: 0;
    width: 100%;
}

nav ul li {
    margin: 20px 0;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    display: block;
    padding: 10px 20px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #444;
}

.main-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

header {
    background-color: #f1f1f1;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
    color: #f48000;
}

.user-actions a {
    margin-left: 15px;
}

.dashboard {
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.card {
    background-color: #f48000;
    padding: 20px;
    border-radius: 10px;
    color: white;
    text-align: center;
}

.card h2 {
    margin: 0 0 10px 0;
}

.large-text {
    font-size: 32px;
    font-weight: bold;
}

.small-text {
    font-size: 14px;
    color: #ffcc80;
    margin-top: 10px;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    font-size: 14px;
}


    </style>
</head>
<body>
   <!-- ======= Header ======= -->
   <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

    <div class="logo">
      <img src="assets/img/my.png" alt="">&nbsp;&nbsp;<a href="index.php">PETROL STATION LINK</a>
    </div>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="#">Dashboard</a></li>
          <li><a href="report.php">Report</a></li>
          <li><a href="#contact">Profile</a></li>
          <li><a href="logout.php" style="background-color:orange; border-radius:20px; margin-left:20px; text-align: center; align-items: center;padding:10px;color:white;">Log out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/esance1.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>PETROL STATION LINK</span> dear Admin</h2>
              <p>Your trusted coorperator for quality fuel and excellent customer service.</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/records.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Reliable Record keeping</h2>
              <p>We ensure a safe and sustainable keeping of your records.</p>
              <div class="text-center"><a href="report.php" class="btn-get-started">Your records</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/money.jpg);">  
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Payment follow-up</h2>
              <p>Our team at PETROL STATION LINK is dedicated to providing top-notch payment follow-up strategy.</p>
              <div class="text-center"><a href="report.php" class="btn-get-started">Follow up Payments</a></div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section>


    <div class="sidebar">
        <div class="logo">
            <img src="my.png" alt="PSL Logo" style="height: 100px; width:70px;">
        </div>
        <nav>
            <ul>
                <li><a href="#">View users</a></li>
                <li><a href="#">View fuel info</a></li>
                <li><a href="#">Add station worker</a></li>
                <li><a href="#">View payment info</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <header>
            <h1>Petrol Station Link</h1>
            <div class="user-actions">
                <a href="#"><img src="user-icon.png" alt="User Icon"></a>
                <a href="#"><img src="logout-icon.png" alt="Logout Icon"></a>
            </div>
        </header>
        <div class="dashboard">
            <div class="card">
                <h2>Available Users</h2>
                <p class="large-text">3+ Users</p>
            </div>
            <div class="card">
                <h2>Recent fill</h2>
                <p class="large-text">13 Liters</p>
            </div>
            <div class="card">
                <h2>Recent message</h2>
                <p>Hello PSL, I’m satisfied by your service</p>
                <p class="small-text">Roberto</p>
            </div>
            <div class="card">
                <h2>Analytics</h2>
                <img src="analytics-graph.png" alt="Analytics Graph">
            </div>
        </div>
    </div>
    
  <!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <img src="assets/img/my.png" alt="" height="100px">
        <h3>PETROL STATION LINK</h3>
        <p>
          Kigali, Rwanda <br><br>
          <strong>Phone:</strong> +250 789 438 711 / +250 788 213 553<br>
          <strong>Email:</strong> info@petrolstationlink.com<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#about">About Us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#contact">Talk to us</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Services at the station</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Fuel Supply</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Car Wash</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Vehicle Maintenance</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Battery Charging</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Oil Change</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Join Our Newsletter</h4>
        <p>Stay updated with our latest services and offers. Sign up for our newsletter.</p>
        <form action="" method="post">
          <input type="email" name="email" placeholder="Your Email">
          <input type="submit" value="Subscribe">
        </form>
      </div>

    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>PETROL STATION LINK</span></strong>. All Rights Reserved
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>
