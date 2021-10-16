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
@page{
    size: A4 landsape;
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

.vertical-orientation{
  writing-mode: vertical-rl;
  text-orientation: upright;
}

td {
   
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

            <div class="vertical-orientation">
                <h1>士姑来天后宫</h1>
                <?php
                $query_table="SELECT * FROM taisui";
                        $result_table = $conn->query($query_table);
                        while($rows=mysqli_fetch_array($result_table)) {
                ?>
                <?php echo $rows['firstDate'];  ?>
                <?php
                }
                ?>
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
		<div style="margin:10px 20px;float:left;width: 96%;height:400px;">
			<table border="1" style="border-collapse:collapse;width: 100%;text-align: center">
                <form action="taisui.php" method="POST">
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
                    <td><p>丁 己 辛 癸 乙 丁</p>亥</td>
                    <td><p>戊 庚 壬 甲 丙 戊</p>戌</td>
                    <td><p>丁 己 辛 癸 乙 丁</p>酉</td> 
                    <td><p>丙 戊 庚 壬 甲 丙</p>申</td>
                    <td><p>乙 丁 己 辛 癸 乙</p>未</td>
                    <td><p>甲 丙 戊 庚 壬 甲</p>午</td>
                    <td><p>癸 乙 丁 己 辛 癸</p>巳</td>
                    <td><p>壬 甲 丙 戊 庚 壬</p>辰</td>
                    <td><p>辛 癸 乙 丁 己 辛</p>卯</td>
                    <td><p>庚 壬 甲 丙 戊 庚</p>寅</td>
                    <td><p>己 辛 癸 乙 丁 己</p>丑</td>
                    <td><p>庚 壬 甲 丙 戊 庚</p>子</td>
                </tr>
				<tr>
                    <td>11p.m-12:59a.m</td> 
                    <td> 1a.m- 2:59a.m</td>
                    <td> 3a.m- 4:59a.m</td> 
                    <td> 5a.m- 6:59a.m</td>    
                    <td> 7a.m- 8:59a.m</td>    
                    <td> 9a.m-10:59a.m</td>    
                    <td>11a.m-12:59p.m</td>    
                    <td> 1p.m- 2:59p.m</td>
                    <td> 3p.m- 4:59p.m</td> 
                    <td> 5p.m- 6:59p.m</td>    
                    <td> 7p.m- 8:59p.m</td>    
                    <td> 9p.m-10:59p.m</td>
                </tr>

                <?php
                    echo "<tr>";
                    foreach ($chineseAgeArrays as $array) {
                        echo "<td><div class='vertical-orientation'>";
                        foreach ($array as $number)  {
                            echo '<p style="margin: 1px; font-size: 14px;">' . $number . '</p>';
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
                            echo '<p style="margin: 2px;">' . $number . '</p>';
                        }
                        echo "</td>";
                    }
                    echo "</div></tr>";
                ?>

                <tr>
                    <td class="col-1-row-1"></td>
                    <td class="col-2-row-1"></td>
                    <td class="col-3-row-1"></td>
                    <td class="col-4-row-1"></td>
                    <td class="col-5-row-1"></td>
                    <td class="col-6-row-1"></td>
                    <td class="col-7-row-1"></td>
                    <td class="col-8-row-1"></td>
                    <td class="col-9-row-1"></td>
                    <td class="col-10-row-1"></td>
                    <td class="col-11-row-1"></td>
                    <td class="col-12-row-1"></td>
                </tr>

                <tr>
                    <td class="col-1-row-2"></td>
                    <td class="col-2-row-2"></td>
                    <td class="col-3-row-2"></td>
                    <td class="col-4-row-2"></td>
                    <td class="col-5-row-2"></td>
                    <td class="col-6-row-2"></td>
                    <td class="col-7-row-2"></td>
                    <td class="col-8-row-2"></td>
                    <td class="col-9-row-2"></td>
                    <td class="col-10-row-2"></td>
                    <td class="col-11-row-2"></td>
                    <td class="col-12-row-2"></td>
                </tr>

                <tr>
                    <td class="col-1-row-3"></td>
                    <td class="col-2-row-3"></td>
                    <td class="col-3-row-3"></td>
                    <td class="col-4-row-3"></td>
                    <td class="col-5-row-3"></td>
                    <td class="col-6-row-3"></td>
                    <td class="col-7-row-3"></td>
                    <td class="col-8-row-3"></td>
                    <td class="col-9-row-3"></td>
                    <td class="col-10-row-3"></td>
                    <td class="col-11-row-3"></td>
                    <td class="col-12-row-3"></td>
                </tr>

                <tr>
                    <td class="col-1-row-4"></td>
                    <td class="col-2-row-4"></td>
                    <td class="col-3-row-4"></td>
                    <td class="col-4-row-4"></td>
                    <td class="col-5-row-4"></td>
                    <td class="col-6-row-4"></td>
                    <td class="col-7-row-4"></td>
                    <td class="col-8-row-4"></td>
                    <td class="col-9-row-4"></td>
                    <td class="col-10-row-4"></td>
                    <td class="col-11-row-4"></td>
                    <td class="col-12-row-4"></td>
                </tr>

                <tr>
                    <td class="col-1-row-5"></td>
                    <td class="col-2-row-5"></td>
                    <td class="col-3-row-5"></td>
                    <td class="col-4-row-5"></td>
                    <td class="col-5-row-5"></td>
                    <td class="col-6-row-5"></td>
                    <td class="col-7-row-5"></td>
                    <td class="col-8-row-5"></td>
                    <td class="col-9-row-5"></td>
                    <td class="col-10-row-5"></td>
                    <td class="col-11-row-5"></td>
                    <td class="col-12-row-5"></td>
                </tr>

                <tr>
                    <td class="col-1-row-6"></td>
                    <td class="col-2-row-6"></td>
                    <td class="col-3-row-6"></td>
                    <td class="col-4-row-6"></td>
                    <td class="col-5-row-6"></td>
                    <td class="col-6-row-6"></td>
                    <td class="col-7-row-6"></td>
                    <td class="col-8-row-6"></td>
                    <td class="col-9-row-6"></td>
                    <td class="col-10-row-6"></td>
                    <td class="col-11-row-6"></td>
                    <td class="col-12-row-6"></td>
                </tr>
           
		</table>
        
        <br>
           
        <table border="1" style="border-collapse:collapse; width: 100%; text-align: center;" class="month">
            <tr>
                <td>十二月</td>
                <td>十一月</td>
                <td>十月</td>
                <td>九月</td>
                <td>八月</td>
                <td>七月</td>
                <td>六月</td>
                <td>五月</td>
                <td>四月</td>
                <td>三月</td>
                <td>二月</td>
                <td>正月</td>
            </tr>
            <?php

            ?>
            <tr>
                <?php
                for($i=0; $i<=4; $i++){
                ?>
                    <tr>
                <?php
                    for($j=0; $j<=11; $j++){
                ?>
                    <td class="month">
                        <?php
                        $query = "SELECT * FROM god LEFT JOIN month ON god.id=month.list WHERE month.rol ='".$i."' AND month.col ='".$j."'";
                        $result = $conn->query($query);
                        while($row=mysqli_fetch_array($result)) {
                            echo $row['godlist'];
                        }
                        ?>
                    </td>
                <?php
                    }
                ?>
                    </tr>
                <?php
                }
                ?>
        </table>
        <br>
        <table>
            <label>若月份偏冲太岁，可塞太岁：保佑教你好运亨通。</label>
            <br>
            <label>若出生月份犯太岁，天狗，白虎，五鬼相冲剋，刑煞者，应在<u>其出生月份之前</u>来祭拜，祈求平安。</label>
            <br>
            <label>拜天狗：可用一粒肉包或一包鸡腿饭。</label>
            <br>
            <label>拜白虎：可用一块肥猪肉,两粒鸡蛋或鸭蛋，一包五色豆。 </label>
            <label>拜五鬼：可用一包什饭，五粒水果或五粒糖果，五支香烟及一支白米酒。</label>
        </table>
        <div>
            <label><b>电话：07-5569919</b></label>
            <label>电邮：tienhiewkiong@gmail.com</label>
        </div>

        <table>
            <?php
                        $query_table="SELECT * FROM taisui";
                        $result_table = $conn->query($query_table);
                        while($rows=mysqli_fetch_array($result_table)) {
            ?>
                    <label><b>注意：本宫为善信处理祈福事务，由农历<?php echo $rows['nongli1']; ?>开始至<?php echo $rows['nongli2']; ?></b></label>
                    <br>
                    <label>白虎星君开口日（惊蛰日）：<?php echo $rows['baihuDate']; ?></label>
                    <br>
                    <label>三刹日忌祈福：<?php echo $rows['qifuDate']; ?></label> 
            <?php
            }
            ?>                     
        </table>

        </form>

	   </div>
	</div>
</body>

<script>
    //print out result 
<?php
    $sql = "SELECT * from age_detail";
    $result = $conn->query($sql);
    while($rows = $result->fetch_assoc()){
?>
    
    $('.col-' + '<?php echo $rows['col']?>' + '-row-' + '<?php echo $rows['ro']?>').html('<?php 
        if ($rows['age'] != '0') {
            echo $rows['age'];
        }
        ?>');
<?php
    }
?>
</script>
<script>
    <?php
        $query = "SELECT * FROM month LEFT JOIN god ON god.id=month.list WHERE month.month ='extra'";
        $result = $conn->query($query);
        $rows = [];
        while($row=mysqli_fetch_array($result)) {
            array_push($rows, $row);
        }
    ?>

    let rows = <?php echo json_encode($rows) ?>;

    function getGodlistName(index) {
        return '<td>'+rows[index].godlist+'</td>';
    }

    function insertMonthOther(value) {
        value = Number(value);
        $('.month-other').remove();
        var monthArray = ['', '正', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'];

        var html = '<td class="month-other">润' + monthArray[value] + '月</td>';
        $('.month tr:first td:eq(' + (12-value) + ')').before(html);
        $('.month tr:eq(2) td:eq(' + (12-value) + ')').before(getGodlistName(0));
        $('.month tr:eq(3) td:eq(' + (12-value) + ')').before(getGodlistName(1));
        $('.month tr:eq(4) td:eq(' + (12-value) + ')').before(getGodlistName(2));
        $('.month tr:eq(5) td:eq(' + (12-value) + ')').before(getGodlistName(3));
        $('.month tr:eq(6) td:eq(' + (12-value) + ')').before(getGodlistName(4));
    }
     <?php
        $query = "SELECT * FROM othermonth";
        $result = $conn->query($query);
        while($row=mysqli_fetch_array($result)) {
            $othermonth= $row['othermonth'];

        }
    ?>
    insertMonthOther(<?php echo $othermonth ?>);

    window.print();
</script>

</html>