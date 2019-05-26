<?php
$host = "localhost";
$db   = "wow";
$user = "root";
$pass = "";
if(!isset($_GET["id"])) $id=1; else $id = $_GET["id"];

$con = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
mysqli_query($con,"SET NAMES utf8");
mysqli_query($con,"SET CHARACTER_SET utf8");

$sql="SELECT * FROM boss WHERE id=".$id;
$result=mysqli_query($con,$sql);
$conteudo=mysqli_fetch_assoc($result);

$sql="SELECT id,arquivo FROM boss";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $conteudo["nome"];?></title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon"       href="Images/icon.png">
	<script src="https://wow.zamimg.com/widgets/power.js"></script>
	<script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>

	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="javascript.js"></script>
</head>

<body>
	<div class="bg" id="slideit"></div>
	<div id="myMenuicon" class="menuicon" onclick="NavBar()">
		<div class="bar1"></div>
		<div class="bar2"></div>
		<div class="bar3"></div>
	</div>

	<div id="mySidenav" class="sidenav">
		<a href="http://us.battle.net/wow/pt/character/azralon/Dkong/simple" target="Blank">
			<div class="Portrait">
				<img src="Images/DkongPortrait.png">
			</div>
		</a>
		<div class="texto">
			<br><font size="4px">Donwaztok</font>
			<font size="2px;"><i>Dkong@Azralon</i></font>
		</div>

		<?php
			if (mysqli_num_rows($result) >0){
				while ($menu = mysqli_fetch_assoc($result)){
					if($id == $menu["id"]){
						echo "<img style=filter:grayscale(100%);transform:translate3d(0px,0px,0px); src=Images/".$menu["arquivo"]."Stand.png></a>";
					} else { 
						echo "<a href=boss.php?id=".$menu["id"]."><img src=Images/".$menu["arquivo"]."Stand.png></a>"; 
					}
				}
			}
		?>
	</div>

	<div class="corpo">
		<img src=Images/<?php echo $conteudo["arquivo"]; ?>Mini.png width=100%>
		<div class="centro">
			<div class="texto">
				<br>
				<h1><?php echo $conteudo["nome"];?></h1>

				<div class="titulo">
					<img src="Images/DPS.png" width="30"> DPS
				</div>
				<?php echo $conteudo["dps"];?>

				<div class="titulo">
					<img src="Images/Tank.png" width="30"> Tank
				</div>
				<?php echo $conteudo["tank"];?>

				<div class="titulo">
					<img src="Images/Healer.png" width="30"> Healer
				</div>
				<?php echo $conteudo["heal"];?>

				<div class="titulo">
					<img src="Images/Loot.png" width="30"> Loot
				</div>
				<?php echo $conteudo["loot"];?>

				<iframe width=100% height=50% src=https://www.youtube.com/embed/<?php echo $conteudo["video"]; ?> frameborder=0 allowfullscreen></iframe>

				<hr>
				<p align="right">Video: <a href="http://www.wowgirl.com.br" target="Blank">WoWGirl</a></p>
			</div>
		</div>
	<hr>
	</div>
	<a href="#" class="scrollToTop"></a>
</body>
</html>
<?php
	mysqli_free_result($result);
	mysqli_close($con);
?>