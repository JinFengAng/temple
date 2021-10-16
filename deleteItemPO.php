<?php
require('config.php');
session_start();	
if(!empty($_GET['PODetailid']))
{
	$PURCHASEORDERDETAILID = $_GET['PODetailid'];
	$PURCHASEORDERID = $_SESSION['POID'];
	$sql = "SELECT * FROM purchase_detail WHERE podetail_id = '$PURCHASEORDERDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$totalPrice = $row['quantity'] * $row['unitPrice'];
	$sql = "SELECT * FROM purchase WHERE PO_id = '$PURCHASEORDERID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$updateSubTotalPrice = $row['sub_total'] - $totalPrice;
	$updateTaxPrice = $updateSubTotalPrice * 0.00;
	$updateTotalOrderPrice = $updateSubTotalPrice + $updateTaxPrice;
	$sql = "UPDATE purchase SET sub_total='$updateSubTotalPrice',totalPrice='$updateTotalOrderPrice' WHERE PO_id = '$PURCHASEORDERID'";
	$result = $conn->query($sql);
	$sql = "DELETE FROM purchase_detail WHERE podetail_id = '$PURCHASEORDERDETAILID'";
	$conn->query($sql);
	echo "<script> alert('Item deleted')</script>";
	echo "<script> window.location='editPO.php?POid=".$PURCHASEORDERID."'</script>";
}
?>

