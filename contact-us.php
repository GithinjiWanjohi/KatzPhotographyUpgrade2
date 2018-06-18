<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>KATZ Photography Kenya</title>
<!-- Bootstrap Css -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Normalize Css -->
<link href="assets/Normalize/normalize.css" rel="stylesheet">
<!--Font Awesome Css-->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--Linear icon Css-->
<link href="assets/linearicons/css/icon-font.min.css" rel="stylesheet">
<!--Animate Css-->
<link href="assets/animate/animate.css" rel="stylesheet">
<!--Owl carousel css-->
<link href="assets/owlcarousel/css/owl.carousel.css" rel="stylesheet">
<link href="assets/owlcarousel/css/owl.theme.css" rel="stylesheet">
<!--Portfolio Css-->
<link href="assets/css/ionicons.min.css" rel="stylesheet">
<link href="assets/css/magnific-popup.css" rel="stylesheet">
<!--Slicknav Css-->
<link href="assets/slicknav/slicknav.css" rel="stylesheet">
<!--Custum Css-->
<link href="css/style.css" rel="stylesheet">
<!--Responsive Css-->
<link href="css/responsive.css" rel="stylesheet">
<!--Modernizr Js-->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Pre Loader -->
<div id="loader"></div>
<!--Header-->
<header id="home">
  <div class="header-top-area">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <!-- START LOGO -->
          <div class="logo"> <a href="index.php">KATZ</a> </div>
          <!-- END LOGO -->
          <div class="mobile-nav"></div>
        </div>
        <div class="col-md-9">
          <!-- START MAIN MENU -->
          <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"> </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
              <div class="navigation">
                <ul class="nav navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="portfolio-three.php">Proofs</a></li>
                  <li><a href="blog-grid.php">Blogs</a></li>
                  <li><a href="service-3.php">Shop</a></li>
                  <li><a href="about-1.php">About</a></li>
                  <li><a href="contact-us.php">Contact</a></li>
                    <li><a href="#"><i class="fa fa-user fa-2x"></i></a>
                        <ul class="drop-down" >
                            <?php
                            session_start();
                            include ("connect.php");
                            if(isset($_SESSION['User'])){?>
                                <li><a href="admin/logout.php">Log Out</a></li>
                            <?php }else{?>
                                <li><a href="signIn.php">Sign In</a></li>
                                <li><a href="signUp.php">Register</a></li>
                            <?php }?>
                        </ul> </li>
                </ul>
              </div>
            </div>
            <!-- /.navbar-collapse -->
          </nav>
          <!-- END MAIN MENU -->
        </div>
      </div>
    </div>
  </div>
  <!-- Start about-page area -->
  <div class="about_slider-area pt-90">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="slider-text-2 text-center pt-40">
            <h2 class="color-w font-w-8 font-40 pb-20">CONTACT US</h2>
            <h4 class="color-w font-22"><a class="font-20 color-w" href="index.html">Home</a> <span class="plr-10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></span>Contact-Us</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Start Contact-section area -->
