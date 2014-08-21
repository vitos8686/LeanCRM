<?php
	if (isset($_POST['submit'])) { 
		
		include "database.php";
		
		$db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
		mysql_select_db($dbDatabase, $db)or die("Couldn't select the database.");
		
		$myusername = $_POST['username']; 
		$mypassword = $_POST['password']; 
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		
		$sql = mysql_query("SELECT * 
			FROM users
			WHERE username='$myusername' 
			AND password='$mypassword'
			LIMIT 1");

		if (mysql_num_rows($sql) == 1) { 
			$row = mysql_fetch_array($sql); 
			session_start(); 
			$_SESSION['username'] = $row['username']; 
			$_SESSION['logged'] = TRUE; 
			header("Location: /index.php");
			exit; 
		} else { 
			header("Location: /login.php"); 
			exit; 
		} 
	} else { //If the form button wasn't submitted go to the login page 
		header("Location: /login.php");     
		exit; 
	} 
?>