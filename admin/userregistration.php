<?php
$server = "localhost";
$username = "root";
$pass ="";
$dbname = "admin";

$conn = mysqli_connect($server, $username, $pass, $dbname);

// get the post records
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


// database insert SQL code
$sql= ("insert into users(username,password,email,status) values('$username','$password','$email','0')");
// insert in database
$rs = mysqli_query($conn, $sql);

if($rs)
{
echo '<script>alert("Account created")</script>';
}
		{
			header('location:userlogin.php');
		die();
	}


?>