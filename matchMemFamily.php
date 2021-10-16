<?php
require('config.php');
session_start();
// if(!isset($_SESSION['admin'])){
//     header("Location:loginAdmin.php");
// }
if(!isset($_SESSION['username'])){
  header("Location:login.php");
}

        $query = "SELECT mem_cname, mem_birthday,mem_cbirth,mem_cbirthyear,mem_cbirthmonth FROM member LEFT JOIN age_detail ON member.birthday= age_detail.age";
        $result = $conn->query($query);

function filterTable($query){
    $con = mysqli_connect("localhost","root","","temple");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
}
   
// /**
//     * 将阴历转换为阳历
//     * @param year 阴历-年
//     * @param month 阴历-月，闰月处理：例如如果当年闰五月，那么第二个五月就传六月，相当于阴历有13个月，只是有的时候第13个月的天数为0
//     * @param date 阴历-日
//     */
//     function convertLunarToSolar($year,$month,$date){
//         $yearData = $this->lunarInfo[$year-$this->MIN_YEAR];
//         $between = $this->getDaysBetweenLunar($year,$month,$date);
//         $res = mktime(0,0,0,$yearData[1],$yearData[2],$year);
//         $res = date('Y-m-d', $res+$between*24*60*60);
//         $day    = explode('-', $res);
//         $year    = $day[0];
//         $month= $day[1];
//         $day    = $day[2];
//         return array($year, $month, $day);
//     }
// ?>



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
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/main.css" />
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

.row {
  display: flex;
  justify-content: space-between;
}

.row2 {
    display: flex;
    justify-content: space-between;
}

</style>
	
