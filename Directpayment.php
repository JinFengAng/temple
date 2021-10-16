<?php
require('config.php');
session_start();
 if(!isset($_SESSION['admin'])){
    header("Location:loginAdmin.php");
}

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
}
$mem_query = "SELECT *, member.member_id FROM member LEFT JOIN result ON member.member_id= result.member_id WHERE member.member_id = '$id' GROUP BY member.mem_cname ORDER BY member.member_id";
$result_mem = $conn->query($mem_query);

$fam_query = "SELECT *, family.member_id FROM family LEFT JOIN resultfamily ON family.family_id= resultfamily.family_id WHERE family.member_id = '$id' GROUP BY family.family_cname ORDER BY family.family_id";
$result_fam = $conn->query($fam_query);

?>
<?php
if(isset($_POST['submit'])){
    $admin_id = $_SESSION['admin_id'];
    $member_id=$_POST['member_id'];
    $cname=$_POST['cname'];
    $birthday=$_POST['birthday'];
    $birthdayDay=$_POST['birthdayDay'];
    $birthdayYear=$_POST['birthdayYear'];
    $birthdayMonth=$_POST['birthdayMonth'];
    $amount=$_POST['amount'];
    $sql="INSERT INTO payment(member_id,mem_cname, mem_cbirth,mem_cbirthyear,mem_cbirthmonth,mem_birthday, amount, admin_id) VALUES('$member_id','$cname','$birthday','$birthdayDay','$birthdayYear','$birthdayMonth','$amount', '$admin_id')";
    $conn->query($sql);
    $payment_id = $conn->insert_id;
    $count =0;
    foreach($_POST['pay_god'] as $index=>$value){
            $god = $_POST['pay_god'][$count];
            $sql1 = "INSERT INTO pay_god(payment_id, god_id) VALUES ('$payment_id', '$god')";
            $conn->query($sql1);
            $count++;
        }

    echo "<script> alert('New payment created')</script>";
    echo "<script> window.location='reviewInvoice.php?id=".$payment_id."'</script>";
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
<form action="Directpayment.php?id=<?php echo $id?>" method="POST">
		<div class="center" style="float: left; padding-left: 250px">
				<div style="width: 100%;height: 45px;">
        			<h2>付款 payment System</h2>
   				</div>
				<legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Member Details</legend>
                <?php
                    
                if ($result_fam->num_rows > 0){
                    while($rows = $result_fam->fetch_assoc()){
                    $_SESSION['mem_cname'] = $rows['member_id'];
                    $month = []; 
                    array_push($month, $rows['month1'],$rows['month2'],$rows['month3'],$rows['month4'],$rows['month5'], $rows['taisui']);
                ?>  
                    <label for="cname">名字 ：</label>
                    <input type="hidden" name="member_id" value="<?php echo $rows['member_id']?>">
                    <input type="text" id="cname" name="cname" placeholder=" "value="<?php echo $rows['family_cname']?>" required>
                    <label for="birhtday">生日 ：</label>
                    <input type="text" id="birthday" name="birthday" placeholder=" "value="<?php echo $rows['family_birth']?>" required>
                    <br>
                    <label for="birthdayYear">农历生日（年份） ：</label>
                    <input type="text" id="birthdayYear" name="birthdayYear" placeholder=" "value="<?php echo $rows['family_cbirthyear']?>" required>
                    <br>
                    <label for="birthdayMonth">农历生日 （月份）：</label>
                    <input type="text" id="birthdayMonth" name="birthdayMonth" placeholder=" " value="<?php echo $rows['family_cbirthmonth']?> "required>
                    <br>
                    <label for="birthdayDay">农历生日：</label>
                    <input type="text" id="birthdayDay" name="birthdayDay" placeholder="" value="<?php echo $rows['family_cbirthday']?> " required>
                    <br>

				<table id="family-member" border="1" style="border-collapse: collapse;">
				</table>
                
				
				<label>请选择要拜的神：</label>
				<br>
				<?php
					$query = "SELECT * FROM god WHERE id != 1";
				 	$result = $conn->query($query);
	         		while($row=mysqli_fetch_array($result)){
	            ?>
	            	<label><?php echo $row['godlist']; ?></label>
                    <?php
                    $checked = "";
                    for ($j=0; $j <=(count($month)-1) ; $j++) { 
                        $new_str = str_replace(' ', '', $month[$j]);
                        // echo $new_str;
                        if($row['godlist']==$new_str){
                            $checked = "checked";
                        }

                        if ($j===(count($month)-1) && !!$month[$j] && $row['godlist'] === '太岁') {
                            $checked = "checked";
                        }
                    }
                    ?>
                    <input type="checkbox" name="pay_god[]" value="<?php echo $row['id']?>" class="pay_god" <?php echo $checked?>>
	            	<br>
	            <?php
	               	}
                }
               }elseif($result_mem->num_rows > 0){
                while($rows = $result_mem->fetch_assoc()){
                    $_SESSION['mem_cname'] = $rows['member_id'];
                    $month_ind = []; 
                    array_push($month_ind, $rows['month1'],$rows['month2'],$rows['month3'],$rows['month4'],$rows['month5'],$rows['taisui']);
                ?>  
                    <label for="cname">名字 ：</label>
                    <input type="hidden" name="member_id" value="<?php echo $rows['member_id']?>">
                    <input type="text" id="cname" name="cname" placeholder=" "value="<?php echo $rows['mem_cname']?>" required>
                    <label for="birhtday">生日 ：</label>
                    <input type="text" id="birthday" name="birthday" placeholder=" "value="<?php echo $rows['mem_birthday']?>" required>
                    <br>
                    <label for="birthdayYear">农历生日（年份） ：</label>
                    <input type="text" id="birthdayYear" name="birthdayYear" placeholder=" "value="<?php echo $rows['mem_cbirthyear']?>" required>
                    <br>
                    <label for="birthdayMonth">农历生日 （月份）：</label>
                    <input type="text" id="birthdayMonth" name="birthdayMonth" placeholder=" " value="<?php echo $rows['mem_cbirthmonth']?> "required>
                    <br>
                    <label for="birthdayDay">农历生日：</label>
                    <input type="text" id="birthdayDay" name="birthdayDay" placeholder="" value="<?php echo $rows['mem_cbirth']?> " required>
                    <br>

                <table id="family-member" border="1" style="border-collapse: collapse;">
                </table>
                <label>请选择要拜的神：</label>
                <br>
                <?php
                    $query = "SELECT * FROM god WHERE id != 1";
                    $result = $conn->query($query);
                    while($row=mysqli_fetch_array($result)) {
                ?>
                    <label><?php echo $row['godlist']; ?></label>
                    <?php
                     $checked = "";
                     for ($j=0; $j <=(count($month_ind)-1) ; $j++) { 
                        $new_str = str_replace(' ', '', $month_ind[$j]);
                        // echo $new_str;
                        if($row['godlist']==$new_str){
                            $checked = "checked";
                        }

                        if ($j===(count($month_ind)-1) && !!$month_ind[$j] && $row['godlist'] === '太岁') {
                            $checked = "checked";
                        }
                    }
                    ?>
                     <input type="checkbox" name="pay_god[]" value="<?php echo $row['id']?>" class="pay_god" <?php echo $checked?>>
                    <br>
                <?php
                   }
                }
                }
				?>
				<br>
						<label for="amount">Amount: RM <input name="amount" id="amount"></label>
				<br>
				<input type="submit" name="submit">

                 

			</form>

            <br>
                 <a href="printfamilyPink2.php">打印家庭 粉红单</a>
                 <br>
                 <a href="printPink.php">打印个人 粉红单</a>
                 <br>
                 <a href="printyellow.php?id=<?php echo $id ?>">个人 黄单</a>
                 <br>
                 <a href="printfamilyYellow.php?id=<?php echo $id ?>">家庭 黄单</a>
            
		</div>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript">
        $(document).change('.pay_god', function(e) {
        	totalPayGod = $("input[name='pay_god[]']");
        	total = 0;
        	for (i = 0; i < totalPayGod.length; i++) {
        		if (totalPayGod[i].checked) {
        			total++;
        		}
        	}
        	$('#amount').val((Number(total) * 10 ).toFixed(2));
		});
	</script>
</body>
</html>