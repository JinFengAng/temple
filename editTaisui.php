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

if(ISSET($_POST['submit'])){
    $i = 1;
    $age = 0;
    $year = date('Y');
    $yearold = $_POST['age'];
    $sql_result = "UPDATE age set age (member_id) WHERE ('1')";
        $result_sql = $conn->query($sql_result);
        $age_id = $conn->insert_id;


     while ($i <= 6) {
        for($j = 1; $j<=12; $j++){
            if($yearold[$age] == 0){

            }else{
                  $sql = "UPDATE age_detail set age='$yearold', ro='$i', col='$j' WHERE age_id='$age_id'";
                    $data = $conn->query($sql);
         
            }//end

            $age++;
        }//end for
        $i++;
  }//end while
                 
    if($conn->query($sql)===TRUE){
        echo "<script> alert('Update record created')</script>";
        echo "<script> window.location='taisui.php';</script>";
    }//end sql
}//end submit

?>
<!DOCTYPE html>
<html>
<head>
    <title>太岁</title>
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
                <a href="home.php" data-toggle="collapse" aria-expanded="false" >首页 Home</a>
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

    
	<div style="margin-left: 300px;">
        
        <div>
            <div class="vertical-orientation">
                <h1>士姑来天后宫</h1>
            </div>
        </div>

        <?php
            // print out chinese age
            function toChinese($number) {
                $wording = str_split((string)$number);

                $numberArray = ['十', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
                $tenNumberArray = ['十', '廿', '卅', '四', '五', '六', '七', '八', '九'];

                if ($number > 10) {
                    return $tenNumberArray[(int)$wording[0] - 1] . $numberArray[(int)$wording[1]];
                }
                if ($number == 10) {
                     return '十' . '岁';
                }
                return $numberArray[(int)$wording[0]] . '岁';
            }

            $query_table="SELECT * FROM taisui";
            $result_table = $conn->query($query_table);
            while($rows=mysqli_fetch_array($result_table)) {
                $todayYear = $rows['this_year'] == 0 ? date('Y') : $rows['this_year'];
            }
            if (!isset($todayYear)) {
                $todayYear = date('Y');
            }


            $yearArrays = [];
            $chineseAgeArrays = [];

            for ($i = 0; $i < 12; $i++) {
                array_push($yearArrays, []);
                array_push($chineseAgeArrays, []);
            }

            $thisYearZodiacIndex = 12 - ( ($todayYear + 9) % 12 );

            for ($i = 0; $i < 72; $i++) {
                array_push($yearArrays[($i + $thisYearZodiacIndex) % 12], $todayYear - $i);
                array_push($chineseAgeArrays[($i + $thisYearZodiacIndex) % 12], toChinese($i + 1));
            }
        ?>
        <div>
            <?php $count = 0; ?>
            <table border="1" style="border-collapse:collapse; width: 100%; text-align: center;">
                <form action="insertTaisui.php" method="POST">
                <tr><th colspan="12"> 太岁表 Tai sui list</th></tr>
                <tr>
                    <th name="pig">Pig 猪</th>
                    <th name="dog">Dog 狗</th>
                    <th name="rooster">Rooster 鸡</th>
                    <th name="monkey">Monkey 猴</th>
                    <th name="goat">Goat 羊</th>
                    <th name="horse">Horse 马</th>
                    <th name="snake">Snake 蛇</th>
                    <th name="dragon">Dragon 龙</th>
                    <th name="rabbit">Rabbit 兔</th>
                    <th name="tiger">Tiger 虎</th>
                    <th name="ox">Ox 牛</th>
                    <th name="rat">Rat 鼠</th>
                </tr>
                <tr>
                    <td>丁 己 辛 癸 乙 丁<br>亥</td>
                    <td>戊 庚 壬 甲 丙 戊<br>戌</td>
                    <td>丁 己 辛 癸 乙 丁<br>酉</td> 
                    <td>丙 戊 庚 壬 甲 丙<br>申</td>
                    <td>乙 丁 己 辛 癸 乙<br>未</td>
                    <td>甲 丙 戊 庚 壬 甲<br>午</td>
                    <td>癸 乙 丁 己 辛 癸<br>巳</td>
                    <td>壬 甲 丙 戊 庚 壬<br>辰</td>
                    <td>辛 癸 乙 丁 己 辛<br>卯</td>
                    <td>庚 壬 甲 丙 戊 庚<br>寅</td>
                    <td>己 辛 癸 乙 丁 己<br>丑</td>
                    <td>庚 壬 甲 丙 戊 庚<br>子</td>
                </tr>
                  <tr>
                    <td> 9p.m-10:59p.m</td>
                    <td> 7p.m- 8:59p.m</td>
                    <td> 5p.m- 6:59p.m</td>
                    <td> 3p.m- 4:59p.m</td> 
                    <td> 1p.m- 2:59p.m</td>
                    <td>11a.m-12:59p.m</td> 
                    <td> 9a.m-10:59a.m</td>
                    <td> 7a.m- 8:59a.m</td>
                    <td> 5a.m- 6:59a.m</td>
                    <td> 3a.m- 4:59a.m</td>
                    <td> 1a.m- 2:59a.m</td>
                    <td>11p.m-12:59a.m</td> 
                </tr>
                <!--print out Age and year ！-->
                <?php
                    echo "<tr>";
                    foreach ($chineseAgeArrays as $array) {
                        echo "<td><div class='vertical-orientation'>";
                        foreach ($array as $number)  {
                            echo '<p>' . $number . '</p>';
                        }
                        echo "</td>";
                    }
                    echo "</div></tr>";
                ?>
                <?php
                    echo "<tr>";
                    foreach ($yearArrays as $array) {
                        echo "<td><div class='vertical-orientation'>";
                        foreach ($array as $number)  {
                            echo '<p>' . $number . '</p>';
                        }
                        echo "</td>";
                    }
                    echo "</div></tr>";
                ?>

                <tr>
                <?php
                for($i=1; $i<=6; $i++){
                ?>
                    <tr style="height: 20px;">
                <?php
                    for($j=1; $j<=12; $j++){
                ?>
                    <?php
                    $query = "SELECT * FROM age_detail WHERE age_detail.ro ='".$i."' AND age_detail.col ='".$j."'";
                    $result = $conn->query($query);

                    if (mysqli_num_rows($result) == 0) {
                        $age = '';
                    } else {
                        while($row=mysqli_fetch_array($result)) {
                            $age = $row['age'];
                        }
                    }
                    ?>
                    <td>
                        <input name="age[]" value="<?php echo $age; ?>"></input>
                    </td>
                <?php
                    }
                ?>
                    </tr>
                <?php
                }
                ?>
                
                <input type="submit" name="submit"><br>
               <a href="taisui.php">Cancel取消</a>
            </form>
            </table>
<script type="text/javascript">
    
</script>