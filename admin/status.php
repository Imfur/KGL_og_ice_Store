<?php
require('connection.inc.php');
require('functions.inc.php');
require_once('config.php');


$id=$_GET['id'];
$status=$_GET['status'];

$q="update admin_users set status=$status where id=$id";

mysqli_query($con,$q);

header('location:users.php')

?>