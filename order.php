<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:loginAdmin.php");
}

?>
<!DOCTYPE html>
<html>
<head>
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
		.orderBtn{
			border-radius: 5px;
			border:1px solid black;
			width: 45%;
			text-align: center;
			height: 200px;
			line-height: 200px;
			background-color: lightblue;
			margin: 20px;
			float: left;
			font-size: 25px;
			cursor: pointer;
		}
		.orderBtn:hover{
			background-color: white;
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
    <div style="width: 80%;height: 545px;margin-left: 20%;">
        <h1 style="margin-left: 40%">Order 订货 </h1>
        <div style="width:95%;padding: 20px;height: 480px;border-radius: 5px;">
            <div class="orderBtn" onclick="window.location='selectSupplier.php'">Create Purchase Order</div>
            <div class="orderBtn" onclick="window.location='viewPurchaseOrder.php'">View Purchase Order</div>
        </div>
    </div>
</body>
</html>