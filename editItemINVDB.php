<?php
require('../config.php');
session_start();
$INVDetailID = $_SESSION['INVDetailid'];
$INVID = $_SESSION['INVid'];
if (isset($_POST['update'])) {
	$updateQuantity = $_POST['quantity'];

	$sql = "SELECT * FROM c_invoice WHERE c_invoice_id = '".$INVID."'";	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$total = $row['c_invoice_price'];

	$sql3 = "SELECT * FROM c_invoice_detail WHERE c_invoice_DTid = '".$_SESSION['INVDetailid']."'";	
	$result3 = $conn->query($sql3);
	$row3 = $result3->fetch_assoc();
	$stock = $row3['stock_id'];
	$quantity = $row3['quantity'];
	$newQty = $row3['quantity'] - $updateQuantity;

	$sql2 = "SELECT * FROM stock WHERE stock_id = '".$stock."'";	
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();

	$cTotal = $row3['quantity'] * $row2['product_price'];
	$subTotal = $updateQuantity * $row2['product_price'];

	$total = $total - $cTotal;
	$total = $total + $subTotal;

	$updateTaxPrice = $total * 0.00;
	$updqty = $row2['quantity'] - $newQty;
	$update = "UPDATE stock SET quantity='$updqty' WHERE stock_id = '$stock'";
	$conn->query($update);
	$sql4 = "UPDATE c_invoice SET c_invoice_price='$total', c_invoice_taxPrice='$updateTaxPrice' WHERE c_invoice_id = '$INVID'";
	$conn->query($sql4);
	$sql5 = "UPDATE c_invoice_detail SET quantity='$updateQuantity' WHERE c_invoice_DTid='$INVDetailID'";

	if($conn->query($sql5)===TRUE){
		echo "<script> alert('Item updated')</script>";
		echo "<script> window.location='editINV.php?INVid=".$INVID."'</script>";
	}else{
		echo "Error:".$sql5."<br>".$conn->error;
	}
}
?>