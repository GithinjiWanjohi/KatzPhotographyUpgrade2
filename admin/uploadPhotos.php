<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/2/2018
 * Time: 11:56 PM
 */

include ('../connect.php');
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
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../js/dropzone.js"></script>
    <!--<script src="../js/upload.js"></script>-->
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
    <script src="../dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        Dropzone.options.myDropzone = {

            // Prevents Dropzone from uploading dropped files immediately
            autoProcessQueue: false,
            addRemoveLinks:true,
            maxFiles:50,
            parallelUploads:50,
            acceptedFiles: "image/jpeg, image/jpg, image/png, image/gif",

            init: function() {
                var submitButton = document.querySelector("#submit-all");
                myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                });

                myDropzone.on('sending', function(file, xhr, formData){
                    formData.append('userName', 'bob');
                });

                // You might want to show the submit button only when
                // files are dropped here:
                this.on("addedfile", function() {
                    // Show submit button here and/or inform user to click it.
                });

                myDropzone.on("complete", function(file) {
                    setTimeout(remove,3000);
                    function remove () {
                        myDropzone.removeFile(file);
                    }
                });

            }
        };
    </script>
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
                    <h2 class="font-w-8 ln-h-40"><span class="color">UPLOAD</span> PHOTOS TO A  <BR>
                        SHOOT CATALOG</h2>
                    <p class="font-w-6">Share your Awesomeness with your users</p>
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
                        <form action="UploadClass.php" enctype="multipart/form-data" method="post" class="dropzone" id="my-dropzone"
                              style="min-height: 600px;">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" id="shootName" name="shootName" placeholder="Shoot name" required data-error=" Shoot Name missing">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <select class="form-control" id="category" name="category" required data-error="Category missing">
                                    <option selected>Choose a Category</option>
                                    <?php
                                    $sql = "SELECT `cat_name` FROM categories";
                                    $res = $db->query($sql) or trigger_error($db->error . "[$sql]");
                                    while($row = mysqli_fetch_array($res)){
                                        $cat = $row['cat_name'];?>
                                    <option id="<?php echo $cat;?>"><?php echo $cat;?></option>
                                    <?php
                                    }?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <select class="form-control" id="custDetails" name="custDetails" required data-error="Customer name missing">
                                    <option selected>Choose a Customer</option>
                                    <?php
                                    $s = "SELECT `id`, `firstname`, `lastname` FROM `customers` WHERE 1";
                                    $result = $db->query($s) or trigger_error($db->error . "[$s]");
                                    while($row = mysqli_fetch_array($result)){
                                        $userID = $row['id'];
                                        $fName = $row['firstname'];
                                        $lName = $row['lastname'];?>
                                        <option id="<?php echo $userID;?>" value="<?php echo $userID." ".$fName." ".$lName;?>">
                                            <?php echo $fName." ".$lName." - ".$userID;?></option>
                                    <?php
                                    }?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="date" class="form-control" id="date" name="date" placeholder="Shoot Date" required data-error="Date missing">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="number" class="form-control" id="hours" name="hours" placeholder="Hours" required data-error="Hours missing">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="camera" name="camera" placeholder="Your Camera Body" required data-error="Camera body type missing">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="lensType" name="lensType" placeholder="Lens type" required data-error="Lens type missing">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea id="details" name="details" class="form-control" rows="6" placeholder="Please write additional details about the shoot" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group fallback" style="position: relative">
                                <input name="file" type="file" multiple />
                            </div>
                            <div class="col-sm-12 col-md-offset-9 pt-5 fixed-bottom">
                                <button class="btn" id="submit-all">Submit Shoot</button>
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
            KATZ | All Rights Reserved.</p>
    </div>
</footer>
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

<!-- JS FILES -->
<script src="../js/jquery.fancybox.pack.js"></script>
</body>
</html>

<?php
$db->close();

