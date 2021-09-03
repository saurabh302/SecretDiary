	
<?php
session_start();
if (isset($_POST['submitsignup'])) {
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "secrete_diary";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {

		die("Connection failed");
	}
	// echo "cont";


	// Create database
	// $sql = "CREATE DATABASE secrete_diary";
	// if ($conn->query($sql) === TRUE) {
	// 	echo "Database created successfully";
	// } else {
	// 	echo "Error creating database: " . $conn->error;
	// }

        // sql code to create table
	$sql = " CREATE TABLE diary (
	id int  NULL AUTO_INCREMENT,

	email varchar(255),
	password varchar(200),
	PRIMARY KEY (id)
)";


if ($conn->query($sql) === TRUE) {
	echo "Table diary created successfully";
} else {
	// echo "Error creating table: " . $conn->error;
}

if( $_POST["password"] == ""){
	echo  "
	<div class='error'>
<h3>
	There were error passowrid is requeiredd
</h3>
</div>
	";
}
else{
	$sql = "INSERT INTO diary ( email,password)
VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "')";
if ($conn->query($sql) === TRUE) {
	// echo "New record created successfully";
	$_SESSION['email'] = $_POST["email"];
	header("Location: diary.php");
} else {
	// echo "Error: " . $sql . "<br>" . $conn->error;
}

}



}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
	<title>Sign Up</title>
	<style>
	
	</style>
</head>
<body>
		<form action="index.php" method="post">
		<div id="login-box">
            <div class="login-box">
                <h1>Sign Up</h1>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="email" placeholder="Email" name="email" value="">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" value="">
                </div>
                <input type="submit" name="submitsignup" value="Signup">
                <h2 >Alerady have an account? <a href="login.php">Create Here</a> </h2>
            </div>
		</form>




</body>
</html>

