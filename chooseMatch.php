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
	<style type="text/css">
		
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
		.wrapper {
		    display: flex;
		    width: 100%;
		}

		#sidebar {
		    width: 200px;
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
                <a href="home.php">?????? Home</a>
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
	
	<div style="width: 80%;height: 545px;margin-left: 20%;">
		<h1 style="margin-left: 40%">Match </h1>
		<div style="width:95%;padding: 20px;height: 480px;border-radius: 5px;">
			<div class="orderBtn" onclick="window.location='match.php'">???????????? Match Individual</div>
			<div class="orderBtn" onclick="window.location='matchFamily.php'">???????????? Match Family</div>
		</div>
	</div>
</body>
</html>