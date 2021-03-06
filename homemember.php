<?php
include('config.php');
		session_start();
    if(!isset($_SESSION['username'])){
    	header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
		<title>Temple Mangment system</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="assets/css/main.css" />
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
      <li ><a href="logout.php" style="text-align: right">Logout 登出</a></li> 
      
    </ul>
  </div>
</nav>


<section id="banner" class="bg-img" data-bg="skudaitienhiewkiongDoor2.jpg">
        <div class="inner">
          <header>
            <h1>欢迎来到</h1>
              <h1>柔佛</h1>
            <h1>士姑来天后宫</h1>
          </header>
        </div>
        <a href="#one" class="more">Learn More</a>
      </section>

    <!-- One -->
      <section id="one" class="wrapper post bg-img" data-bg="qiuqian.jpg">
        <div class="inner">
          <article class="box">
            <header>
              <h2>History本宫历史</h2>
            </header>
            <div class="content">
              <p><strong>士姑来的开辟比陈厝港和新山都要早
              根据英殖民地官A.E.Coope的论述，第一份巷契是于1833年发给士姑来河(Skudai River )的港主;但研究港主制度的著名学者Carl A. Trocki在柔佛州档案局发现的最早港契是1844年发给士姑来河港主 Ah Chun和Ban Seng。</strong></p>
            </div>
            <footer>
              <a href="aboutus.php" class="button alt">了解更多</a>
            </footer>
          </article>
        </div>
        <a href="#two" class="more">Learn More</a>
      </section>

    <!-- Two -->
      <section id="two" class="wrapper post bg-img" data-bg="buyun.jpg">
        <div class="inner">
          <article class="box">
            <header>
              <h2>God History神明典故</h2>
              <p>主座：天后娘娘 ( 妈祖 ) 典故</p>
            </header>
            <div class="content">
              <p> <strong>妈祖，又称天妃、天后、天上圣母、娘妈，是历代船工、海员、旅客、商人和渔民共同信奉的神祇。古代在海上航行经常受到风浪的袭击而船沉人亡，船员的安全成航海者的主要问题，他们把希望寄托于神灵的保佑。在船舶启航前要先祭天妃，祈求保佑顺风和安全，在船舶上还立天妃神位供奉。<strong></p>
            </div>
            <footer>
              <a href="godhistory.php" class="button alt">了解更多</a>
            </footer>
          </article>
        </div>
        <a href="#three" class="more">Learn More</a>
      </section>

    <!-- Three -->
      <section id="three" class="wrapper post bg-img" data-bg="daxiaoren.jpg">
        <div class="inner">
          <article class="box">
            <header>
              <h2>Our Services 我们有的服务</h2>
            </header>
            <div class="content">
              <p><strong>问事</strong></p>
              <p>每天早上十点至下午两点、星期四休息</p>
              <p><strong>点灯,补运,祭虎爷、打小人</strong></p>
            </div>
            
          </article>
        </div>
        <a href="#four" class="more">Learn More</a>
      </section>

    <!-- Four -->
      <section id="four" class="wrapper post bg-img" data-bg="zuc.jpg">
        <div class="inner">
          <article class="box">
            <header>
              <h2>婚姻注册</h2>
            </header>
            <div class="content">
              <p><strong>注册处办公时间:星期六、星期日 及公共假期</strong></p>
              <p>咨询电话：07-557 8919</p>
              <p>whatApps: 012-747 832</p>
              <p>助理婚姻注册官：019-7515678 （Mr. Chan 曾治烨硕士）</p>
            </div>
            
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