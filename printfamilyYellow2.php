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

    .vertical-orientation{
        writing-mode: vertical-rl;
        text-orientation: upright;
        height: 550px;
        width: 450px;
        border-style: solid;
        font-size: 25px;
    }
  </style>
           
  <title></title>
</head>
<body>
  <form action="print">
    
  </form>
  <?php
  $cname = $_SESSION['mem_cname'];
  //echo $id;
  $sql = "SELECT * FROM family LEFT JOIN namegod ON family.family_id=namegod.family_id where family.member_id = '".$cname."'";
  $result = $conn->query($sql);
      if ($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){         
  ?> 
        <div class="vertical-orientation" style="float: left; margin-right: 10px;">
              <label style="color: red;">????????????????????????????????????????????????</label><br>
                    <?php echo $rows['family_cname'];?>?????? 
                    <?php echo $rows['family_cbirthyear']; ?>??? 
                    <?php echo $rows['family_cbirthmonth']; ?>??? 
                    <?php echo $rows['family_cbirthday']; ?>??? 
                    <!-- ??? -->
                  <label style="color: red">??????</label>
              <label style="color: red">????????????  ??????????????????</label>
              <label style="color: red">??????????????????</label>
                <span class="todayMonth"></span>
                <span class="todayDay"></span>???
              <label style="color: red">????????????</label>
                <?php echo $rows['god_name'];?><label style="color: red">??????</label>
                <label>??????</label><br>
              <label style="color: red;">???????????????      ????????????????????????</label><br>
              <label style="color: red">?????????????????? ??????????????????  ??????????????????</label><br>
              <label style="color: red">?????????????????? ?????????????????? ??????????????????</label><br>
              <label style="color: red">?????????????????? ??????????????????  ??????????????????</label><br> 
              <label style="color: red">?????????????????? ????????????????????? ?????????????????????</label>
              <label style="color: red">?????????????????????????????????????????????</label><br>
              <label style="color: red">????????????????????????</label><br>
              <span class="todayYear"></span><label style="color: red">???</label> 
              <?php
                  $sql2= "SELECT * FROM namegod LEFT JOIN taisui_god ON taisui_god.taisui_name=namegod.god_name 
                          LEFT JOIN yellow_god ON yellow_god.god_name=namegod.god_name where namegod.family_id = '".$cname."'";
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0){
                  while($rows2 = $result2->fetch_assoc()){  
              ?>
              <label><?php echo $rows2['taisui_month'];?><?php echo $rows2['god_Month'];?></label>
              <label><?php echo $rows2['taisui_date'];?><?php echo $rows2['god_Date'];?></label>
              <!-- <span class="todayMonth"></span><label style="color: red"></label>
              <span class="todayDay"></span><label style="color: red">???</label>   -->
              <label style="color: red">???????????????</label>
        </div>
              <?php
                  }
                }
              ?>
         <?php
            }
          }
         ?>
    <br>
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

                $('.todayYear').html(year);
                $('.todayMonth').html(month);
                $('.todayDay').html(day);
              
            },
        });
    }
    gettodaydate();
    // $(function () {
    //     $('.year').change(function () {
    //         let output = $(this).val();
    //         $('.year-output').text(output);
    //     });
    // });
 window.print();
    </script>
