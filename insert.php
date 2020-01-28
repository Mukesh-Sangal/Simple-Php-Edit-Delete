	<!DOCTYPE html>
<html>
	<head>
		<title>Insert</title>
		<link rel="stylesheet" type="text/css" href="project.css">
	</head>
	<body>
		<?php
		// define variables and initialize with empty values
			$nameErr = $emailErr = $phoneErr  = "";
			$name = $email = $phone = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			    if (empty($_POST["name"])) {
			        $nameErr = "Required*";
			    }
			    else {
			        $name = $_POST["name"];
			    }

			    if (empty($_POST["email"])) {
			        $emailErr = "Required*";
			    }
			    else {
			        $email = $_POST["email"];
			    }
			    if (empty($_POST["phone"]))  {
			        $phoneErr = "Required*";
			    }
			    else {
			        $phone = $_POST["phone"];
			    }
				//echo "Name is: " .$name. "<br />" . "Email is: " . $email . "<br />" . "Phone Is: " . $phone;
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
				
				$sql = "INSERT INTO register (name,email,phone) values ('$name','$email','$phone')";
				if(mysqli_query($conn,$sql)){
					echo "New record created Successfully hello";
				 $name = $_GET['name'];
				 $email = $_GET['email'];
				 $phone = $_GET['phone'];
				// $name = mysql_real_escape_string($name);
				// $email = mysql_real_escape_string($email);
				// $phone = mysql_real_escape_string($phone);
				header("Location: project.php");
				}else{
					echo "Error" .$sql. "<br />" . mysqli_error($conn);
				}
			}
		?>
		<div class="container">
			<div class="container-inner">
				<form class="myform" method="post">
					<label for="Name">Name</label>
					<input type="text" name="name" id="name" required="required">
					<span class="error"><?php echo $nameErr;?></span>
					<label for="email">E-mail</label>
					<input type="email" name="email" id="email" required="required">
					<span class="error"><?php echo $emailErr;?></span>
					<label for="number">Phone No</label>
					<input type="number" name="phone" id="phone" required="required">
					<span class="error"><?php echo $phoneErr;?></span>
					<div class="buttons">
						<input type="submit" class="add" name="submit" value="add" onclick="ajaxFunction()">
						<button type="submit" class="cancel" name="cancel-button" >Cancel</button>
					</div>
				</form>
			</div>
		</div>
		<div id = 'ajaxDiv'>Your result will display here</div>
		<script>
		function ajaxFunction() {
		
            var ajaxRequest;  // The variable that makes Ajax possible!
            try {        
               // Opera 8.0+, Firefox, Safari
               ajaxRequest = new XMLHttpRequest();
           	} 
           	catch (e) 
           	{
                     // Something went wrong
                     alert("Your browser broke!");
                     return false;
            }
            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.
            ajaxRequest.onreadystatechange = function() {
               if(ajaxRequest.readyState == 4) {
                  var ajaxDisplay = document.getElementById('ajaxDiv');
                  ajaxDisplay.innerHTML = ajaxRequest.responseText;
               }
            }
            
            // Now get the value from user and pass it to
            // server script.
   //          var doc = document.documentElement.cloneNode()
			// doc.innerHTML = data
			// $content = jQuery(doc.querySelector('#content'))
            // var name = document.getElementById('name').value;
            // console.log(name);
            // var email = document.getElementById('email').value;
            // console.log(email);
            // var phone = document.getElementById('phone').value;
            // console.log(phone);
            // var queryString = "?name = " + name ;
            
           // queryString +=  "&email = " + email + "&phone = " + phone;
            ajaxRequest.open("GET", "project.php" , true);
            ajaxRequest.send(null); 
        }
    </script>
	</body>
</html>