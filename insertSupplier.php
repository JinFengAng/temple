<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}

?>

<?php
if(isset($_POST['submit'])){
	$name = $_POST["name"];
	$supname=$_POST["supname"];
	$supphone=$_POST["supphone"];
	$phonenumber = $_POST["phonenumber"];
	$address = $_POST["address"];
	$email = $_POST["email"];

	$sql = "INSERT INTO supplier (sup_name,sup_phone,company_name,company_phone,company_address,company_email) VALUES ('$supname','$supphone','$name','$phonenumber','$address','$email')";
	if($conn->query($sql)){
		echo "<script>alert('New Supplier has been inserted successfully')</script>";
		echo "<script>window.location.href='supplier.php'</script>";
	}else{
		echo "<script>alert('Something went wrong!Please Try Again!')</script>";
		echo "<script>window.location.href='supplier.php'</script>";
	}
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
                <a href="home.php"  >?????? Home</a>
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

	<div style="padding-left: 300px;float: left;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>New Supplier</h2>
			</div>
			<div class="form">			
				<form action="insertSupplier.php" method="POST">
					<fieldset>
						<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Supplier Details</legend>
						<label for="companyName">???????????? Company Name</label>
						<input type="text" name="name" placeholder="Company Name" required>
						<br>
						<label for="companyName">???????????????????????? Supplier Name</label>
						<input type="text" name="supname" placeholder="Supplier Name" required>
						<br>
						<label for="companyName">??????????????? Supplier Phone</label>
						<input type="text" name="supphone" placeholder="Supplier Phone" required>
						<br>
						<label for="phoneNumber">???????????? Company Phone Number</label>
						<input type="text" name="phonenumber" placeholder="Phone Number" required>
						<br>
						<label for="companyAddress">???????????? Company Address</label>
						<input type="text" name="address" placeholder="Company Address" required>
						<br>
						<label for="companyEmail">???????????? Company Email</label>
						<input type="email" name="email" placeholder="Company Email" required>
						<br>
						<input type="submit" name="submit">
						<a href="supplier.php">?????? Cancel</a>					
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>