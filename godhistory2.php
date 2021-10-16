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
			      <li class="active"><a href="homemember.php">Home 首页</a></li>
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
			<section id="post" class="wrapper bg-img" data-bg="building2.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>God History神明典故</h2>
							<p>玄天上帝</p>
						</header>
						<div class="content">
							
							<p><strong>玄天上帝简介</strong></p>
							<p>玄天大帝原为北极星的神格化，据礼记载：「前朱鸟，而后玄武。」朱鸟指南方的七星，玄武即北方的七斗星，古人以为北极星是治天界的神，权力很大。而玄武位正北方，五行说属水，壬为阳水，以腾蛇之雄配，癸为阴水，以鸟之雌配，雌雄相交是谓玄武，玄天上帝就 是玄武的神格化。其塑像因而手持北斗七星剑，右脚踏蛇，左脚踏龟，在汉朝即为人们尊崇，以湖北省均县武当山为本山。</p>
							<br>
							<p><strong>玄天上帝的历史地位</strong></p>
							<p>元天上帝, 也被称誉为玄天上帝，即真武帝，或真武、北极真君。真武即北方之神玄武，宋时避讳改玄为真，称真武帝，宋朝道教的北方上帝，明朝天子的保护神。元始天尊说法于玉清，下见恶风弥塞，乃命周武伐纣以治阳，玄帝收魔以治阴。因此玄天上帝又为主持兵事的剑仙之主，地位仅次于剑仙之祖广成剑仙。真武兴盛于宋代，至元代又被晋升为元圣仁威玄天上帝，明成祖时地位更加显赫。有关真武的传说中，又皆称龟蛇乃六天魔王以坎离二气所化，然被真武神力蹑于足下，成为其部将。后世称之为龟蛇二将。玄天上帝每每斩妖锄魔都御剑出行。武当山为玄天上帝的圣地。至孝，及至晚年，悔悟自己的行业，杀生太多，难积阴德，乃毅然放下屠刀，隐入深山，欲行修性；适遇一仙人告曰：山中有妇人分娩，请速 帮忙。未即果见妇人，手抱婴儿，请他代洗产后污物。当他在河中洗濯时，突见河中有金光浮现，一时有所顿悟，回首一顾，妇人已去，知其为观音显现，以试练他的诚心。屠夫修性，暂有所悟，一日忽得神意，欲除杀生之罪，须刀割自己腹肚，取出脏腑，洗清罪过，屠夫遵意而行，剖腹於河中至诚感天，遂成仙，为玄天上帝。而其弃於河中胃脏却变成龟，肠变成蛇，兴妖作怪，玄天上帝又亲自下凡降服此衍生於罪过的胃肠。</p>

						</div>
						<footer>
							<ul class="actions">
								<li><a href="godhistory1.php" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>
								
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