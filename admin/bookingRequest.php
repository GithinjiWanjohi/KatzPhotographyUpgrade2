<?php
session_start();
include('../connect.php');
if(isset($_GET['sid'])){
    $shootid=$_GET['sid'];
}

if(isset($_POST['accept'])){
    $accSql=mysqli_query($db, "UPDATE `book_shoot` SET `status`='Accepted' WHERE `id`='$shootid'");
    //header("Refresh:0; url=bookingRequest.php");
}
if(isset($_POST['decline'])){
    $decSql=mysqli_query($db, "UPDATE `book_shoot` SET `status`='Declined' WHERE `id`='$shootid'");
    //header("Refresh:0; url=bookingRequest.php");    
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
    <script src="../ckeditor/ckeditor.js"></script>
    <!-- Bootstrap Css -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Normalize Css -->
    <link href="../assets/Normalize/normalize.css" rel="stylesheet">
    <!--Font Awesome Css-->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Linear icon Css-->
    <link href="../assets/linearicons/css/icon-font.min.css" rel="stylesheet">
    <!--Animate Css-->
    <link href="../assets/animate/animate.css" rel="stylesheet">
    <!--Owl carousel css-->
    <link href="../assets/owlcarousel/css/owl.carousel.css" rel="stylesheet">
    <link href="../assets/owlcarousel/css/owl.theme.css" rel="stylesheet">
    <!--Portfolio Css-->
    <link href="../assets/css/ionicons.min.css" rel="stylesheet">
    <link href="../assets/css/magnific-popup.css" rel="stylesheet">
    <!--Slicknav Css-->
    <link href="../assets/slicknav/slicknav.css" rel="stylesheet">
    <!--Custum Css-->
    <link href="../css/style.css" rel="stylesheet">
    <!--Dropzone Css-->
    <link rel="stylesheet" href="../css/dropzone.css">
    <!--Responsive Css-->
    <link href="../css/responsive.css" rel="stylesheet">
    <!--Modernizr Js-->
    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <script src="../js/upload.js"></script>
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
                    <div class="logo"> <a href="../index.php">KATZ ADMIN</a> </div>
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
                                    <li><a href="../index.php">Upload</a></li>
                                    <li><a href="#"><i class="fa fa-user fa-2x"></i></a>
                                        <ul class="drop-down" >
                                            <li><a href="../signIn.php">Sign In</a></li>
                                            <li><a href="../signUp.php">Register</a></li>
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
</header>
<!-- Start Contact-section area -->
<div class="clearfix"></div>
<section id="services_3" class="services_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title ptb-10">
                    <h2 class="font-w-8 ln-h-40"><span class="color">BOOKING</span> REQUEST <BR>
                        PHOTOSHOOT</h2>
                    <p class="font-w-6">Share your awesomeness with your users</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"> </div>
<section id="book-section" class="contact-us-section pb-10">
    <div class="container">
        <div class="section contact-us">
            <div class="container">


                <div class="outer-box">
                    <!-- Contact Form Start -->
                    <div class="form-box clearfix">
                        <div class="col-sm-9">
                          <div class="row">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Name</th><th>Email</th><th>Phonenumber</th><th>Shoot type</th><th>Date</th><th>Hours</th><th>Details</th><th>Status</th><th></th><th></th>
                              </tr>
                            </thead>
                            <tbody>

                          <?php
                            $shootRequestSql=mysqli_query($db, "SELECT * FROM `book_shoot`");
                              while ($rowE=mysqli_fetch_array($shootRequestSql)) {
                                $sid=$rowE['id'];
                                $name=$rowE['name'];
                                $email=$rowE['email'];
                                $phonenumber=$rowE['phonenumber'];
                                $category=$rowE['category_id'];
                                $date=$rowE['date'];
                                $hours=$rowE['hours'];
                                $details=$rowE['details'];
                                $Status=$rowE['status'];

                                $selectCat=mysqli_query($db, "SELECT * FROM `categories` WHERE `cat_ID`='$category'");
                                $rowS=mysqli_fetch_array($selectCat);
                                $catN=$rowS['cat_name'];

                                $rdate=date('d M Y',strtotime($date));

                          ?>
                              <tr>
                                <td><?php echo $name; ?></td><td><?php echo $email; ?></td><td><?php echo $phonenumber; ?></td><td><?php echo $catN; ?></td><td><?php echo $rdate; ?></td><td><?php echo $hours; ?></td><td><?php echo $details; ?></td><td><?php echo $Status; ?></td>
                                <td>
                                    <form method="POST" action="bookingRequest.php?sid=<?php echo $sid; ?>">
                                        <button style="color: white;" type="submit" name="accept" class="btn btn-success">Accept</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="bookingRequest.php?sid=<?php echo $sid; ?>">
                                        <button style="color: white;" type="submit" name="decline" class="btn btn-danger">Reject</button>
                                    </form>                 
                                </td>
                              </tr>
                          <?php
                              }
                          ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- Contact Form End -->
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
<script src="../js/dropzone.js"></script>
<script src="../js/upload.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../assets/jquery/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/easing/jquery.easing.min.js"></script>
<script src="../assets/isotope/jquery.isotope.js"></script>
<script src="../assets/jquery/imagesloaded.pkgd.min.js"></script>
<script src="../assets/wow/wow.min.js"></script>
<script src="../assets/slicknav/jquery.slicknav.js"></script>
<script src="../assets/owlcarousel/js/owl.carousel.min.js"></script>
<script src="../assets/jquery/jquery.magnific-popup.min.js"></script>
<script src="../assets/number-animation/jquery.animateNumber.min.js"></script>
<!-- Contact Form Script -->
<script src="../assets/contact-form/js/validator.min.js"></script>
<script src="../assets/contact-form/js/form-scripts.js"></script>
<script src="../assets/jquery/plugins.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>

