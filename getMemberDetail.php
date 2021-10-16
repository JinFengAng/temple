<?php
require('config.php');
session_start();

$memberId  = $_POST['memberId'] ?? NULL;
$familyId = $_POST['familyId'] ?? NULL;

if($familyId != NULL){
	$sql2="SELECT * FROM family WHERE family_id = '" . $familyId . "' AND died = 0";
	$result = $conn->query($sql2);
	while($rows = $result->fetch_assoc()){
		$member_id = $rows['member_id'];
		$cname= $rows['family_cname'];
		$birthday= $rows['family_birth'];
		$birthdayDay= $rows['family_cbirthday'];
		$birthdayYear= $rows['family_cbirthyear'];
		$birthdayMonth= $rows['family_cbirthmonth'];
		$relationship= $rows['mem_familyship'];
	}
}else{
	$sql = "SELECT * FROM member WHERE member_id = '" . $memberId . "'";
	$result = $conn->query($sql);
	while($rows = $result->fetch_assoc()){
		$member_id = $rows['member_id'];
		$cname= $rows['mem_cname'];
		$birthday= $rows['mem_birthday'];
		$birthdayDay= $rows['mem_cbirth'];
		$birthdayYear= $rows['mem_cbirthyear'];
		$birthdayMonth= $rows['mem_cbirthmonth'];
		$relationship= $rows['mem_familyship'];
	}
}//end if

echo json_encode([
	'memberid' => $member_id,
	'name' => $cname,
	'birthday' => $birthday,
	'birthdayDay' => $birthdayDay,
	'birthdayYear' => $birthdayYear,
	'birthdayMonth' => $birthdayMonth,
	'relationship' => $relationship,
]);

