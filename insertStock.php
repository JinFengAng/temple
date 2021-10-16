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
<?php
if(ISSET($_POST['submit'])){

	$stockname = $_POST['stockname'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$total_price = $quantity*$price;
	$stockdate=$_POST['stockdate'];


	$sql2 = "INSERT INTO stock (product_name, quantity, price, total_price, stock_date) VALUES ('$stockname', '$quantity', '$price', '$total_price', '$stockdate')";
	if($conn->query($sql2)===TRUE){
		echo "<script> alert('New item created')</script>";
		echo "<script> window.location='Stock.php';</script>";
	}
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
				<h2>New Stock 新货品</h2>
			</div>
			<div class="form" >			
				<fieldset>
					<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Product Details</legend>
						<form action="insertstock.php" method="post" enctype="multipart/form-data">
						<label for="stockname">Product Name 货品名字 :</label>
						<input type="text" name="stockname" placeholder="Product Name" required>
						<br>
						<br>
						<label for="quantity">Quantity 数量:</label>
						<input type="number" name="quantity" placeholder="Quantity" required>
						<br>
						<br>
						<label for="price">Selling Price Per Unit(RM)每数价钱:</label>
						<input type="number" name="price" placeholder="Price" required>
						<br>
						<br>
						<label for="stockdate">Date日期 : </label>
						<input type="date" name="stockdate"  required>
						<br>
						<br>
						<input type="submit" vlaue="提交" name="submit">
						<a href="Stock.php">Cancel取消</a>	
						</form>				
					</fieldset>				
			</div>
		</div>		
	</div>
</body>
</html>