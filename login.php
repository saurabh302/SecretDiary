<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_POST['submitlogin'])) {
        $servername = "localhost";
        $username = "root";
        $password  = "";
        $dbname = "secrete_diary";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {

            die("Connection failed");
        }




        $email = $_POST["email"];

        $password = $_POST["password"];

        $query = "SELECT * FROM diary WHERE email = '$email' AND password = '$password'";
        if ($result = $conn->query($query)) {

            /* determine number of rows result set */
            $row_cnt = $result->num_rows;

            printf("Result set has %d rows.\n", $row_cnt);
            if ($row_cnt > 0) {
	$_SESSION['email'] = $_POST["email"];

                header("Location: diary.php");
            } else {
                header("Location: index.php");
            }

            /* close result set */
            $result->close();
        }
    }
    ?>


    <form action="login.php" method="post">
        <div id="login-box">
            <div class="login-box">
                <h1>Log in</h1>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="email" placeholder="Email" name="email" value="">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" value="">
                </div>
                <input type="submit" name="submitlogin" value="login">
                <h2 >Don't have an account? <a href="index.php">Create Here</a> </h2>
            </div>


    </form>
</body>

</html>