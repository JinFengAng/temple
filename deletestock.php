<?php
	require('config.php');
	session_start();

	$id=null;
	if(!empty($_GET['id'])){
		$id=$_GET['id'];
	}
	if($id==null){
		header("Location: Stock.php");
	}

	$sql = "DELETE FROM stock WHERE stock_id=$id";
	if($conn->query($sql)===TRUE){
		echo "<script> alert('Stock Deleted')</script>";
		echo "<script> window.location='Stock.php'</script>";
	}else{
		echo "<script> alert('Error deleting: " .$conn->error."')</script>";
		echo "<script> window.location='Stock.php'</script>";
	}
?>