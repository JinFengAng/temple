<?php
include('config.php');
session_start();
if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}

	if(isset($_POST['submit'])){
		
		$password=$_POST["pass"];
		$cpassword=$_POST["cpass"];	
		$name=$_POST["name"];	
		$address=$_POST["address"];	
		$contact=$_POST["contact"];	
		$email=$_POST["email"];
		$gender=$_POST["gender"];	
		$position =$_POST["position"];
		
		$sql=("INSERT into admin (admin_name,password,admin_address,admin_phone,admin_email,admin_gender,admin_position) values('$name','$password','$address','$contact','$email','$gender','$position')");
	  	if($conn->query($sql)){
		echo "<script>alert('New admin inserted successfully')</script>";
		echo "<script>window.location.href='admin.php'</script>";
		}else{
			echo "<script>alert('Something went wrong!Please Try Again!')</script>";
			echo "<script>window.location.href='admin.php'</script>";
		}
	}
?> 

<html>
<head>
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
<link rel="shortcut icon" href="OBS/images/ico/red_cross_outline.png">
	<title>Add Staff</title>
<link href="Css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
//confirm password
function validate(){
	
	var password = document.getElementById("pass") ;
	var confpassword = document.getElementById("cpass") ;
	
	if(password.value != confpassword.value) {
		alert("Passwords do no match");

	return false;
	}else{
		return true;
	}
	
}
</script>
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


<div style="float: left; padding-left: 300px">
	<h1>新员工 New Staff</h1>
	<form name="form" method="POST" action="addstaff.php" onSubmit="return validate()">
		<?php
			date_default_timezone_set("Asia/Kuala_Lumpur");
		?>

		
		<div class="form-group">
			<label>名字 AdminName</label>
			<input type="text" class="form-control" name="name"/>
		</div>
		<div class="form-group">
			<label>密码 Password </label>
			<input type="password" class="form-control" name="pass" id="pass" required/>
		</div>
		<div class="form-group">
			<label>确认密码 Confirm Password </label>
			<input type="password" class="form-control" name="cpass" id="cpass"/>
		</div>
		
		<div class="form-group">
			<label>地址 Address </label>
			<textarea name="address" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label>联络号码 Contact Number </label>
			<input type="text" class="form-control" name="contact"/>
		</div>
		<div class="form-group">
			<label>邮件 Email </label>
			<input type="text" class="form-control" name="email"/>
		</div>
		<div class="form-group">
			<label>性别 Gender </label>
			<select name="gender" class="form-control">
				<option value=""></option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		<div class="form-group">
			<label>职位 position </label>
			<input type="text" class="form-control" name="position"/>
		</div>
		
		<div class="form-group">
			<input type="submit" value="Submit" id="submit" name="submit">
			<input type="reset" value="Reset"/>
			<a href="admin.php">Cancel</a>
		</div>
	</form>
</div>	
</body>
</html>