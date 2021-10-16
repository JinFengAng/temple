<?php
require('config.php');
session_start();

if(isset($_POST['submit'])){
	$newSupplierID = $_POST['newSupplier'];
	$sql = "UPDATE purchase SET supplier_id = '$newSupplierID' WHERE PO_id = '".$_SESSION['editPOID']."'";
	$conn->query($sql);
	echo "<script>alert('Supplier has been changed!')</script>";
	echo "<script> window.location='editPO.php?POid=".$_SESSION['editPOID']."'</script>";
}
?>