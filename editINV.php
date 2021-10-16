<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
if(!empty($_GET['INVid']))
{
	$INVID = $_GET['INVid'];
	$_SESSION['INVid'] = $INVID;
}
if($INVID == null)
{
	header("Location:viewInvoice.php");
}
$sql = "SELECT * FROM c_invoice where c_invoice_id = '$INVID'";
$result = $conn->query($sql);
$today = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Weekly','Monthly');
while($rows = $result->fetch_assoc()){
	$c_invoice_date = $rows['c_invoice_date'];
	$c_invoice_price = $rows['c_invoice_price'];
	$c_invoice_taxPrice = $rows['c_invoice_taxPrice'];
	$c_day = $rows['c_day'];
	$customer_id = $rows['customer_id'];
	$totalPrice = $c_invoice_taxPrice + $c_invoice_price;
	$day = $today[$c_day];
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
		.button{
			background-color: #4CAF50; /* Green */
		    border: none;
		    color: white;
		    padding: 10px 40px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    float: right;
		    margin-left: 10px;
		    font-size: 15px;
		    -webkit-transition-duration: 0.4s;
		    transition-duration: 0.4s;
		    cursor: pointer;
		}
		.button1 {
		    background-color: white; 
		    color: black; 
		    border: 2px solid #4CAF50;
		}

		.button1:hover {
		    background-color: #4CAF50;
		    color: white;
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
		#backBtn{
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
		.editBtn{
			padding: 4px 10px;
			margin-right: 6px;
			-webkit-transition-duration: 0.4s;
			transition-duration: 0.4s;
			border: 1px solid black;
		}
		a{
			text-decoration: none;
		}
		.editBtn:hover{
			background-color: orange;
		    color: white;
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
	<div style="width: 90%;height: 545px;float: left;background-color: grey">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Customer Invoice Details</h2>
			</div>
			<div class="form">
				<div style="float: left;width: 50%;height: 100px;padding: 5px;">
					<?php
						$sql = "SELECT * FROM member WHERE member_id = '$member_id'";
						$result = $conn->query($sql);
						while($rows = $result->fetch_assoc()){
							$name = $rows['mem_cname'];
							$telephone = $rows['mem_phone'];
							$address = $rows['mem_address'];
							$email = $rows['mem_email'];
						}
					?>
					<div><b>Customer details</b></div>
					<div>Company: <?php echo $name;?></div>
					<div>Phone No: <?php echo $telephone;?></div>
					<div>Address: <?php echo $address;?></div>
					<div>E-mail: <?php echo $email;?></div>
				</div>
				<div style="float: left;width: 48%;height: 100px;padding: 5px;">
					<div><b>INV details</b></div>
					<div>INVNo: INV<?php echo $INVID;?></div>
					<div>Date: <?php echo $c_invoice_date; ?></div>
					<div>Day of Invoice: <?php echo $day; ?></div>
				</div>
				<div style="float: right;margin-bottom: 5px; height: 40px;width: 100%;">
				<a href="addItemINV.php?INVid=<?php echo $INVID;?>" class="button button1">
						<span>Add Item</span></a>
				</div>
				<div style="width: 100%;height:280px;float: left;" id="table-wrapper">
					<table style="background-color: white;border-collapse:collapse;width: 100%;">
					 	<thead>
					 		<tr>
						 		<th>Item</th>
							 	<th>Quantity</th>
							 	<th>Product Price Per Unit(RM)</th>
							 	<th>Total(RM)</th>
							 	<th>Actions</th>
						 	</tr>
					 	</thead>					 		
						<tbody id="itemTable">
							<?php
								$sql = "SELECT * FROM c_invoice_detail WHERE c_invoice_id = '$INVID'";
								$result = $conn->query($sql);
								while($rows = $result->fetch_assoc()){
									$stock_id = $rows['stock_id'];

									$sql2 = "SELECT * FROM stock WHERE stock_id = '$stock_id'";
									$result2 = $conn->query($sql2);
									$row1 = $result2->fetch_assoc();

									$total = $row1['product_price']*$rows['quantity'];
									$total2 = sprintf('%0.2f',$total);
							?> 
						 	<tr>
						 		<td><label><?php echo $row1['product_name'];?></label></td>
						 		<td><label><?php echo $rows['quantity'];?></label></td>
						 		<td><label><?php echo $row1['product_price'];?></label></td>
						 		<td><label><?php echo $total2;?></label></td>
						 		<td>
						 			<a href="editItemINV.php?INVDetailid=<?php echo $rows['c_invoice_DTid'];?>"><span class="editBtn">Edit</span></a>
						 			<a href="deleteItemINV.php?INVDetailid=<?php echo $rows['c_invoice_DTid'];?>" onclick="return confirm('Are you sure you want to delete this?')"><span class="editBtn">Delete</span></a>
						 		</td>
						 	</tr>
						 	<?php
						 	}
						 	?>
					 	</tbody>
					</table>
					<div style="width: 100%;height: 45px;margin-top: 10px;">
					 	<button id="backBtn" onclick="window.location='viewInvoice.php'">Back</button>
					 	<button id="backBtn" style="background-color: orange" onclick="window.location='updateCus.php?INVid=<?php echo $INVID;?>'">Save changes to customer details</button>
					 	<div style="float: right;width: 40%;height: 120px;">
					 		<div style="float: right;width: 50%;height:40px;text-align: center;line-height: 45px;background-color: white;"><?php echo "RM".$c_invoice_price;?></div>
						 	<label style="float: right;height: 20px;">Sub-Total(Excluding Tax): </label>
						 	<div style="float: right;width: 50%;height:40px;text-align: center;line-height: 45px;background-color: white;"><?php echo "RM".$c_invoice_taxPrice;?></div>
						 	<label style="float: right;height: 20px;">TAX: </label>
						 	<div style="float: right;width: 50%;height:40px;text-align: center;line-height: 45px;background-color: white;"><?php echo "RM".$totalPrice;?></div>
						 	<label style="float: right;height: 20px;">Total: </label>
					 	</div>			 	
					</div>	
				</div>			
			</div>
		</div>		
	</div>
</body>
</html>