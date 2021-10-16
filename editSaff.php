<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}


if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updateGender=$_POST['gender'];
	$updatePhone=$_POST['phone'];
	$updateAddress = $_POST['address'];
	$updateEmail = $_POST['email'];
	$updatePosition = $_POST['position'];
	$adminID = $_SESSION['admin_id'];

	$sql = "UPDATE admin SET admin_name='$updateName',admin_gender='$updateGender',admin_phone='$updatePhone',admin_address='$updateAddress',admin_email='$updateEmail', admin_position='$updatePosition' WHERE admin_id='$adminID'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='admin.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}


$id=null;
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION['admin_id'] = $id;
}
if($id == null)
{
	header("Location:admin.php");
}
$sql = "SELECT * FROM admin where admin_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['admin_name'];
	$phone=$rows['admin_phone'];
	$gender = $rows['admin_gender'];
	$address = $rows['admin_address'];
	$email = $rows['admin_email'];
	$position = $rows['admin_position'];
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
				<h2>Edit Admin</h2>
			</div>
			<div class="form">			
				<form action="editSaff.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Staff Details</legend>
						<label for="companyName">员工名字 admin Name</label>
						<input type="text" name="name" placeholder="Admin Name"  value="<?php echo $name; ?>"required>
						<br>
						<label for="phoneNumber">联络号码 Contact Phone</label>
						<input type="number" name="phone" placeholder=" Phone"value="<?php echo $phone; ?>" required>
						<br>
						<label for="gender">性别 Gender</label>
						<input type="text" name="gender" placeholder="Gender"value="<?php echo $gender; ?>" required>
						<br>
						<label for="Address">地址 Address</label>
						<input type="text" name="address" placeholder="Company Address"value="<?php echo $address; ?> "required>
						<br>
						<label for="Email">邮件 Email</label>
						<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
						<br>

						<label for="Email">职位 Position</label>
						<input type="text" name="position" placeholder="Position" value="<?php echo $position; ?>" required>

						<br>

						<input type="submit" name="Update" value="Update">
						<a href="admin.php">Cancel</a>					
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>