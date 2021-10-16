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
//	header("Location:viewPurchaseOrder.php");
}
$sql = "SELECT * FROM purchase where PO_id = '$PURCHASEORDERID'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$supplier_id = $rows['supplier_id'];
	$subTotal = $rows['sub_total'];
	$totalPrice = $rows['totalprice'];
	$status = $rows['status'];
	$purchase_date = $rows['purchase_date'];
	$purchaseOrderID = sprintf('%05d',$PURCHASEORDERID);
	// $received_date = $rows['received_date'];
	// $invoice_no = $rows['invoice_no'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Our Custom CSS -->
	<link rel="stylesheet" href="style2.css">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta charset="UTF-8">
	<style type="text/css">
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
		@media print{
			.navBar,button{
				display: none;
			}
		}
	</style>
	<script type="text/javascript">
		function printFunction(){
			window.print();
		}
	</script>
</head>
<body>

	<nav id="sidebar">
      <div style="width: 100px;">
        <div class="sidebar-header">
            <h3>Temple System</h3>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="home.php">首页 Home</a>
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
          <div>
            <button id="logout" onclick="window.location='logoutAdmin.php'">
                Logout 登出</button>
         </div>
        </div> 
    </nav>

	<div style="padding-left: 300px;float: left;width: 80%;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Purchase Order Details</h2>
			</div>
			<div class="form">
				<div style="float: left;width: 50%;height: 100px;padding: 5px;">
					<?php
						$sql = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
						$result = $conn->query($sql);
						while($rows = $result->fetch_assoc()){
							$name = $rows['company_name'];
							$telephone = $rows['company_phone'];
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
					<div>PO No: PO<?php echo $purchaseOrderID;?></div>
					<div>Date: <?php echo $purchase_date; ?></div>
					<br>	

					<!-- <div>Invoice No: <?php echo $invoice_no;?></div>
					<div>Received Date: <?php echo $received_date; ?></div> -->
				</div>
				<div style="width: 104%;height:550px;float: left;" id="table-wrapper">
					<table style="background-color: white;border-collapse:collapse;width: 100%;">
					 	<thead>
					 		<tr>
						 		<th>Item</th>
							 	<th>Quantity</th>
							 	<th>Product Price Per Unit(RM)</th>
							 	<th>Total(RM)</th>
						 	</tr>
					 	</thead>					 		
						<tbody id="itemTable">
							<?php
								$sql = "SELECT * FROM purchase_detail WHERE PO_id = '$PURCHASEORDERID'";
								$result = $conn->query($sql);
								while($rows = $result->fetch_assoc()){
									$total = $rows['unitPrice']*$rows['quantity'];
									$total2 = sprintf('%0.2f',$total);
							?> 
						 	<tr>
						 		<td><label><?php echo $rows['product_name'];?></label></td>
						 		<td><label><?php echo $rows['quantity'];?></label></td>
						 		<td><label><?php echo $rows['unitPrice'];?></label></td>
						 		<td><label><?php echo $total2;?></label></td>
						 	</tr>
						 	<?php
						 	}
						 	?>
					 	</tbody>
					</table>
					<div style="width: 100%;height: 45px;margin-top: 10px;">
					 	<div style="width: 20%;"><button onclick="window.location='viewPurchaseOrder.php'">Back</button></div>
					 	<div style="width: 20%;float: left;"><button style="background-color: blue;" onclick="printFunction()">Print</button></div>
					 	<div style="float: right;width: 40%;height: 120px;">
					 		<div style="float: right;width: 50%;height:40px;text-align: center;line-height: 45px;background-color: white;"><?php echo "RM".$subTotal;?></div>
					 		<label style="float: right;height: 20px;">Sub-Total: </label>
					 		
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