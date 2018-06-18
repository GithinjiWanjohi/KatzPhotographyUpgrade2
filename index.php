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
  <!-- Start Particle area -->
  <section id="particle-area" class="particle-area">
    <div id="particles-js"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-8 col-md-offset-2">
            <div class="banner-text text-center">
              <h1 class="font-w-8 font-30 ltr-s-1 pb-10 color-w">Art. <span class="color">Moments.</span> Story Telling</h1>
              <h3 class="font-w-8 font-55 ln-h-70 color-w">Your <span class="color">Kenyan</span> Photography <br>
                Award <span class="color">Winner</span></h3>
              <p class="font-w-6 color-w ln-h-30 font-14 pb-20">
                  Katz Photography is all about enabling you to relive your cherishable moments.
                  We will be there to help you document each moment and provide high quality prints and proofs
                  for you to keep. Ours is only to capture the memories that you create.
              </p>
              <a href="contact-us.php" class="btn smoth-scroll">Contact us</a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Particle area -->
</header>
<div class="clearfix"></div>
<section id="services_3" class="services_3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title ptb-10">
          <h2 class="font-w-8 ln-h-40"><span class="color">THE</span> BEST EXPERIENCE <BR>
            FROM THE EXPERTS</h2>
          <p class="font-w-6">We practise everyday, edging closer to perfection</p>
        </div>
        <div class="section_3 center">
          <!-- Single Service Start -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item"> <i class="fa fa-camera-retro pt-20"></i>
                    <h4>Photography</h4>
                    <p>
                        The camera is our eye and we will make sure we document every moment worth
                        remembering that we see.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item"> <i class="fa fa-film pt-20"></i>
                    <h4>Cinematography</h4>
                    <p>
                        Make your moments into a movie. Professionally edited and in 4K resolution.
                        Bringing that Hollywood feel to you.
                    </p>
                </div>
            </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="blog-grid.php">
                  <div class="item"> <i class="fa fa-desktop pt-20"></i>
                      <h4>Blogs</h4>
                      <p>
                          We share our thoughts and experiences in the industry.
                          Some helpful tips may lie therein that would help amatuer photographers
                          make their grind better.<br>
                      </p>
                  </div>
              </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-shopping-cart pt-20"></i>
              <h4>Merchandising</h4>
              <p>
                  Click to visit our store and get yourself some merch.<br>
                  We promise that you'll find something that suits your taste
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="https://www.youtube.com">
                  <div class="item"> <i class="fa fa-youtube pt-20"></i>
                      <h4>Youtube Tutorials</h4>
                      <p>
                          Click to see some of our free tutorials and vlogs.
                          Some of our work is highlighted here to enable you get a visual view of what we do.
                      </p>
                  </div>
              </a>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item"> <i class="fa fa-briefcase pt-20"></i>
              <h4>Photography School</h4>
              <p>
                  Because we love sharing knowledge 🧠 😎
                  Take sometime to view and book one of our premium classes to move you from an amature
                  photographer/cinematographer to becoming a PRO!
              </p>
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

<div class="clearfix"></div>
<div class="image-bg center">
  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="image-content ptb-50">
          <h2 class="text-center ln-h-50 color-w">WE ARE <span class="color">CREATIVE</span> DIGITAL AGENCY <span class="color">STUDIO</span></h2>
          <h6 class="text-center color-w mtb-30 font-18 font-w-1">Choose from our wide range of photography shoot packages </h6>
          <a class="btn-two" href="#">Book Shoot Now</a> </div>
      </div>
    </div>
  </div>
</div>

<!--What We Do-->
<section id="wt-wedo-section" class="wt-wedo-section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 pt-20">
          <h2 class="font-w-8 ptb-20 txt-lft"><span class="color">WhAT </span>WE DO</h2>
          <p class="font-w-6 txt-lft ln-h-23 pb-20">
              Create. Not for the money. Not for the fame. Not for the recognition.
              But for the pure joy of creating something and sharing it. <br>
              We want to be with you in all of your life
              moments - From before you are born and when you crawl, when you find love.
          </p>
          <div class="col-md-6 pb-25">
            <h3 class="font-20"><span class="color font-w-8 font-26 pr-10">1</span>Wedding Shoots👰🏽🤵🏽</h3>
            <p class="font-14 font-w-2">
                Helping you recreate your memorable day. With you all the way
            </p>
          </div>
          <div class="col-md-6 pb-25">
            <h3 class="font-20"><span class="color font-w-8 font-26 pr-10">1</span>Family Photography👨‍👨‍👧‍👦</h3>
            <p class="font-14 font-w-2">
                We love family. We love togetherness. We love unity.
                We will help show all of these in your shots
            </p>
          </div>
          <div class="col-md-6">
            <h3 class="font-20"><span class="color font-w-8 font-26 pr-10">1</span>Engagement Shoots💍</h3>
            <p class="font-14 font-w-2">
                Showcasing your love is more than just the ring.
                Bring us along to help record as she says YES
            </p>
          </div>
          <div class="col-md-6">
            <h3 class="font-20"><span class="color font-w-8 font-26 pr-10">1</span>Baby Bump Shoots🤰🏽</h3>
            <p class="font-14 font-w-2">
                New baby on the way?<br>
                We got you. Let us help showcase that pregnancy glow.
            </p>
          </div>
        </div>
        <div class="col-md-6"> <img src="images/men-2.png" class="img-responsive" alt=""> </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<!--Video section-->
<div class="video-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="video-content">
          <h2 class="font-w-8">Video Snippet of our photography class</h2>
          <h4 class="color-w font-w-6 pt-15">We're trying to give you the best experience you ever had.</h4>
          <div class="video-holder pt-20">
            <div class="icon-sec"> <a class="popup-video" href="images/video/video.mp4"> <img src="images/play-button-img.png" alt=""> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Client start-->
<div class="client">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title  ptb-20">
          <h2 class="font-w-8 txt-lft"><span class="color">O</span>UR Client Portfolio</h2>
          <p class="font-w-6 txt-lft">They trust us. Why won't you?</p>
        </div>
      </div>
    </div>
    <div id="client-slider" class="owl-carousel">
      <div class="item client-logo"> <a href="#"><img src="images/1.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/2.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/3.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/4.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/5.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/6.png" class="img-responsive" alt=""/></a> </div>
    </div>
  </div>
</div>
<!--Client end-->

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
      KATZ Photography | All Rights Reserved.</p>
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
<script src="assets/particle/particles.min.js"></script>
<script src="assets/particle/app.js"></script>
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
