<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:loginAdmin.php");
}

function filterTable($query){
	$con = mysqli_connect("localhost","root","","temple");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
}

if(isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM supplier WHERE company_name LIKE '%$valueToSearch%'";
    $search_result = filterTable($query);    
}else  {
    $query = "SELECT * FROM supplier";
    $search_result = filterTable($query);
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="utf-8">
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
</head>
<body>
 
<nav id="sidebar">
      <div style="width: 100px;">
        <div class="sidebar-header">
            <h3>Temple System</h3>
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
    
	<div class="center" style="float: left; padding-left: 300px">
		<div style="width: 100%;float: left;height: 50px"><h2 align="center">Supplier System</h2></div>
		<div>
			<button style="float: left;" class="button button1" onclick="window.location='insertSupplier.php'">New Supplier</button>
			<form action="supplier.php" method="POST">
				<input style="border-radius: 5px;margin-left: 20px;" type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
				<input type="submit" name="search" value="Search">
			</form>
		</div>
		<div style="margin:10px 20px;float:left;width: 96%;height:400px;">
			<table border="1" style="border-collapse:collapse;width: 100%;">
				<tr><th colspan="7">Supplier information</th></tr>
				<tr>
                    <th>供应商人ID Supplier ID</th>
					<th>供应商人（名字）Supplier Name</th>
					<th>公司名字 Company Name</th>
					<th>供应商号码 Supplier Phone number</th>
					<th>公司号码 Company Phone Number</th>
					<th>公司地址 Company Address</th>
					<th>公司邮件 Company Email</th>
					<th></th>
				</tr>
				<?php
				if ($search_result->num_rows > 0){
					while($rows = $search_result->fetch_assoc()){
						echo "<tr>";
                        echo "<td>".$rows['supplier_id']."</td>";
						echo "<td>".$rows['sup_name']."</td>";
						echo "<td>".$rows['company_name']."</td>";
						echo "<td>".$rows['sup_phone']."</td>";
						echo "<td>".$rows['company_phone']."</td>";
						echo "<td>".$rows['company_address']."</td>";
						echo "<td>".$rows['company_email']."</td>";
						echo "<td><a href='editSupplier.php?id=".$rows['supplier_id']."'>
						<span class='editBtn'>Edit</span></a>
						<a href='deleteSupplier.php?id=".$rows['supplier_id']."' onclick=\"return confirm('Are you sure you want to delete this?')\">
						<span class='deleteBtn'>Delete</span></a></td>";
						echo "</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>