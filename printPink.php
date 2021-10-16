<?php
require('config.php');
session_start();

 if(!isset($_SESSION['admin'])){
  header("Location:loginAdmin.php");
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

	<style type="text/css"> 
    @page{
        size: 150mm 940mm landscape;
    }
		.vertical-orientation{
  			writing-mode: vertical-rl;
  			text-orientation: upright;
        border-style: solid;
        font-size: 21px;
		}
   
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

	<title></title>
</head>
<body>
    <div style="float: left;border-style: solid; padding-right: 5px; ">
      <h2 style="text-align: center; color:red;"><b><u>柔佛</u></b></h2><br>
        <h2 style="text-align: center; color:red;"><b><u>士姑来天后宫</u></b></h2><br>
      <div class="vertical-orientation" style="margin-left:10%">
         <?php
          // echo  $_SESSION['mem_cname'];
                $cname = $_SESSION['mem_cname'];
                //echo $id;
                $sql = "SELECT * FROM member where member_id = '".$cname."'";
                $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        $rows = $result->fetch_assoc();
                      
            ?>
        <label style="color:red">弟子
        <br>信女</label>
        <label>
          <?php echo $rows['mem_cname']; ?>
        </label>
        <label style="color:red">自命
                  <?php echo $rows['mem_cbirthyear']; ?>年
                  <?php echo $rows['mem_cbirthmonth']; ?>月
                  <?php echo $rows['mem_cbirth']; ?>日
               <br>
          <?php
            }
           ?>
        <label style="color:red">祈求</label><br>
        <label><?php echo $rows['taisui_name']?></label>
<!--         <label>太岁盧秘星君保平安</label> -->
        <label style="color:red">
          <span id="todayYear"></span>年
          <label><?php echo $rows['taisui_Month']?></label>
          <label><?php echo $rows['taisui_Date']?></label>
          <!-- <span id="todayMonth"></span>月
          <span id="todayDay"></span>日 -->
        </label>
      </div>
  </div>
  <div style="float:left; border: 1px solid;">
    <button onclick="window.print()">Print Out 打印粉红单</button>
  </div>
</body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript">
	
    function gettodaydate(today){
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yy = String(today.getFullYear());

      console.log(dd);
      console.log(mm);
      console.log(yy);
      const date = yy + '-' + mm + '-' + dd;
      getLuanr(date);
    }

    function getLuanr(value) {
        $.ajax({
            url: 'getLunar.php',
            type: 'post',
            dataType: 'json',
            data: {
                birthday: value,
            },
            success: function (result) {
                var year = result[3];
                var month = result[1];
                var day = result[2];

                $('#todayYear').html(year);
                $('#todayMonth').html(month);
                $('#todayDay').html(day);
            },
        });
    }
    gettodaydate();

    </script>

