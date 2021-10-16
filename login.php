<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include('config.php');
		session_start();
	?>

	<style type="text/css">
		html { height: 100% }
			::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
			::selection { background: #fe57a1; color: #fff; text-shadow: none; }
			body { background-image: radial-gradient( cover, rgba(92,100,111,1) 0%,rgba(31,35,40,1) 100%), url('http://i.minus.com/io97fW9I0NqJq.png') }
			.login {
			  background: #eceeee;
			  border: 1px solid #42464b;
			  border-radius: 10px;
			  height: 290px;
			  margin-left: 30%;
			  width: 300px;
			}
			.login h1 {
			  background-image: linear-gradient(top, #f1f3f3, #d4dae0);
			  border-bottom: 1px solid #a6abaf;
			  border-radius: 6px 6px 0 0;
			  box-sizing: border-box;
			  color: #727678;
			  display: block;
			  height: 43px;
			  font: sans-serif;
			  margin: 0;
			}
			input[type="password"], input[type="text"] {
			  background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
			  border: 1px solid #a1a3a3;
			  border-radius: 4px;
			  box-shadow: 0 1px #fff;
			  box-sizing: border-box;
			  color: #696969;
			  height: 39px;
			  margin: 31px 0 0 29px;
			  padding-left: 37px;
			  transition: box-shadow 0.3s;
			  width: 240px;
			}
			input[type="password"]:focus, input[type="text"]:focus {
			  box-shadow: 0 0 4px 1px rgba(55, 166, 155, 0.3);
			  outline: 0;
			}
			.show-password {
			  display: block;
			  height: 16px;
			  margin: 26px 0 0 28px;
			  width: 87px;
			}
			.forgot:hover { color: #3b3b3b }
			input[type="submit"] {
			  width:240px;
			  height:35px;
			  display:block;
			  font-family:Arial, "Helvetica", sans-serif;
			  font-size:16px;
			  font-weight:bold;
			  color:#fff;
			  text-decoration:none;
			  text-transform:uppercase;
			  text-align:center;
			  text-shadow:1px 1px 0px #37a69b;
			  padding-top:6px;
			  margin: 29px 0 0 29px;
			  position:relative;
			  cursor:pointer;
			  border: none;  
			  background-color: #37a69b;
			  background-image: linear-gradient(top,#3db0a6,#3111);
			  border-top-left-radius: 5px;
			  border-top-right-radius: 5px;
			  border-bottom-right-radius: 5px;
			  border-bottom-left-radius:5px;
			  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
			}

		body{
			
			 background-size: cover;
			 background-color:white;
		}

	</style>
</head>
<body>
	
	<div style="text-align:center;">
	<br><br>
		<h3 style="margin-left: :100%;">Member Login</h3>
		<hr />	
		<?php
			if (ISSET($_POST['login'])) {
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$query = mysqli_query($conn,"SELECT * from member where mem_name='$username' AND password='$password'")or die(mysqli_error($conn));
				if (mysqli_num_rows($query) == 1) {
					$row = mysqli_fetch_array($query);
					$_SESSION['username']=$username;
					$_SESSION['member_id']=$row['member_id'];
					echo "<script>window.location.href='homemember.php';</script>";
					
					 //echo'<script>alert("'.$_SESSION['username'].'");</script>';
				}else {
					echo "<script>alert('Username Or Password incorrect.');</script>";	
				}
			}
		?>
		<form style="margin-left:10%;" action="login.php" method="POST">
			<div class="login">
				<label>Username 用户名 </label>
			    <input type="text" placeholder="Username" name="username">
			    <br>
			    <label>Password 密码</label>  
			  	<input type="password" placeholder="password" name="password">  
			 			 <!-- <a href="#" class="forgot">Forgot password? 忘记密码</a> -->
			  			<input type="submit" name="login" value="Sign In 登入">
			  			<br>
			  			<br>
			  			<br>
			  			<a href="register.php">没有会员吗？请注册</a><br>
						<!-- <a href="forgetpassword.php ">Forget Password 忘记密码</a><br> -->
			  			<a href="loginAdmin.php">Admin Login 登入职员</a><br>
			  			<a href="index.html">Home 首页</a>
			</div>	
		</form> 
	</div>
	</div>
	<br>
</body>
</html>