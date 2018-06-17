<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/28/2018
 * Time: 10:30 AM
 */
require_once 'init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KATZ Photography Kenya</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Register to be one of us
					</span>
            </div>

            <form class="login100-form validate-form" action="testing.php" method="POST">
                <div class="wrap-input100 validate-input m-b-26" data-validate="First Name is required">
                    <span class="label-input100">First Name</span>
                    <input class="input100" type="text" name="fname" id="fname" placeholder="Enter first name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Last Name is required">
                    <span class="label-input100">Last Name</span>
                    <input class="input100" type="text" name="lname" id="lname" placeholder="Enter last name">
                    <span class="focus-input100"></span>
                </div>


               <!--<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Enter username">
                    <span class="focus-input100"></span>
                </div>-->

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" id="email" placeholder="Enter email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Phone Number</span>
                    <input class="input100" type="tel" name="pnumber" id="pnumber" placeholder="Enter phone number">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" id="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Retype the password you entered">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="confirm" id="confirm" placeholder="Re-enter password">
                    <span class="focus-input100"></span>
                </div>

                <!--<div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        <input type="submit" value="Register" name="submit" id="submit" style="background-color:#57b846;color:white;"> 
                    </button>
                </div>-->
                <input type="submit" value="Register" class="btn btn-primary" name="submit">

                <div class="flex-sb-m w-full p-b-30 pt-4">

                    <div>
                        <a href="signIn.php" class="txt1">
                            Already a member? Sign In
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/bootstrap/js/popper.js"></script>
<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/daterangepicker/moment.min.js"></script>
<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="login/js/main.js"></script>

</body>
</html>
