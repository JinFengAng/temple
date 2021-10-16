<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include('config.php');
		session_start();
	?>
</head>
<body>
	<div>
	<br><br>
		<h3 style="margin-left:10%;">Staff Login  登入职员</h3>
		<hr />	
		<?php
			if (ISSET($_POST['login'])) {
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$query = mysqli_query($conn,"SELECT * from admin where admin_name='$username' AND password='$password'")or die(mysqli_error($conn));
				if (mysqli_num_rows($query) == 1) {
					$row = mysqli_fetch_array($query);
					$_SESSION['admin']=$username;
					$_SESSION['admin_id']=$row['admin_id'];
					echo "<script>window.location.href='home.php';</script>";
					
					 //echo'<script>alert("'.$_SESSION['username'].'");</script>';
				}else {
					echo "<script>alert('Username Or Password incorrect.');</script>";	
				}
			}
		?>
		<form style="margin-left:10%;" action="" method="post">
				Admin Name: 
				<input type="text" name="username" placeholder="Admin name" style="text-align:center;"><br><br>
				Password: 
				<input type="password" name="password" placeholder="Password" style="text-align:center;"><br><br>
				<button type="submit" name="login" style="margin-left:7.5%;">Login 登入</button><br>
				<a href="login.php">Member Login 登入会员</a>
				
		</form>
	</div>
	</div>
	<br>
</body>
</html>