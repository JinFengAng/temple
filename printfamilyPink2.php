<?php
require('config.php');
session_start();

//  if(!isset($_SESSION['admin'])){
//   header("Location:loginAdmin.php");
// }
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
    @media print{
      div{page-break-after:auto;}
    }
    @page{
      size: 150mm 130mm;
    }
    .vertical-orientation{
        writing-mode: vertical-rl;
        text-orientation: upright;
        padding-bottom: 100px;
    }
    
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
    }
  </style>
           
  <title></title>
</head>
<body>
  <!-- <nav id="sidebar">
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
                <a href="#.php">???????????? Death Record</a>
            </li>
            <li>
                <a href="logoutAdmin.php">?????? Logout</a>
            </li>
            
        </ul>
         
     </div> 
  </nav> -->
  
      <?php
      $cname = $_SESSION['mem_cname'];
      if(ISSET($_POST['print'])){
        $count = 0;
          foreach($_POST['family_id'] as $index=>$value){
              $family_id = $_POST['family_id'][$count];
              $taisui_god = $_POST['taisui_god'][$count];
              $year = null;
              $check = "SELECT * FROM namegod where family_id =$family_id";
              $result = $conn->query($check);
              if ($result->num_rows > 0){
                  $year =  $taisui_god;
                  $upd = "UPDATE namegod SET god_name = '$year' WHERE family_id = '$family_id'";
                  $conn->query($upd);
                  $_SESSION['taisuiGod_id'] = $conn->insert_id;
                }else{
                  $year =  $taisui_god;
                  $ins = "INSERT INTO namegod (god_name,family_id) VALUES ('$year','$family_id')";
                  $conn->query($ins);
                  $_SESSION['taisuiGod_id'] = $conn->insert_id;
              $count++;
              }
        //   echo "<script> alert('Record inserted')</script>";
          echo "<script> window.location='printfamilyPink.php'</script>";
        }
      }


      //echo $id;
      $sql = "SELECT * FROM family where member_id = '".$cname."'";
      $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($rows = $result->fetch_assoc()){ 
      ?>
      <form action="printfamilyPink2.php" method="POST">
        <div style="float: left;">
          <div style="width: 98%;margin: 10px;">
          <label><?php echo $rows['family_cname']?></label>
          <input type="hidden" name="family_id[]" value="<?php echo $rows['family_id']?>"><br>
          <label>God Name:</label>
          <!-- <input type="text" name="year[]" class="year"> -->
        
            <select name="taisui_god[]">
              <option value="">???????????????</option>
              <?php
                    $sql = "SELECT * FROM taisui_god ";
                    $member_result1 = $conn->query($sql);
                    while($rows = $member_result1->fetch_assoc()){
                        $taisuiname= $rows['taisui_name'];
                ?>
                    <option value="<?php echo $taisuiname ?>"><?php echo $taisuiname ?></option>
                <?php
                    }
              ?>
            </select>
            <br>
            <?php 
            }
              
                }
            ?>
            <button type="submit" name="print">??????</button>
          </div>
         </div>
      </form>
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
        
      </script>

      
      
      
      
      
      
      
      
              