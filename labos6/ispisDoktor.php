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
				<?php	
				$json = file_get_contents("http://stajp.vtszg.hr/~spredanic/DWA2/lab5/podaci.php");
				$obj = json_decode($json);
				$ime=strtoupper ($_GET["ime"]);
				$prezime=strtoupper($_GET["prezime"]);
				//print_r($obj);
				foreach ($obj as $key => $value) {
				//echo "<p>$value->id | $value->prezime</p>";
				//if( isset( $_GET['ime'] ) && strlen( $_GET['ime'] ))
				if( isset( $_GET['ime'] ) /*&& strlen( $_GET['ime'] )*/)
				{
				if ($value->ime==$ime){
				//set($json[$key]);
				echo 'ID: '.$value->id .'<br>';
				echo 'Područni ured: '.$value->podrucni_ured .'<br>';
				echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
				echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
				echo 'ID broj: '.$value->id_broj .'<br>';
				echo 'Prezime: '.$value->prezime .'<br>';
				echo 'Ime: '.$value->ime .'<br>';
				echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
				echo 'Broj pošte: '.$value->broj_poste .'<br>';
				echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
				echo 'Ulica: '.$value->ulica .'<br>';
				echo 'Kućni broj: '.$value->kucni_broj .'<br>';
				echo 'Grad: '.$value->grad .'<br>';
				echo '-------------------------------------------------------'.'<br>';
				}
				//var_dump($obj);
				//echo $obj->id;
				}
				else if( isset( $_GET['prezime'] ) /*&& strlen( $_GET['prezime'] )*/)
				{if ($value->prezime==$prezime){
				//set($json[$key]);
				echo 'ID: '.$value->id .'<br>';
				echo 'Područni ured: '.$value->podrucni_ured .'<br>';
				echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
				echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
				echo 'ID broj: '.$value->id_broj .'<br>';
				echo 'Prezime: '.$value->prezime .'<br>';
				echo 'Ime: '.$value->ime .'<br>';
				echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
				echo 'Broj pošte: '.$value->broj_poste .'<br>';
				echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
				echo 'Ulica: '.$value->ulica .'<br>';
				echo 'Kućni broj: '.$value->kucni_broj .'<br>';
				echo 'Grad: '.$value->grad .'<br>';
				echo '-------------------------------------------------------'.'<br>';
				}


				}
				else if( isset( $_GET['ime'] ) /*&& strlen( $_GET['ime'] ) */&& isset( $_GET['prezime'] ) /*&& strlen( $_GET['prezime'] )*/){
				if ($value->prezime==$prezime && $value->ime==$ime){
				//set($json[$key]);
				echo 'ID: '.$value->id .'<br>';
				echo 'Područni ured: '.$value->podrucni_ured .'<br>';
				echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
				echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
				echo 'ID broj: '.$value->id_broj .'<br>';
				echo 'Prezime: '.$value->prezime .'<br>';
				echo 'Ime: '.$value->ime .'<br>';
				echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
				echo 'Broj pošte: '.$value->broj_poste .'<br>';
				echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
				echo 'Ulica: '.$value->ulica .'<br>';
				echo 'Kućni broj: '.$value->kucni_broj .'<br>';
				echo 'Grad: '.$value->grad .'<br>';
				echo '-------------------------------------------------------'.'<br>';
				}
				}
				}
				?>
			</div>
		</section>
</div>
		<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
		</footer>
</body>
</html>