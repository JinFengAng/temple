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
                <h2>相配 Match Family System</h2>
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

                        <legend style="background-color: #3CBC8D;padding: 10px;">Member Details</legend>
                    
                        <div class="row">
                            <table style="width: 200px;">
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
                                </tr>
                                 <tr>
                                      <td>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        
                        
                        <input type="button" id="match" name="match" value="Match">
                        <a href="chooseMatch.php">Cancel</a>                  
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
                                '<tr><td><input type="text" id="cname" value="'+result.name+'"></td></tr>'+
                                '<tr><td><input value="'+result.birthday+'"></td></tr>'+
                                '<tr><td><input value="'+birthdayYear+'"></td></tr>'+
                                '<tr><td><input value="'+birthdayMonth+'"></td></tr>'+
                                '<tr><td><input value="'+birthdayDay+'"></td></tr>'+
                                '<tr><td><input value="'+result.relationship+'"></td></tr>'+
                                '</tr>'+
                                '</table><a href="Directpayment.php?id='+result.memberid+'">付款</a>'
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
                                '<tr><td><input value="'+result.name+'"></td></tr>'+
                                '<tr><td><input value="'+result.birthday+'"></td></tr>'+
                                '<tr><td><input value="'+birthdayYear+'"></td></tr>'+
                                '<tr><td><input value="'+birthdayMonth+'"></td></tr>'+
                                '<tr><td><input value="'+birthdayDay+'"></td></tr>'+
                                '<tr><td><input value="'+result.relationship+'"></td></tr>'+
                                '</tr>'+
                                '</table><a href="Directpayment.php?id='+result.memberid+'">付款</a>'
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