<div class="clearfix"></div>
<section id="services_3" class="services_3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title ptb-10">
          <h2 class="font-w-8 ln-h-40"><span class="color">OUR</span> FRIENDLY PRICING <BR>
            CATALOG</h2>
          <p class="font-w-6">Our prices are designed to fit your budget and theme</p>
        </div>
        <div class="section_3 center">
          <!-- Single Service Start -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-camera-retro pt-20"></i>
              <h4>
                STANDARD PACKAGE – KSHS 120,000.00</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-camera-retro pt-20"></i>
              <h4>DESTINATION WEDDINGS PACKAGE – KSHS 150,000.00</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-camera-retro pt-20"></i>
              <h4>ENGAGEMENT / TRADITIONAL WEDDINGS – KSHS 15,000 PER HOUR</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-film pt-20"></i>
              <h4>WEDDING CINEMATOGRAPHY - KSHS 20,000 PER HOUR</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-shopping-cart pt-20"></i>
              <h4>YOUNG PHOTOBOOK – | 40 Pages Kshs 60,000 | 60 Pages Kshs 70,000 |</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-shopping-cart pt-20"></i>
              <h4>ART PHOTOBOOK – | 20 Pages Kshs 30,000 | 40 Pages Kshs 40,000 | 60 Pages Kshs 50,000 |</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem.</p>
            </div>
          </div>
          <!-- Single Service End -->
          <!-- Single Service Start -->
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"> </div>
<section id="book-section" class="contact-us-section pb-30">
  <div class="container">
    <!--Sec Title-->
    <div class="section-title m-0 pb-28">
      <h2 class="font-w-8 center"><span class="color">C</span>HECK OUR AVAILABILITY</h2>
      <p class="font-w-6 center">We'll be sure to get back with timely feedback soon</p>
    </div>
    <div class="section contact-us">
      <div class="container">
        <div class="outer-box">
          <!-- Contact Form Start -->
          <div class="form-box clearfix">
            <form id="bookingForm" data-toggle="validator" class="shake scroll-reveal">
              <div class="form-group col-sm-6">
                <input type="text" class="form-control" id="name" placeholder="Your name" required data-error="Name missing">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="Your email" required data-error="Email missing">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-6">
                <input type="number" class="form-control" id="phoneNo" placeholder="Your phone number" required data-error="Phone Number missing">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-12">
                <input type="number" class="form-control" id="shootType" placeholder="Shoot type" required data-error="Shoot type missing">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-6">
                <input type="date" class="form-control" id="date" placeholder="Shoot Date" required data-error="Date missing">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-6">
                <input type="number" class="form-control" id="time" placeholder="Hours" required data-error="Hours missing">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-sm-12">
                <textarea id="message" class="form-control" rows="6" placeholder="Please write additional details of how you would like your shoot to be" required></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <div class="col-sm-12"> <a class="btn" href="#">Submit Booking</a>
                <div id="msgSubmit"></div>
              </div>
            </form>
          </div>
          <!-- Contact Form End -->
        </div>
      </div>
    </div>
  </div>
</section>
<section id="contact-us-section" class="contact-us-section pb-30">
  <div class="container">
    <!--Sec Title-->
    <div class="section-title m-0 pb-28">
      <h2 class="font-w-8 center"><span class="color">W</span>E'D LIKE TO HEAR FROM YOU</h2>
      <p class="font-w-6 center">You can drop by our offices, email us or even give us a call and there'll be a friendly voice at the end of the line</p>
    </div>
    <div class="section contact-us">
      <div class="container">
        <div class="outer-box">
          <div class="company-data">
            <ul class="row">
              <li class="col-md-4 col-sm-4 col-xs-12">
                <div class="box"> <span class="fa fa-map-marker"></span> Nairobi, Kenya</div>
              </li>
              <li class="col-md-4 col-sm-4 col-xs-12">
                <div class="box"> <span class="fa fa-phone"></span> +254723456789</div>
              </li>
              <li class="col-md-4 col-sm-4 col-xs-12">
                <div class="box"> <span class="fa fa-envelope"></span> <a href="#">katz@katz.com</a><br>
                  <a href="#">info@katz.com</a> </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<!--Contact start-->
<section id="footer" class="footer">
  <div class="container">
    <div class="col-md-3">
      <div class="footer-address">
        <p class="font-w-6"><span class="Color-b">Street :</span> Nairobi, Kenya</p>
        <p class="font-w-6"><span class="Color-b">Email :</span> katz@example.com</p>
        <p class="font-w-6"><span class="Color-b">Phone :</span> +254723456789</p>
      </div>
      <div class="footer-social pt-15">
        <ul class="top-social">
          <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  </div>
</section>
<!--Contact end-->
<footer>
  <div class="clearfix"></div>
  <div class="container">
    <p class="text-center pt-10">&copy; Copyright
      <script>
var d=new Date();
document.write(d.getFullYear());
</script>
      SWAT | All Rights Reserved.</p>
  </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/jquery/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/easing/jquery.easing.min.js"></script>
<script src="assets/isotope/jquery.isotope.js"></script>
<script src="assets/jquery/imagesloaded.pkgd.min.js"></script>
<script src="assets/wow/wow.min.js"></script>
<script src="assets/slicknav/jquery.slicknav.js"></script>
<script src="assets/owlcarousel/js/owl.carousel.min.js"></script>
<script src="assets/jquery/jquery.magnific-popup.min.js"></script>
<script src="assets/number-animation/jquery.animateNumber.min.js"></script>
<!-- Contact Form Script -->
<script src="assets/contact-form/js/validator.min.js"></script>
<script src="assets/contact-form/js/form-scripts.js"></script>
<script src="assets/jquery/plugins.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
