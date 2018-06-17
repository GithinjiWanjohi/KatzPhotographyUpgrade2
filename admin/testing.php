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
  $confirm = $_POST['confirm']; 
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $pnumber = $_POST['pnumber'];
   if(isset($_POST['submit'])){
      $emailquery = $db->query("SELECT * FROM Users WHERE Email = '$email'");
    $emailcount = mysqli_num_rows($emailquery);
 if($emailcount != 0){
    ?>
    <script>
    swal("Oops!","The email already exists.Retype another one.","error");
    </script>
    <?php
    //header("Location: registration.php");
    //$error = 'The email already exists.Use another one';
}
 //check password length
    if(strlen($password) <= 7){
      ?>
      <script>
      swal("Oops!","Your password should be atleast 8 characters.","error");
      </script>
      <?php
      header("Loaction: registration.php");
      //$error = 'Your password needs to be atleast 8 characters';
    }
    //check password and confirm match
    if($password != $confirm){
      ?>
      <script>
      swal("Oops!","Your passwords are different.","error");
      </script>
      <?php
      header("Loaction: registration.php");
      //$error = 'Your passwords do not match';
    }
    //email validation
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      ?>
      <script>
      swal("Oops!","You must enter a valid email address.","error");
      </script>
      <?php
      header("Loaction: registration.php");
      //$error = 'You must enter a valid email';
    }

    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      //add user to db plus set session
      $hashed = password_hash($password,PASSWORD_DEFAULT);
      $query = $db->query("INSERT INTO Users (FirstName,LastName,Email,PhoneNumber,Password,UserType) VALUES ('$fname','$lname','$email','$pnumber','$hashed','user')");
      ?>
      <script>
      swal("Great job!","You have been registered successfully.","success");
      </script>
      <?php
      //$_SESSION['success_pop'] = 'You have been added successfully';
      header('Location: login.php');
    }
}
  ?>
</body>
</html>
