<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/2/2018
 * Time: 11:56 PM
 */

include ('../connect.php');
session_start();
if(isset($_SESSION['id'])){
    $l_userID=$_SESSION['id'];

      $loginuser=mysqli_query($db, "SELECT * FROM `users` WHERE `id`= '$l_userID'");
      $rowLoginuser=mysqli_fetch_array($loginuser);
      $s_fname=$rowLoginuser['FirstName'];
      $s_lname=$rowLoginuser['LastName'];
      $s_email=$rowLoginuser['Email'];
      $s_userLevel=$rowLoginuser['UserType'];

        if(isset($_GET['category_id'])){
          $categoryID=$_GET['category_id'];
        }

        if(isset($_POST['add'])){
          $n2=mysqli_real_escape_string($db, $_POST['cat_name']);
          $d2=mysqli_real_escape_string($db, $_POST['cat_description']);
          $addSql=mysqli_query($db, "INSERT INTO `categories`(`cat_ID`, `cat_name`, `description`) VALUES (NULL,'$n2','$d2')");
        }

        if(isset($_POST['update'])){
          $n=mysqli_real_escape_string($db, $_POST['cat_name']);
          $d=mysqli_real_escape_string($db, $_POST['cat_description']);
          $updateSql=mysqli_query($db, "UPDATE `categories` SET `cat_name`='$n',`description`='$d' WHERE `cat_ID`='$categoryID'");
        }
        if(isset($_POST['delete'])){
            $deleteSql=mysqli_query($db, "DELETE FROM `categories` WHERE `cat_ID`='$categoryID'");
        }

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
                    <div class="logo"> <a href="../index-9.php">KATZ ADMIN</a> </div>
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
                                    <li><a href="../index-9.php">Upload</a></li>
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
                    <h2 class="font-w-8 ln-h-40"><span class="color">CATEGORIES</span> MANAGEMENT <BR>
                        BY ADMIN</h2>
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
                                                
                        <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th><th>Description</th><th>Update</th><th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $categorySql=mysqli_query($db, "SELECT * FROM `categories` ORDER BY `cat_name` ASC");
                            $countCategory=mysqli_num_rows($categorySql); 
                            if($countCategory>=1){
                                while($rowCategory=mysqli_fetch_array($categorySql)){
                                    $categoryId=$rowCategory['cat_ID'];
                                    $categoryName=$rowCategory['cat_name'];
                                    $categoryDescription=$rowCategory['description'];

                                    if($categoryDescription==""){
                                        $categoryDescription="No description given";
                                    }else if($categoryName==""){
                                        $categoryName="No name specified";                      
                                    }
                        ?>
                        <form method="POST" action="category.php?category_id=<?php echo $categoryId; ?>">
                            <tr>
                            <td><input class="form-control" type="text" name="cat_name" value="<?php echo $categoryName; ?>" style="border-color: white; border-bottom: solid 1px grey;"></td>
                            <td><input class="form-control" type="text" name="cat_description" value="<?php echo $categoryDescription; ?>" style="border-color: white; border-bottom: solid 1px grey;"></td>
                            <td>
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                            </td>
                            <td>
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </td>
                          </tr>
                        </form>
                        <?php
                                }
                            }else{
                                echo "No category available";
                            }
                        ?>
                        <tr style="height: 10px;"></tr>
                        <form method="POST" action="category.php">
                          <tr>
                            <td><input class="form-control" type="text" name="cat_name" placeholder="Category name"></td>
                            <td><input class="form-control" type="text" name="cat_description" placeholder="Category description"></td>
                            <td>
                                <button type="submit" name="add" class="btn btn-success">Add new</button>
                            </td>
                          </tr>
                        </form>
                        </tbody>
                        </table>

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

