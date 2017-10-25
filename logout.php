<?php

session_start();

setcookie("user_login", "", time() + 86400 * 14); //86400 = 1 day.

//destroy the session	
session_destroy();

unset($_SESSION['user_login']);
	header('Location:login.php');


?>