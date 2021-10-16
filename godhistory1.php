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
							<h2>God History神明典故</h2>
							<p>普庵祖师</p>
						</header>
						<div class="content">
							<p><strong>普庵祖师简介</strong></p>
							<p>普庵禪師（1115-1169），南宋僧人，今江西宜春人，號普庵，世居宜春縣石里鄉太平里。唐時，精通風水的司馬頭陀和尚，曾到此地，留下鈴記云：南山有個七星嶂，亥脈宜丙向，面前峰秀似懸幡，佛祖不為難。果然，宋徽宗政和五年（1115年）11月27日辰時，餘坊村一餘姓人家室內祥光燭天，隱現蓮花，普庵出世了。師生時，蓮花生於他家稻田的阡陌上。六歲時，忽夢有一梵僧，用指點他的胸曰：“你他日將自悟取。”，並指示日後當闡揚佛法。第二天醒後看，但見胸前有點大如櫻桃，被點之處成了硃砂色。知非凡物，父母遂允其出家為僧。在南宋紹興四年（1134）年之八月，拜慈化寺正賢和尚為師。十一年四月落髮，次年五月受戒，祖師之容貌魁奇，天性巧慧，賢公深為器重。一日，正賢授普庵《法華經》，普庵卻說：“諸佛玄旨，貴悟於心，數墨循行，何益於道！”一番話顯示出對佛法有著不可以思議的因緣。</p>
							<br>
							<p><strong>普庵祖师的历史地位</strong></p>
							<p>普庵的神通之力非同一般，屢屢為民禳災去病，救旱抗洪。南宋嘉熙元年，因祈雨封“寂感禪師”；淳佑10年，因救旱加封“妙濟禪師”；因禳疫加封“真覺禪師”。咸淳四年，又封“昭賜禪師”，大德四年，加“大德禪師”，皇慶元年加封“慧慶禪師”。師生前除災除病之靈驗頗多。元仁宗延佑初年（1314～1320）吳郡姑蘇城西有慧慶寺，其寺後即造有普光明殿供奉普庵。此外，禪林多於佛殿背後安置師之肖像。普庵禪師圓寂之前，曾花5年功夫，刺血泥金，書寫了一部《金剛經》。這部供奉在慈化寺的血書《金剛經》與珍藏在臨江慧力寺的蘇東坡手書《金剛經》碑，都是江西境內極負盛名的佛寺鎮寺之寶。</p>

							
						</div>
						<footer>
							<ul class="actions">
								<li><a href="godhistory.php" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>
								<li><a href="godhistory2.php" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>
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