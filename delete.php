<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$dbname= "project";
	 // create connection
	$conn = mysqli_connect($host,$user,$pass,$dbname);
	// check connection
	if(!$conn){
		die("connection Failed" . mysqli_connect_error());
	}
		$id=$_REQUEST['id'];
		$query = "DELETE FROM register WHERE id=$id"; 
		$result = mysqli_query($conn,$query) or die ( mysqli_error());
		header("Location: project.php")
?>