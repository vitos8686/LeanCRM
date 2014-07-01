<?php 
	if(isset($_POST['submit'])){ 
		
		$dbHost = 'localhost';
		$dbUser = 'Nate';
		$dbPass = 'C7a45aC1';
		$dbDatabase = 'leancrm';
		
		$db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
		mysql_select_db($dbDatabase, $db)or die("Couldn't select the database.");
		
		$myusername = $_POST['username']; 
		$mypassword = $_POST['password']; 
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		
		$sql = mysql_query("SELECT * FROM users
			WHERE username='$myusername' AND password='$mypassword'
			LIMIT 1"); 
		if(mysql_num_rows($sql) == 1){ 
			$row = mysql_fetch_array($sql); 
			session_start(); 
			$_SESSION['username'] = $row['username']; 
			//$_SESSION['fname'] = $row['first_name']; 
			//$_SESSION['lname'] = $row['last_name']; 
			$_SESSION['logged'] = TRUE; 
			header("Location: //localhost/LeanCRM/index.php"); // Modify to go to the page you would like 
			exit; 
		}else{ 
			header("Location: //localhost/LeanCRM/login.php"); 
			exit; 
		} 
	}else{    //If the form button wasn't submitted go to the index page, or login page 
		header("Location: //localhost/LeanCRM/login.php");     
		exit; 
	} 
?>