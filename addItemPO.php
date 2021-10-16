<?php
require('config.php');
session_start();
//if(!isset($_SESSION['username'])){
//	header("Location:loginAdmin.php");
//}
if(!empty($_GET['POid']))
{
	$purchaseOrder_id = $_GET['POid'];

}

if(isset($_POST['submit'])){ 

	$item = $_POST['item'];
	$quantity = $_POST['quantity'];
	$unitPrice = $_POST['unitPrice'];
	$sql = ("INSERT INTO purchase_detail (product_name, quantity, unitPrice, PO_id) VALUES ('$item', '$quantity', '$unitPrice', '".$_SESSION['POID']."')");
	$conn->query($sql);
	$sql = "SELECT * FROM purchase WHERE PO_id = '".$_SESSION['POID']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentSubTotalPrice = $row['sub_total'];
	$currentTotalOrderPrice = $row['totalprice'];

	$updateSubTotalPrice = $quantity*$unitPrice;
	$updateSubTotalPrice = $currentSubTotalPrice + $updateSubTotalPrice;
	$updateTotalOrderPrice = $updateSubTotalPrice;

	$sql = "UPDATE purchase SET sub_total='$updateSubTotalPrice',totalPrice='$updateTotalOrderPrice' WHERE PO_id = '".$_SESSION['POID']."'";

	if($conn->query($sql)){
		echo "<script>alert('New Item added !')</script>";
		echo "<script>window.location.href='editPO.php?POid=".$_SESSION['POID']."'</script>";
		}else{
			echo "<script>alert('Something went wrong!Please Try Again!')</script>";
			echo "<script>window.location.href=editPO.php?POid=".$_SESSION['POID']."'</script>";
		}
	
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<style type="text/css">
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
		    background-color: #4CAF50;
		    border: none;
		    color: white;
		    padding: 16px 32px;
		    text-decoration: none;
		    margin: 4px 2px;
		    cursor: pointer;
		}
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
</head>
<body>
	<nav id="sidebar">
      <div style="width: 100px;">
        <div class="sidebar-header">
            <h2>Temple System</h2>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="home.php" >首页 Home</a>
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
            	<a href="logoutAdmin.php">登出 Logout</a>
            </li>
            
        </ul>    
      </div> 
    </nav>

	<div style="float: left; padding-left: 300px;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>PO:Add New Item</h2>
			</div>
			<div class="form">			
				<form action="addItemPO.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Item Details</legend>
						<label>Item Name</label>
						<input type="text" name="item" placeholder="Item Name" required>
						<label>Quantity</label>
						<input type="number" name="quantity" placeholder="Quantity" min="1" required>
						<label>Product Price Per Unit(RM)</label>			
						<input type="number" name="unitPrice" placeholder="Price" step="any" required>
						<input type="submit" name="submit">
						<a href="editPO.php?POid=<?php echo $_SESSION['POID'];?>">Cancel</a>				
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>