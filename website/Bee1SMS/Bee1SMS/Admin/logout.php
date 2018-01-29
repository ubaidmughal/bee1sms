<?php
	session_start();
	unset($_SESSION['UName']);
	
	if(session_destroy())
	{
		header("Location:/Admin/login.php");
	}
?>