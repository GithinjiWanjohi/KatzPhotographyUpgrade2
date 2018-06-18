<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/2/2018
 * Time: 11:56 PM
 */

session_start();

include ('../connect.php');

if(isset($_SESSION['User'])){
    $email = $_SESSION['User'];

      $loginuser=mysqli_query($db, "SELECT * FROM `users` WHERE `Email`= '$email'");
      $rowLoginuser=mysqli_fetch_array($loginuser);
      $s_fname=$rowLoginuser['FirstName'];
      $s_lname=$rowLoginuser['LastName'];
      $s_email=$rowLoginuser['Email'];
      $s_userLevel=$rowLoginuser['UserType'];
      $l_userID = $rowLoginuser['id'];

        if(isset($_POST['post_blog'])){
            $title=mysqli_real_escape_string($db, $_POST['blog_title']);
            $content=mysqli_real_escape_string($db, $_POST['blog_content']);
            $category=$_POST['category'];

            //image upload  
            $imgfolder="../cover_images/";         
            $imgname=$_FILES['photo']['name'];
            $imgname2=explode(".", $imgname);
            $newimgname=round(microtime(true)).'.'.end($imgname2);
            $imgtmp=$_FILES['photo']['tmp_name'];           
            $imgpath=$imgfolder.basename($newimgname);
            $imgpath1="cover_images/".basename($newimgname);
            $imageFileType=pathinfo($imgpath,PATHINFO_EXTENSION);

            if(!empty($_FILES['photo']['name']) && !empty($_FILES['photo']['tmp_name'])){
                // Check if image file is a actual image or fake image
                $check=getimagesize($imgtmp);
                if($check===false){   
                  //File is not an image
                  $finalImgPath="NULL";
                }else{
                    if(file_exists($imgpath)){
                        //Sorry, file already exists
                        $finalImgPath="NULL";
                    }else{
                        if($_FILES["photo"]["size"]>2000000){
                            //Sorry, your file is too large
                            $finalImgPath="NULL";
                        }else{
                            if($imageFileType!="jpg" && $imageFileType!="JPG" && $imageFileType!="png" && $imageFileType!="PNG" && $imageFileType!="jpeg" && $imageFileType!="JPEG" && $imageFileType!="gif" && $imageFileType!="GIF"){
                                //Sorry, only JPG, JPEG, PNG & GIF files are allowed
                                $finalImgPath="NULL";
                            }else{
                                if(move_uploaded_file($imgtmp, $imgpath)){
                                    //The file has been uploaded
                                    $finalImgPath=$imgpath1;             
                                }else{
                                    //Sorry, there was an error uploading your file
                                    $finalImgPath="NULL";
                                }
                            }
                        }
                    }
                }

            }else{
                //No image has been uploaded
                $finalImgPath="NONE";
            }


            if(empty($title)||empty($content)||empty($category)){
                echo "Please fill in all fields";
            }else{
                if($finalImgPath=="NULL"){
                    echo "There was an error uploding your image";
                }else if($finalImgPath=="NONE" || $finalImgPath==$imgpath1){
                    
                    $insertSql=mysqli_query($db, "INSERT INTO `blog_posts`(`id`, `blog_title`, `blog_body`, `posted_at`, `user_id`, `category_id`, `cover_img`) VALUES (NULL,'$title','$content',NOW(),'$l_userID', '$category','$finalImgPath')");

                    if ($insertSql){
                        $checkBlogSql=mysqli_query($db, "SELECT * FROM `blog_posts` WHERE `blog_title`='$title' && `blog_body`='$content' && `cover_img`='$finalImgPath' && `user_id`='$l_userID' && `category_id`='$category'");
                        $rowCheckBlog=mysqli_fetch_array($checkBlogSql);
                        $newBlogId=$rowCheckBlog['id'];

                        header("Location: ../blog-single.php?blog_id=$newBlogId&new=verynew");
                        exit();
                    }else{
                        echo "Error: ".$insertSql."<br>".mysqli_error($db);
                    }
                
                }
            }
        }
    }else {
    echo "Error";
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
                    <h2 class="font-w-8 ln-h-40"><span class="color">POST</span> A BLOG OF A <BR>
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
                        <form action="blogging.php" method="post" enctype="multipart/form-data"
                              style="min-height: 600px;">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" id="blog_title" placeholder="Blog title" required data-error=" Blog title missing" name="blog_title">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <select class="form-control" id="category" name="category" required data-error="Category missing">
                                    <option selected>Choose a Category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $res = $db->query($sql) or trigger_error($db->error . "[$sql]");
                                    while($row = mysqli_fetch_array($res)){
                                        $catid=$row['cat_ID'];
                                        $cat = $row['cat_name'];?>
                                    <option value="<?php echo $catid;?>"><?php echo $cat;?></option>
                                    <?php }?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-sm-12 row">
                                <div class="col-sm-2">Image attachment</div>
                                <input type="file" name="photo" class="form-control-file col-sm-4" id="photo1"  data-error="Image attachment missing">
                                <div class="col-sm-1"></div>
                                <small id="passwordHelpBlock" class="form-text text-muted col-sm-4" style="margin: 0; padding: 0;">
                                    Add an image to give a visual clarification of your question. It is optional.
                                </small>
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea id="message" class="form-control ckeditor" name="blog_content" rows="6" placeholder="Please write the contents of your blog" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-sm-3 col-md-offset-9 pt-5">
                                <input class="btn" type="submit" value="Submit Blog" name="post_blog">
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

