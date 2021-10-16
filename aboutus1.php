<?php
include('config.php');
    session_start();

	if(!isset($_SESSION['username'])){
	  header("Location:login.php");
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<style type="text/css">
			p{
				color: white;
			}
			
		</style>
	</head>
	<body >
			<!-- navigation section -->
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="homemember.php">Temple Managment System</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li><a href="homemember.php">Home 首页</a></li>
			      <li><a href="aboutus.php">About Us&History本宫简介&历史 </a></li>
			      <li><a href="godhistory.php">God History神明典故 </a></li>         
			     
			      <li><a href="contactus.php">Contact Us 联系我们</a></li> 
			      
			      <li><a href="member_account.php"><input type="submit" name="" value="Member Account 会员账号"></a></li>
			      <li style="padding-right:100px; "><a href="logout.php">Logout登出</a></li> 
			      
			    </ul>
			  </div>
			</nav>

		<!-- Content -->
		<!--
			Note: To show a background image, set the "data-bg" attribute below
			to the full filename of your image. This is used in each section to set
			the background image.
		-->
			<section id="post" class="wrapper bg-img" data-bg="building.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>History 本宫历史</h2>
							
						</header>
						<div class="content">
							<p><strong>(一)初创对期(1892-1934)</strong></p>
								<p>由1892年至1934年，本庙庙址设在士姑来路，现邮政局的附近。当时庙舍简陋，只是一间亚答屋宇。安置有天后圣母、玄天上帝和普庵祖师三尊神明，以供善倍膜拜。

								有关三座神像的由来，据叶火生的孙子叶亚炳说:他的祖父在海岸边寻到三个箱子，各置放一座神像，便把神像带回供奉。初时，建一间简陋的小庙以安置神明金身。
								 
								另据刘光喜说:建在现址的庙宇乃是其祖父刘国辉承包兴建的。他又说:传说三座神明托梦於叶火生，数次，每次梦境都相同，神像是在海岸边一艘船上寻获的。
								 
								又据说:本庙乃由客藉人士叶火生创办，香火是由新加坡传来的。此传说有现存的一座铜钟为佐证。1900年众善信所敬赠的铜钟刻着:
								“大英国新加坡胜班兰暨信等敬铸钟磬奉送/天后宫、普庵祖师、真武玄天上帝。”

								沐恩众信芳名於后:黄玉堂、邬汉浦、朱为荣、傅东盛、李相通、叶薇容、黄天桓、梁十五、黄世南、黄华甫、吕子后、谢来兴、叶基让、黄星甫、廖三合、朱光巨、罗锦堂、朱锡浦、朱举山、叶观长、叶伙寿、廖有林、黄辅臣、叶圣星、叶运星、陈球利、黄门梁氏、魏门黄氏、香公陈宗道。

								光绪二十六年岁庚子

								仲冬月上浣穀旦立风调雨顺
								 
								上述的28位善男信女中，分别为黄、邬、朱、傅、李、叶、梁、呂、谢、廖、罗、陈十二姓氏善信。其中姓叶和姓黄的各占有6位，为最多。以此推测本庙创建人叶火生可能由新加坡移居士姑来，当他在士姑来安居后，创建士姑来天后宫。在新加坡的叶姓同宗连同别姓的善信，特敬赠铜钟一座。
								“圣德蘶峨英锡佑生群垂千古 神恩浩荡赫濯咸亨世界播世民”
								 
								上款刻:民国十二年岁癸亥季冬吉立。下款书:沐恩信善邱汝成敬送李焕初祥。
								 
								按民国十二年即为公元前1923年。由此可见，本庙在原址时，庙宇可能经过修复一次，庙宇略有规模。于己于人1923年信善邱汝成特赠送该幅对联。</p>
								<br>

								<p><strong>(二)发展时期(1935-1974)</strong></p>
								<p>本庙于1935年迁至现址重建庙宇。据现存的一片铜版记载:
								天后宫庙自民国二十年叶火生陈十九为总财，置呀囒此地方乃是张姓先年按押不能赎甘允出沽与天后宫，为实业捐题各商民人等。二十四年冬交与叶三记、纪寿山、刘义记、廖日堂、陈十九、朱秀廷、傅养记七职员，再捐助各商民信男信女等之款，集腋成裘赎回呀囒即择日建筑成功，想起一木焉能大厦，一石何增长城，蒙各界有热心踊跃捐助，念神恩庇佑，有求皆应显赫威灵，众信男信女，诚心乐助福有攸归矣，兹者为表记永垂不朽。
								 
								正总理叶三记
								副总理纪寿山
								财政员刘义记
								协理员廖日堂
								查帐傅养记
								由此可知于1931年，叶火生及陈十九购置现有庙址。迨至1935年，由叶三记、纪寿山、刘义记、廖日堂、陈十九、朱秀延、傅养记等发动筹募建庙基金，进行兴建庙宇。管理会正总理叶三记，副总理纪寿山、财政员刘义记、协理员廖日堂、查账为傅养记。

								本庙于1974年前没有健全的组织，管理人是由每年神诞时，中选的炉主和头家及庙祝管理。直到1975年才成立理事会负责庙宇的事务。因此在1975年前庙字资料阙如。据年老者口述所知：早期与庙务直接有关者除叶火生、陈十九外，尚有叶陆、周仁记、周番、叶火星、纪寿山、刘冷侯、陈其保、庄裕兴、张姓先、叶三记、刘义记、廖日堂、朱秀廷、傅养记、刘火星、何世辉、欧卓芬、叶润麟（叶扁）、林为丰、王文水、刘国辉、陈春华、廖化、吴若成、林广成、张福、张锦云、黄吉如、杨德、周金先、张炳源、张玉山、周森、林炎隆、卢潘生、刘郁奇、凌炳等人。

								现存另一幅对联：

								``天徳威灵巍巍遍及三千界

								后恩感应赫赫普施十二洲”

								此联乃于中华民国二十六年三月沐恩弟子陈家文拜题。按民国二十六年即为公元1937年。是在本庙于1935年在现址重建后，陈家文敬送的。

								本庙于1956年曾进行重修一次。现存的

								``天后宫重修民国四十五年丙申秋月

								各界仕女捐款芳名录记载”

								重修委员会的名誉理事：林广成、张福、张锦云、黄吉如、杨德。正总理：周金先，副总理：傅养记，财政：何世辉，司理：张炳源，查账：廖化，监工：廖化，炉主：张玉山，董事：张玉山、周森、林炎隆、卢潘生、刘郁奇、凌炳。

								重修后1958年善信田淇川敬增匾额一幅：

								``天后圣母神恩

								泽被苍生

								福建漳州东山县

								沐恩弟子田淇川敬叩

								公元一九五八年岁次戊戊仲秋日吉旦”

								此匾额是1958年存下的文物。</p>
								<br>
								<p><strong>(三）蜕变时期（1975—迄今</strong></p>
								<p>本庙自1892年至1974年没有正式的理事会组织，由1975年起，才正式成立理事会。

								1975年阴历三月廿三日神诞演戏酬神在当晚的平安宴会上，有善信建议，本庙应该正式成立一个理事会以负责庙务。此建议获得众善信赞成，即成立理事会。

								1975年首次成立理事会，采用总理制。首任总理为李土龙，副总理张玉山。

								由1977年至1986年（未注册）,由吴坤祥担任总理，副总理为傅子龙（1977一1987）。

								由1975年至1986年的十一年中，担任理事者计有下列：利发宝号（谢锡谊）、钱进发、卢生美、张拔江、洪逢川、何达锦、廖伙吉、江桂裕、张华、李义声、梁亚九、彭苟、赖世玉、王文水、翁文成、石金山、林为丰，黄汉，王亚国、李奎双、王光辉、陈德辉、吴德光、张锦、李春吉、联友酒业、黄正、符家福、黄梹城、叶成、陈福生、张玉山、万兴、进茂、郑创江、陈瑞庭、黄亚九、侯风顺、熊德成。

								本庙于1986年5月正式获准注册,由1987至2000年,理事会每两年一届。第一届及第二届主席为谢锡谊，第三届至第五届主席黄梹城，第六届主席黄福星，第七届主席陈均成。2001年起,理事会每三年一任，第八届及第九届主席为何朝东。</p>
								<br>
								<p>目前，本宫不单是供奉神明的场所,且是推行文化教育，举办文娱活动的所在。它扮演多种角色。

								本宫于2001年成立公益金，以供贫病人仕申请,另于2003年开始颁发会员子女学业异奖励金，以便在社会公益为教育方面尽点绵力</p>

								<p>另于2005年，本宫邀请华利信先进会计公司做为本宫义务外部会计审查师。

								在115年的历程中，本宫的历史可分为三个阶段：（一）初创时期,（二）发展时期,（三）蜕变时期,加以叙述。百多年来,可说是历尽沧桑,几经风雨。如今，根据前辈的口述及现存的资料,加以整理辑成是篇简史，以供参阅。

								2016 年 , 在本宫主席何朝东及众理事的鼎力支持协助下, 本宫与时并进, 全面迈入电脑化作业, 同时设立本身的网页, 此外, 也借着电脑化及系统化的策略将本宫历史资料, 重新修整, 为本宫未来的发展做出一个重大的奠基, 也为本宫的历史, 得以留芳万古, 系统工整传承世代,做出一项积极的贡献。</p>
								 <br>
								<p>随着电脑化计划的落实, 也意味着本宫开始迈向另一个时代的旅程碑, 更开拓了本宫逐步系统化及年轻化的发展理念目标, 期望这个计划能为本宫注入另番新气息, 迎向时代的最前端。</p>
						
						</div>
						<footer>
							<ul class="actions">
								<li><a href="aboutus.php" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>
								
							</ul>
						</footer>
					</article>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h2>Contact Us</h2>
					<h2>柔佛士姑来天后宫</h2>
					<h2>Rumah Berhala Tien Hiew Kiong</h2>
					<div id="contact">
					  <div class="container">
					    <footer>
					    <div class="row">
					      <div class="col-md-6 col-sm-6">
				        <p>Address 地址:Lot 1919, Jalan Bujuk, Kg. Baru, 81300 Skudai, Johor.</p>
					        <p>Email 电邮: <span>tienhiewKiong @gmail.com</span></p>
					        <p>Phone 联络号码: <span>07 5569919</span></p>
					        <p>Fax 传真号码: <span>07 5578919</span></p>
					      </div>
					    </div>
					    </footer>
					  </div>
					</div>

					<ul class="icons">
						
						<li><a href="https://www.facebook.com/pages/%E5%A3%AB%E5%8F%A4%E6%9D%A5%E5%A4%A9%E5%90%8E%E5%AE%AB/151924544910719/" class="icon round fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/explore/locations/259614210/" class="icon round fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>

					<div class="copyright">
						&copy; <a>Jasmine. All Rights Reserved | Design</a>. 
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>