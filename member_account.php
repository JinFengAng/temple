<?php 
include('config.php'); 
session_start();

if(!isset($_SESSION['username'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="assets/css/main.css" />
	<style type="text/css">
		td {
			height: 35px;
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
		      <li><a href="logout.php">Logout登出</a></li> 
		      
		    </ul>
		  </div>
		</nav>
<!-- view account -->
	<div>
		<div style="font-size:18px;">
			<h2 style="text-align: center;color: black; ">Member Information</h1>
			<table border="2px" style="margin-left:30%; border:round;width: 35%; height:50%;">
				<?php
					$id = $_SESSION['member_id'];
					// echo $id;
					$sql = "SELECT * FROM member where member_id = '".$id."'";
					$result = $conn->query($sql);
					 if ($result->num_rows > 0){
					 	$rows = $result->fetch_assoc();
					?>
				<tr>
					<td>用户ID Member ID:</td>
					<td></td>
					<td>THK<?php echo sprintf('%08d', $rows['member_id']) ?></td>
				</tr>
				<tr>
					<td>用户名 Username: </td>
					<td></td>
					<td><?php echo $rows['mem_name'] ?></td>
					
				</tr>
				<tr>
					<td>姓名（中）Name: </td>
					<td></td>
					<td><?php echo $rows['mem_cname'] ?></td>
				</tr>
				<tr>
					<td>地址 Address:</td>
					<td></td>
					<td><?php echo $rows['mem_address'] ?></td>
				</tr>
				<tr>
					<td>地址（中）Chinese Address:</td>
					<td></td>
					<td><?php echo $rows['mem_caddress'] ?></td>
				</tr>
				<tr>
					<td>州 State:</td>
					<td></td>
					<td><?php echo $rows['mem_state'] ?></td>
				</tr>
				<tr>
					<td>城市 City:</td>
					<td></td>
					<td><?php echo $rows['mem_city'] ?></td>
				</tr>
				<tr>
					<td>国家 Country: </td>
					<td></td>
					<td><?php echo $rows['mem_country']?></td>
				</tr>
				<tr>
					<td>性别 Gender:</td>
					<td></td>
					<td><?php echo $rows['mem_gender']?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td></td>
					<td><?php echo $rows['email'] ?></td>
				</tr>
				<tr>
					<td>电话号码 Phone Number:</td>
					<td></td>
					<td><?php echo $rows['mem_phone'] ?></td>
				</tr>
				<tr>
					<td>家庭关系 Family Rationship:</td>
					<td></td>
					<td><?php echo $rows['mem_familyship']?></td>
				</tr>
				<tr>
					<td>生日 Birthday:</td>
					<td></td>
					<td><?php echo $rows['mem_birthday'] ?></td>
				</tr>	
				<tr>
					<td>农历生日 Chinese Birthday:</td>
					<td></td>
					<td><?php echo $rows['mem_cbirth'] ?></td>
				</tr>
				<tr>
					<td>农历生日（月份）Chinese Birthday month:</td>
					<td></td>
					<td><?php echo $rows['mem_cbirthmonth'] ?></td>
				</tr>
				<tr>
					<td>农历生日 （年份）Chinese Birthday year:</td>
					<td></td>
					<td><?php echo $rows['mem_cbirthyear'] ?></td>
				</tr>			
					
			</table>
			<?php
				};
			?>
		</div>
		<br>;
	<div style="text-align:left;margin-left: 35%;">
			<a href="editProfile.php"><input type="submit" name="" value="Edit Profile"></a>
			<a href="familymem.php"><input type="submit" name="" value="Family member"></a>
			<a href="matchMemFamily.php"><input type="button" name="" value="Match"></a>
			<a href="homemember.php"><input type="button" name="" value="Back"></a>
	</div><!-- button end -->
</div>	
</body>
</html>