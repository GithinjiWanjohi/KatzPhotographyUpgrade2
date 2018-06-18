<?php
//include 'Cart.php';
require_once 'init.php';
if(isset($_GET['cat'])){
  $cat_id = sanitize($_GET['cat']);
}else{
  $cat_id = '';
}
function get_category($child_id){
 global $db;
 $id = $child_id;
 $sql = "SELECT p.Categoryid AS 'pCategoryid', p.Name AS 'Parent', c.Categoryid AS 'cCategoryid', c.Name AS 'Child' 
         FROM Category c
         INNER JOIN Category p
         ON c.Parent = p.Categoryid
         WHERE c.Categoryid = '$id'";
  $query = $db->query($sql);
  $category = mysqli_fetch_assoc($query);
  return $category;       
}
$catsql = "SELECT * FROM Products WHERE Category = '$cat_id'";
$productcat = $db->query($catsql);
$category = get_category($cat_id);
$sql1 = "SELECT * FROM Category WHERE Parent = 0";
$pquery = $db->query($sql1);
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
    <style>
  .card{
    margin:4px -12px;
      -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1); 
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1); 
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);   
}
.card:hover{
    box-shadow: 0px 0px 150px rgba(0,0,0,0.4);
    z-index: 2;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.5);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.5);   
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.5);
    transition: all 200ms ease-in;
    transform: scale(1.1);
}
.rowz{
  padding:15px 77px;
  margin-right:-56px;
  margin-left:-12px;
}
.action{
  transition: .5s ease;
  opacity:0;
  position:absolute;
  top: 53%;
  height:66px;
  min-width:100%;
  background-color:white;
  border-radius:25px;
}
.card:hover .action{
 opacity:0.8;
}

  </style>
</head>
<body>
<!-- Pre Loader -->
<!--<div id="loader"></div>-->
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
                  <li><a href="liveart/liveartjs-master/index.html">Start Designing</a></li>
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
  <!-- Start service-page area -->
<div class="about_slider-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-text-2 text-center pt-40">
                        <h2 class="color-w font-w-8 font-40 pb-20">OUR SHOP</h2>
                        <h4 class="color-w font-22"><a class="font-20 color-w" href="index.html">Home</a> <span class="plr-10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></span>Shop</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>
 <section id="services_3" class="services_3">
                        <!-- Top links -->
<?php include("toplinks.php") ?>
<!--End top links-->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title ptb-10">
                  <h2 class="font-w-8"><span class="color">O</span>RDER ONLINE</h2>
                  <p class="font-w-6">Shop Till You Drop!</p>
                  </div>
                    <div class="cols">
    <h4 style="font-size:21px;color:white;">Category</h4>
    <?php while($parent = mysqli_fetch_assoc($pquery)):?>
    <?php
    $parentid = $parent['Categoryid'];
     $sql2 = "SELECT * FROM Category WHERE Parent = '$parentid'";
     $cquery = $db->query($sql2);
    ?>
      <!--Menu items-->
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;font-size:15px;"><?php echo$parent['Name'];?><span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
      <?php while($child = mysqli_fetch_assoc($cquery)):?>
        <li><a href="subcat_details2.php?cat=<?php echo$child['Categoryid'];?>" style="color:red;font-size:15px;"><?php echo$child['Name'];?></a></li>
      <?php endwhile;?>
      </ul>
    </li>
      <?php endwhile;?>
  
  </div>

  <div class="container text-muted">
<div class="row rows">
   <?php
        //get rows query
        $query = $db->query("SELECT * FROM Products WHERE Featured = 1");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
  <div class="col-md-6 col-lg-3">
  <div class="card">
  <div class="card-block">
  <h3 class="card-title text-center" style="font-size:25px;color:black;"><?php echo $row['Name']; ?></h3>
  <hr>
  <p class="text-center" style="font-size:15px;color:black;">Ksh.<?php echo $row['UnitPrice']; ?></p>
  </div>
  <img src="<?php echo $row['Image']; ?>" class="card-img-bottom img-fluid" alt="<?php echo $row['Name']; ?>" style="height:277px;margin-left:25px;"/>
   <div class="action">
  <div class="row rowz">
  <!--<span>&#124;</span>
  <div class="col-md-6 col-lg-4">
  <a href="#"><img src="bagg.svg" title="Add to Cart" alt="Shopping bag" style="height:30px;padding-left:100px;"/></a>
  </div><span>&#124;</span>-->
    <a href="cartAction.php?action=addToCart&id=<?php echo $row['Productid']?>" class="btn btn-success" style="height:42px;font-size:13px;color:white;">Add To Cart</a>    
  </div>
  </div>
     </div>
    </div>
      <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
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