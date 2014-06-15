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
				<li><a href="pretragaDoktora">Pretraži doktore</a></li>
				<li><a href="json_pretraga.php">Pretraga pacijenata</a></li>
			</nav>
			<div class="column column-8 podfooter">
				<form name="pdf" action="ispisDoktor.php" method="GET">
					Pretraga doktora:<br/>
					<label for="ime">Ime: </label>
					<input id="ime" type="text" name="ime" placeholder="Ime"><br/>
					<label for="prezime">Prezime: </label>
					<input id="prezime" type="text" name="prezime" placeholder="Prezime"><br/>
					<input type="submit" name ="posalji" value="Pošalji"><br/><br/>
				</form>
			</div>
		</section>
</div>
		<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
		</footer>
		
</body>
</html>