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
  <title>Temple system</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKjsz8HDY_TmMsZpdUzbWVc7kDr6EjcdU&callback=initMap">
</script>
  <style>
       #map {
        height: 400px;
        width: 100%;
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
        <li><a href="aboutus.php">About Us&History本宫简介&历史 </a></li>
        <li><a href="godhistory.php">God History神明典故 </a></li>         
       
        <li><a href="contactus.php">Contact Us 联系我们</a></li> 
        
        <li><a href="member_account.php">Member Account 会员账号</a></li>
        <li style="padding-right:203px;"><a href="logout.php">Logout登出</a></li> 
        
      </ul>
    </div>
  </nav>

<div style="text-align: center;">
<h2>柔佛士姑来天后宫</h2>
<h2>RUMAH BERHALA TIEN HIEW KIONG
</h2>
     <p>Lot 1919,Jalan Bujuk,<br>
      Kg.Baru<br>
      81300 Skudai, Johor</p> 
      <p>Email 电邮: <span>tienhiewKiong @gmail.com</span></p>
                  <p>Phone 联络号码: <span>07 5569919</span></p>
                  <p>Fax 传真号码: <span>07 5578919</span></p>
      <p>GPS Coordinate 地标:
          E 103° 39' 38.5'' N 1° 32' 14.0'</p>
<p>Google Maps:<a href="https://maps.app.goo.gl/onJDv3GmWSEKszpR9">link 链接</a>></p>
</div>
<div id="map">
   <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const Skudai = { lat: 1.53730, lng: 103.65993 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: Skudai,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: Skudai,
          map: map,
        });
      }
    </script>
    
</div>
<!-- copyright section -->      
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <p>&copy; Jasmine. All Rights Reserved | Design
      </div>
    </div>
  </div>
</div>

</body>
</html>