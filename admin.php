<?php 
session_start();
include('config.php');

if(!isset($_SESSION['admin'])){
	header("Location:loginAdmin.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Staff</title>
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

<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="dataTables.bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
$('#example').dataTable( {

} );
} );

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


<div style="padding-left: 300px;float: left;">	
<form method="POST" action="#">
<h1 align="center">员工 Staff List</h1>
<br>
	<a href="addstaff.php"><input type="button" value="New Staff" style="color:black"/></a>
<br><br>
	
	<table id="example" class="table table-striped table-bordered table-hover" width="100%">
		<thead>
			<tr>
				<th>Admin ID</th>
				<th>姓名 Admin Name</th>
				<th>地址 Address</th>
				<th>联络号码 Contact Number</th>
				<th>邮件 Email</th>
				<th>性别 Gender</th>
				<th>职位 Position</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query=mysqli_query($conn, "SELECT * from admin");
				while ($row=mysqli_fetch_array($query)){	
			?>
			<tr class="tr">
				<td><?php echo $row['admin_id']; ?></td>
				<td><?php echo $row['admin_name']; ?> <?php //echo $row['lname']; ?></td>
				<td><?php echo $row['admin_address']; ?></td>
				<td><?php echo $row['admin_phone']; ?></td>
                <td><?php echo $row['admin_email']; ?></td>
				<td><?php echo $row['admin_gender']; ?></td>
				<td><?php echo $row['admin_position']; ?></td>
				<td>
					<a href="editsaff.php?id=<?php echo $row['admin_id']; ?>" ><img src="edit.jpg " style="height:20px;width:20px" class="buttonasd" ></a>
					<a href="deleteSaff.php?id=<?php echo $row['admin_id']; ?>" >Delete</a>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>

	</form>
</div>
</body>
</html>