<?php
require('config.php');
session_start();

$name  = $_POST['name'] ?? NULL;

$sql = "SELECT * FROM member WHERE member_cname = '" . $name . "'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$cname= $rows['mem_cname'];
	$birthday= $rows['mem_birthday'];
	$birthdayDay= $rows['mem_cbirth'];
	$birthdayYear= $rows['mem_cbirthyear'];
	$birthdayMonth= $rows['mem_cbirthmonth'];
}

echo json_encode([
	'name' => $cname,
	'birthday' => $birthday,
	'birthdayDay' => $birthdayDay,
	'birthdayYear' => $birthdayYear,
	'birthdayMonth' => $birthdayMonth,
]);

