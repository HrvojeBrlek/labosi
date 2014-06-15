<?php
session_start();
if (!isset ($_SESSION['korisnik'])){
header ('Location: login.html');
}
					$link=mysqli_connect("localhost","root","123","labosi");

					/* Provjera spajanja */
					if(mysqli_connect_errno()){
					exit ('Baza ne postoji: '. mysqli_connect_error ()); 
					}

					$link2=mysqli_select_db($link,"unosBaza");
					$link3=mysqli_query($link, "SET NAMES 'utf8'");
					$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");
					
					$query1=mysqli_query($link,"SELECT COUNT(*) as aPoz FROM unosBaza WHERE krvnaGrupa='A+'") ;
					$query2= mysqli_query($link,"SELECT COUNT(*) as aNeg FROM unosBaza WHERE krvnaGrupa='A-'") ;
					$query3= mysqli_query($link,"SELECT COUNT(*) as bPoz FROM unosBaza WHERE krvnaGrupa='B+'") ;
					$query4= mysqli_query($link,"SELECT COUNT(*) as bNeg FROM unosBaza WHERE krvnaGrupa='B-'") ;
					$query5= mysqli_query($link,"SELECT COUNT(*) as abPoz FROM unosBaza WHERE krvnaGrupa='AB+'") ;
					$query6= mysqli_query($link,"SELECT COUNT(*) as abNeg FROM unosBaza WHERE krvnaGrupa='AB-'") ;
					$query7= mysqli_query($link,"SELECT COUNT(*) as nulPoz FROM unosBaza WHERE krvnaGrupa='0+'") ;
					$query8= mysqli_query($link,"SELECT COUNT(*) as nulNeg FROM unosBaza WHERE krvnaGrupa='0-'") ;
					
					$data1=mysqli_fetch_assoc($query1);
					$data2=mysqli_fetch_assoc($query2);
					$data3=mysqli_fetch_assoc($query3);
					$data4=mysqli_fetch_assoc($query4);
					$data5=mysqli_fetch_assoc($query5);
					$data6=mysqli_fetch_assoc($query6);
					$data7=mysqli_fetch_assoc($query7);
					$data8=mysqli_fetch_assoc($query8);
					
					$aPoz= $data1['aPoz'];
					$aNeg=$data2['aNeg'];
					$bPoz= $data3['bPoz'];
					$bNeg=$data4['bNeg'];
					$abPoz= $data5['abPoz'];
					$abNeg=$data6['abNeg'];
					$nulPoz= $data7['nulPoz'];
					$nulNeg=$data8['nulNeg'];
							// read the post data
							$data = array("$aPoz", "$aNeg", "$bPoz", "$bNeg", "$abPoz", "$abNeg", "$nulNeg", "$aNeg");
							$x_fld = array('A+','A-','B+','B-','AB+','AB-','0+','0-');
							$max = 1;
							for ($i=0;$i<8;$i++){
							  if ($data[$i] > $max)$max=$data[$i]; // find the largest data
							}
							$im = imagecreate(400,255); // width , height px

							$white = imagecolorallocate($im,255,255,255); // allocate some color from RGB components remeber Physics
							$black = imagecolorallocate($im,0,0,0); //
							$red = imagecolorallocate($im,255,0,0); //
							$green = imagecolorallocate($im,0,255,0); //
							$blue = imagecolorallocate($im,0,0,255); //
							//
							// create background box
							//imagerectangle($im, 1, 1, 319, 239, $black);
							//draw X, Y Co-Ordinate
							imageline($im, 10, 5, 10, 230, $blue );
							imageline($im, 10, 230, 300, 230, $blue );
							//Print X, Y
							imagestring($im,3,15,5,"Broj bolesnika",$black);
							imagestring($im,3,320,240,"Krvne grupe",$black);

						 

							// what next draw the bars
							$x = 15; // bar x1 position
							$y = 230; // bar $y1 position
							$x_width = 20; // width of bars
							$y_ht = 0; // height of bars, will be calculated later
							// get into some meat now, cheese for vegetarians;
							for ($i=0;$i<8;$i++){
							  $y_ht = ($data[$i]/$max)* 100; // no validation so check if $max = 0 later;
							  imagerectangle($im,$x,$y,$x+$x_width,($y-$y_ht),$red);
							  imagestring( $im,2,$x-1,$y+1,$x_fld[$i],$black);
							  imagestring( $im,2,$x-1,$y+10,$data[$i],$black);
							  $x += ($x_width+20); // 20 is diff between two bars;
							  
							}
							imagepng( $im, "bar_chart.png", 0);
							imagedestroy($im);
							//echo "<img src='bar_chart.jpeg'><p></p>";
							
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
					<form name="login" action="logout.php" method="POST">
						<input type="submit" value="Odjavite se"/>
					</form>
				</div>
	</div>
		<section class="gray-boxes row">
			<nav class="column column-3 izbornik">
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
			echo "<img src='bar_chart.png'><p></p>"
			 
			?>
			</div>
		</section>
</div>
<footer class="site-footer">
<p>Copyright &copy; ZKD, 2014</p>
</footer>
</body>
</html>