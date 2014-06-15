<?php
session_start();
if (!isset ($_SESSION['korisnik'])){
header ('Location: login.html');
} 
//header('Content-type: image/png');
					$link=mysqli_connect("localhost","root","123","labosi");

					/* Provjera spajanja */
					if(mysqli_connect_errno()){
					exit ('Baza ne postoji: '. mysqli_connect_error ()); 
					}

					$link2=mysqli_select_db($link,"unosBaza");
					$link3=mysqli_query($link, "SET NAMES 'utf8'");
					$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");
					$query1=mysqli_query($link,"SELECT COUNT(*) as muski FROM unosBaza WHERE spol='M'") ;
					$query2= mysqli_query($link,"SELECT COUNT(*) as zenski FROM unosBaza WHERE spol='Ž'") ;
					
					$data1=mysqli_fetch_assoc($query1);
					$data2=mysqli_fetch_assoc($query2);

					 $total = $data1['muski'] + $data2['zenski'];
					 $one = round(360 * $data1['muski'] / $total,2);
					 $two = round(360 * $data2['zenski'] / $total,2);
					 $mpostotak = round($data1['muski'] / $total * 100, 2);
					 $zpostotak = round($data2['zenski'] / $total * 100, 2);
					 $slide = $one + $two;
					 $handle = imagecreate(100, 100);
					 $background = imagecolorallocate($handle, 255, 255, 255);
					 $red = imagecolorallocate($handle, 255, 0, 0);
					 $green = imagecolorallocate($handle, 0, 255, 0);
					 $blue = imagecolorallocate($handle, 0, 0, 255);
					 $darkred = imagecolorallocate($handle, 150, 0, 0);
					 $darkblue = imagecolorallocate($handle, 0, 0, 150);
					 $darkgreen = imagecolorallocate($handle, 0, 150, 0);

					 // 3D look
					 for ($i = 60; $i > 50; $i--)
					 {
					 imagefilledarc($handle, 50, $i, 100, 50, 0, $one, $darkred, IMG_ARC_PIE);
					 imagefilledarc($handle, 50, $i, 100, 50, $one, $slide , $darkblue, IMG_ARC_PIE);

					if ($slide = 360)
					{
					 }
					else
					{
					 imagefilledarc($handle, 50, $i, 100, 50, $slide, 360 , $darkgreen, IMG_ARC_PIE);
					 }
					}
					 imagefilledarc($handle, 50, 50, 100, 50, 0, $one , $red, IMG_ARC_PIE);
					 imagefilledarc($handle, 50, 50, 100, 50, $one, $slide , $blue, IMG_ARC_PIE);
					 if ($slide = 360)
					{
					 }
					else
					{
					 imagefilledarc($handle, 50, 50, 100, 50, $slide, 360 , $green, IMG_ARC_PIE);
					}
					 //imagepng($handle);
					 imagepng( $handle, "pie_chart.png", 0);
					 //imagedestroy($handle);
 
		mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Dinamičke web aplikacije</title>
<link rel="stylesheet" href="stil.css">
</head>
<body>
<header class="site-header">
</header>
<div class="row">
		<div class="column column-8">
			<h1 class="logo"></h1>
		</div>
		<div class="column column-4 odjava">
			<div class="column column 2">
				<?php
				session_start();
				echo '<p> Korisnik: ' . $_SESSION['korisnik'] . '</p>';
				?>
			</div>
			<div class="column column 2">
				<form name="logout" action="logout.php" method="POST">
				<input type="submit" name="odjava" value="Odjavi se"/>
				</form>
			</div>
		</div>
		<section class="gray-boxes row">
			<nav class="izbornik column column-3">
				<li><a href="login.php">Početna</a></li>
				<li><a href="pacijenti.php">Pacijenti</a></li>
				<li><a href="pacijentiUnos.php">Unos pacijenata</a></li>
				<li><a href="trazilicaPDF.php">Traži i spremi u PDF</a></li>
				<li><a href="pieChart.php">Udio muškaraca i žena</a></li>
				<li><a href="barChart.php">Udio krvnih grupa</a></li>
				<li><a href="pretragaDoktora.php">Pretraži doktore</a></li>
				<li><a href="json_pretraga.php">Pretraga pacijenata</a></li>
			</nav>
			<div class="column column-8 podfooter">
			<?php

			echo "<img src='pie_chart.png'><p></p>";
			echo "<font color=0000FF>Muškaraca</font> = ".$mpostotak." %<br>";
			echo "<font color=ff0000>Žena</font> = ".$zpostotak." %<br>";
			?>
			</div>
		</section>
</div>
		<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
		</footer>
</body>
</html>