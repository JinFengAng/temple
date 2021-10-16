<?php
require('config.php');
session_start();
	if(!isset($_SESSION['username'])){
	  header("Location:login.php");
	}
$memberID = $_SESSION['member_id'];
if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updateCname=$_POST['cname'];
	$updatePhone=$_POST['phone'];
	$updateAddress = $_POST['address'];
	$updateAddress1 = $_POST['address1'];
	$updateEmail = $_POST['email'];
	$updateCAddress = $_POST['caddress'];
	$updateCity = $_POST['city'];
	$updateState = $_POST['state'];
	$updateCountry = $_POST['country'];
	$updateBirthday = $_POST['birthday'];
	$updateCBirthday = $_POST['cbirthday'];
	$updateCBirthmonth = $_POST['cbirthmonth'];
	$updateCBirthyear = $_POST['cbirthyear'];
	$updateFamilyship = $_POST['familyship'];
	$updateGender = $_POST['gender'];
	

	$sql = "UPDATE member SET mem_name='$updateName',mem_cname='$updateCname',mem_phone='$updatePhone',mem_address='$updateAddress',mem_address1='$updateAddress1',email='$updateEmail',mem_caddress='$updateCAddress',mem_city='$updateCity',mem_state='$updateState',mem_country='$updateCountry' ,mem_birthday='$updateBirthday',mem_cbirth='$updateCBirthday',mem_cbirthmonth='$updateCBirthmonth',mem_cbirthyear='$updateCBirthyear',mem_familyship='$updateFamilyship',mem_gender='$updateGender'WHERE member_id='$memberID'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='member_account.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

$id = $_SESSION['member_id'];
$sql = "SELECT * FROM member where member_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['mem_name'];
	$cname= $rows['mem_cname'];
	$phone= $rows['mem_phone'];
	$email= $rows['email'];
	$state= $rows['mem_state'];
	$address = $rows['mem_address'];
	$address1 = $rows['mem_address1'];
	$caddress= $rows['mem_caddress'];
	$city = $rows['mem_city'];
	$country= $rows['mem_country'];
	$gender= $rows['mem_gender'];
	$birthday= $rows['mem_birthday'];
	$cbirthday= $rows['mem_cbirth'];
	$cbirthmonth= $rows['mem_cbirthmonth'];
	$cbirthyear= $rows['mem_cbirthyear'];
	$familyship= $rows['mem_familyship'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="assets/css/main.css" />
	<style>
		.form{
			padding-top: 10px;
		}
		h2{
			color: black;
		}
		label{
			color: black;
			text-align: right;
		}
		input{
			text-align: left;
		}
		button{
			text-align: center;
		}
	</style>
</head>
<body>
	<!-- navigation section -->
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="homemember.php">Temple Managment System</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="homemember.php">Home 首页</a></li>
		      <li><a href="aboutus.php">About Us&History本宫简介&历史 </a></li>
		      <li><a href="godhistory.php">God History神明典故 </a></li>         
		     
		      <li><a href="contactus.php">Contact Us 联系我们</a></li> 
		      
		      <li><a href="member_account.php">Member Account 会员账号</a></li>
		      <li><a href="logout.php" style="text-align:right">Logout登出</a></li> 
		      
		    </ul>
		  </div>
		</nav>

	<div style="height: 545px;">
		<div>
			<div style="width: 100%;">
				<h2>Edit Member Profile</h2>
			</div>
			<div class="form">			
				<form action="editProfile.php" method="POST">
					<fieldset>
						<table>
							<tr>
								<td><label for="companyName">用户名 Username：</label></td>
								<td><input type="text" name="name"   value="<?php echo $name; ?>"readonly></td>
							</tr>
							<tr>
								<td><label for="companyName">姓名（中）Chinese Name：</label></td>
								<td><input type="text" name="cname" placeholder="Chinese Name" value="<?php echo $cname; ?>"required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">地址 Address:</label></td>
								<td><input type="text" name="address" placeholder=" Address"value="<?php echo $address; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">地址 Address:</label></td>
								<td><input type="text" name="address1" placeholder=" Address"value="<?php echo $address1; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">地址(中) Chinese Address:</label></td>
								<td><input type="text" name="caddress" placeholder="地址"value="<?php echo $caddress; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">州 State:</label></td>
								<td><input type="text" name="state" placeholder="Company Address"value="<?php echo $state; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">城市 City:</label></td>
								<td><input type="text" name="city" placeholder="Company Address"value="<?php echo $city; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">国家 Country:</label></td>
								<td><input type="text" name="country" placeholder="Company Address"value="<?php echo $country; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">家庭关系 Family Rationship:</label></td>
								<td><input type="text" name="familyship" placeholder="Company Address"value="<?php echo $familyship; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyName">号码  Phone Number：</label></td>
								<td><input type="text" name="phone" placeholder="Supplier Phone"value="<?php echo $phone; ?>" required></td>
							</tr>
							<tr>
								<td><label for="companyEmail">邮件 Email：</label></td>
								<td><input type="email" name="email" placeholder="Company Email" value="<?php echo $email; ?>" required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">性别 Gender:</label></td>
								<td><input type="radio" id="male" name="gender" value="male" <?php if($gender == 'male'){ echo 'checked'; } ?>>
  									<label for="male" style="color: black">Male 男</label>
  									<input type="radio" id="female" name="gender" value="female" <?php if($gender == 'female'){ echo 'checked';} ?>>
 				 					<label for="female" style="color: black">Female 女</label><br></p>
 				 				</td>
							</tr>
							<tr>
								<td><label for="companyAddress">生日 Birthday:</label></td>
								<td><input type="date" name="birthday" value="<?php echo $birthday; ?>"
									placeholder="dd-mm-yyyy" style="color: black"
        							min="1891-01-01" max="2100-12-31" required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">农历生日 Chinese Birthday:</label></td>
								<td><input type="text" name="cbirthday" placeholder="Company Address" value="<?php echo $cbirthday; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">农历生日（月份） Chinese Birthday (Month):</label></td>
								<td><input type="text" name="cbirthmonth" placeholder="Company Address" value="<?php echo $cbirthmonth; ?> "required></td>
							</tr>
							<tr>
								<td><label for="companyAddress">农历生日(年份) Chinese Birthday(Year):</label></td>

								<td><input type="text" name="cbirthyear" placeholder="Company Address"value="<?php echo $cbirthyear; ?> "required></td>
							</tr>
						</table>
						<br>
						<input type="submit" name="Update" value="Update">
						<button><a href="member_account.php">Cancel</a></button>				
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>