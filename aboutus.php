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
			<section id="post" class="wrapper bg-img" data-bg="building2.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>About Us 本宫简介</h2>
							<p><strong>创庙人</strong></p>
						</header>
						<div class="content">
							
							
							<p>本宫创办人叶火生，原籍中国广东省，田头赤溪人。早年南来，定居新加坡武吉知马，经营杂货店兼猪肉小贩。其后，前来柔佛州士姑来埠过退休生活。由于妈祖之托梦，要他找寻其金身，经过数次的找寻不果，唯最后在新加坡某一条河旁大树下发现一个木箱，并从箱内寻获妈祖，普庵祖师及玄天上帝的金身，于1892年请到士古来供奉。叶氏终于1965年，遗下1男1女。</p>
							<p><strong>士姑来的开辟比陈厝港和新山都要早</strong></p>
							<p>根据英殖民地官A.E.Coope的论述，第一份巷契是于1833年发给士姑来河(Skudai River )的港主;但研究港主制度的著名学者Carl A. Trocki在柔佛州档案局发现的最早港契是1844年发给士姑来河港主 Ah Chun和Ban Seng。
							 
							无论是1833年或是1844年发出的首份港契都是发给士姑来河的港主。由此可见士姑来的开发比于1844年开发的陈厝港和1855年开发的新山都要早些。
							士姑来可算柔佛州内最早的港脚。可见，当年华人早就在士姑来河流域一带从事种殖甘蜜。华族同胞每在一个地方落户后，首先便建立庙宇，祭祀神明，保佑平安。当然，在士姑来、陈厝港和新山也不例外。陈厝港的灵山宫创立于1844年左右;新山的柔佛古庙创立年份未确定，但于其文物一幅匾额所志:“同治庚午/总握天柩/中国潮州众治子敬立”。按同治庚午即公元1870年，由此可知它在1870年时己存在。士姑来开发虽然还要早些，但该地的庙宇一天后宫却比较迟才建立。据考查:士姑来天后宫的一座铜钟上刻着:“光绪二十六年岁庚子”。清朝光绪二十六年即公元1900年，可见本庙迄今至少已有106年的悠久历史。但当地一般父老的推测，本庙是在1900年前创立的，究竟创立于何年呢？已故傅子龙指出:本庙创立于1892年。换句话说，它是在1900年前8年创建的。当时只是一所亚答厝，十分简陋。这样的推论虽未有文物佐证，但也不能说是没有道理。因为通常，华人初到一个地方，便会设立神坛祭祀神明，往后始筹款购地建庙，而庙宇落成后，善信便会敬送匾额或钟鼎之类的文物。</p>

							<br>
							<p>
							  具有百余年历史的天后宫，由原址到现址，由亚答庙舍到堂皇的庙宇，其间历尽沧桑，几经风雨。在先辈和善信的努力营造下，始奠下今日的规模。其历史发展过程，可分为下列三个时期:一、初创时期（1892—1934年），二、发展时期（1935—1974年），三、蜕变时期（1976—迄今）加以叙述。</p>
							
						

						</div>
						<footer>
							<ul class="actions">
								<li><a href="aboutus1.php" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>
								
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