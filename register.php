<?php
		include('config.php');
		session_start();
	?>
	<?php
		if(mysqli_connect_errno($conn)){
			echo 'Failed to connect to database : '.mysqli_connect_error($conn);
		}else{
			if(ISSET($_POST['submit'])){
				$username = $_POST['username'];
				$usercname =$_POST['usercname'];
				$birthday = $_POST['birthday'];
				$cbirthday = $_POST['cbirthday'];
				$cbirthdayyear =$_POST['cbirthdayyear'];
				$cbirthdaymonth =$_POST['cbirthdaymonth'];
				$gender=$_POST['gender'];
				$relationship=$_POST['relationship'];
				$phoneNumber = $_POST['phoneNumber'];
				$address = $_POST['address'];
				$address1 = $_POST['address1'];
				$caddress = $_POST['caddress'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$country = $_POST['country'];
				$password1 = $_POST['password1'];
				$password2 = $_POST['password2'];				
				$email = $_POST['email'];
				
				
				if($password1 == $password2){
					$password = $password2;
					$insert = mysqli_query($conn,"INSERT INTO member(mem_name,mem_cname,password,mem_birthday,mem_cbirth,mem_cbirthmonth,mem_cbirthyear,mem_gender,mem_familyship, email,mem_address,mem_caddress,mem_address1,mem_phone,mem_country,mem_state, mem_city)VALUES('$username','$usercname','$password','$birthday','$cbirthday','$cbirthdaymonth','$cbirthdayyear','$gender','$relationship','$email','$address','$address1','$caddress','$phoneNumber','$country','$state','$city')") or die(mysqli_error($conn));
					if($insert){
						$_SESSION['username'] = $username;
						$getID = mysqli_query($conn,"SELECT member_id FROM member WHERE mem_name='$username'");
						$getCustomerID = mysqli_fetch_array($getID);
						$member_id = $getCustomerID;
						$_SESSION['member_id'] = $member_id;
						echo '<div>Register successfully</div>';
						echo '<script>window.location.href="login.php";</script>';
					}else{
						echo '<div>Register fail</div>';
					}
				} else{
					echo '<div>Password is do not match</div>';
				}
			}
		}
		?>
	<meta charset="UTF-8">
	 <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
	<style type="text/css">
		body{
			 background-size: cover;
			 background-color:white;
		}
		
	</style>
</head>
<body>
	 <div class="">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form ction="register.php" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">用户名 username: </label>
                                    <input class="input--style-4" type="text" name="username" placeholder="UserName"required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">姓名（中）Name(chinese):</label>
                                    <input class="input--style-4" type="text" name="usercname"placeholder="姓名"required>
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">密码 Password: </label>
                                    <input class="input--style-4" type="password" name="password1" placeholder="密码"required>    
                                </div>
                            </div>
                                <div class="col-2">
                                	<div class="input-group">
	                                    <label class="label">确认密码 Comfirm Password: :</label>
	                                    <input class="input--style-4" type="password" name="password2"placeholder="确认密码"required>
                                	</div>
                            </div>
                        </div>
                        	 <div class="col-2">
                                <div class="input-group">
                                    <label class="label">性别 Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male 男
                                            <input type="radio" checked="checked" name="gender"value="male" id="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female 女
                                            <input type="radio" name="gender"value="female" id="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                               	 </div>
                             </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">邮件 Email</label>
                                    <input class="input--style-4" type="email" name="email" placeholder="Email@email.com"required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">电话号码 Phone Number</label>
                                    <input class="input--style-4" type="tel" name="phoneNumber" placeholder="010-1234567">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">地址（英）Address:</label>
                                    <input class="input--style-4" type="text" name="address" placeholder="Address">
                                     <input class="input--style-4" type="text" name="address1" placeholder="Taman">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">地址（中）Chinese Address: </label>
                                    <input class="input--style-4" type="text" name="caddress" placeholder="地址">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">城市 City: </label>
                                    <input class="input--style-4" type="text" name="city" placeholder="jb">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">州 State: </label>
                                    <input class="input--style-4" type="text" name="state" placeholder="Johor">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">国家 Country: </label>
                                    <input class="input--style-4" type="text" name="country" placeholder="Malaysia">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">家庭关系 Family Relationship:</label>
                                    <input class="input--style-4" type="text" name="relationship" placeholder="妈妈"required>
                                </div>
                            </div>
                        </div>
                        <h4>if you don't know your chinese birthday ,month and year,please click on the website to view</h4>
			
									<h4>如果您不知道您的农历生日，月份和年份，麻烦您按一下的网站查看</h4>
						<a href="https://gonglinongli.51240.com/" target="_blank">check your chinese birthday</a>
							<br>
							<br>
                          <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">生日 Birthday: </label>
                                    <input class="input--style-4" type="date" name="birthday" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">农历生日 Chinese Birthday:</label>
                                    <input class="input--style-4" type="text" name="cbirthday" placeholder="">
                                </div>
                            </div>
                        </div>
	                        <div class="input-group">
	                            <label class="label">农历生日（月份）Chinese Birthday month:</label>
	                            <div class="rs-select2 js-select-simple select--no-search">
	                                <select name="cbirthdaymonth" required>
	                                    <option disabled="disabled" selected="selected">Select month</option>
		                                    <option value="一月">一月</option>
											<option value="二月">二月</option>
											<option value="三月">三月</option>
											<option value="四月">四月</option>
											<option value="五月">五月</option>
											<option value="六月">六月</option>
											<option value="七月">七月</option>
											<option value="八月">八月</option>
											<option value="九月">九月</option>
											<option value="十月">十月</option>
											<option value="十一月">十一月</option>
											<option value="十二月">十二月</option>
                                         <!--    <option value="">other 其他</option> -->
	                                </select>
                                    <!-- <select>
                                        <option value="闰一月">闰一月</option>
                                        <option value="闰二月">闰二月</option>
                                        <option value="闰三月">闰三月</option>
                                        <option value="闰四月">闰四月</option>
                                        <option value="闰五月">闰五月</option>
                                        <option value="闰六月">闰六月</option>
                                        <option value="闰七月">闰七月</option>
                                        <option value="闰八月">闰八月</option>
                                        <option value="闰九月">闰九月</option>
                                        <option value="闰十月">闰十月</option>
                                        <option value="闰十一月">闰十一月</option>
                                        <option value="闰十二月">闰十二月</option>
                                    </select> -->
	                                <div class="select-dropdown"></div>
	                            </div>
	                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">农历生日（年份）Chinese Birthday year:</label>
                                    <input class="input--style-4" type="text" name="cbirthdayyear"required>
                                </div>
                            </div>
                         </div>    
                         <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit 确认 </button>
                           <br> 
                           <br>
                            <button class="btn btn--radius-2 btn--blue" onclick="window.location='index.html'">Back 取消</button>
                        </div>
					</form>
                   
			 	</div>
            </div>
        </div>
    </div>

		
		</div>
	</div>
	<?php
		
	?>
</body>
</html>