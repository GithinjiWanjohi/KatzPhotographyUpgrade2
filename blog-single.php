<?php
session_start();
include("connection.php");

if(isset($_SESSION['username'])){
  $userID=$_SESSION['id'];
}

if(isset($_GET['blog_id'])){
  $blogID = $_GET['blog_id'];
  $selectSql=mysqli_query($con, "SELECT * FROM `blog_posts` WHERE `id`= '$blogID'");
  $rowPost=mysqli_fetch_array($selectSql);

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

  $bloggerSql=mysqli_query($con, "SELECT * FROM `users` WHERE `id`= '$userID'");
  $rowUser=mysqli_fetch_array($bloggerSql);
  $blogger=$rowUser['username'];

  $categorySql=mysqli_query($con, "SELECT * FROM `category` WHERE `id`= '$categoryID'");
  $rowCategory=mysqli_fetch_array($categorySql);
  $category=$rowCategory['category_name'];

  $datetime=explode(" ", $timePosted);
  $date=$datetime[0];
  $time=$datetime[1];
  $rdate=date('d M Y',strtotime($date));

  $commentsSql=mysqli_query($con, "SELECT * FROM `blog_comments` WHERE `blog_id`= '$blogID' ORDER BY `id` ASC");
  $countComments=mysqli_num_rows($commentsSql);
  

  if(isset($_POST['post_comment'])){
    $comment=mysqli_real_escape_string($con, $_POST['comment_content']);

    $insertSql=mysqli_query($con, "INSERT INTO `blog_comments`(`id`, `comment_body`, `posted_at`, `blog_id`, `user_id`) VALUES (NULL,'$comment',NOW(),'$blogID','$userID')");
  }
  if(isset($_POST['post_comment_non'])){
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $comment=mysqli_real_escape_string($con, $_POST['comment_content']);

    if($email=="" || empty($email)){
      $email="anonymous";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo "enter the correct email format";
    }else{
      $checkUserSql=mysqli_query($con, "SELECT * FROM `users` WHERE `username`= '$email'");
        $countUser = mysqli_num_rows($checkUserSql);
        if($countUser>0){

        }else{
          $addUser=mysqli_query($con, "INSERT INTO users(id,username,password,user_level) VALUES (NULL,'$email','password','non-registered-user')");
        }

      
      $bloggerSql_non=mysqli_query($con, "SELECT * FROM `users` WHERE `username`= '$email' && `user_level`='non-registered-user'");
      $rowUser_non=mysqli_fetch_array($bloggerSql_non);
      $non_user_id=$rowUser_non['id'];
      $insertSql=mysqli_query($con, "INSERT INTO `blog_comments`(`id`, `comment_body`, `posted_at`, `blog_id`, `user_id`) VALUES (NULL,'$comment',NOW(),'$blogID','$non_user_id')");      
    }
    
  }


}else{
  header("Location: all-blogs.php");
}
?>
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
            <h4 class="color-w font-22"><a class="font-20 color-w" href="index.html">Home</a> <span class="plr-10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></span>Blog-Single</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="clearfix"></div>
<!-- Start Blog-section area -->
<section id="blog_single_area" class="blog_single_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="blog_left_side_area">
          <div class="blog_pic"> <img src="<?php echo $imagepath; ?>" class="img-responsive" alt="images">
            <h4 class="date_position"><?php echo $rdate; ?></h4>
          </div>
          <div class="blog_left_single_content">
            <h3><a href="#"><?php echo $blogTitle; ?></a></h3>
            <div class="blog_author_area"> <a href="#"><i class="fa fa-user"></i>By :  <?php echo $blogger; ?></a><a href="#"> <i class="fa fa-tag"></i><?php echo $category; ?></a><a href="#"><i class="fa fa-comments-o"></i>Comments: <?php echo $countComments; ?></a> </div>
            <?php echo $blogBody; ?>
          </div>
          <!--<div class="blog_tag"> <a href="#">Service</a> <a href="#">Growth</a> <a href="#">Investment</a> <a href="#">Marketing</a> <a href="#">Idea</a> <a href="#">Finance</a> </div>
          <div class="footer-social pt-15">
            <h4 class="pb-20 font-w-8">Share</h4>
            <ul class="top-social">
              <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
            </ul>
          </div>-->
          <div class="clearfix"></div>
