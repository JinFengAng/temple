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
function getMonth($index) {
    $monthArray = [ '十二月', '十一月', '十月', '九月', '八月', '七月', '六月', '五月', '四月', '三月', '二月', '正月', 'extra' ];
    return $monthArray[$index];
}

if(isset($_POST['submit'])){
   
    $month = $_POST['month'];
    $hasRun = $_POST['hasRun'];

    if ($hasRun) {
        $total = 12;
    } else {
        $total = 11;
    }

    for($i=0; $i<=4; $i++){

        for($j=0; $j<= $total; $j++){
            $value = $month[$j][$i];
            $monthText = getMonth($j);
            $sql_result = "UPDATE month SET month='$monthText', rol='$i', col='$j', list='$value' WHERE rol='$i' AND col='$j';";
            $conn->query($sql_result);
        }
    }

    $runMonth = $_POST['runMonth'] ?? '';
    $sql_run_month = "UPDATE othermonth SET othermonth='$runMonth'";
    $conn->query($sql_run_month);

    $firstDate=$_POST['firstDate'];
    $nonglidate1=$_POST['nongli1'] ?? '';
    $nonglidate2=$_POST['nongli2'] ?? '';
    $baihudate=$_POST['baihui'] ?? '';
    $qifudate=$_POST['qifu'] ?? '';
    $sql_date = "UPDATE taisui SET firstDate='$firstDate', nongli1='$nonglidate1', nongli2='$nonglidate2', baihuDate='$baihudate',qifuDate='$qifudate' ";


    if($conn->query($sql_date)===TRUE){
        echo "<script> alert('Update record created')</script>";
        echo "<script> window.location='taisui.php';</script>";
    }//end sql
}//end submit

?>
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

        <form action="editmonth.php" method="POST">
            <div style="margin-left: 300px;">
                <div>
                    
                </div>
                <div>
                    <div class="vertical-orientation">
                        <h1>士姑来天后宫</h1>
                        <input type="text" id="year" name="firstDate" />
                    </div>
                </div>
              
                <label>今年是否有闰月？</label>
                <input type="radio" name="hasRun" class="hasRun" value="1" checked>是</input>
                <input type="radio" name="hasRun" class="hasRun" value="0">否</input>

                <br>
                <label class="runMonth">闰月在几月份？</label>
                <input type="radio" name="runMonth" class="runMonth" value="12"></input>
                <label for="12" class="runMonth">十二</label>

                <input type="radio" name="runMonth" class="runMonth" value="11"></input>
                <label for="11" class="runMonth">十一</label>

                <input type="radio" name="runMonth" class="runMonth" value="10"></input>
                <label for="10" class="runMonth">十</label>

                <input type="radio" name="runMonth" class="runMonth" value="9"></input>
                <label for="9" class="runMonth">九</label>

                <input type="radio" name="runMonth" class="runMonth" value="8"></input>
                <label for="8" class="runMonth">八</label>

                <input type="radio" name="runMonth" class="runMonth" value="7"></input>
                <label for="7" class="runMonth">七</label>

                <input type="radio" name="runMonth" class="runMonth" value="6"></input>
                <label for="6" class="runMonth">六</label>

                <input type="radio" name="runMonth" class="runMonth" value="5"></input>
                <label for="5" class="runMonth">五</label>

                <input type="radio" name="runMonth" class="runMonth" value="4"></input>
                <label for="4" class="runMonth">四</label>

                <input type="radio" name="runMonth" class="runMonth" value="3"></input>
                <label for="3" class="runMonth">三</label>

                <input type="radio" name="runMonth" class="runMonth" value="2"></input>
                <label for="2" class="runMonth">二</label>

                <input type="radio" name="runMonth" class="runMonth" value="1"></input>
                <label for="1" class="runMonth">正</label>

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
                   
                        <?php
                        for($i=0; $i<=4; $i++){
                        ?>
                            <tr>
                        <?php
                            for($j=0; $j<=11; $j++){
                        ?>
                            <td><select name="month[<?php echo $j; ?>][<?php echo $i; ?>]" class="godList">
                                <?php
                                    $query_god = "SELECT * FROM god";
                                    $result_god = $conn->query($query_god);
                                    while($rows = $result_god->fetch_assoc()){
                                ?>
                                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['godlist'] ?></option>
                                <?php
                                    }
                                ?>                            
                                <option>其他</option>
                                </select></td>
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
                    <label><b>注意：本宫为善信处理祈福事务，由农历<input type="text" name="nongli1">开始至<input type="text" name="nongli2"></b></label>
                    <br>
                    <label>白虎星君开口日（惊蛰日）：<input type="text" name="baihu"></label>
                    <br>
                    <label>三刹日忌祈福：<input type="text" name="qifudate"></label>
                                        
                </table>

                <input type="submit" name="submit"><br>
                <a href="taisui.php">Cancel取消</a>
            </div>
        </form>
    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    function getMonthSelection(value, colNumber) {
        return `
            <td class="month-other">
            <select name="month[`+value+`][`+colNumber+`]" class="godList">
                <?php
                    $query_god = "SELECT * FROM god";
                    $result_god = $conn->query($query_god);
                    while($rows = $result_god->fetch_assoc()){
                ?>
                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['godlist'] ?></option>
                <?php
                    }
                ?>                            
                <option>其他</option>
                </select>
            </td>
        `;
    }

    function insertMonthOther(value) {
        value = Number(value);
        $('.month-other').remove();
        var monthArray = ['', '正', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'];

        var html = '<td class="month-other">润' + monthArray[value] + '月</td>';
        $('.month tr:first td:eq(' + (12-value) + ')').before(html);

        $('.month tr:eq(1) td:eq(' + (12-value) + ')').before(getMonthSelection(12, 0));
        $('.month tr:eq(2) td:eq(' + (12-value) + ')').before(getMonthSelection(12, 1));
        $('.month tr:eq(3) td:eq(' + (12-value) + ')').before(getMonthSelection(12, 2));
        $('.month tr:eq(4) td:eq(' + (12-value) + ')').before(getMonthSelection(12, 3));
        $('.month tr:eq(5) td:eq(' + (12-value) + ')').before(getMonthSelection(12, 4));
        $('.month tr:eq(6) td:eq(' + (12-value) + ')').before(getMonthSelection(12, 5));
    }
    

    $('.hasRun').change(function () {
        if (this.value == '1') {
            $('.runMonth').show();
        } else {
            $('.runMonth').hide();
            $('.month-other').remove();
        }
    });

    $('.runMonth').change(function () {
        insertMonthOther(this.value);
    });
</script>

<script>
    $('.godList').change(function(){ 
        var value = $(this).val();
        if (value == '其他') {
            window.location.href = '/temple/godlist.php';
        }
    });

function getMonth($index) {
    $monthArray = [ '十二月', '十一月', '十月', '九月', '八月', '七月', '六月', '五月', '四月', '三月', '二月', '正月', 'extra' ];
    return $monthArray[$index];
}
</script>