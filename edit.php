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
		$sql = "SELECT * from register where id='".$id."'"; 
		$result = mysqli_query($conn, $sql) or die ( mysqli_error());
		$row = mysqli_fetch_assoc($result);
		// echo $id;
	if(isset($_POST['btn-update'])){
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $update = "UPDATE register SET name='$name', email='$email',phone='$phone' WHERE id=". $_POST['id'];
	 $up = mysqli_query($conn, $update);
	 if(!isset($sql)){
	 die ("Error $sql" .mysqli_connect_error());
	 }
	 else
	 {
	 header("location: project.php");
	 }
	}
?>
<!--Create Edit form -->
<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project.css">
</head>
<body>
<div class="container">
	<div class="container-inner1">
		<h1>Edit User Information</h1>
		<form class="myform" method="post" action="edit.php">
			<label for="name">Name:</label>
			<input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
			<input type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
			<br/><br/>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="<?php echo $row['email']; ?>">
			<br/><br/>
			<label for="phone">Phone:</label>
			<input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>">
			<br/><br/>
			<div class="buttons">
				<button type="submit" name="btn-update" class="add" id="btn-update" onClick="update()"><strong>Update</strong></button>
				<a href="insert.php"><button class="cancel" type="button" value="button">Cancel</button></a>
			</div>
		</form>
	</div>
</div>
<!-- Alert for Updating -->
<script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script>
</body>
</html>
	