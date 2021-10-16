<?php
session_start();
require('config.php');

$memberid=$_POST["memberId"];
$cname  = $_POST['cname'];
$taisui  = $_POST['taisui'];
$month1  = $_POST['month1'];
$month2  = $_POST['month2'];
$month3  = $_POST['month3'];
$month4  = $_POST['month4'];
$month5  = $_POST['month5'];

$deleteSql = "DELETE FROM result WHERE member_id = " .$memberid . ";";
echo $deleteSql;
$conn->query($deleteSql);

 
$sql = "INSERT INTO result(member_id,member_cname,taisui,month1,month2,month3,month4,month5) VALUES('$memberid','$cname','$taisui','$month1','$month2 ','$month3 ','$month4',
		'$month5')";
	
if($conn->query($sql)===true){
	echo "Record Inserted.";
		
}else {
	echo "Something Wrong!";
}

