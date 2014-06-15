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
						$imeKorisnik = $_POST['username'];
						echo '<p> Korisnik: ' . $imeKorisnik . '</p>';
					?>
				</div>
				<div class="column column 2">
					<input type="submit" value="Odjavite se"/>
				</div>
		</div>
		
		<section class="gray-boxes row">
			<nav class="izbornik column column-3">
				<li><a href="login.php">Početna</a></li>
				<li><a href="pacijenti.php">Pacijenti</a></li>
				<li><a href="pacijentiUnos.php">Unos pacijenata</a></li>
				<li><a href="#">Meni4</a></li>
				<li><a href="#">Meni5</a></li>
				<li><a href="#">Meni6</a></li>
			</nav>
			
			<div class="unosPacijenti column column-8">
				<form name="upisBaza" action="upisBaza.php" method="POST">
					<h4>Formular za upis pacijenata:</h4><br/>
					
					<label for="ime">Ime:</label>
					<input id="ime" type="text" name="ime"><br/>
					
					<label for="prezime">Prezime:</label>
					<input id="prezime" type="text" name="prezime"><br/>
					
					<label for="spol">Spol:</label>
					<input id="spol" type="radio" name="spol" value="M"> M
					<input id="spol" type="radio" name="spol" value="Ž">Ž<br/>
					
					<label for="datum_rodjenja">Datum rođenja:</label>
					<input id="datum_rodjenja" type="date" name="datum_rodjenja"><br/>
					
					<label for="mjesto_rodjenja">Mjesto rođenja:</label>
					<input id="mjesto_rodjenja" type="text" name="mjesto_rodjenja"><br/>
					
					<label for="mjesto_stanovanja">Adresa i mjesto stanovanja:</label>
					<input id="mjesto_stanovanja" type="text" name="mjesto_stanovanja"><br/><br/>
					
					<label for="krvna_grupa">Krvna grupa:</label>
					<input id="krvna_grupa" type="radio" name="krvna_grupa" value="A"> A
					<input id="krvna_grupa" type="radio" name="krvna_grupa" value="B">B
					<input id="krvna_grupa" type="radio" name="krvna_grupa" value="AB">AB
					<input id="krvna_grupa" type="radio" name="krvna_grupa" value="0">0<br/>
					<input id="krvna_grupa" type="radio" name="krvna_grupa1" value="+">+ (poz)
					<input id="krvna_grupa" type="radio" name="krvna_grupa1" value="-">- (neg)<br/><br/>
					
					<label for="prijasnje_tegobe">Ima li prijašnjih medicinskih tegoba (srčane tegobe, tlak, virusne bolesti (Hepatits, HIV)):</label><br/>
					<input id="prijasnje_tegobe" type="radio" name="prijasnje_tegobe" value="DA"> DA
					<input id="prijasnje_tegobe" type="radio" name="prijasnje_tegobe" value="NE">NE<br/>
					
					Ako je odgovor na prijašnje pitanje "Da" popuniti:<br/>
					<label for="tegobe">Koje tegobe osoba ima: </label>
					<input id="tegobe" type="text" name="tegobe"><br/><br/>
					
					<label for="alergija">Je li osoba alergična na lijekove:</label>
					<input id="alergija" type="radio" name="alergija" value="DA"> DA
					<input id="alergija" type="radio" name="alergija" value="NE"> NE <br/>
					
					Ako je odgovor na prijašnje pitanje "Da" popuniti:<br/>
					<label for="alergija_lijekovi">Na koje lijekove je osoba alergična:</label>
					<input id="alergija_lijekovi" type="text" name="alergija_lijekovi"><br/><br/>
					
					
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