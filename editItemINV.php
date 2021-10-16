<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}	
if(!empty($_GET['INVDetailid']))
{
	$name = '';
	$INVDETAILID = $_GET['INVDetailid'];
	$_SESSION['INVDetailid'] = $INVDETAILID;
	$sql = "SELECT * FROM c_invoice_detail WHERE c_invoice_DTid = '$INVDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$stock = $row['stock_id'];
	$sql2 = "SELECT * FROM stock WHERE stock_id = '$stock'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();

	$name = $row2['product_name'];
	$quantity = $row['quantity'];
	$productPrice = $row2['product_price'];
	
}
$INVID = sprintf('%05d',$_SESSION['INVDetailid']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<style type="text/css">
		#logout{
			margin: 10px;
			padding: 30px;
			cursor: pointer;
			text-align: center;
			background-color: white;
			border-radius: 20px;
		}
		#logout:hover {
			background-color: grey;
			color: white;
		}
		.first{
			cursor: pointer;
			background-color: white;
			border: 1px solid black;
			height: 50px;
			font-size:20px;
			text-align: center;
			line-height: 50px;
		}
		.first a{
			text-decoration: none;
		}
		.first:hover {
			background-color: grey;
		}
		.second{
			cursor: pointer;
			background-color: lightgrey;
			border: 1px solid black;
			height: 50px;
			font-size:20px;
			text-align: center;
			line-height: 50px;
		}
		.second a{
			text-decoration: none;
		}
		.second:hover {
			background-color: grey;
		}
		body{
			min-width: 1200px;
		}
		.form{
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			height: 430px;			
		}
		.form label{
			padding: 10px;
		}
		h2 {
			border-bottom: 2px solid black;
			padding-bottom: 3px;
		}
		input[type=text],input[type=number],input[type=email]{
		    width: 100%;
		    padding: 12px 16px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		}
		.submit {
		    background-color: #4CAF50;
		    border: none;
		    color: white;
		    padding: 16px 32px;
		    text-decoration: none;
		    margin: 4px 2px;
		    cursor: pointer;
		}
		a{
			background-color: red;
		    border: none;
		    color: white;
		    padding: 15px 32px;
		    text-decoration: none;
		    margin: 2px 2px;
		    cursor: pointer;
		}
	</style>
</head>
<body>
	<div style="width: 100%;height: 100px;background-color: lightblue;">
		<div style="float: left;width: 88%;height: 100px;">
			<h1 style="margin-left: 10px;">Newspaper Distrubution System</h1>
		</div>
		<div style="float: left;width: 10%;height: 100px;">
			<div id="logout" onclick="window.location='../logOut.php'">
				Logout
			</div>
		</div>
	</div>
	<div style="width: 10%;height: 545px;background-color:#ff8000;float: left;border-top: 1px solid black;">
		<nav>
			<div class="first" onclick="window.location='../home.php'">Home</div>
			<div class="second" onclick="window.location='../stock/stock.php'">Inventory</div>
			<div class="first" onclick="window.location='../supplier/supplier.php'">Supplier</div>
			<div class="second" onclick="window.location='../subscriber/subscriber.php'">Subscriber</div>
			<div class="first" onclick="window.location='../delivery/delivery.php'">Delivery Person</div>
			<div class="second" onclick="window.location='../customer/customer.php'">Customer</div>
			<div class="first" onclick="window.location='SalesDO.php'">Sales</div>
			<div class="second" onclick="window.location='orderSystem.php'">Order</div>
			<div class="first" onclick="window.location='viewPayment.php'">Payment</div>
		</nav>   	
	</div>
	<div style="width: 90%;height: 545px;float: left;background-color: grey">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>INV<?php echo $INVID;?>:Edit Item</h2>
			</div>
			<div class="form">	
				<form action="editItemINVDB.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Item Details</legend>
						<label>Item Name</label>
						<input type="text" name="item" placeholder="Item Name" value="<?php echo $name;?>" Disabled>
						<label>Quantity</label>
						<input type="number" name="quantity" placeholder="Quantity" min="1" value="<?php echo $quantity;?>" required>
						<label>Product Price Per Unit(RM)</label>
						<input type="number" name="unitPrice" placeholder="Price" step="any" value="<?php echo $productPrice;?>" Disabled>
						<input type="submit" name="update" class="submit" value="Update">
						<a href="editINV.php?INVid=<?php echo $_SESSION['INVid'];?>">Cancel</a>	
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>