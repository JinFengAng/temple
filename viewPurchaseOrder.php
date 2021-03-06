<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}
$sql = "SELECT * FROM purchase LEFT JOIN supplier ON purchase.supplier_id = supplier.supplier_id";
$result = $conn->query($sql);

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
</style>
<meta charset="utf-8">
	<style type="text/css">
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
                <a href="home.php" >?????? Home</a>
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
	</div>
	<div style="padding-left: 300px;float: left;">
		<div style="width: 100%;float: left;height: 50px"><h2 align="center">Purchase Order ????????????</h2></div>
		<div style="margin:10px 20px;float:left;width: 96%;height:465px;overflow-y: auto;">
			<table border="1" style="background-color: white;border-collapse:collapse;width: 100%;">
				<tr><th colspan="5">Purchase Order</th></tr>
				<tr>
					<th>PO No</th>
					<th>Supplier</th>
					<th>Total Price</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php
				if ($result->num_rows > 0){
					while($rows = $result->fetch_assoc()){
						echo "<tr>";
						echo "<td>PO".$PONO = sprintf('%05d',$rows['PO_id'])."</td>";
						echo "<td>".$rows['company_name']."</td>";
						echo "<td>RM".$rows['totalprice']."</td>";
						echo "<td>".$rows['status']."</td>";
						echo "<td><a href='reviewPO.php?POid=".$rows['PO_id']."'>
						<span class='editBtn'>Review PO</span></a>";
						if ($rows['status'] == "Waiting for confirmation") {
							echo "<a href='editPO.php?POid=".$rows['PO_id']."'>
							<span class='editBtn'>Edit PO</span></a>
							<a href='createDO.php?POid=".$rows['PO_id']."'>
							<span class='editBtn'>Confirm</span></a>";
						}else if($rows['status'] == "awaiting delivery"){
							echo "
							<a href='createDO.php?POid=".$rows['PO_id']."'>
							<span class='editBtn'>Recieved</span></a>";
						}
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