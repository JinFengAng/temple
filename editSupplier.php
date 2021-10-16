<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}


if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updatesupname=$_POST['supname'];
	$updatesupphone=$_POST['supphone'];
	$updateTelephone = $_POST['phonenumber'];
	$updateAddress = $_POST['address'];
	$updateEmail = $_POST['email'];
	$supplierID = $_SESSION['supplierID'];
	$sql = "UPDATE supplier SET company_name='$updateName',sup_name='$updatesupname',sup_phone='$updatesupphone',company_phone='$updateTelephone',company_address='$updateAddress',company_email='$updateEmail' WHERE supplier_id='$supplierID'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='supplier.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}


$id=null;
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION['supplierID'] = $id;
}
if($id == null)
{
	header("Location:supplier.php");
}
$sql = "SELECT * FROM supplier where supplier_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['company_name'];
	$supname=$rows['sup_name'];
	$supphone=$rows['sup_phone'];
	$phonenumber = $rows['company_phone'];
	$address = $rows['company_address'];
	$email = $rows['company_email'];
}
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
				<h2>Edit Supplier</h2>
			</div>
			<div class="form">			
				<form action="editSupplier.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Supplier Details</legend>
						<label for="companyName">公司名字 Company Name</label>
						<input type="text" name="name" placeholder="Company Name"  value="<?php echo $name; ?>"required>
						<br>
						<label for="companyName">供应商人（名字） Supplier Name</label>
						<input type="text" name="supname" placeholder="Supplier Name" value="<?php echo $supname; ?>"required>
						<br>
						<label for="companyName">供应商号码 Supplier Phone</label>
						<input type="text" name="supphone" placeholder="Supplier Phone"value="<?php echo $supphone; ?>" required>
						<br>
						<label for="phoneNumber">公司号码 Company Phone Number</label>
						<input type="text" name="phonenumber" placeholder="Phone Number"value="<?php echo $phonenumber; ?>" required>
						<br>
						<label for="companyAddress">公司地址 Company Address</label>
						<input type="text" name="address" placeholder="Company Address"value="<?php echo $address; ?> "required>
						<br>
						<label for="companyEmail">公司邮件 Company Email</label>
						<input type="email" name="email" placeholder="Company Email" value="<?php echo $email; ?>" required>
						<br>
						<input type="submit" name="Update" value="Update">
						<a href="supplier.php">Cancel</a>					
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>