<?php
    while($rowComment=mysqli_fetch_array($commentsSql)){
      $commentId=$rowComment['id'];
      $commentBody=$rowComment['comment_body'];
      $timeCommented=$rowComment['posted_at'];
      $commenterId=$rowComment['user_id'];

      $commenterSql=mysqli_query($con, "SELECT * FROM `users` WHERE `id`= '$commenterId'");
      $rowCommenter=mysqli_fetch_array($commenterSql);
      $commenter=$rowCommenter['username'];


        $datetimeC=explode(" ", $timeCommented);
        $dateC=$datetimeC[0];
        $timeC=$datetimeC[1];
        $rdateC=date('d M,Y',strtotime($dateC));
        $rtimeC=date('H:i',strtotime($timeC));
      ?>

          <div class="connent-area mt-40">
            <div class="title"><?php echo $countComments; ?> comments</div>
            <div class="comment-box">
              <div class="img-box"> <img src="images/footer-post-12.jpg" class="img-responsive" alt=""> </div>
              <div class="comment-inner">
                <div class="comment-title">
                  <h5 class="font-w-6"><?php echo $commenter; ?></h5>
                </div>
                <div class="comment-time"><?php echo $rdateC." at ".$rtimeC; ?></div>
                <div class="text">
                  <p class="font-w-6"><?php echo $commentBody; ?></p>
                </div>
              </div>
            </div>
            </div>

      <?php
    }
  ?>

          </div>
          <div class="consultency_comments_form">
            <h2 class="comments_title">Leave a Reply</h2>
            <div class="row">
         <?php if(isset($_SESSION['username'])){ ?>
              <form method="post" action="blog-single.php?blog_id=<?php echo $blogID; ?>" >
                
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea name="comment_content" class="form-control" rows="4" placeholder="Your Comment"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="send_me_ph"> <button type="submit" name="post_comment" class="btn">Submit Now</button> </div>
                  </div>
                </div>
              </form>
          <?php }else{ ?>
              <form method="post" action="blog-single.php?blog_id=<?php echo $blogID; ?>" >
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail*" name="email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea name="comment_content" class="form-control" rows="4" placeholder="Your Comment"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="send_me_ph"> <button type="submit" name="post_comment_non" class="btn">Submit Now</button> </div>
                  </div>
                </div>
              </form>
            <?php } ?>
            </div>
          </div>
        <!-- blog_left_side_area -->
      </div>
      <!-- col-md-8 -->
      <div class="col-md-4">
        <div class="blog_right_side_area">
          <div class="blog_right_widget">
            <div class="blog_widget">
              <form action="#" method="post" class="blog_search">
                <input type="text" placeholder="Enter Search Keywords">
                <div class="blog_search_btn">
                  <input type="submit" value="">
                </div>
              </form>
            </div>
          </div>
          <!-- blog_right_widget  -->
          <div class="blog_right_widget">
            <div class="blog_widget">
              <h3 class="blog_widget_title">CATEGORIES</h3>
              <ul>
                <li><a href="#">Business Growth</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">Consulting</a></li>
                <li><a href="#">Management</a></li>
                <li><a href="#">Finance Management</a></li>
                <li><a href="#">Audit & Assurance</a></li>
                <li><a href="#">Organization</a></li>
              </ul>
            </div>
          </div>
          <!-- blog_right_widget  -->
          <div class="popular_news">
            <div class="inner-title">
              <h4>LATEST NEWS</h4>
            </div>
            <div class="popular-post">
              <div class="item">
                <h4><a href="#">5 tips for control your<br>
                  financial investments.</a></h4>
                <div class="post-info">January 20, 2018 </div>
              </div>
              <div class="item">
                <h4><a href="#">We have higher level of<br>
                  experience</a></h4>
                <div class="post-info">January 20, 2018 </div>
              </div>
              <div class="item">
                <h4><a href="#">Get the best quote for<br>
                  your service</a></h4>
                <div class="post-info">January 20, 2018 </div>
              </div>
            </div>
          </div>
          <div class="blog_right_widget">
            <div class="blog_widget_tag">
              <h3 class="font-w-6">TAGS</h3>
              <ul>
                <li><a href="#">Business</a></li>
                <li><a href="#">Coprporate</a></li>
                <li><a href="#">Modern</a></li>
                <li><a href="#">Strategy</a></li>
                <li><a href="#">Consulting</a></li>
                <li><a href="#">Growth</a></li>
              </ul>
            </div>
          </div>
          <!-- blog_right_widget  -->
          <div class="blog_right_widget">
            <div class="blog_widget">
              <h3 class="blog_widget_title">ARCHIEVE</h3>
              <form action="#" method="post">
                <div class="form-group">
                  <select>
                    <option value="Select Month"> Select Month </option>
                    <option value="saab"> January 2018 </option>
                    <option value="mercedes"> february 2018 </option>
                    <option value="audi"> March 2018 </option>
                    <option value="audi"> April 2018 </option>
                    <option value="audi"> August 2018 </option>
                    <option value="audi"> Dcember 2018 </option>
                  </select>
                </div>
              </form>
            </div>
          </div>
          <!-- blog_right_widget  -->
        </div>
      </div>
      <!-- col-md-4 -->
    </div>
    <!-- row -->
  </div>
  <!-- container -->
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