</head>
<body>
    <!-- navigation section -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homemember.php">Temple Managment System</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="homemember.php">Home 首页</a></li>
          <li><a href="aboutus.php">About Us&History 本宫简介&历史 </a></li>
          <li><a href="godhistory.php">God History神明典故 </a></li>         
         
          <li><a href="contactus.php">Contact Us 联系我们</a></li> 
          
          <li><a href="member_account.php">Member Account 会员账号</a></li>
          <li style="padding-left:230px; "><a href="logout.php" style="text-align: right">Logout 登出</a></li> 
          
        </ul>
      </div>
    </nav>

    <div style="float: left; padding-left: 300px;">
        <div style="width: 98%;margin: 10px;">
            <div style="width: 100%;height: 45px;">
                <h2 style="color: black;">相配 Match System</h2>
            </div>
            <div class="form">          
                <form action="match.php" method="POST">
                    <fieldset>
                         <!-- <input style="border-radius: 5px;margin-left: 20px;" type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
                         <input type="button" name="search" value="Search" id="searchButton"> -->
                         <select id="member">
                            <option>请选择</option>
                        <?php
                            $sql = "SELECT * FROM member WHERE member_id = '".$_SESSION['member_id']."'" ;
                            $member_result = $conn->query($sql);
                            while($rows = $member_result->fetch_assoc()){
                                $id= $rows['member_id'];
                                $cname= $rows['mem_cname'];
                        ?>
                            <option value="<?php echo $id ?>"><?php echo $cname; ?></option>
                            <!-- <p><?php echo $cname; ?></p> -->
                        <?php
                            }
                        ?>
                        </select> 

                        <legend style="background-color: #3CBC8D;padding: 10px;">Member Details</legend>
                    
                        <div class="row">
                            <table style="width: 200px; color: black">
                                <!-- <tr>
                                    <td>

                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                    </td>
                                </tr>
                                 <tr>
                                      <td>
                                    </td>
                                </tr> -->
                            </table>
                        </div>

                        
                        
                        <input type="button" id="match" name="match" value="Match">
                        <a href="member_account.php">Cancel</a>                  
                    </fieldset> 
                    <br> 
                    <br>
                    <div class="row2">
                    </div>

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
    <?php
        $sql2="SELECT * FROM family WHERE died = '0'";
        $result2= $conn->query($sql2);
        while($rows =$result2->fetch_assoc()){
            $died=$rows['died'];
        }
    ?>
     <script>
      $( function() {
        $( "#birthday" ).datepicker({
            dateFormat: "yy-mm-dd",
        });

        let matchBirthdayYear = '';
        let matchBirthdayMonth = '';
        $('.row2').hide();


        $('#match').click(function () {
            console.log();
            $('.row2').show();
        });

        $('#member').change(function (event) {
            const memberId = $('#member').val();
            getMemberDetail(memberId);
            $('.row2').hide();
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

        function getMemberDetail(memberId) {
             $.ajax({
                url: 'getMemberDetail.php',
                type: 'post',
                dataType: 'json',
                data: {
                    memberId: memberId,
                },
                success: function (result) {
                    $.ajax({
                        url: 'getLunar.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            birthday: result.birthday,
                        },
                        success: function (resultLunar) {
                            let birthdayYear = resultLunar[3];
                            let birthdayMonth = resultLunar[1];
                            let birthdayDay = resultLunar[2];
                            $('#birthdayYear').val(birthdayYear);
                            $('#birthdayMonth').val(birthdayMonth);
                            $('#birthdayDay').val(birthdayDay);
                            $('.row').empty();
                            $('.row').append(
                                '<table>'+
                                '<tr>'+
                                '<tr><td style="">名字</td></tr>'+
                                '<tr><td>生日</td></tr>'+
                                '<tr><td>农历生日（年份）</td></tr>'+
                                '<tr><td>农历生日（月份）</td></tr>'+
                                '<tr><td>农历生日</td></tr>'+
                                '<tr><td>家庭关系</td></tr>'+
                                '</tr>'+
                                '</table>'
                            );
                            $('.row').append(
                                '<table>'+
                                '<tr>'+
                                '<tr><td><input type="text" style="color:black" id="cname" value="'+result.name+'"></td></tr>'+
                                '<tr><td><input value="'+result.birthday+'" style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayYear+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayMonth+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayDay+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+result.relationship+'"style="color:black"></td></tr>'+
                                '</tr>'+
                                '</table><a href="Directpayment.php?id='+result.memberid+'"></a>'
                            );

                            $.ajax({
                                url: 'getMatchTaisuiMonth.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    birthdayYear: resultLunar[0],
                                    birthdayMonth: birthdayMonth,
                                },
                                success: function (monthResult) {
                                    console.log(monthResult.output);

                                    let thisYear = new Date().getFullYear();
                                    console.log(thisYear);
                                    let birthdayYear = Number(resultLunar[0]);
                                    console.log(birthdayYear);

                                    let age = thisYear - birthdayYear + 1;
                                    console.log(age);

                                    let hasAge = monthResult.output.find((element) => {
                                        return element == age;
                                    });
                                    if (hasAge) {
                                        showAge = age;
                                    } else {
                                        showAge = '';
                                    }


                                    tempMonths = monthResult.outputMonth;
                                    console.log(tempMonths);
                                    tempAge = showAge;

                                    $('.row2').empty();
                                    $('.row2').append(
                                        '<table border="1">'+
                                        '  <td>'+result.name+'</td>'+     
                                        '    <tr>'+
                                        '        <td>太岁</td>'+
                                        '        <td id="taisui">'+showAge+'</td>'+
                                        '        <td></td>'+
                                        '        <td></td>'+
                                        '        <td></td>'+    
                                        '    </tr>'+
                                        '    <tr>'+
                                        '        <td>月份</td>'+
                                        '        <td id="month1">'+monthResult.outputMonth[0]+'</td>'+
                                        '        <td id="month2">'+monthResult.outputMonth[1]+'</td>'+
                                        '        <td id="month3">'+monthResult.outputMonth[2]+'</td>'+
                                        '        <td id="month4">'+monthResult.outputMonth[3]+'</td>'+
                                        '        <td id="month5">'+monthResult.outputMonth[4]+'</td>'+
                                        '    </tr>'+
                                        '</table>'
                                    );
                                },
                            });

                            getFamilyMember(memberId);
                        },
                    });
                },
            });
        }

        function getMatchTaisuiMonth(birthdayYear, birthdayMonth) {
           
        }

        let tempMonths= [];
        let tempAge = 0;

        let tempFamilies = [];

        function getMemberDetailByFamilyId(familyId) {
             $.ajax({
                url: 'getMemberDetail.php',
                type: 'post',
                dataType: 'json',
                data: {
                    familyId: familyId,
                },
                success: function (result) {
                    console.log(result.birthday);
                     $.ajax({
                        url: 'getLunar.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            birthday: result.birthday,
                        },
                        success: function (resultLunar) {
                            console.log(result);
                            console.log(resultLunar);
                            let birthdayYear = resultLunar[3];
                            let birthdayMonth = resultLunar[1];
                            let birthdayDay = resultLunar[2];
                            $('.row').append(
                                '<table>'+
                                '<tr>'+
                                '<tr><td><input value="'+result.name+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+result.birthday+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayYear+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayMonth+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+birthdayDay+'"style="color:black"></td></tr>'+
                                '<tr><td><input value="'+result.relationship+'"style="color:black"></td></tr>'+
                                '</tr>'+
                                '</table><a href="Directpayment.php?id='+result.memberid+'"></a>'
                            );



                            $.ajax({
                                url: 'getMatchTaisuiMonth.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    birthdayYear: resultLunar[0],
                                    birthdayMonth: birthdayMonth,
                                },
                                success: function (monthResult) {
                                    console.log(result);

                                    let thisYear = <?php echo $thisYearTaisui; ?>;
                                    let birthdayYear = Number(resultLunar[0]);
                                    let age = thisYear - birthdayYear + 1;
                                    console.log(thisYear);
                                    console.log(birthdayYear);
                                    console.log(age);

                                    let hasAge = monthResult.output.find((element) => {
                                        return element == age;
                                    });
                                    if (hasAge) {
                                        showAge = age;
                                    } else {
                                        showAge = '';
                                    }

                                    tempFamilies.push({
                                        age: showAge,
                                        months: monthResult.outputMonth,
                                        familyId: familyId,
                                        cname: result.name,
                                    });

                                    $('.row2').append(
                                        '<table border="1">'+
                                        '<td>'+result.name+'</td>'+
                                        '    <tr>'+
                                        '        <td>太岁</td>'+
                                        '        <td id="taisui">'+showAge+'</td>'+
                                        '    </tr>'+
                                        '    <tr>'+
                                        '        <td>月份</td>'+
                                        '        <td id="month1">'+monthResult.outputMonth[0]+'</td>'+
                                        '        <td id="month2">'+monthResult.outputMonth[1]+'</td>'+
                                        '        <td id="month3">'+monthResult.outputMonth[2]+'</td>'+
                                        '        <td id="month4">'+monthResult.outputMonth[3]+'</td>'+
                                        '        <td id="month5">'+monthResult.outputMonth[4]+'</td>'+
                                        '    </tr>'+
                                        '</table>'
                                    );
                                },
                            });
                        },
                    });
                    
                },
            });
        }

        function getFamilyMember(memberId) {
             $.ajax({
                url: 'getFamilyMember.php',
                type: 'post',
                dataType: 'json',
                data: {
                    memberId: memberId,
                },
                success: function (result) {
                    console.log(result);
                    $("#family-member").empty();
                    tempFamilies = [];
                    
                    for (i = 0; i < result.length; i++) {
                        familyId = result[i];
                        getMemberDetailByFamilyId(familyId);
                    }
                },
            });
        }//end
      
        $('#match').click(function() {
            var memberId = $('#member').val();
            var cname= $('#cname').val();
            var taisui= tempAge;
            var month1= tempMonths[0];
            var month2= tempMonths[1];
            var month3= tempMonths[2];
            var month4= tempMonths[3];
            var month5= tempMonths[4];
            console.log(tempMonths);
               // alert(cname);
                $.ajax({
                    url: "insertResult.php",
                    type: "POST",
                    data:{
                        memberId:memberId,
                        cname:cname,
                        taisui:taisui,
                        month1:month1,
                        month2:month2,
                        month3:month3,
                        month4:month4,
                        month5:month5,
                    },
                   
                    success: function(data){
                       
                        
                    },
                });

            for (let i = 0; i < tempFamilies.length; i++) {

                var memberId = $('#member').val();
                var cname= $('#cname').val();
                

                console.log(tempFamilies);
                var familyId = tempFamilies[i].familyId;
                var cname = tempFamilies[i].cname;
                var taisui= tempFamilies[i].age;
                var month1= tempFamilies[i].months[0];
                var month2= tempFamilies[i].months[1];
                var month3= tempFamilies[i].months[2];
                var month4= tempFamilies[i].months[3];
                var month5= tempFamilies[i].months[4];

                $.ajax({
                    url: "resultFamily.php",
                    type: "POST",
                    data:{
                        familyId:familyId,
                       
                        cname:cname,
                        taisui:taisui,
                        month1:month1,
                        month2:month2,
                        month3:month3,
                        month4:month4,
                        month5:month5,
                    },
                   
                    success: function(data){
                       
                        
                    },  
                });
            }
       });
    });
</script>