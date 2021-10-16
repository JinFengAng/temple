<?php
require('config.php');
session_start();
    if(!isset($_SESSION['username'])){
      header("Location:login.php");
    }

function filterTable($query){
	$con = mysqli_connect("localhost","root","","temple");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
}

$member_id = $_SESSION['member_id'];

if(isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "
        SELECT family.* FROM family 
        LEFT JOIN member ON member.member_id = family.member_id 
        WHERE family.member_id = $member_id AND family_name LIKE '%$valueToSearch%'
        ORDER BY family_cname ASC
    ";
    $search_result = filterTable($query);    
}else  {
    $query = "
        SELECT family.* FROM family 
        LEFT JOIN member ON member.member_id = family.member_id 
        WHERE family.member_id = $member_id
        ORDER BY family_cname ASC
    ";
    $search_result = filterTable($query);
}

?>

<head>
    <meta charset="UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
<style>
    .form{
        padding-top: 30px;
    }
    tr th{
        color: black;
    }
    /*.china{
        font-family: SimSun;
    }*/
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
        <li><a href="logout.php" style="text-align: right">Logout登出</a></li> 
        
      </ul>
    </div>
  </nav>
    <div >
        <div style="width: 100%;float: left;height: 50px"><h2 align="center">家庭会员 Member Family System</h2></div>
        <div>
            <button style="float: right;" class="button button1" onclick="window.location='insertFamilymem.php'">新家庭会员New Family </button>
            <form action="familymem.php" method="POST">
                <input  type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
                <input type="submit" name="search" value="Search">
                 <a href="member_account.php">Back</a> 
            </form>
        </div>
        <div style="margin:10px 20px;float:left;overflow-y: auto;">
            <table border="1" style="border-collapse:collapse;width: 100%;" class="table table-borderless">
                <tr><th colspan="12" style="color: black;">Member Family information</th></tr>
                <tr>
                    <th style="color: black;">Member ID </th>
                    <th style="color: black;"><span class="china">家庭</span> ID Family ID</th>
                    <th style="color: black;">家庭名字 Family Name</th>
                    <th style="color: black;">家里名字（中）Family Chinese Name</th>
                    <th style="color: black;">家庭关系 Member Family Relationship</th>
                    <th style="color: black;">电话号码 Phone Number</th>
                    <th style="color: black;">性别 Gender</th>
                    <th style="color: black;">生日 Birthday</th>
                    <th style="color: black;">农历生日 Chinese Birthday</th>
                    <th style="color: black;">农历生日（月份）Chinese Birthday Month</th>
                    <th style="color: black;">农历生日（年份）Chinese Birthday Year</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                if ($search_result->num_rows > 0){
                    while($rows = $search_result->fetch_assoc()){
                        $married = "已婚";
                        if($rows['married'] == 1){
                            $married = "已婚";
                        }elseif($rows['married'] == 0){
                            $married = "未婚";
                        }
                        $died = "过世";
                        if($rows['died'] == 1){
                            $died = "过世";
                        }else if($rows['died'] == 0){
                            $died = "还在";
                        }
                        echo "<tr>";
                        echo "<td>THK<br>".$rows['member_id']."</td>";
                        echo "<td>".$rows['family_id']."</td>";
                        echo "<td>".$rows['family_name']."</td>";
                        echo "<td>".$rows['family_cname']."</td>";
                        echo "<td>".$rows['mem_familyship']."</td>";
                        echo "<td>".$rows['family_phone']."</td>";
                        echo "<td>".$rows['family_gender']."</td>";
                        echo "<td>".$rows['family_birth']."</td>";
                        echo "<td>".$rows['family_cbirthday']."</td>";
                        echo "<td>".$rows['family_cbirthmonth']."</td>";
                        echo "<td>".$rows['family_cbirthyear']."</td>";
                        echo "<td>".$married."</td>";
                        echo "<td>".$died."</td>";
                        echo "<td><a href='editFamilymem.php?id=".$rows['family_id']."'>
                        <span class='editBtn'>Edit</span></a>
                        <a href='deleteFamilymem.php?id=".$rows['family_id']."' onclick=\"return confirm('Are you sure you want to delete this?')\">
                        <span class='deleteBtn'>Delete</span></a></td>";
                        
                        echo "</tr>";
                    }
                }
                ?>

            </table>
        </div>
    </div>
</body>