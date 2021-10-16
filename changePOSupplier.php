<?php
	require('config.php');
	session_start();
	if(!isset($_SESSION['username'])){
	//header("Location:loginAdmin.php");
}
	if(!empty($_GET['POid']))
	{
		$PURCHASEORDERID = $_GET['POid'];
		$_SESSION['editPOID'] = $PURCHASEORDERID;
	}
	if($PURCHASEORDERID == null)
	{
		header("Location:viewPurchaseOrder.php");
	}
	$sql = "SELECT * FROM purchase LEFT JOIN supplier ON supplier.supplier_id = purchase.supplier_id WHERE PO_id='$PURCHASEORDERID'";
	$result = $conn->query($sql);
	while($rows = $result->fetch_assoc()){
		$company_name = $rows['company_name'];
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
	
	<div style="padding-left: 300px;float: left width:300px;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Change Supplier</h2>
			</div>
			<div class="form">			
				<form action="changePOSupplierDB.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Supplier Details</legend>
						<label>Current Supplier: <?php echo $company_name;?></label><br><br>
						<label>Select New Supplier</label>
						<div>
							<select style="margin-left: 9px;width: 12%;margin-bottom: 10px;" name="newSupplier">
								<?php
								//mysqli selecty query for category
								$sql = "SELECT supplier_id, company_name FROM supplier";
								$result = $conn->query($sql);

								while($row3 = $result->fetch_array()){
									$id = $row3['supplier_id'];
									$name = $row3['company_name'];
								?>
								<option value="<?php echo $id; ?>" <?php if($company_name == $name) echo "selected";?>><?php echo $name; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<input type="submit" name="submit">
						<a href="editPO.php?POid=<?php echo $PURCHASEORDERID;?>">Cancel</a>					
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>