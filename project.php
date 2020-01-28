<!DOCTYPE html>
<html>
<head>
	<title>Project</title>
	 <style>
         table, td, th {
            text-align: center;
            border: 1px solid black;
         }
      </style>
</head>
<body style="display: flex;justify-content: center;">
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
	$sql = "SELECT * FROM register";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
	?>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>E-mail</th>
				<th>Phone</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php while($row = $result->fetch_assoc()){ ?>
			<tr>
			 <td><?php echo $row['id'];?></td>
			 <td><?php echo $row['name']?></td>
			 <td><?php echo $row['email']?></td>
			 <td><?php echo $row['phone']?></td>
			 <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
			 <td><a href="delete.php?id=<?php echo $row["id"];?>" onclick="del()">Delete</a></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	<?php }
?>	

<script>
function del(){
 var x;
 if(confirm("Are u Sure to delete") == true){
 x= "Deleted";
 }
}
</script>
</body>
</html>