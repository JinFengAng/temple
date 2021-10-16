<?php
	require('config.php');
	session_start();
	$_SESSION["DATE"] = date("Y-m-d");
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION['POsupplierID'] = $id;
	$sql = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'temple' AND   TABLE_NAME  = 'purchase';";
	$result = $conn->query($sql);
	$lastPOID = $result->fetch_assoc();
	$_SESSION['currentPOID'] = $lastPOID['AUTO_INCREMENT'];
	$lastPOID['AUTO_INCREMENT'] = sprintf('%05d',$lastPOID['AUTO_INCREMENT']);
}
if($id == null)
{
	header("Location:selectSupplier.php");
}
$sql = "SELECT * FROM supplier where supplier_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['company_name'];
	$telephone = $rows['sup_phone'];
	$address = $rows['company_address'];
	$email = $rows['company_email'];
}

?>
<!DOCTYPE html>
<html>
<head>
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
		.inputBox{
		    width: 100%;
		    padding: 12px 16px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		}
		.submitBtn {
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
		#rowNum{
			display: inline-block;
			width: 20%;
		}
	</style>
	<script>
		var rowNum;
		function createTable(){
			rowNum = document.getElementById("rowNum").value;
			var inputField = "<tr><td><input type='text' name='item[]' required></td><td><input type='number' name='quantity[]' min='1' required></td>"+"<td><input type='number' name='unitPrice[]' step='any' required></td></tr>";
			for (var i = 0; i < rowNum; i++) {
				document.getElementById("myTable").insertRow(-1).innerHTML = inputField;
			}
			document.getElementById("rowNum").disabled = true;
			document.getElementById("goBtn").disabled = true;
		}
		function resetTable(){
			document.getElementById("rowNum").disabled = false;
			document.getElementById("goBtn").disabled = false;
			var rowCount = document.getElementById("myTable").rows.length;
			for (var i = 0; i < rowCount; i++) {
				document.getElementById("myTable").deleteRow(0);
			}
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

	<div style="padding-left: 300px;float: left;width: 80%">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Purchase Order Details 采购订单详细</h2>
			</div>
			<div class="form">
				<div style="float: left;width: 50%;height: 100px;padding: 5px;">
					<div><b>Supplier details</b></div>
					<div>Company: <?php echo $name;?></div>
					<div>Phone No: <?php echo $telephone;?></div>
					<div>Address: <?php echo $address;?></div>
					<div>E-mail: <?php echo $email;?></div>
				</div>
				<div style="float: left;width: 48%;height: 100px;padding: 5px;">
					<div>PO details</div>
					<?php
						$sql = "SELECT PO_id FROM purchase where supplier_id = '$id'";
						$result = $conn->query($sql);
						$rows = $result->fetch_assoc();
					?>
					<div>PO No: <?php echo "PO".$lastPOID['AUTO_INCREMENT'];?></div>
					<div>Date: <?php echo $_SESSION["DATE"]; ?></div>
				</div>
				<div style="width: 100%;height:340px;float: left;" id="table-wrapper">
					<div style="float: left;margin-bottom: 10px;">	
						<label>Number of row item:</label><input type="number" id="rowNum" min="1" required>
						<span><button onclick="createTable()" id="goBtn">Go</button></span>
						<span><button onclick="resetTable()" id="resetBtn">Reset</button></span>
					</div>
					<form action="insertPODB.php" method="POST">
						 <table style="background-color: white;border-collapse:collapse;width: 100%;">
						 	<thead>
						 		<tr>
							 		<th>Product Name</th>
								 	<th>Quantity</th>
								 	<th>Product Price Per Unit(RM)</th>
							 	</tr>
						 	</thead>					 		
							<tbody id="myTable"> 
						 	</tbody>
						 </table>
						 <div style="width: 100%;height: 45px;">
						 	<input type="submit" name="save" value="Save" class="submitBtn">
						 </div>	
					</form>
				</div>			
			</div>
		</div>		
	</div>
</body>
</html>