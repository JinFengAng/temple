<?php
require('config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:login.php");
}
?>

<?php
if(isset($_POST['submit'])){
	$member_id = $_POST["member_id"];
	$name = $_POST["name"];
	$cname=$_POST["cname"];
	$phone=$_POST["phone"];
	$memberfamilyship = $_POST["memberfamilyship"];
	$gender=$_POST["gender"];
	$birthday=$_POST["birthday"];
	$cbirth=$_POST["cbirth"];
	$cbirthmonth = $_POST["cbirthmonth"];
	$cbirthyear = $_POST["cbirthyear"];
	$married=$_POST['married'];
	$died=$_POST['died'];

	$sql = "INSERT INTO family (member_id, family_name,family_cname,family_phone,mem_familyship,family_gender,family_birth,family_cbirthday,family_cbirthmonth,family_cbirthyear,married,died)
			 VALUES ('$member_id','$name','$cname','$phone','$memberfamilyship','$gender','$birthday','$cbirth','$cbirthmonth','$cbirthyear','$married','$died')";
	if($conn->query($sql)){
		echo "<script>alert('New Member family has been inserted successfully')</script>";
		echo "<script>window.location.href='familymem.php'</script>";
	}else{
		echo "<script>alert('Something went wrong!Please Try Again!')</script>";
		echo "<script>window.location.href='familymem.php'</script>";
	}
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

	<div style="width: 90%;height: 545px; ">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2>New Member Family ???????????????</h2>
			</div>
			<div class="form">			
				<form action="insertFamilymem.php" method="POST">
						<table >
							<tr>
								<td><label>Member ID:</label></td>
								<td><input type="text" readonly="readonly" value="THK<?php echo sprintf('%08d', $_SESSION['member_id']) ?>"></td>
								<td><input type="hidden" name="member_id" value="<?php echo $_SESSION['member_id']; ?>"></td>
							</tr>
							<tr>
								<td><label for="companyName">?????? Family Name:</label></td>
								<td><input type="text" name="name" placeholder="Family Name" required></td>
							</tr>
							<tr>
								<td><label for="companyName">??????(???) Family Chinese Name:</label></td>
								<td><input type="text" name="cname" placeholder="Chinese Name" required></td>
							</tr>
							<tr>
								<td><label for="phoneNumber">?????? Phone Number???</label></td>
								<td><input type="text" name="phone" placeholder="Phone Number" ></td>
							</tr>
							<tr>
								<td><label for="memberfamilyship">???????????? Member Family Relationship???</label></td>
								<td><input type="text" name="memberfamilyship" placeholder="Family Relationship" required></td>
							</tr>
							<tr>
								<td><label for="Gender">?????? Gender???</label></td>
								<td><input type="radio" id="male" name="gender" value="male" checked>
  									<label for="male" style="color: black">Male ???</label>
  									<input type="radio" id="female" name="gender" value="female">
 				 					<label for="female" style="color: black">Female ???</label></td>
							</tr>
							<tr>
								<td><label for="birthday">?????? Birthday: </label></td>
								<td><input type="date" name="birthday" placeholder="" style="color: black" required></td>
							</tr>
							
						</table>


						<table>
							
							<h4 style="color: black">if you don't know your chinese birthday ,month and year,please click on the website to view</h4>
		
								<h4 style="color: black">??????????????????????????????????????????????????????????????????????????????????????????</h4>
								<br>
								<a href="https://gonglinongli.51240.com/" target="_blank">check your chinese birthday</a>
							
						<tr>
							<td><label for="cbirthyear">????????????????????????Chinese Birthday year:</label></td>
							<td><input type="text" name="cbirthyear" placeholder="chinese birth years" max=""required></td>
						</tr>					
						<tr>
							<td><label for="cbirthmonth">????????????????????????Chinese Birthday month:</label></td>
							<td><select name="cbirthmonth" style="color: black"required>
									<option value="">Select month</option>
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
								</select></td>
						</tr>
						
						<tr>
							<td><label for="Cbirth">???????????? Chinese Birthday:</label></td>
							<td><input type="text" name="cbirth" placeholder="birthday Chinese" required></td>
						</tr>
						<tr>
						<label for="marry">???????????? Married:</label>	
							<input type="radio" id="married" name="married" value="1">
  							<label for="married" style="color: black;">??????</label>
  							<input type="radio" id="unmarried" name="married" value="0">
  							<label for="unmarried" style="color: black;">??????</label>
  						<br>
						</tr>
						<tr>
						<label>Death:</label>	
							<input type="radio" id="alive" name="died" value="0">
							<label for="alive" style="color: black;">??????</label>
							<input type="radio" id="died" name="died" value="1">
							<label for="died" style="color: black;">?????????</label>
						<tr>
						</table>		
						<button type="submit">submit ??????</button>
						<button onclick="window.location='familymem.php'">?????? Cancel</button>
					</form>	
			 </div>
		</div>		
	</div>
</body>
</html>
	<!-- <script>
		  function getMemberDetailByFamilyId(familyId) {
             $.ajax({
                url: 'getMemberDetail.php',
                type: 'post',
                dataType: 'json',
                data: {
                    familyId: familyId,
                },
                success: function (result) {
                    console.log(result.birthday);
                     $.ajax({
                        url: 'getLunar.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            birthday: result.birthday,
                        },
                        success: function (resultLunar) {
                            console.log(result);
                            console.log(resultLunar);
                            let birthdayYear = resultLunar[3];
                            let birthdayMonth = resultLunar[1];
                            let birthdayDay = resultLunar[2];
                            $('.row').append(
                                '<table>'+
                                '<tr>'+
                                '<tr><td><input value="'+result.birthday+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayYear+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayMonth+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayDay+'"style="color:black"></td></tr>'+
                                
                                '</tr>'+
                                '</table><a href="Directpayment.php?id='+result.memberid+'"></a>'
                            );

                        },
                    });
                    
                },
            });
        }

	</script> -->