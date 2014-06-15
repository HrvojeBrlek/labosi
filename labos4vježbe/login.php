<?php
session_start();
if (!isset ($_SESSION['korisnik'])){
header ('Location: login.html');
}
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
		<div class="novilogo column column-7">
				<h1 class="logo"></h1>
				
		</div>
		<div class=" odjava column column-5">
				<div class="column column 2">
					<?php
						$imeKorisnik = $_SESSION['korisnik'];
						echo '<p> Korisnik: ' . $imeKorisnik . '</p>';
					?>
				</div>
				<div class="column column 2">
					<form name="login" action="logout.php" method="POST">
						<input type="submit" value="Odjavite se"/>
					</form>
				</div>
		</div>
		
		<section class="gray-boxes row">
			<nav class="izbornik column column-3">
				<li><a href="login.php">Početna</a></li>
				<li><a href="pacijenti.php">Pacijenti</a></li>
				<li><a href="pacijentiUnos.php">Unos pacijenta</a></li>
				<li><a href="trazilicaPDF.php">Traži i spremi u PDF</a></li>
				<li><a href="pieChart.php">Udio muškaraca i žena</a></li>
				<li><a href="barChart.php">Udio krvnih grupa</a></li>
				<li><a href="#">Meni6</a></li>
			</nav>
			
			<div class="podaci column column-8">
				<div class="column column-8">
				<h3>Osobni podaci</h3>
				<p>Ime i prezime: Hrvoje Brlek</p>
				<p>Mjesto i datum rođenja: Zagreb, 02.12.1991 </p>
				</div>
				
				<div class="column column-8">
				<h3>Podaci o školovanju</h3>
				<p>Osnovna škola: OŠ Antuna Mihanovića, Klanjec</p>
				<p>Srednja škola: Srednja škola Zaprešić, Zaprešić</p>
				<p>Fakultet: Tehničko veleučilište u Zagrebu</p>
				</div>
				
				<div class="column column-8">
				<h3>Radno iskustvo</h3>
				<p>/</p>
				</div>
				
				<div class="column column-8">
				<h3>Znanje i vještine</h3>
				<p>Java, HTML, CSS, MYSQL</p>
				
				</div>
			</div>
		
		
		</section>
		
	</div>
	<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
	</footer>
  
</body>
</html>