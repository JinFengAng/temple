<?php
require('config.php');
session_start();

$memberId  = $_POST['memberId'] ?? NULL;

$sql = "SELECT family_id FROM family WHERE member_id = '" . $memberId . "'";
$result = $conn->query($sql);
$rowResults = [];
while($rows = $result->fetch_assoc()){
	$rowResults[] = $rows['family_id'];
	
}

echo json_encode($rowResults);

