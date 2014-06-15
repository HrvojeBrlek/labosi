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
  <script type="text/javascript">
		function sljedeci{

		}

		function prethodni{

		}
</script>
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
				<form name="pdf" action="json_pretraga.php" method="POST">
					Tražilica:<br/>
					<label for="ime">Ime: </label>
					<input id="ime" type="text" name="ime"/><br/>
					<label for="prezime">Prezime: </label>
					<input id="prezime" type="text" name="prezime"/><br/>
					<label for="krvnaGrupa">Krvna grupa: </label>
					<input id="krvnaGrupa" type="text" name="krvnaGrupa"/><br/>
					<input type="submit" name ="pretrazi" value="Pretraži"/><br/><br/>
				</form>
				<?php

					if( isset( $_POST['ime']) || isset($_POST['prezime']) || isset($_POST['krvnaGrupa']) ){
						$link=mysqli_connect("localhost","root","123","labosi");
						/* Provjera spajanja */
						if(mysqli_connect_errno()){
							exit ('Baza ne postoji: '. mysqli_connect_error ()); 
						}

						$link2=mysqli_select_db($link,"unosBaza");
						$link3=mysqli_query($link, "SET NAMES 'utf8'");
						$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");
						
						$where = array();
						foreach(array('ime','prezime','krvnaGrupa') as $key) {
							if(isset($_POST[$key]) && !empty($_POST[$key])) {
								$where[] = $key . " LIKE '%" . mysqli_real_escape_string($link, $_POST[$key]) . "%'";
							}
						}
						$query = "SELECT * FROM unosBaza ";
						if(empty($where)) {
							$query .= "WHERE unos LIKE '%" . mysqli_real_escape_string($link, $info) . "%'";
						} else {
							$query .= "WHERE " . implode(' AND ',$where);
						}

						$result=mysqli_query($link, $query);

						$json = array();
							
						while($row = mysqli_fetch_array($result)){
							$json = array(
								'bolesnici' => array(
									array('ime' => $row['ime'], 'prezime' => $row['prezime'], 'spol' => $row['spol'], 'datumRodjenja' => $row['datumRodjenja'], 'mjestoRodjenja' => $row['mjestoRodjenja'],'adresaStanovanja' => $row['adresaStanovanja'], 'krvnaGrupa' => $row['krvnaGrupa'], 'prijasnjeTegobe' => $row['prijasnjeTegobe'], 'tegobe' => $row['tegobe'], 'alergijaLijekovi' => $row['alergijaLijekovi'],'alergija' => $row['alergija']),
									)
							);
						}

						$json=json_encode($json);
						echo $json;

						echo '<input type="button" onclick="prethodni()" value="Prethodni">
						<input type="button" onclick="sljedeci()" value="Sljedeći">';
					}
					else {}
				?>

			</div>
		</section>
  </div>
			<footer class="site-footer">
			<p>Copyright &copy; ZKD, 2014</p>
			</footer>
</body>
</html>