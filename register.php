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
                                    <label class="label">????????? username: </label>
                                    <input class="input--style-4" type="text" name="username" placeholder="UserName"required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">???????????????Name(chinese):</label>
                                    <input class="input--style-4" type="text" name="usercname"placeholder="??????"required>
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">?????? Password: </label>
                                    <input class="input--style-4" type="password" name="password1" placeholder="??????"required>    
                                </div>
                            </div>
                                <div class="col-2">
                                	<div class="input-group">
	                                    <label class="label">???????????? Comfirm Password: :</label>
	                                    <input class="input--style-4" type="password" name="password2"placeholder="????????????"required>
                                	</div>
                            </div>
                        </div>
                        	 <div class="col-2">
                                <div class="input-group">
                                    <label class="label">?????? Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male ???
                                            <input type="radio" checked="checked" name="gender"value="male" id="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female ???
                                            <input type="radio" name="gender"value="female" id="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                               	 </div>
                             </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">?????? Email</label>
                                    <input class="input--style-4" type="email" name="email" placeholder="Email@email.com"required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">???????????? Phone Number</label>
                                    <input class="input--style-4" type="tel" name="phoneNumber" placeholder="010-1234567">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">???????????????Address:</label>
                                    <input class="input--style-4" type="text" name="address" placeholder="Address">
                                     <input class="input--style-4" type="text" name="address1" placeholder="Taman">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">???????????????Chinese Address: </label>
                                    <input class="input--style-4" type="text" name="caddress" placeholder="??????">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">?????? City: </label>
                                    <input class="input--style-4" type="text" name="city" placeholder="jb">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">??? State: </label>
                                    <input class="input--style-4" type="text" name="state" placeholder="Johor">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">?????? Country: </label>
                                    <input class="input--style-4" type="text" name="country" placeholder="Malaysia">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">???????????? Family Relationship:</label>
                                    <input class="input--style-4" type="text" name="relationship" placeholder="??????"required>
                                </div>
                            </div>
                        </div>

                        <h4>if you don't know your chinese birthday ,month and year,please click on the website to view</h4>
						<h4>??????????????????????????????????????????????????????????????????????????????????????????</h4>
						<a href="https://gonglinongli.51240.com/" target="_blank">check your chinese birthday</a>
                        
							<br>
							<br>
                          <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">?????? Birthday: </label>
                                    <input class="input--style-4" type="date" name="birthday" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">???????????? Chinese Birthday:</label>
                                    <input class="input--style-4" type="text" name="cbirthday" placeholder="">
                                </div>
                            </div>
                        </div>
	                        <div class="input-group">
	                            <label class="label">????????????????????????Chinese Birthday month:</label>
	                            <div class="rs-select2 js-select-simple select--no-search">
	                                <select name="cbirthdaymonth" required>
	                                    <option disabled="disabled" selected="selected">Select month</option>
		                                    <option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="??????">??????</option>
											<option value="?????????">?????????</option>
											<option value="?????????">?????????</option>
                                         <!--    <option value="">other ??????</option> -->
	                                </select>
                                    <!-- <select>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="?????????">?????????</option>
                                        <option value="????????????">????????????</option>
                                        <option value="????????????">????????????</option>
                                    </select> -->
	                                <div class="select-dropdown"></div>
	                            </div>
	                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">????????????????????????Chinese Birthday year:</label>
                                    <input class="input--style-4" type="text" name="cbirthdayyear"required>
                                </div>
                            </div>
                         </div>    
                         <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit ?????? </button>
                           <br> 
                           <br>
                            <button class="btn btn--radius-2 btn--blue" onclick="window.location='index.html'">Back ??????</button>
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