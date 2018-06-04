<?php

$localhost='localhost';
$root='root';
$password='';
$db='katzdb';

$con=mysqli_connect($localhost, $root, $password, $db);

if (mysqli_connect_errno($con)) {
	die("Connection failed: ".mysqli_connect_error());
}
?>