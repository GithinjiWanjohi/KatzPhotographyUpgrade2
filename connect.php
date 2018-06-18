<?php	
	$db=mysqli_connect("localhost", "root","") ;
	if (!$db) {
        die ("Could not connect to database" . mysqli_connect_error());
    }

	mysqli_select_db($db,'katzphotoz') or die('Error selecting database : ' . mysqli_error());




