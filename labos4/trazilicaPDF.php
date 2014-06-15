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
				<li><a href="pacijentiUnos.php">Unos pacijenata</a></li>
				<li><a href="trazilicaPDF.php">Traži i spremi u PDF</a></li>
				<li><a href="#">Meni5</a></li>
				<li><a href="#">Meni6</a></li>
			</nav>
			
			<div class="PDF column column-8">
				<form name="PDFIspis" action="PDFIspis.php" method="POST">
					Tražilica:<br/>
					
					<label for="ime">Ime:</label>
					<input id="ime" type="text" name="ime"/><br/>
					
					<label for="prezime">Prezime:</label>
					<input id="prezime" type="text" name="prezime"/><br/>
					
					<label for="krvnaGrupa">Krvna grupa:</label>
					<input id="krvnaGrupa" type="text" name="krvnaGrupa"/><br/>		
					
					<input type="submit" name ="ispisi" value="Ispiši u PDF"/><br/><br/>
				</form>
				
			</div>
		
		</section>
		
	</div>
	<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
	</footer>
  
</body>
</html>