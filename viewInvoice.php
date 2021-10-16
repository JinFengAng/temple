<?php
require('config.php');
session_start();
// if(!isset($_SESSION['username'])){
// 	header("Location:loginAdmin.php");
// }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
		th, td{
			padding: 10px;
			text-align: left;
		}
		th{
			background-color: #4CAF50;
    		color: white;
		}
		.button {
		    background-color: #4CAF50; /* Green */
		    border: none;
		    color: white;
		    padding: 12px 20px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 12px;
		    margin-right: 28px;
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
		body{
			min-width: 1200px;
		}
		.editBtn,.deleteBtn{
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
		.deleteBtn:hover{
			background-color: red;
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
	<div style="float: left; padding-left: 300px;">
		<div style="width: 100%;float: left;height: 50px"><h2 align="center">Today's Invoice</h2></div>
		<div style="margin:10px 20px;float:left;width: 96%;height:465px;overflow-y: auto;">
		<form action="viewinvoice.php" method="POST">
			<input type="submit" name="generate">
		</form>
			<table border="1" style="background-color: white;border-collapse:collapse;width: 100%;">
				<tr>
					<th>Inovice No</th>
					<th>Customer</th>
					<th>Date</th>
					<th>Total Price</th>
					<th>Action</th>
				</tr>
				<?php
				$sql1 = "SELECT * FROM c_invoice";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0){
					while($rows = $result1->fetch_assoc()){
						$cd = $rows['member_id'];
						$sql = "SELECT * FROM member WHERE member_id = '$cd' ";
						$result = $conn->query($sql);
						$cd_id = $result->fetch_assoc();
						$INV = sprintf('%05d',$rows['c_invoice_id']);
						echo "<tr>";
						echo "<td>PO". $INV."</td>";
						echo "<td>".$cd_id['member_cname']."</td>";
						echo "<td>".$rows['c_invoice_date']."</td>";
						echo "<td>RM".$rows['c_invoice_price']."</td>";
						echo "<td><a href='editINV.php?INVid=".$rows['c_invoice_id']."'>
							<span class='editBtn'>Edit PO</span></a>";
						echo "</td>";
						echo "</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>
	<div style="float: left; padding-left: 300px;">
		<div style="width: 100%;float: left;height: 50px"><h2 align="center">Past Invoice</h2></div>
		<div style="margin:10px 20px;float:left;width: 96%;height:465px;overflow-y: auto;">
			<table border="1" style="background-color: white;border-collapse:collapse;width: 100%;">
				<tr>
					<th>Inovice No</th>
					<th>Customer</th>
					<th>Date</th>
					<th>Total Price</th>
					<th>Action</th>
				</tr>
				<?php
				$sql1 = "SELECT * FROM c_invoice ";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0){
					while($rows = $result1->fetch_assoc()){
						$cd = $rows['member_id'];
						$sql = "SELECT * FROM member WHERE member_id = '$cd' ";
						$result = $conn->query($sql);
						$cd_id = $result->fetch_assoc();
						$INV = sprintf('%05d',$rows['c_invoice_id']);
						echo "<tr>";
						echo "<td>PO". $INV."</td>";
						echo "<td>".$cd_id['member_name']."</td>";
						echo "<td>".$rows['c_invoice_date']."</td>";
						echo "<td>RM".$rows['c_invoice_price']."</td>";
						echo "<td><a href='editINV.php?INVid=".$rows['c_invoice_id']."'>
							<span class='editBtn'>Edit PO</span></a>";
						echo "</td>";
						echo "</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>