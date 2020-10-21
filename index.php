<?php
include("config.php");

$sql="SELECT id,arquivo FROM boss";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>World of Warcraft</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon"       href="Images/icon.png">
    <script src="https://wow.zamimg.com/widgets/power.js"></script>
    <script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>

    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://code.interactjs.io/v1.2.6/interact.min.js"></script>
    <script src="javascript.js"></script>
    <script src="snowstorm.js"></script>
    <!--Coin Slider-->
	<script type="text/javascript" src="coin-slider/coin-slider.min.js"></script>
	<link rel="stylesheet" href="coin-slider/coin-slider-styles.css" type="text/css" />
  </head>
<body>
<!-- Conteudo -->
<div class="conteudo">
    <!-- Coluna da Esquerda -->
    <div class="esquerda">
  
      <div class="corpo">
          <img src="Images/Dkong.png" style="width:100%">
        <div class="menu">
          <p>&nbsp<img src="Images/helmet.png" height="20px">&nbsp Dkong@Azralon</p>
          <p>&nbsp<img src="Images/horde.png" height="20px">&nbsp Donwaztok</p>
          <p><img src="Images/dk.png" height="20px"> Death Knight</p>
          <p><img src="Images/frost.png" height="20px"> Frost</p>
          <hr>

          <p><b>Skills</b></p>
          Escrivania
          <div class="fundoBarra">
            <div class="barra" style="width:100%">&nbsp800/800</div>
          </div>
          Alquimia
          <div class="fundoBarra">
            <div class="barra" style="width:100%">&nbsp800/800</div>
          </div>
          <br>
          <hr>

          <p><b></i>Baluarte da noite</b></p>
          <div class="fundoBarra">
            <div class="barra" style="height:24px;width:100%;margin-bottom:1px">&nbsp&nbspLfR&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp10/10</div>
          </div>
          <div class="fundoBarra">
            <div class="barra" style="height:24px;width:100%;margin-bottom:1px"">&nbsp&nbspNormal&nbsp&nbsp10/10</div>
          </div>
          <div class="fundoBarra">
            <div class="barra" style="height:24px;width:100%;margin-bottom:1px"">&nbsp&nbspHeroico&nbsp10/10</div>
          </div>
          <div class="fundoBarra">
            <div class="barra" style="height:24px;width:1%;display: inline-block;">&nbsp&nbspMitico&nbsp&nbsp&nbsp&nbsp&nbsp0/10</div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- Fim Coluna da Esquerda -->
    </div>

    <!-- Coluna da Direita -->
	<div class="direita">

		<div class="corpo" style="margin-bottom: 20px;">
			<div class="texto">
				<div id='coin-slider'>
					<img src="Images/Gallery/0.jpg" >
					<img src="Images/Gallery/1.jpg" >
					<img src="Images/Gallery/2.jpg" >
					<img src="Images/Gallery/3.jpg" >
					<img src="Images/Gallery/4.jpg" >
					<img src="Images/Gallery/5.jpg" >
					<img src="Images/Gallery/6.jpg" >
					<img src="Images/Gallery/7.jpg" >
					<img src="Images/Gallery/8.jpg" >
					<img src="Images/Gallery/9.jpg" >
					<img src="Images/Gallery/10.jpg" >
					<img src="Images/Gallery/11.jpg" >
					<img src="Images/Gallery/12.jpg" >
					<img src="Images/Gallery/13.jpg" >
					<img src="Images/Gallery/14.jpg" >
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#coin-slider').coinslider({ width: 900,height:506, navigation: true, delay: 5000 });
		});
		</script>

      <div class="corpo">
        <div style="text-align: center; padding-top: 5px; padding-bottom: 15px;">
          <h2>Baluarte da Noite</h2>
          <?php
            if (mysqli_num_rows($result) >0){
              while ($menu = mysqli_fetch_assoc($result)){
                echo "<div class=boss><a href=boss.php?id=".$menu["id"]."><img src=Images/".$menu["arquivo"].".jpg width=100%></a> </div>";
              }
            }
        ?>
        </div>
      </div>
    <!-- Fim Coluna da Direita -->
    </div>
<!-- Fim conteudo -->
</div>

<a href="#" class="scrollToTop"></a>
</body>
</html>
