<?php
require('config.php');
session_start();
if(!isset($_SESSION['username'])){
	//header("Location:loginAdmin.php");
}
if(!empty($_GET['POid']))
{
	$PURCHASEORDERID = $_GET['POid'];
	$_SESSION['POID'] = $PURCHASEORDERID;
}
if($PURCHASEORDERID == null)
{
	header("Location:viewPurchaseOrder.php");
}
$sql = "SELECT * FROM purchase where PO_id = '$PURCHASEORDERID'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$supplier_id = $rows['supplier_id'];
	$subTotal = $rows['sub_total'];
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
		<style>
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
                <a href="home.php" data-toggle="collapse" aria-expanded="false" >?????? Home</a>
            </li>
            <li>
                <a href="admin.php">?????? Admin</a>
            </li>
            <li>
                <a href="supplier.php">????????? Supplier</a>
            </li>
            <li>
                <a href="Stock.php">?????? Stock</a>
            </li>
            <li>
                <a href="taisui.php">?????? Taisui</a>
            </li>
            <li>
                <a href="godlist.php">??? God list</a>
            </li>
             <li>
                <a href="chooseMatch.php">?????? Match</a>
            </li>
            <li>
                <a href="order.php">?????? Order</a>   
            </li>
            <li>
            	<a href="logoutAdmin.php">?????? Logout</a>
            </li>
            
        </ul>
          
        </div> 
    </nav>
	<div style="padding-left: 300px;float: left">
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
							$telephone = $rows['sup_phone'];
							$address = $rows['company_address'];
							$email = $rows['company_email'];
						}
					?>
					<div><b>Supplier details</b></div>
					<div>Company: <?php echo $name;?></div>
					<div>Phone No: <?php echo $telephone;?></div>
					<div>Address: <?php echo $address;?></div>
					<div>E-mail: <?php echo $email;?></div>
				</div>
				<div style="float: left;width: 48%;height: 100px;padding: 5px;">
					<div>PO details</div>
					<div>PO No: PO<?php echo $purchaseOrderID;?></div>
					<div>Date: <?php echo $purchaseOrderDate; ?></div>
				</div>
				<div style="float: right;margin-bottom: 5px; height: 40px;width: 100%;">
				<a href="addItemPO.php?POid=<?php echo $PURCHASEORDERID;?>" class="button button1">
						<span>Add Item</span></a>
					<a href="changePOSupplier.php?POid=<?php echo $PURCHASEORDERID;?>" class="button button1">
						<span>Change Supplier</span></a>
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
						 		<td>
						 			<a href="editItemPO.php?PODetailid=<?php echo $rows['podetail_id'];?>"><span class="editBtn">Edit</span></a>
						 			<a href="deleteItemPO.php?PODetailid=<?php echo $rows['podetail_id'];?>" onclick="return confirm('Are you sure you want to delete this?')"><span class="editBtn">Delete</span></a>
						 		</td>
						 	</tr>
						 	<?php
						 	}
						 	?>
					 	</tbody>
					</table>
					<div style="width: 100%;height: 45px;margin-top: 10px;">
					 	<button id="backBtn" onclick="window.location='viewPurchaseOrder.php'">Back</button>
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