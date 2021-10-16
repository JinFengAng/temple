<?php
require('config.php');
session_start();
if(!isset($_SESSION['username'])){
	// header("Location:loginAdmin.php");
}
if(!empty($_GET['POid']))
{
	$PURCHASEORDERID = $_GET['POid'];
}
if($PURCHASEORDERID == null)
{
	// header("Location:createOrderDO.php");
}
$sql = "SELECT * FROM purchase where PO_id = '$PURCHASEORDERID'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$supplier_id = $rows['supplier_id'];
	$totalPrice = $rows['totalprice'];
	$status = $rows['status'];
	$purchaseOrderDate = $rows['purchase_date'];
	$purchaseOrderID = sprintf('%05d',$PURCHASEORDERID);
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta charset="UTF-8">
	<style type="text/css">
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
		input[type=text]{
		    width: 18%;
		    padding: 4px 4px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		}
		input[type=submit] {
		    background-color: #4CAF50; /* Green */
			margin: 10px;
		    border: none;
		    color: white;
		    padding: 15px 32px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    cursor: pointer;
		    float: right;
		}
		th, td{
			padding: 8px;
			text-align: left;
		}
		th{
			background-color: #4CAF50;
    		color: white;
		}
		#table-wrapper{
			position: relative;
			overflow: auto
		}
		button{
			background-color: #4CAF50; /* Green */
			margin: 10px;
		    border: none;
		    color: white;
		    padding: 15px 32px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    cursor: pointer;
		    float: left;
		}
		.wrapper {
		    display: flex;
		    width: 100%;
		}

		#sidebar {
		    width: 250px;
		    position: fixed;
		    top: 0;
		    left: 0;
		    height: 100vh;
		    z-index: 999;
		    background: #7386D5;
		    color: #fff;
		    transition: all 0.3s;
		    float: left;
		}
	</style>
</head>
<body>

	<nav id="sidebar">
      <div style="width: 100px;">
        <div class="sidebar-header">
            <h3>Temple System</h3>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="home.php" data-toggle="collapse" aria-expanded="false" >首页 Home</a>
            </li>
            <li>
                <a href="admin.php">员工 Admin</a>
            </li>
            <li>
                <a href="supplier.php">供应商 Supplier</a>
            </li>
            <li>
                <a href="Stock.php">库存 Stock</a>
            </li>
            <li>
                <a href="taisui.php">太岁 Taisui</a>
            </li>
            <li>
                <a href="godlist.php">神 God list</a>
            </li>
             <li>
                <a href="chooseMatch.php">相配 Match</a>
            </li>
            <li>
                <a href="order.php">订货 Order</a>   
            </li>
            <li>
            	<a href="logoutAdmin.php">登出 Logout</a>
            </li>
        </ul>
          
        </div> 
    </nav>

	<div style="padding-left: 300px;float: left;width: 80%;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Supplier Delivery Order</h2>
			</div>
			<div class="form">
				<div style="float: left;width: 50%;height: 100px;padding: 5px;">
					<?php
						$sql = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
						$result = $conn->query($sql);
						while($rows = $result->fetch_assoc()){
							$name = $rows['company_name'];
							$telephone = $rows['sup_phone'];
							$address = $rows['company_address'];
							$email = $rows['company_email'];
						}
					?>
					<div><b>Supplier Information</b></div>
					<div>Company: <?php echo $name;?></div>
					<div>Phone No: <?php echo $telephone;?></div>
					<div>Address: <?php echo $address;?></div>
					<div>E-mail: <?php echo $email;?></div>
				</div>
				<div style="float: left;width: 48%;height: 100px;padding: 5px;">
					<div>Supplier Invoice Information</div>
					<form action="createDODB.php?POid=<?php echo $PURCHASEORDERID?>" method="POST">
					<div>Supplier Inovice No: <input type="text" name="supplierDONO" required></div>
					<div>Your PO No: PO<?php echo $purchaseOrderID;?></div>
					<div>Date: <input type="text" pattern="\d{4}-\d{1,2}-\d{1,2}" name="supplierDODate" required placeholder="YYYY-MM-DD"></div>
				</div>
				<div style="width: 100%;height:340px;float: left;" id="table-wrapper">
					<table style="background-color: white;border-collapse:collapse;width: 100%;">
					 	<thead>
					 		<tr>
						 		<th>Item</th>
							 	<th>Quantity</th>
						 	</tr>
					 	</thead>					 		
						<tbody id="itemTable">
							<?php
								$sql = "SELECT * FROM purchase_detail WHERE PO_id = '$PURCHASEORDERID'";
								$result = $conn->query($sql);
								while($rows = $result->fetch_assoc()){
							?> 
						 	<tr>
						 		<td><label><?php echo $rows['product_name'];?></label></td>
						 		<td><label><?php echo $rows['quantity'];?></label></td>
						 	</tr>
						 	<?php
						 	}
						 	?>
					 	</tbody>
					</table>
					<div style="width: 100%;height: 45px;margin-top: 10px;">
					 	<button onclick="window.location='viewPurchaseOrder.php'">Back</button>
					 	<input type="submit" name="submit" value="Confirm received">
					 	</form>
					</div>	
				</div>			
			</div>
		</div>		
	</div>
</body>
</html>