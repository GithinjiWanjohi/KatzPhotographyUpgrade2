<?php
require_once '../init.php';
unset($_SESSION['User']);
header('Location: ../index.php');
?>