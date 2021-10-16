<?php
	require('config.php');
	session_start();
	$_SESSION["DATE"] = date("Y-m-d");
// if(!isset($_SESSION['username'])){
// 	header("Location:loginAdmin.php");
// }
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION['INVcustomerID'] = $id;
	$sql = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'temple' AND   TABLE_NAME  = 'c_invoice';";
	$result = $conn->query($sql);
	$lastINVID = $result->fetch_assoc();
	$_SESSION['currentINVID'] = $lastINVID['AUTO_INCREMENT'];
	$lastINVID['AUTO_INCREMENT'] = sprintf('%05d',$lastINVID['AUTO_INCREMENT']);
}
if($id == null)
{
	header("Location:selectCustomerINV.php");
}
$sql = "SELECT * FROM member where member_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['mem_cname'];
	$telephone = $rows['mem_phone'];
	$address = $rows['mem_address'];
	$address1 = $rows['mem_address1'];
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
                <a href="chooseMatch.php"> Match</a>
            </li>
            <li>
                <a href="order.php">订货 Order</a>   
            </li>
            <li>
                <a href="payment.php">付费 Payment</a>
            </li>
        </ul>
        <div>
            <button id="logout" onclick="window.location='logoutAdmin.php'">
                Logout</button>
        </div>
    </div> 
</nav>
	<div style="width: 80%;height: 545px;margin-left: 20%;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Invoice Details</h2>
			</div>
			<div class="form">
				<div style="float: left;width: 50%;height: 100px;padding: 5px;">
					<div><b>Member details</b></div>
					<div>Member Name: <?php echo $name;?></div>
					<div>Phone No: <?php echo $telephone;?></div>
					<div>Address: <?php echo $address;?></div>
				</div>
				<div style="float: left;width: 48%;height: 100px;padding: 5px;">
					<div>INV details</div>
					<div>INV No: <?php echo "PO".$lastINVID['AUTO_INCREMENT'];?></div>
					<div>Date: <?php echo $_SESSION["DATE"]; ?></div>
				</div>
				<div style="width: 100%;height:340px;float: left;" id="table-wrapper">
					<div style="float: left;margin-bottom: 10px;">	
						<label>Number of row item:</label><input type="number" id="rowNum" min="1" required>
						<span><button onclick="createTable()" id="goBtn">Go</button></span>
						<span><button onclick="resetTable()" id="resetBtn">Reset</button></span>
					</div>
					<form action="insertINVDB.php" method="POST">
						 <table style="background-color: white;border-collapse:collapse;width: 100%;">
						 	<thead>
						 		<tr>
							 		<th>Product Name</th>
								 	<th>Quantity</th>
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