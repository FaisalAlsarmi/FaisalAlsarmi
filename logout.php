<?php
	session_start();  
	if(isset($_SESSION['authenticated'])) $_SESSION['authenticated'] = false;
	if(isset($_SESSION['username'])) unset($_SESSION['username']);  //to Destroy Specified Session
	if(isset($_SESSION['password'])) unset($_SESSION['password']);  //to Destroy Specified Session
	if(isset($_SESSION['current_date'])) unset($_SESSION['current_date']);  //to Destroy Specified Session
	header("Location: index.php");
    die();
	
?>