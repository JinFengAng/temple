<?php
require('config.php');
session_start();
$id=null;
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
}
if($id == null)
{
	header("Location:admin.php");
}

$sql = "DELETE FROM admin where admin_id=$id";

if($conn->query($sql)===TRUE)
{
	echo "<script> alert('Record successfully deleted')</script>";
	echo "<script> window.location='admin.php'</script>";
}
else
{
	echo "<script> alert('Error deleting record: ".$conn->error."')</script>";
	echo "<script> window.location='admin.php'</script>";
}
$conn->close();

?>