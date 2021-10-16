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

<script type="text/javascript">
  <?php 
    function filterTable($query){
	$con = mysqli_connect("localhost","root","","temple");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
	}

if(isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
			    // search in all table columns
			    // using concat mysql function
    $query = "SELECT * FROM stock WHERE product_name LIKE '%$valueToSearch%' ORDER BY stock_id";
    $search_result = filterTable($query);    
}else  {
    $query = "SELECT * FROM stock ORDER BY stock_id";
    $search_result = filterTable($query);
}
  ?>
</script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
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
</nav>

	<div style="margin-left: 20%;float: left;">
		<div style="float: left;height: 85px"><h2 align="center">Stock System 货品系统</h2></div>
		<form action="Stock.php" method="POST">
			<input style="border-radius: 5px;margin-left: 20px;" type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
			<input type="submit" name="search" value="Search">
		</form>
		<div style="float: right;">
			<button class="button button1" onclick="window.location='insertStock.php'">Add Product 加货品</button>
		</div>
		
		<div style="float:left;width: 120%;height:500px;overflow-y: auto;">
			<table border="1" style="background-color: white;border-collapse:collapse;width: 100%;">
				<tr><th colspan="8">Product information 货品资料</th></tr>
				<tr>
					<th>Stock ID</ th>
					<th>Product Name 货品名字</th>
					<th>Quantity数量</th>
					<th>Unit Price(RM)每数价钱</th>
					<th>Total Price(RM)总数价钱</th>
                    <th>Date 日期</th>
					<th>Actions</th>
				</tr>
				<?php
					while($rows = $search_result->fetch_assoc()){
					?>
						<tr>
						<td><?php echo $rows['stock_id']; ?></td>
						<td><?php echo $rows['product_name']; ?></td>
						<td><?php echo $rows['quantity']; ?></td>
						<td>RM <?php echo $rows['price']; ?></td>
						<td>RM<?php echo $rows['total_price']; ?></td>
                        <td><?php echo $rows['stock_date']; ?></td>

						<td><a href='editstock.php?id=<?php echo $rows['stock_id']; ?>'><span class="editBtn">Edit</span></a><a href="deletestock.php?id=<?php echo $rows['stock_id'];?>"><span class="deleteBtn">Delete</span></a></td>
						</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>