<?php
include('config.php');
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:loginAdmin.php");
}

    if(isset($_POST['submit'])){

        $name=$_POST["name"];   

        $sql=("INSERT into god (godlist) values('$name')");

        if($conn->query($sql)){
            echo "<script>alert('New god inserted successfully')</script>";
            echo "<script>window.location.href='insertTaisui.php'</script>";
        }else{
            echo "<script>window.location.href='godlist.php'</script>";
        }
    }
?>



<html>
<head>
    <title>God List</title>
	<meta charset="utf-8">
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

.vertical-orientation{
  writing-mode: vertical-rl;
  text-orientation: upright;
}

td {
    height: 20px;
}
.vertical-orientation{
  writing-mode: vertical-rl;
  text-orientation: upright;
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
                <a href="home.php" data-toggle="collapse" aria-expanded="false" >?????? Home</a>
            </li>
            <li>
                <a href="admin.php">?????? Admin</a>
            </li>
            <li>
                <a href="supplier.php">????????? Supplier</a>
            </li>
            <li>
                <a href="Stock.php">?????? Stock</a>
            </li>
            <li>
                <a href="taisui.php">?????? Taisui</a>
            </li>
            <li>
                <a href="godlist.php">??? God list</a>
            </li>
             <li>
                <a href="chooseMatch.php">?????? Match</a>
            </li>
            <li>
                <a href="order.php">?????? Order</a>   
            </li>
            <li>
                <a href="logoutAdmin.php">?????? Logout</a>
            </li>
            
        </ul>
          
      </div> 
    </nav>
    
<div style="float: left; padding-left: 300px">
    <h1>??? New God</h1>
    <form name="form" method="POST" action="godlist.php" onSubmit="return validate()">
       
        
        <div class="form-group">
            <label>?????? Name</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <br>
        <input type="submit" name="submit" value="Submit ??????">
    </form>
        <button onclick="window.location='taisui.php'">Cancel ??????</button> 
</div>
</body>
</html>