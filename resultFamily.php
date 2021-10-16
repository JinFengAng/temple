<?php
session_start();
require('config.php');

$memberid=$_POST['memberId'];
$family_id=$_POST["familyId"] ?? '';
$cname  = $_POST['cname'] ?? '';
$taisui  = $_POST['taisui'] ?? '';
$month1  = $_POST['month1'] ?? '';
$month2  = $_POST['month2'] ?? '';
$month3  = $_POST['month3'] ?? '';
$month4  = $_POST['month4'] ?? '';
$month5  = $_POST['month5'] ?? '';

$deleteSql = "DELETE FROM resultfamily WHERE family_id = " .$family_id . ";";
echo $deleteSql;
$conn->query($deleteSql);
 
$sql = "INSERT INTO resultfamily (member_id,family_id,family_cname,taisui,month1,month2,month3,month4,month5) VALUES ('$memberid','$family_id','$cname ','$taisui','$month1','$month2 ','$month3 ','$month4','$month5')";
	
if($conn->query($sql)===true){
	echo "Record Inserted.";
		
}else {
	echo "Something Wrong!";
}

