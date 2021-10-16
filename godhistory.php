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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		 <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
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
			      <li><a href="member_account.php">Member Account 会员账号</a></li>
			      <li><a href="logout.php" style="text-align: right">Logout登出</a></li> 
			      
			    </ul>
			  </div>
			</nav>

		<!-- Content -->
		<!--
			Note: To show a background image, set the "data-bg" attribute below
			to the full filename of your image. This is used in each section to set
			the background image.
		-->
			<section id="post" class="wrapper bg-img" data-bg="mazhu.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>God History神明典故</h2>
							<p>主座：天后娘娘 ( 妈祖 ) 典故</p>
						</header>
						<div class="content">
							<p>天后娘娘就是妈祖，相传是福建莆田林姓人家的女儿，生于宋太祖建隆元年（960年）。传说她从小就持斋吃素，侍奉神灵。她羽化升天后，经常在海上救难，保护人民船只平安，于是受皇帝敕封为“天后”“圣母”。早在宋元时代，“天后娘娘”便随福建商人落籍海南。据史书记载，“海南岛最初的天后庙，那是元朝时代建在白沙津和海口的”（小叶田淳《海南岛史》）。《琼州府志》中对天后庙做明确记载的就有12个，几乎遍布海南沿海的乡镇。</p>
							<br>
							<p><strong>妈祖简介</strong></p>
							<p>妈祖，又称天妃、天后、天上圣母、娘妈，是历代船工、海员、旅客、商人和渔民共同信奉的神祇。古代在海上航行经常受到风浪的袭击而船沉人亡，船员的安全成航海者的主要问题，他们把希望寄托于神灵的保佑。在船舶启航前要先祭天妃，祈求保佑顺风和安全，在船舶上还立天妃神位供奉。

							相传妈祖的真名为林默，小名默娘，故又称林默娘，诞生于宋建隆元年（960年）农历三月二十三日。宋太宗雍熙四年（987年）九月初九逝世。</p>

							<br>
							<p><strong>妈祖的历史地位</strong></p>
							<p>妈祖在宋，元，明，清受到的国家祀典就达36次，其最长封号“护国庇民妙灵昭应弘仁普济福佑群生诚感咸孚显神赞顺垂慈笃佑安澜利运泽覃海宇恬波宣惠导流衍庆靖洋锡祉恩周德溥卫漕保泰振武绥疆天后之神”，后来同治十一年（1872年），要再加封时，“经礼部核议，以为封号字号过多，转不足以昭郑重，只加上‘嘉佑’二字。”

							澳门的英文Macau就是妈祖的简称。

							台湾的妈祖信仰十分普遍，台胞三分之一以上信仰妈祖，台湾全岛共有大小妈祖庙510座，其中台南一地即有116座。它们的名字很多，有的叫天妃宫、天后宫、妈祖庙；有的叫天后寺、天后祠、圣母坛；也有的叫文元堂、朝天宫、双慈亭、安澜厅、中兴公厝、纷阳殿、提标馆等。福建、台湾、广东及东南亚的林氏宗亲都称妈祖为：“姑婆”、“姑婆祖”、“天后圣姑”、“天上圣母姑婆”等。据统计妈祖为世界三大宗教信仰之一。
							</p>
							<br>
							

						</div>
						<footer>
							<ul class="actions">
								
								<li><a href="godhistory1.php" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>
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