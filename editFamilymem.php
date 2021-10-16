<?php
require('config.php');
session_start();
	if(!isset($_SESSION['username'])){
		header("Location:login.php");
	}

if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updateCname=$_POST['cname'];
	$updatephoneNumber=$_POST['phonenumber'];
	$updateFamilyship = $_POST['familyship'];
	$updateGender = $_POST['gender'];
	$updateBirthday = $_POST['birthday'];
	$updateCbirth = $_POST['Cbirth'];
	$updateCbirthmonth = $_POST['cbirthmonth'];
	$updateCbirthyear = $_POST['cbirthyear'];
	$updatedMarried = $_POST['married'];
	$updatedDied = $_POST['died'];
	$familyID = $_SESSION['family_id'];

	$sql = "UPDATE family SET family_name='$updateName',family_cname='$updateCname',family_phone='$updatephoneNumber',mem_familyship='$updateFamilyship',family_gender='$updateGender',family_birth='$updateBirthday',family_cbirthday='$updateCbirth',family_cbirthmonth='$updateCbirthmonth',family_cbirthyear='$updateCbirthyear', married='$updatedMarried',died='$updatedDied' WHERE family_id='$familyID'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='familymem.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}


$familyID=null;
if(!empty($_GET['id']))
{
	$familyID = $_GET['id'];
	$_SESSION['family_id'] = $familyID;
}
if($familyID == null)
{
	header("Location:familymem.php");
}
$sql = "SELECT * FROM family where family_id = '$familyID'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['family_name'];
	$cname=$rows['family_cname'];
	$phonenumber=$rows['family_phone'];
	$familyship = $rows['mem_familyship'];
	$gender = $rows['family_gender'];
	$birthday = $rows['family_birth'];
	$Cbirth = $rows['family_cbirthday'];
	$cbirthmonth = $rows['family_cbirthmonth'];
	$cbirthyear = $rows['family_cbirthyear'];
	$married= $rows['married'];
	$died= $rows['died'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
	<style type="text/css">
		label {
			color: black;
		}
		h2{
			color: black;
		}
		input{
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
		      <li><a href="logout.php"  style="text-align: right">Logout登出</a></li> 
		      
		    </ul>
		  </div>
		</nav>

	<div style="width: 100%;height: 545px;float:left; text-align: center;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Edit Member Family Detail 改家庭人员资料</h2>
			</div>
			<div class="form">			
				<form action="editFamilymem.php" method="POST">
					<fieldset>
						<label>Member ID:</label>
						<input type="text" name="member_id" readonly="readonly" value="THK<?php echo sprintf('%08d', $_SESSION['member_id']) ?>">
						<br>
						
						<label for="familyName" >名字 Family Name:</label>
						<input type="text" name="name" placeholder="Family Name"  value="<?php echo $name; ?>"required>
						<br>
						<label for="cname">Family Chinese Name:</label>
						<input type="text" name="cname" placeholder="Chinese Name" value="<?php echo $cname; ?>"required>
						<br>
						<label for="phonenumber">号码 Phone Number:</label>
						<input type="text" name="phonenumber" placeholder="Phone Number"value="<?php echo $phonenumber; ?>" required>
						<br>
						<label for="phoneNumber">家庭关系 Member Family Relationship:</label>
						<input type="text" name="familyship" placeholder="Phone Number"value="<?php echo $familyship; ?>" required>
						<br>
						<label for="gender" value="<?php echo $gender; ?>">性别 Gender：</label>
							<input type="radio" id="male" name="gender" value="male" <?php if($gender == 'male'){ echo 'checked'; } ?> >
  							<label for="male" style="color: black;">Male 男</label>
  							<input type="radio" id="female" name="gender" value="female" <?php if($gender == 'female'){ echo 'checked';} ?>>
 				 			<label for="female" style="color: black;">Female 女</label><br></p>

						<label for="birthday">生日 Birthday：</label>
						<input type="text" name="birthday"  value="<?php echo $birthday; ?>" required>
						<br>
						
						<label for="Cbirth">农历生日 Chinese Birthday：</label>
						<input type="text" name="Cbirth" placeholder="chinese birthday" value="<?php echo $Cbirth; ?>" required>
						<br>
						<label for="cbirthmonth" >农历生日（月份）Chinese Birthday Month</label>
						<select name="cbirthmonth" style="color: black;text-align: center;" value="<?php echo $cbirthmonth; ?>"  required>
							<option value="">Select month</option>
							<option value="一月" <?php if($cbirthmonth == '一月'){ echo 'selected'; } ?>>一月</option>
							<option value="二月" <?php if($cbirthmonth == '二月'){ echo 'selected'; } ?>>二月</option>
							<option value="三月" <?php if($cbirthmonth == '三月'){ echo 'selected'; } ?>>三月</option>
							<option value="四月" <?php if($cbirthmonth == '四月'){ echo 'selected'; } ?>>四月</option>
							<option value="五月" <?php if($cbirthmonth == '五月'){ echo 'selected'; } ?>>五月</option>
							<option value="六月" <?php if($cbirthmonth == '六月'){ echo 'selected'; } ?>>六月</option>
							<option value="七月" <?php if($cbirthmonth == '七月'){ echo 'selected'; } ?>>七月</option>
							<option value="八月" <?php if($cbirthmonth == '八月'){ echo 'selected'; } ?>>八月</option>
							<option value="九月" <?php if($cbirthmonth == '九月'){ echo 'selected'; } ?>>九月</option>
							<option value="十月" <?php if($cbirthmonth == '十月'){ echo 'selected'; } ?>>十月</option>
							<option value="十一月" <?php if($cbirthmonth == '十一月'){ echo 'selected'; } ?>>十一月</option>
							<option value="十二月" <?php if($cbirthmonth == '十二月'){ echo 'selected'; } ?>>十二月</option>
						</select>
						<br>
						<label for="cbirthyear">农历生日（年份）Chinese Birthday Year:</label>
						<input type="text" name="cbirthyear" placeholder="birthday year" value="<?php echo $cbirthyear; ?>" required>
						<br>
						<!-- <label>Other Month（闰月）：</label>
						<select name="cbirthmonth" style="color: black" value="<?php echo $cbirthmonth; ?>">
							<option value="">Select month</option>
							<option value="闰一月" <?php if($cbirthmonth == '1'){ echo 'selected'; } ?>>闰一月</option>
							<option value="闰二月" <?php if($cbirthmonth == '2'){ echo 'selected'; } ?>>闰二月</option>
							<option value="闰三月" <?php if($cbirthmonth == '3'){ echo 'selected'; } ?>>闰三月</option>
							<option value="闰四月" <?php if($cbirthmonth == '4'){ echo 'selected'; } ?>>闰四月</option>
							<option value="闰五月" <?php if($cbirthmonth == '5'){ echo 'selected'; } ?>>闰五月</option>
							<option value="闰六月" <?php if($cbirthmonth == '6'){ echo 'selected'; } ?>>闰六月</option>
							<option value="闰七月" <?php if($cbirthmonth == '7'){ echo 'selected'; } ?>>闰七月</option>
							<option value="闰八月" <?php if($cbirthmonth == '8'){ echo 'selected'; } ?>>闰八月</option>
							<option value="闰九月" <?php if($cbirthmonth == '9'){ echo 'selected'; } ?>>闰九月</option>
							<option value="闰十月" <?php if($cbirthmonth == '10'){ echo 'selected'; } ?>>闰十月</option>
							<option value="闰十一月" <?php if($cbirthmonth == '11'){ echo 'selected'; } ?>>闰十一月</option>
							<option value="闰十二月" <?php if($cbirthmonth == '12'){ echo 'selected'; } ?>>闰十二月</option>
						</select> -->
						<br>
						<label for="married">婚姻情况 Married:</label>	
							<input type="radio" id="married" name="married" value="1" >
  							<label for="married" style="color: black;">已婚</label>
  							<input type="radio" id="unmarried" name="married" value="0" >
  							<label for="unmarried" style="color: black;">单身</label>
  						<br>
						<label for="died">Death:</label>	
							<input type="radio" id="died" name="died" value="1" >
  							<label for="died" style="color: black;">已过世</label>
  							<input type="radio" id="alive" name="died" value="0" >
  							<label for="alive" style="color: black;">活着</label>
						<br>
						<input type="submit" name="Update" value="Update更新">
						<button onclick="window.location='familymem.php'">取消 Cancel</button>
										
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>