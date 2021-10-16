<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}
$id=null;
if(!empty($_GET['id'])){
	$id = $_GET['id'];
}

if($id==null){
	header("Location: Stock.php");
}
$uploads_dir = "images/";
if(isset($_POST['Update'])){
	$stockname= $_POST['stockname'];
	$quantity = $_POST['quantity'];
	$price= $_POST['price'];
	$totalprice= $quantity*$price;
	$stockdate=$_POST['stockdate'];

	
		//-----------------flie upload-----------------------
	$sql="UPDATE stock SET  quantity='$quantity', product_name='$stockname', stock_date = '$stockdate', price='$price', total_price='$totalprice' WHERE stock_id='$id'";
	if($conn->query($sql)===TRUE){
		echo "<script> alert('Stock updated')</script>";
		echo "<script>window.location='Stock.php';</script>";
	}else{
		echo "Error: ".$sql."<br>".$conn->error; 
	}

}


$sql = "SELECT * FROM stock WHERE stock_id=$id";
$result = $conn->query($sql);
if($result->num_rows>0){
	$rows = $result->fetch_assoc();
}
?>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styleform.css">
<style type="text/css">
	.form{
		position: relative;
		height: 430px;
		overflow-y: auto;
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

	<div style="padding-left: 300px;float: left;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Edit Product details 改货品的资料</h2>
			</div>
			<div class="form">			
				<form action="editstock.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Product Details</legend>
						<input type="hidden" name="stock ID" value="<?php echo $rows['stock_id'];?>">
						<label for="stockname">Product Name</label>
						<input type="text" name="stockname" value="<?php echo $rows['product_name'];?>" required>
						<br>
						<br>
						<label for="quantity">Quantity</label>
						<input type="number" name="quantity" value="<?php echo $rows['quantity']?>" required>
						<br>
						<br>
						<label for="price">Price (RM):</label>
						<input type="number" name="price" value="<?php echo $rows['price']?>" required>
						<br>
						<br>
						<label for="totalprice">Total Price (RM):</label>
						<input type="hidden" name="totalprice" value="<?php echo $rows['total_price']?>" required>
						<br>
						<br>
						<label for="stockdate">Date日期 :</label>
						<input type="date" name="stockdate"  required>
						<br>
						<br>
						<input type="submit" name="Update" value="Update">
						<a href="Stock.php">Cancel 取消</a>					
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>