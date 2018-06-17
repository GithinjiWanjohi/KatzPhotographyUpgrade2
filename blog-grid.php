
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
                    <div class="logo"> <a href="index-9.php">KATZ</a> </div>
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
                                    <li><a href="index-9.php">Home</a></li>
                                    <li><a href="portfolio-three.php">Proofs</a></li>
                                    <li><a href="blog-grid.php">Blogs</a></li>
                                    <li><a href="service-3.php">Shop</a></li>
                                    <li><a href="about-1.php">About</a></li>
                                    <li><a href="contact-us.php">Contact</a></li>
                                    <li><a href="#"><i class="fa fa-user fa-2x"></i></a>
                                        <ul class="drop-down" >
                                            <li><a href="signIn.php">Sign In</a></li>
                                            <li><a href="signUp.php">Register</a></li>
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
                        <h2 class="color-w font-w-8 font-40 pb-20">BLOG</h2>
                        <h4 class="color-w font-22"><a class="font-20 color-w" href="index.html">Home</a> <span class="plr-10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></span>Blog</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>
 <!-- Start Blog-section area -->
 <section id="blog-grid" class="blog-grid">
        <div class="container">
            <div class="row">
                <?php
        include("connect.php");
        if(isset($_GET['cat_id'])){
            $s_catID=$_GET['cat_id'];
            $selectSql=mysqli_query($db, "SELECT * FROM `blog_posts` WHERE `category_id`='$s_catID' ORDER BY `id` DESC");
            $countPost=mysqli_num_rows($selectSql);

              $s_categorySql=mysqli_query($db, "SELECT * FROM `categories` WHERE `cat_ID`= '$s_catID'");
              $s_rowCategory=mysqli_fetch_array($s_categorySql);
              $s_category=" for category ".$s_rowCategory['cat_name'];
        }else{  
            $selectSql=mysqli_query($db, "SELECT * FROM `blog_posts` ORDER BY `id` DESC");
            $countPost=mysqli_num_rows($selectSql);
            $s_category="";
        }
 
        if($countPost>=1){
            while($rowPost=mysqli_fetch_array($selectSql)){
                $blogID=$rowPost['id'];
                $blogTitle=$rowPost['blog_title'];
                $blogBody=$rowPost['blog_body'];
                $timePosted=$rowPost['posted_at'];
                $userID=$rowPost['user_id'];
                $categoryID=$rowPost['category_id'];
                $imagepath=$rowPost['cover_img'];

                if($imagepath=="NONE" || $imagepath==""){
                    $imagepath="cover_images/default.png";
                }

                $bloggerSql=mysqli_query($db, "SELECT * FROM `users` WHERE `id`= '$userID'");
                $rowUser=mysqli_fetch_array($bloggerSql);
                $fname=$rowUser['FirstName'];
                $lname=$rowUser['LastName'];
                $blogger=$fname." ".$lname;

                $categorySql=mysqli_query($db, "SELECT * FROM `categories` WHERE `cat_ID`= '$categoryID'");
                $rowCategory=mysqli_fetch_array($categorySql);
                $category=$rowCategory['cat_name'];

                $datetime=explode(" ", $timePosted);
                $date=$datetime[0];
                $time=$datetime[1];
                $rdate=date('d M Y',strtotime($date));

    ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_blog_item_area center">
                        <a href="blog-single.php?blog_id=<?php echo $blogID; ?>"><img src="<?php echo $imagepath; ?>" class="img-responsive" alt="images"></a>
                        <ul class="meta"> 
                                            <li>By <span class="color font-w-6"><?php echo $blogger; ?></span></li>
                                            <li>Dated <span><?php echo $rdate; ?></span></li>
                                        </ul>
                        <h3><a href="blog-single.php?blog_id=<?php echo $blogID; ?>"><?php echo $blogTitle; ?></a></h3>
                        <!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod</p>-->
                    </div>
                </div><!-- col-md-4-->
                <?php
            }
    
        }else{
            echo "No blog post available".$s_category;
        }

    ?>
                </div><!-- row -->

        </div><!-- container -->
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
      KATZ | All Rights Reserved.</p>
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
