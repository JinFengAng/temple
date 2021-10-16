<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
   header("Location:loginAdmin.php");
 }


if(!empty($_GET['id']))
{
	$payment_id = $_GET['id'];
}
$sql = "SELECT * FROM payment WHERE id = $payment_id";

$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$admin_id= $rows['admin_id'];
	$member_id = $rows['member_id'];
	$mem_cname = $rows['mem_cname'];
	$mem_cbirth = $rows['mem_cbirth'];
	$amount = $rows['amount'];
	$admin_id = $rows['admin_id'];
	$mem_birthday = $rows['mem_birthday'];
	$mem_cbirthmonth = $rows['mem_cbirthmonth'];
	$mem_cbirthyear = $rows['mem_cbirthyear'];
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
			height: 580px;			
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
		/*#table-wrapper{
			position: relative;
			overflow: auto
		}*/
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
		
<form action="reviewInvoice2.php" method="POST">
	<div style="float: left;padding-left: 300px">
		<div style="width: 280%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Invoice</h2>
			</div>
			<div class="form">
				<div style="float: left;width: 50%;height: 100px;padding: 5px;">
					<div><b>Member Information</b></div>
					<div>Member Chinese Name: <?php echo $mem_cname;?></div>
					<div>Chinese Birthday: <?php echo $mem_cbirth;?></div>
					<div>Birthday: <?php echo $mem_birthday;?></div>
					<div>Chinese birhday month: <?php echo $mem_cbirthmonth;?></div>
					<div>Chinese birhday years: <?php echo $mem_cbirthyear;?></div>
					<div>Issue by: <?php echo $admin_id;?></div>
				</div>
				<div style="width: 100%;height:400px;float: left;" id="table-wrapper">
					<table style="background-color: white;border-collapse:collapse;width: 100%;">
					 	<thead>
					 		<tr>
						 		<th>God</th>
							 	<th>Price(RM)</th>
						 	</tr>
					 	</thead>				
					 	<br>
					 	<br>
					 	<br>
					 	<br>	 		
						<tbody id="itemTable">
							<?php
								$sql = "SELECT * FROM pay_god LEFT JOIN god ON pay_god.god_id=god.id WHERE pay_god.payment_id = '".$payment_id."'";
								$result = $conn->query($sql);
								while($rows = $result->fetch_assoc()){
							?> 
						 	<tr>
						 		<td><label><?php echo $rows['godlist'];?></label></td>
						 		<td><label>10</label></td>
						 	</tr>
						 	<?php
						 	}
						 	?>
					 	</tbody>
					</table>
					<div style="width: 100%;height: 45px;margin-top: 10px;">
					 	<div style="float: right;width: 40%;height: 120px;">
						 	<div style="float: right;width: 50%;height:40px;text-align: center;line-height: 45px;background-color: white;">Total:<?php echo "RM".$amount;?></div>
					 	</div>
					 	
					 	<a href="reviewInvoice2.php?id=<?php echo $payment_id?>">Print 打印发票</a>
					</div>	
				</div>			
			</div>
		</div>		
	</div>
</form>
</body>
</html>