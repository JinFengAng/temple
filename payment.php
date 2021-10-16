<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:loginAdmin.php");
}

function filterTable($query){
	$con = mysqli_connect("localhost","root","","temple");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
}
        $query = "SELECT mem_cname, mem_birthday,mem_cbirth,mem_cbirthyear,mem_cbirthmonth FROM member LEFT JOIN result ON member.mem_cname= mem_cname.result";
        $result = $conn->query($query);

        $query = "SELECT family_cname, family_birth,family_cbirthday,family_cbirthyear,family_cbirthmonth FROM family LEFT JOIN resultfamily ON family.family_cname= family_cname.result";
        $result = $conn->query($query);

if(isset($_POST['submit'])){
	$_POST['invoice_god'];
	$id = $_POST["id"];
	$member_id = $_POST["member_id"];
	$amount=$_POST["amount"];
	$family_type=$_POST["family_type"];
	$family_type=$_POST["family_type"];
	

	$sql = "INSERT INTO payment (member_id,amount,family_type) VALUES ('$member_id','$amount','$family_type')";
	$conn->query($sql);
	$payment_id = $conn->insert_id;

	$pay_god=$_POST["pay_god"];
	for ($i = 0; $i < count($pay_god); $i++) {
		$god_id = $pay_god[$i];
		$godSql = "INSERT INTO pay_god (payment_id, god_id) VALUES ('$payment_id','$god_id')";
		$conn->query($godSql);
	}

}

?>
<!DOCTYPE html>
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
    width: 200px;
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

.vertical-orientation{
  writing-mode: vertical-rl;
  text-orientation: upright;
}

.th.td {
    width: 20px;
}

</style>
<script type="text/javascript">
    //output year change
    $(function () {
        $('#year').change(function () {
            let output = $(this).val();
            $('#year-output').text(output);
        });
    });

