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
				<li><a href="pieChart.php">Udio muškaraca i žena</a></li>
				<li><a href="barChart.php">Udio krvnih grupa</a></li>
				<li><a href="pretragaDoktora.php">Pretraži doktore</a></li>
				<li><a href="json_pretraga.php">Pretraga pacijenata</a></li>
			</nav>
			
			<div class="unosPacijenti column column-8">
				<form name="upisBaza" action="upisBaza.php" method="POST">
					<h4>Formular za upis pacijenata:</h4><br/>
					
					<label for="ime">Ime:</label>
					<input id="ime" type="text" name="ime" required aria-required=”true”/><br/>
					
					<label for="prezime">Prezime:</label>
					<input id="prezime" type="text" name="prezime" required aria-required=”true” /><br/>
					
					<label for="spol">Spol:</label>
					<input id="spol" type="radio" name="spol" value="M"> M
					<input id="spol" type="radio" name="spol" value="Ž">Ž<br/>
					
					<label for="datumRodjenja">Datum rođenja:</label>
					<input id="datumRodjenja" type="date" name="datumRodjenja" required aria-required=”true” /><br/>
					
					<label for="mjestoRodjenja">Mjesto rođenja:</label>
					<input id="mjestoRodjenja" type="text" name="mjestoRodjenja" required aria-required=”true” /><br/>
					
					<label for="mjestoStanovanja">Adresa i mjesto stanovanja:</label>
					<input id="mjestoStanovanja" type="text" name="mjestoStanovanja" required aria-required=”true” /><br/><br/>
					
					<label for="krvnaGrupa">Krvna grupa:</label>
					<input id="krvnaGrupa" type="radio" name="krvnaGrupa" value="A"> A
					<input id="krvnaGrupa" type="radio" name="krvnaGrupa" value="B">B
					<input id="krvnaGrupa" type="radio" name="krvnaGrupa" value="AB">AB
					<input id="krvnaGrupa" type="radio" name="krvnaGrupa" value="0">0<br/>
					<input id="krvnaGrupa" type="radio" name="krvnaGrupa1" value="+">+ (poz)
					<input id="krvnaGrupa" type="radio" name="krvnaGrupa1" value="-">- (neg)<br/><br/>
					
					<label for="prijasnjeTegobe">Ima li prijašnjih medicinskih tegoba (srčane tegobe, tlak, virusne bolesti (Hepatits, HIV)):</label><br/>
					<input id="prijasnjeTegobe" type="radio" name="prijasnjeTegobe" value="DA"> DA
					<input id="prijasnjeTegobe" type="radio" name="prijasnjeTegobe" value="NE">NE<br/>
					
					Ako je odgovor na prijašnje pitanje "Da" popuniti:<br/>
					<label for="tegobe">Koje tegobe osoba ima: </label>
					<input id="tegobe" type="text" name="tegobe"><br/><br/>
					
					<label for="alergija">Je li osoba alergična na lijekove:</label>
					<input id="alergija" type="radio" name="alergija" value="DA"> DA
					<input id="alergija" type="radio" name="alergija" value="NE"> NE <br/>
					
					Ako je odgovor na prijašnje pitanje "Da" popuniti:<br/>
					<label for="alergijaLijekovi">Na koje lijekove je osoba alergična:</label>
					<input id="alergijaLijekovi" type="text" name="alergijaLijekovi"><br/><br/>
					
					
					<input type="submit" name="upis" value="Zabilježi"><br/><br/>
				</form>
				
			</div>
		
		</section>
		
	</div>
	<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
	</footer>
  
</body>
</html>