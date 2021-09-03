	<?php

session_start();

	if (isset($_POST['submit'])) {
		$servername = "localhost";
		$username = "root";
		$password  = "";
		$dbname = "secrete_diary";


		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {

			die("Connection failed");
		}
		$email =  $_SESSION['email'];
		$mydairy = $_POST['mydiary'];

		$sql = "UPDATE diary set diary = '$mydairy'  where email ='$email'";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			// header("Location: diary.php");
		} else {
			 echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	?>



	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>Diary</title>
	</head>

	<body>
		

		<form action="diary.php"  method="post">

			<textarea id="myInput" name="mydiary" rows="30" cols="100">



			</textarea>
			<input type="submit" id="button" name="submit" value="Submit">
		</form>
		<script>
			let typingTimer; //timer identifier
			let doneTypingInterval = 1000; //time in ms (5 seconds)
			let myInput = document.getElementById('myInput');
			let button = document.getElementById('button');
			button.style.display = "none";
			//on keyup, start the countdown
			myInput.addEventListener('keyup', () => {
				clearTimeout(typingTimer);
				if (myInput.value) {
					typingTimer = setTimeout(doneTyping, doneTypingInterval);
				}
			});

			//user is "finished typing," do something
			function doneTyping() {
				//do something
			button.click();

			}
		</script>
	</body>

	</html>