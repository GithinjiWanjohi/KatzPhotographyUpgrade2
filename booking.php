<?php
include ('connect.php');

if(isset($_POST['book_shoot'])){
	$name=mysqli_real_escape_string($db, $_POST['name']);
	$email=mysqli_real_escape_string($db, $_POST['email']);
	$phonenumber=mysqli_real_escape_string($db, $_POST['phonenumber']);
	$category=mysqli_real_escape_string($db, $_POST['category']);
	$date=mysqli_real_escape_string($db, $_POST['date']);
	$hours=mysqli_real_escape_string($db, $_POST['hours']);
	$details=mysqli_real_escape_string($db, $_POST['details']);
			
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: contact-us.php?booking=email-format");
		exit();
	}else{
		$insertBooking=mysqli_query($db,"INSERT INTO `book_shoot`(`id`, `name`, `email`, `phonenumber`, `category_id`, `date`, `hours`, `details`, `status`) VALUES (NULL,'$name','$email','$phonenumber','$category','$date','$hours','$details','pending')");
		if($insertBooking)
	    {
	    	header("Location: contact-us.php?booking=success");
	    }
	    else{
	    	echo "Error: ".$insertBooking."<br>".mysqli_error($db);
	    }
	}
}

if(isset($_POST['book_class'])){
	$name=mysqli_real_escape_string($db, $_POST['name']);
	$email=mysqli_real_escape_string($db, $_POST['email']);
	$phonenumber=mysqli_real_escape_string($db, $_POST['phonenumber']);
	$details=mysqli_real_escape_string($db, $_POST['details']);
			
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: contact-us.php?class=email-formats");
		exit();
	}else{
		$insertBooking=mysqli_query($db,"INSERT INTO `book_class`(`id`, `name`, `email`, `phonenumber`, `details`, `time`,`status`) VALUES (NULL,'$name','$email','$phonenumber','$details',NOW(),'pending')");
		if($insertBooking)
	    {
	    	header("Location: contact-us.php?class=successs");
	    }
	    else{
	    	echo "Error: ".$insertBooking."<br>".mysqli_error($db);
	    }
	}
}

?>