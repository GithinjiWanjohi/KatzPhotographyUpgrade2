<?php  
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}   
include_once('OAuth.php');
include_once('includes/init.php');

$query = $db->query("SELECT * FROM orders WHERE id=(SELECT MAX(id) FROM orders)");
$sql = mysqli_fetch_assoc($query);
//echo $sql['id'];
//echo $sql['total_price'];
//pesapal params
$token = $params = NULL;
 

/*
PesaPal Sandbox is at http://demo.pesapal.com. Use this to test your developement and 
when you are ready to go live change to https://www.pesapal.com.
*/
$consumer_key = 't7ULffCf9h25Yns972SG6V/UfKpaFIuV';//Register a merchant account on
                   //demo.pesapal.com and use the merchant key for testing.
                   //When you are ready to go live make sure you change the key to the live account
                   //registered on www.pesapal.com!
$consumer_secret = 'sSeyXIUQtKvwBZpNUxH2GgMZfTQ=';// Use the secret from your test
                   //account on demo.pesapal.com. When you are ready to go live make sure you 
                   //change the secret to the live account registered on www.pesapal.com!
$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
$iframelink = 'http://demo.pesapal.com/api/PostPesapalDirectOrderV4';//change to      
                   //https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!

//get form details
$amount = $sql['total_price']; //$_POST['amount'];
$amount = number_format($amount, 2);//format amount to 2 decimal places

$desc = 'One two three'; //$_POST['description'];
$type = 'MERCHANT';
$reference = $_GET['id'];//unique order id of the transaction, generated by merchant
$first_name = 'Abel';//$_POST['firstname'];
$last_name =  'Wasike';//$_POST['lastname'];
$email = 'abellwasike@gmail.com';//$_POST['email'];
$phonenumber = '';//$_POST['number'];//ONE of email or phonenumber is required

$callback_url = 'project/orderSuccess.php'; //redirect url, the page that will handle the response from pesapal.

$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"http://www.pesapal.com\" />";
$post_xml = htmlentities($post_xml);

$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

//post transaction to pesapal
$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
$iframe_src->set_parameter("oauth_callback", $callback_url);
$iframe_src->set_parameter("pesapal_request_data", $post_xml);
$iframe_src->sign_request($signature_method, $consumer, $token);

//display pesapal - iframe and pass iframe_src
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Order Success</title>
    <meta charset="utf-8">
    <style>
	body{background-color:cyan;}
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
<body>
<ul>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello <?php echo $_SESSION['UserID']; ?> !
  <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="admin/change_password.php" style="color:black;">Change Password</a></li>
    <li><a href="admin/logout.php" style="color:black;">Log Out</a></li>
  </ul>
</li>
</ul>
<div class="container">
    <h1>Order Status</h1>
    <script>
    swal("Order Placed!", "Your order details will be communicated by email!", "success");
    </script>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
</div>
<iframe src="<?php echo $iframe_src;?>" width="100%" height="700px"  scrolling="no" frameBorder="0">
    <p>Browser unable to load iFrame</p>
</iframe> 
</body>
</html> 