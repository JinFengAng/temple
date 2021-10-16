<?php
$myhost = "localhost";
$myuser = "root";
$mypassword = "";
$mydb = "temple";

$conn = mysqli_connect($myhost, $myuser, $mypassword, $mydb);

if(mysqli_connect_errno()){
	echo 'Failed to connect to database : '.mysqli_connect_error();
}
?>