// hidden value= 0
$(function() {
  $('input[name="age[]"]').each(function() {
    var value = $(this).val();
    if(value == 0) {
      $(this).val('');
    }
  });

});

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
                <a href="home.php" >首页 Home</a>
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
		<div class="center" style="float: left; padding-left: 250px">
			<form action="payment.php" method="POST">
				<div style="width: 100%;height: 45px;">
        			<h2>付款 payment System</h2>
   				</div>
				<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Member Details</legend>
				<select id="member">
	                <option>请选择</option>
	            <?php
	                $sql = "SELECT * FROM member";
	                $member_result = $conn->query($sql);
	                while($rows = $member_result->fetch_assoc()){
	                    $id= $rows['member_id'];
	                    $cname= $rows['mem_cname'];
	            ?>
	                <option value="<?php echo $id ?>"><?php echo $cname; ?></option>
	            <?php
	                }
	            ?>
	        	</select>  
	        	<br>      	
                        <label for="birhtday">生日 ：</label>
                        <input type="text" id="birthday" name="birhtday" placeholder=" "value="" required>
                        <br>
                        <label for="birthdayYear">农历生日（年份） ：</label>
                        <input type="text" id="birthdayYear" name="birthdayYear" placeholder=" "value="" required>
                        <br>
                        <label for="birthdayMonth">农历生日 （月份）：</label>
                        <input type="text" id="birthdayMonth" name="birthdayMonth" placeholder=" " value=" "required>
                        <br>
                        <label for="birthdayDay">农历生日：</label>
                        <input type="text" id="birthdayDay" name="birthdayDay" placeholder="" value="" required>
                        <br>
                        <label>请选择：</label>
	                        
	                        
				<select name="family_type" id="family_type">
					<option value="1">全家</option>
					<option value="2">个人</option>
				</select>

				<br>
				<table id="family-member" border="1" style="border-collapse: collapse;">
				</table>
				
				</form>
				<form action="payment.php" method="POST">
							<!-- <?php 
	                        if ($family_type == 1){
	                        	$sql = "SELECT * FROM family ";
	                        	$family = $conn->query($sql);
	         					while($row=mysqli_fetch_array($result)) {

	                       ?>
		                       	<label><?php echo $row['family_cname']?> </label>
		                       	<label><?php echo $row ['family_cbirthday']?></label>
		                       	<label><?php echo $row ['family_cbirthmonth']?></label>
		                       	<label><?php echo $row['family_cbirthyear']?> </label>
		                       	<input type="checkbox" name="familyName" value="">

	                        <?php 
	                    	}
	                    	}//end if
	                        ?> -->
	                        	
				<br>
				<br>
				<label>请选择要拜的神：</label>
				<br>
				<?php
					$query = "SELECT * FROM god WHERE id != 1";
				 	$result = $conn->query($query);
	         		while($row=mysqli_fetch_array($result)) {
	            ?>
	            	<label><?php echo $row['godlist']; ?></label>
	            	<input type="checkbox" name="pay_god[]" value="1" class="pay_god"  />
	            	<br>
	            <?php
	               	}
				?>
				
				<br>
						<label for="amount">Amount: RM <input name="amount" id="amount"></label>
						<input type="hidden" name="amount" value="<?php echo $amount ?>">
				<br>
				<input type="submit" name="submit">
				<button>Print Out 印出</button>
			</form>
		</div>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript">
		function getMemberDetail(memberId) {
             $.ajax({
                url: 'getMemberDetail.php',
                type: 'post',
                dataType: 'json',
                data: {
                    memberId: memberId,
                },
                success: function (result) {
                    $('#name').val(result.name);
                    $('#birthday').val(result.birthday);
                    $('#birthdayYear').val(result.birthdayYear);
                    $('#birthdayMonth').val(result.birthdayMonth);
                    $('#birthdayDay').val(result.birthdayDay);
                },
            });
        }

        function getMemberDetailByFamilyId(familyId) {
             $.ajax({
                url: 'getMemberDetail.php',
                type: 'post',
                dataType: 'json',
                data: {
                    familyId: familyId,
                },
                success: function (result) {
                	console.log(result);
                	$('#family-member').append('<tr>'+
                		'<td>'+result.name+'</td>'+
                		'<td>'+result.birthday+'</td>'+
                		'<td>'+result.birthdayYear+'</td>'+
                		'<td>'+result.birthdayMonth+'</td>'+
                		'<td>'+result.birthdayDay+'</td>'+
                		'<td><input type="checkbox" name="pay_god[]" value="1" class="pay_god"></td>'+
                		'</tr>');
                },
            });
        }

        function getFamilyMember(memberId) {
             $.ajax({
                url: 'getFamilyMember.php',
                type: 'post',
                dataType: 'json',
                data: {
                    memberId: memberId,
                },
                success: function (result) {
                	console.log(result);
                	$("#family-member").empty();
                	console.log($('#family_type').val());
                	if ($('#family_type').val() == '1') {
	                	$('#family-member').append(
	                		'<tr>'+
	                		'<td>名字</td>'+
	                		'<td>生日</td>'+
	                		'<td>农历生日（年份）</td>'+
	                		'<td>农历生日（月份）</td>'+
	                		'<td>农历生日</td>'+
	                		'<td></td>'+
	                		'</tr>'
	            		);
	                    for (i = 0; i < result.length; i++) {
	                    	familyId = result[i];
	                    	getMemberDetailByFamilyId(familyId);
	                    }
                	}
                },
            });
        }


        $('#member').change(function (event) {
            const memberId = $('#member').val();
            getMemberDetail(memberId);
            getFamilyMember(memberId);
        });

        $('#family_type').change(function (event) {
            const memberId = $('#member').val();
            getMemberDetail(memberId);
            getFamilyMember(memberId);
        });

        $(document).change('.pay_god', function(e) {
        	totalPayGod = $("input[name='pay_god[]']");
        	total = 0;
        	for (i = 0; i < totalPayGod.length; i++) {
        		if (totalPayGod[i].checked) {
        			total++;
        		}
        	}
        	$('#amount').val((Number(total) * 10 + 10).toFixed(2));
		});
	</script>
</body>
</html>