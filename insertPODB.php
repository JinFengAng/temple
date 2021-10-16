<?php
require('config.php');
session_start();
$supplierID = $_SESSION['POsupplierID'];
$DATE = $_SESSION["DATE"];
$subTotal = 0;
$TaxRate = 0.00;
$totalPrice = 0;
if(isset($_POST['save'])){
	if (!empty($_POST['item']) && !empty($_POST['quantity']) && !empty($_POST['unitPrice']) && is_array($_POST['item']) && is_array($_POST['quantity']) && is_array($_POST['unitPrice'])) {
		    $item_array = $_POST['item'];
		    $quantity_array = $_POST['quantity'];
		    $unitPrice_array = $_POST['unitPrice'];
		    for ($i = 0; $i < count($item_array); $i++) {

		        $item = $item_array[$i];
		        $quantity = $quantity_array[$i];
		        $unitPrice = $unitPrice_array[$i];
		        $subTotal += $unitPrice * $quantity;
		        $stock = ("SELECT * FROM stock WHERE product_name = '".$item."'");
		        $check = $conn->query($stock);
		        $stk = $check->fetch_assoc();
		        $stock_id = $stk['stock_id'];
		        if($stock_id == ""){	
		        	$query = "INSERT INTO stock(product_name) VALUES('".$item."')";
					$conn->query($query);
					$stock_id = $conn->insert_id ;
				}
		        $sql = ("INSERT INTO purchase_detail(PO_id, product_name, quantity, unitPrice) VALUES ('".$_SESSION['currentPOID']."', '$item', '$quantity', '$unitPrice')");
		        $conn->query($sql);
		    }
		    $TaxPrice = $subTotal * $TaxRate;
		    $totalPrice = $TaxPrice + $subTotal;
		    $sql = "INSERT INTO purchase(supplier_id, sub_total, totalprice, status, purchase_date) VALUES ('$supplierID' ,'$subTotal','$totalPrice', 'Waiting for confirmation', '$DATE')";
		    if($conn->query($sql)===TRUE){
					echo "<script> alert('New Purchase Order is created successfully!')</script>";
					echo "<script> window.location='viewPurchaseOrder.php'</script>";
			}
		}
}
?>