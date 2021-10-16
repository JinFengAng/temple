<?php
require('config.php');
session_start();
if(!empty($_GET['POid']))
{
	$PURCHASEORDERID = $_GET['POid'];
}
if(isset($_POST['submit'])){
	$SUPDONO = $_POST['supplierDONO'];
	$DODATE = $_POST['supplierDODate'];
}
$sql = "SELECT * FROM purchase_detail WHERE podetail_id = $PURCHASEORDERID";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$checkName = "SELECT * FROM stock WHERE product_name = '".$rows['product_name']."'";
	$check = $conn->query($checkName);
	$rows2 = $check->fetch_assoc();
	if($check->num_rows>0){
		$currentQuantity = $rows2['quantity'];
		$currentQuantity = $currentQuantity + $rows['quantity'];
		$query = "UPDATE stock SET quantity='$currentQuantity' WHERE stock_id ='".$rows2['stock_id']."'";
		$conn->query($query);
	}else{
		$query = "INSERT INTO stock(product_name,quantity) VALUES('".$rows['product_name']."','".$rows['quantity']."')";
		$conn->query($query);
	}
}
$sql = "UPDATE purchase SET status = 'Received', invoice_no = '$SUPDONO', received_date = '$DODATE' WHERE PO_id = $PURCHASEORDERID";
$conn->query($sql);
$sql = "SELECT * FROM purchase WHERE PO_id = $PURCHASEORDERID";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$supplier_id = $row['supplier_id'];
$sql = "INSERT INTO supplier_delivery_order(PO_id,invoice_no,received_date) VALUES('$PURCHASEORDERID','$SUPDONO','$DODATE')";
$conn->query($sql);
echo "<script> alert('".$SUPDONO." has been received successfully')</script>";
echo "<script> window.location='viewPurchaseOrder.php'</script>";
?>