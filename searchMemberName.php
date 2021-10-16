<?php
require('config.php');
session_start();

$name  = $_POST['name'] ?? NULL;

$sql = "SELECT * FROM member WHERE mem_cname = '" . $name . "'";
$result = $conn->query($sql);
$output = '1';
while($rows = $result->fetch_assoc()){
	$output = $rows['member_id'];
}

echo $output;

