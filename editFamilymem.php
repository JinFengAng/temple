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
		      <li><a href="homemember.php">Home ??????</a></li>
		      <li><a href="aboutus.php">About Us&History????????????&?????? </a></li>
		      <li><a href="godhistory.php">God History???????????? </a></li>         
		     
		      <li><a href="contactus.php">Contact Us ????????????</a></li> 
		      
		      <li><a href="member_account.php">Member Account ????????????</a></li>
		      <li><a href="logout.php"  style="text-align: right">Logout??????</a></li> 
		      
		    </ul>
		  </div>
		</nav>

	<div style="width: 100%;height: 545px;float:left; text-align: center;">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>Edit Member Family Detail ?????????????????????</h2>
			</div>
			<div class="form">			
				<form action="editFamilymem.php" method="POST">
					<fieldset>
						<label>Member ID:</label>
						<input type="text" name="member_id" readonly="readonly" value="THK<?php echo sprintf('%08d', $_SESSION['member_id']) ?>">
						<br>
						
						<label for="familyName" >?????? Family Name:</label>
						<input type="text" name="name" placeholder="Family Name"  value="<?php echo $name; ?>"required>
						<br>
						<label for="cname">Family Chinese Name:</label>
						<input type="text" name="cname" placeholder="Chinese Name" value="<?php echo $cname; ?>"required>
						<br>
						<label for="phonenumber">?????? Phone Number:</label>
						<input type="text" name="phonenumber" placeholder="Phone Number"value="<?php echo $phonenumber; ?>" required>
						<br>
						<label for="phoneNumber">???????????? Member Family Relationship:</label>
						<input type="text" name="familyship" placeholder="Phone Number"value="<?php echo $familyship; ?>" required>
						<br>
						<label for="gender" value="<?php echo $gender; ?>">?????? Gender???</label>
							<input type="radio" id="male" name="gender" value="male" <?php if($gender == 'male'){ echo 'checked'; } ?> >
  							<label for="male" style="color: black;">Male ???</label>
  							<input type="radio" id="female" name="gender" value="female" <?php if($gender == 'female'){ echo 'checked';} ?>>
 				 			<label for="female" style="color: black;">Female ???</label><br></p>

						<label for="birthday">?????? Birthday???</label>
						<input type="text" name="birthday"  value="<?php echo $birthday; ?>" required>
						<br>
						
						<label for="Cbirth">???????????? Chinese Birthday???</label>
						<input type="text" name="Cbirth" placeholder="chinese birthday" value="<?php echo $Cbirth; ?>" required>
						<br>
						<label for="cbirthmonth" >????????????????????????Chinese Birthday Month</label>
						<select name="cbirthmonth" style="color: black;text-align: center;" value="<?php echo $cbirthmonth; ?>"  required>
							<option value="">Select month</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="??????" <?php if($cbirthmonth == '??????'){ echo 'selected'; } ?>>??????</option>
							<option value="?????????" <?php if($cbirthmonth == '?????????'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '?????????'){ echo 'selected'; } ?>>?????????</option>
						</select>
						<br>
						<label for="cbirthyear">????????????????????????Chinese Birthday Year:</label>
						<input type="text" name="cbirthyear" placeholder="birthday year" value="<?php echo $cbirthyear; ?>" required>
						<br>
						<!-- <label>Other Month???????????????</label>
						<select name="cbirthmonth" style="color: black" value="<?php echo $cbirthmonth; ?>">
							<option value="">Select month</option>
							<option value="?????????" <?php if($cbirthmonth == '1'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '2'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '3'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '4'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '5'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '6'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '7'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '8'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '9'){ echo 'selected'; } ?>>?????????</option>
							<option value="?????????" <?php if($cbirthmonth == '10'){ echo 'selected'; } ?>>?????????</option>
							<option value="????????????" <?php if($cbirthmonth == '11'){ echo 'selected'; } ?>>????????????</option>
							<option value="????????????" <?php if($cbirthmonth == '12'){ echo 'selected'; } ?>>????????????</option>
						</select> -->
						<br>
						<label for="married">???????????? Married:</label>	
							<input type="radio" id="married" name="married" value="1" >
  							<label for="married" style="color: black;">??????</label>
  							<input type="radio" id="unmarried" name="married" value="0" >
  							<label for="unmarried" style="color: black;">??????</label>
  						<br>
						<label for="died">Death:</label>	
							<input type="radio" id="died" name="died" value="1" >
  							<label for="died" style="color: black;">?????????</label>
  							<input type="radio" id="alive" name="died" value="0" >
  							<label for="alive" style="color: black;">??????</label>
						<br>
						<input type="submit" name="Update" value="Update??????">
						<button onclick="window.location='familymem.php'">?????? Cancel</button>
										
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>