<?php
require('../config.php');
session_start();
$INVID = $_SESSION['INVid'];
if(isset($_POST['submit'])){
	$item = $_POST['item'];
	$quantity = $_POST['quantity'];

	$sql = "INSERT INTO c_invoice_detail (c_invoice_id, stock_id, quantity) VALUES ('$INVID','$item', '$quantity')";
	$conn->query($sql);

	$sql2 = "SELECT * FROM c_invoice WHERE c_invoice_id = '$INVID'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();

	$sql3 = "SELECT * FROM stock WHERE stock_id = '$item'";
	$result3 = $conn->query($sql3);
	$row3 = $result3->fetch_assoc();
	$price = $row3['product_price'];
	$amt = $row3['quantity'] - $quantity;
	$price2 = $row2['c_invoice_price'];

	$subTotal = $quantity*$price;
	$subTotal = $subTotal + $price2;
	$taxPrice = $subTotal * 0.00;

	$upd = "UPDATE stock SET quantity='".$amt."' WHERE stock_id = '$item'";
	$conn->query($upd);

	$sql4 = "UPDATE c_invoice SET c_invoice_price='".$subTotal."', c_invoice_taxPrice='".$taxPrice."' WHERE c_invoice_id = '".$INVID."'";
	$conn->query($sql4);

	echo "<script> alert('New Item added!')</script>";
	echo "<script> window.location='editINV.php?INVid=".$INVID."'</script>";
}
?>