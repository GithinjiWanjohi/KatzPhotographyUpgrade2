<?php 
require_once '../includes/init.php';
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
  $email=$_POST['email'];
  $password=$_POST['password'];
   if(isset($_POST['submit'])){
    //check length of password - in registration
    if(strlen($password)<=7){
      ?>
      <script>
      swal("Oops!","Your password should be atleast 8 characters.","error");
      </script>
      <?php
      header("Location: location.php");
    }
else{
    //check if records exist
    $query = "SELECT * FROM Users WHERE Email = '$email'";
    $user = mysqli_query($db,$query);
    $usercount = mysqli_num_rows($user);
    if($usercount < 1){
      ?>
      <script>
      swal("Oops!","This email does not exist in our system.","error");
      </script>
      <?php
    }else{
		$data=mysqli_fetch_assoc($user);
		$Type=$data['UserType'];
		if($Type=="admin" || $Type=="agent"){
			$_SESSION['Sessionid']=$email;
      ?>
      <script>
      swal({
        title:"Great job",
        html:"You just logged in.",
        type:"success"
        confirmButtonText:"Ok"
      }).then(function{
        window.location.href = "admin.php";
      }),function(dismiss){
        if (dismiss === 'cancel') {
    window.location.href = "login.php";
  }
      });
      </script>
      <?php
			header("Location: admin.php");
   }else{
	   $_SESSION['UserID']=$email;
     ?>
     <script>
      swal("Great job","You just logged in.","success");
     </script>
     <?php
	   header("Location: /katzphotoz/index.php");
   }
   }}}
  ?>
</body>
</html>