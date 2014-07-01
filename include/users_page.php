<?php 
	session_start(); 
	if(!$_SESSION['logged']){ 
		header("Location: login.php"); 
		exit;
	} 
	echo 'Welcome, '.$_SESSION['username'].' --- ';
?>
