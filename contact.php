<?php

$server = "localhost";
$username = "root";
$pass ="";
$dbname = "admin";

$conn = mysqli_connect($server, $username, $pass, $dbname);

// get the post records
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// database insert SQL code
$sql =" INSERT INTO subcategories(name,email,message)
VALUES('$name','$email','$message')";
// insert in database
$rs = mysqli_query($conn, $sql);

if($rs)
{
header('location:contact.html');
}

?>