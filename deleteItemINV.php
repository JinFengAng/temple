<?php
require('../config.php');
session_start();	
if(!empty($_GET['INVDetailid']))
{
	$INVDETAILID = $_GET['INVDetailid'];
	$INVID = $_SESSION['INVid'];
	$sql = "SELECT * FROM c_invoice_detail WHERE c_invoice_DTid = '$INVDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$stock = $row['stock_id'];
	$quantity = $row['quantity'];

	$sql2 = "SELECT * FROM stock WHERE stock_id = '$stock'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	$product_price = $row2['product_price'];

	$amt = $row2['quantity'] + $row['quantity'];
	$totalPrice = $quantity * $product_price;

	$sql3 = "SELECT * FROM c_invoice WHERE c_invoice_id = '$INVID'";
	$result3 = $conn->query($sql3);
	$row3 = $result3->fetch_assoc();

	$updateSubTotalPrice = $row3['c_invoice_price'] - $totalPrice;
	$updateTaxPrice = $updateSubTotalPrice * 0.00;

	$upd = "UPDATE stock SET quantity='".$amt."' WHERE stock_id = '$stock'";
	$conn->query($upd);
	$sql4 = "UPDATE c_invoice SET c_invoice_price='".$updateSubTotalPrice."', c_invoice_taxPrice='".$updateTaxPrice."' WHERE c_invoice_id = '".$INVID."'";
	$result = $conn->query($sql4);

	$sql5 = "DELETE FROM c_invoice_detail WHERE c_invoice_DTid = '$INVDETAILID'";
	$conn->query($sql5);
	echo "<script> alert('Item deleted')</script>";
	echo "<script> window.location='editINV.php?INVid=".$INVID."'</script>";
}
?>

