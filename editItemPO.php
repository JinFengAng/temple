<?php
require('config.php');
session_start();

 if(!isset($_SESSION['admin'])){
  header("Location:loginAdmin.php");
}
$PODetailID = 0;
if(!empty($_GET['PODetailid']))
{
	$_SESSION['PODetailID'] = $_GET['PODetailid'];
	$sql = "SELECT * FROM purchase_detail WHERE podetail_id = '".$_SESSION['PODetailID']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$name = $row['product_name'];
	$quantity = $row['quantity'];
	$productPrice = $row['unitPrice'];	
}
if (isset($_POST['update'])) {
	$PO_id = $_SESSION['POID'];
	$sql = "SELECT * FROM purchase_detail WHERE podetail_id = '".$_SESSION['PODetailID']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$quantity = $row['quantity'];
	$productPrice = $row['unitPrice'];	

	$sql = "SELECT * FROM purchase WHERE PO_id = '$PO_id'";	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentSubTotalPrice = $row['sub_total'];
	$currentTotalOrderPrice = $row['totalprice'];

	$updateItem = $_POST['item'];
	$updateQuantity = $_POST['quantity'];
	$updateUnitPrice = $_POST['unitPrice'];
	$updateTotalOrderPrice = $updateUnitPrice*$updateQuantity;

	$subTotal = $quantity * $productPrice;
	$currentSubTotalPrice = $currentSubTotalPrice - $subTotal;
	$updateSubTotalPrice = $updateUnitPrice*$updateQuantity;
	$updateSubTotalPrice = $currentSubTotalPrice + $updateSubTotalPrice;
	$updateTotalOrderPrice = $updateSubTotalPrice;
	$sql2 = "UPDATE purchase SET sub_Total='$updateSubTotalPrice',totalPrice='$updateTotalOrderPrice' WHERE PO_id = '$PO_id'";
	$conn->query($sql2);
	
	$sql = "UPDATE purchase_detail SET product_name='$updateItem',quantity='$updateQuantity',unitPrice='$updateUnitPrice' WHERE podetail_id='".$_SESSION['PODetailID']."'";

if($conn->query($sql)===TRUE){
		echo "<script> alert('Item updated')</script>";
		echo "<script> window.location='editPO.php?POid=".$_SESSION['POID']."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
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
		input[type=text],input[type=number],input[type=email]{
		    width: 100%;
		    padding: 12px 16px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		}
		.submit {
		    background-color: #4CAF50;
		    border: none;
		    color: white;
		    padding: 16px 32px;
		    text-decoration: none;
		    margin: 4px 2px;
		    cursor: pointer;
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
	
	<div style="padding-left: 300px;float: left;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>PO:Edit Item</h2>
			</div>
			<div class="form">	
				<form action="editItemPO.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Item Details</legend>
						<label>Item ID</label>
						<input type="hidden" name="PODetailID" placeholder="Item Name" value="<?php echo $PODetailID;?>">
						<br>
						<label>Item Name</label>
						<input type="text" name="item" placeholder="Item Name" value="<?php echo $name;?>" required>
						<label>Quantity</label>
						<input type="number" name="quantity" placeholder="Quantity" min="1" value="<?php echo $quantity;?>" required>
						<label>Product Price Per Unit(RM)</label>
						<input type="number" name="unitPrice" placeholder="Price" step="any" value="<?php echo $productPrice;?>" required>


						<input type="submit" name="update" class="submit" value="Update">
						<a href="editPO.php?POid=<?php echo $_SESSION['POID'];?>">Cancel</a>
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>