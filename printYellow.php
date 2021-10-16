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
    /*@page{
      size: 14.5cm 12.3cm;
    }*/
    .vertical-orientation{
        writing-mode: vertical-rl;
        text-orientation: upright;
        border-style: solid;
        font-size: 25px; 
        height: 550px;
        width: 450px;
        
    }
  </style>
           
  <title></title>
</head>
<body>
  <div class="vertical-orientation">
        <label style="color: red">奉为祈福消灾免厄化难生恩迎祥信士</label><br>
          <?php
                $cname = $_SESSION['mem_cname'];
                //echo $id;
                $sql = "SELECT * FROM member where member_id = '".$cname."'";
                $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        $rows = $result->fetch_assoc();
                      
          ?>

               <?php echo $rows['mem_cname'];?> <label style="color: red">自命</label> 
               <?php echo $rows['mem_cbirthyear']; ?><label>年</label> 
               <?php echo $rows['mem_cbirthmonth']; ?><label>月</label> 
               <?php echo $rows['mem_cbirth']; ?><label>日</label> 
        <label style="color: red"> 敬奉</label>
        <label style="color: red">合上天香  日月上求平安</label>
          <?php
            }
           ?>
        <label style="color: red">天命求贵子合
          <span class="todayMonth">月</span>
          <span class="todayDay"></span>日</label>
        <label style="color: red">日月天明
          <!-- <h3 id="year-output"> -->
          <!-- <input type="text" name="year" id="year"></h3> -->
        </label>
        <label style="color: red">自身</label><br>
        <label style="color: red">天上比求呈      生比化难恼星下解</label>
        <label style="color: red">一解十灾百难 二解四季恼星  三解百无禁忌</label>
        <label style="color: red">四解疮疥跌星 五解官非口舌 六解家宅不安</label>
        <label style="color: red">七解水火贼盗 八解日上㐫星  九解不详之兆</label>  
        <label style="color: red">十解夫妻不睦 十一解乌立恶卷  十二解百病消除</label>
        <label style="color: red">天师赐福保佑安宁驱邪出引福归堂</label>
        <label style="color: red">太上老君急急如律</label><br>
        <span id="todayYear"></span>年 
        <!-- <span class="todayMonth">月</span>
        <span class="todayDay"></span>日   -->
        <label style="color: red">沐恩弟子叩</label>
        
  </div>
  <br>
  <br>
  <button onclick="window.print()">Print Out 打印黄单</button>
</body>
</html>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript">
    function getMemberDetailByName(name) {
             $.ajax({
                url: 'getMemberDetailByName.php',
                type: 'post',
                dataType: 'json',
                data: {
                    name: name,
                },
                success: function (result) {
                  if (result) {
                      $('#birthdayYear').val(result.birthdayYear);
                      $('#birthdayMonth').val(result.birthdayMonth);
                      $('#birthdayDay').val(result.birthdayDay);
                  }
                },
            });
        }

        $('input.cname').change(function () {
          console.log('change');
          getMemberDetailByName($('#cname').val());
        });

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
                $('.todayMonth').html(month);
                $('.todayDay').html(day);
              
            },
        });
    }
    gettodaydate();
    $(function () {
        $('#year').change(function () {
            let output = $(this).val();
            $('#year-output').text(output);
        });
    });

    </script>

  
  
  
  
  
  
  
  
          