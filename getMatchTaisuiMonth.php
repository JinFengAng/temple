<?php
require('config.php');
session_start();

$birthdayYear  = $_POST['birthdayYear'];

$thisYearZodiacIndex = 12 - ( ($birthdayYear + 8) % 12 );

$birthdayMonth  = $_POST['birthdayMonth'];

$sql = "SELECT * FROM age_detail WHERE col = '" . $thisYearZodiacIndex . "'";
$result = $conn->query($sql);
$output = [];
while($rows2 = $result->fetch_assoc()){
	$output[] = $rows2['age'];
}

$sql = "SELECT * FROM month LEFT JOIN god ON god.id = month.list WHERE month = '" . $birthdayMonth . "'";
$result2 = $conn->query($sql);
$outputMonth = [];
while($rows = $result2->fetch_assoc()){
	$outputMonth[] = $rows['godlist'];
}

echo json_encode([
	'output' => $output,
	'outputMonth' => $outputMonth,
]);
