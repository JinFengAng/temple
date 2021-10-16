<?php
require('config.php');
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:loginAdmin.php");
}

        $query = "SELECT mem_cname, mem_birthday,mem_cbirth,mem_cbirthyear,mem_cbirthmonth FROM member LEFT JOIN age_detail ON member.birthday= age_detail.age";
        $result = $conn->query($query);

 function filterTable($query){
     $con = mysqli_connect("localhost","root","","temple");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

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

    <div style="float: left; padding-left: 300px;">
        <div style="width: 98%;margin: 10px;">
            <div style="width: 100%;height: 45px;">
                <h2>相配 Match System</h2>
            </div>
            <div class="form">          
                <form action="match.php" method="POST">
                    <fieldset>
                         <input style="border-radius: 5px;margin-left: 20px;" type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
                         <input type="button" name="search" value="Search" id="searchButton">
                        <select id="member">
                            <option>请选择</option>
                        <?php
                            $sql = "SELECT * FROM member";
                            $member_result = $conn->query($sql);
                            while($rows = $member_result->fetch_assoc()){
                                $id= $rows['member_id'];
                                $cname= $rows['mem_cname'];
                        ?>
                            <option value="<?php echo $id ?>"><?php echo $cname; ?></option>
                        <?php
                            }
                        ?>
                        </select>

                        <legend style="background-color: #3CBC8D;padding: 10px;border: 1px solid black">Member Details</legend>
                        <br>
                        <label for="name">名字 Member Name：</label>
                        <input type="text" id="name" name="name" placeholder=" "  value=""required>
                        <br>
                        <label for="birhtday">生日 ：</label>
                        <input type="text" id="birthday" name="birhtday" placeholder=" "value="" required>
                        <br>
                        <label for="birthdayYear">农历生日（年份） ：</label>
                        <input type="text" id="birthdayYear" name="birthdayYear" placeholder=" "value="" required>
                        <br>
                        <label for="birthdayMonth">农历生日 （月份）：</label>
                        <input type="text" id="birthdayMonth" name="birthdayMonth" placeholder=" " value=" "required>
                        <br>
                        <label for="birthdayDay">农历生日：</label>
                        <input type="text" id="birthdayDay" name="birthdayDay" placeholder="" value="" required>
                        <br>

                        <input type="button" id="match" name="Update" value="Match">
                        <a href="chooseMatch.php">Cancel</a>                  
                    </fieldset> 
                    <br> 
                    <br>
                    <table border="1">
                        <tr>
                            <td>太岁</td>
                            <td class="taisui-0"></td>
                            <td class="taisui-1" id="taisui"></td>
                            <td class="taisui-2"></td>
                            <td class="taisui-3"></td>
                            <td class="taisui-4"></td>
                            <td class="taisui-5"></td>
                        </tr>
                        <tr>
                            <td>月份</td>
                            <td class="month-0" ></td>
                            <td class="month-1" id="month1"></td>
                            <td class="month-2" id="month2"></td>
                            <td class="month-3" id="month3"></td>
                            <td class="month-4" id="month4"></td>
                            <td class="month-5" id="month5"></td>
                        </tr>
                       
                    </table>
                    <div id="link"></div>
                    
                </form>
            </div>
        </div>      
    </div>

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <?php
        $sql = "SELECT * FROM taisui_year LIMIT 1";

        $result = $conn->query($sql);
        $thisYearTaisui = date('Y');
        while($rows = $result->fetch_assoc()){
            $thisYearTaisui = $rows['this_year'];
        }
    ?>
     <script>
      $( function() {
        $( "#birthday" ).datepicker({
            dateFormat: "yy-mm-dd",
        });


        $('#searchButton').click(function () {
            var searchText = $('input[name=valueToSearch').val();
            console.log(searchText);


            $.ajax({
                url: 'searchMemberName.php',
                type: 'post',
                dataType: 'json',
                data: {
                    name: searchText,
                },
                success: function (result) {
                    getMemberDetail(result);
                },
            });
        });

        let matchBirthdayYear = '';
        let matchBirthdayMonth = '';

        function getLunarOutput(value) {
            $.ajax({
                url: 'getLunar.php',
                type: 'post',
                dataType: 'json',
                data: {
                    birthday: value,
                },
                success: function (result) {
                    let birthdayYear = result[3];
                    let birthdayMonth = result[1];
                    let birthdayDay = result[2];
                    $('#birthdayYear').val(birthdayYear);
                    $('#birthdayMonth').val(birthdayMonth);
                    $('#birthdayDay').val(birthdayDay);

                    matchBirthdayYear = result[0];
                    matchBirthdayMonth  = birthdayMonth;
                },
            });
        }

        $('#match').click(function () {
            getMatchTaisuiMonth(matchBirthdayYear, matchBirthdayMonth);
        });

        function getMemberDetail(memberId) {
             $.ajax({
                url: 'getMemberDetail.php',
                type: 'post',
                dataType: 'json',
                data: {
                    memberId: memberId,
                },
                success: function (result) {
                    $('#name').val(result.name);
                    $('#birthday').val(result.birthday);
                    getLunarOutput(result.birthday);
                },
            });
        }

        function getMatchTaisuiMonth(birthdayYear, birthdayMonth) {
            $.ajax({
                url: 'getMatchTaisuiMonth.php',
                type: 'post',
                dataType: 'json',
                data: {
                    birthdayYear: birthdayYear,
                    birthdayMonth: birthdayMonth,
                },
                success: function (result) {
                    console.log(result.output);
                    for (var i=0; i<7; i++) {

                        let thisYear = <?php echo $thisYearTaisui; ?>;
                        let birthdayYear = Number(matchBirthdayYear);
                        let age = thisYear - birthdayYear + 1;
                        console.log(thisYear);
                        console.log(birthdayYear);
                        console.log(age);
                        console.log(result.output);
                        console.log('------------------------------------------------------------------------');


                        let hasAge = result.output.find((element) => {
                            return element == age;
                        });
                        if (hasAge) {
                            $('.taisui-0').text(age);

                        }
                    }
                    for (var i=0; i<6; i++) {
                        $('.month-' + i).text(result.outputMonth[i]);
                    }

                    const memberId = $('#member').val();
                    $('#link').empty();
                    $('#link').append('<a href="Directpayment.php?id='+memberId+'">付款</a>');
                    var cname= $('#cname').val();
                    var taisui= $('.taisui-0').text();
                    var month1= result.outputMonth[0];
                    var month2= result.outputMonth[1];
                    var month3= result.outputMonth[2];
                    var month4= result.outputMonth[3];
                    var month5= result.outputMonth[4];
                    console.log('memberId', memberId);
                    console.log('taisui', taisui);
                    console.log('month1', month1);
                    console.log('month2', month2);
                    console.log('month3', month3);
                    console.log('month4', month4);
                    console.log('month5', month5);

                    $.ajax({
                        url: "insertResult.php",
                        type: "POST",
                        data:{
                            memberId:memberId,
                            cname:cname || '',
                            taisui:taisui || '',
                            month1:month1 || '',
                            month2:month2 || '',
                            month3:month3 || '',
                            month4:month4 || '',
                            month5:month5 || '',
                        },
                        success: function(){
                        },
                    });
                },
            });       
        }

        $('#member').change(function (event) {
            const memberId = $('#member').val();
            console.log(memberId);
            getMemberDetail(memberId);
        });

        $('#birthday').change(function (event) {
            const birthday = $('#birthday').val();
            getLunarOutput(birthday);
        });
      });
      </script>