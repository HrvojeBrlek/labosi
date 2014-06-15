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
 
 
 <script>
	var current = 0;
	function showText() {
		current = 0;
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				//document.getElementById("description").innerHTML = xmlhttp.responseText;
				podaci=JSON.parse(xmlhttp.responseText);	
				
				document.getElementById("redniBroj").innerHTML = 1;
				document.getElementById("imeI").innerHTML = podaci[0].ime;
				document.getElementById("prezimeI").innerHTML = podaci[0].prezime;
				document.getElementById("krvnaGrupaI").innerHTML = podaci[0].krvnaGrupa;
;
			}
		}
		
		var name = document.getElementById("ime").value;
		var surname = document.getElementById("prezime").value;
		var bloodGroup = document.getElementById("krvnaGrupa").value;
		
		xmlhttp.open("GET","ajax_script.php?ime="+name+"&prezime="+surname+"&krvnaGrupa="+bloodGroup+",true);
		xmlhttp.send();
		
		};
	
		function sljedeci() {
			if (current<podaci.length-1){
			current++;
				document.getElementById("redniBroj").innerHTML = 1;
				document.getElementById("imeI").innerHTML = podaci[0].ime;
				document.getElementById("prezimeI").innerHTML = podaci[0].prezime;
				document.getElementById("krvnaGrupaI").innerHTML = podaci[0].krvnaGrupa;				
			}
		}
		
		function prethodni() {
			if (current>0){
			current--;
				document.getElementById("redniBroj").innerHTML = 1;
				document.getElementById("imeI").innerHTML = podaci[0].ime;
				document.getElementById("prezimeI").innerHTML = podaci[0].prezime;
				document.getElementById("krvnaGrupaI").innerHTML = podaci[0].krvnaGrupa;
			}
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
						echo '<p> Korisnik: ' . $_SESSION['korisnicko_ime'] . '</p>';
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
			
			
			Tražilica:<br>
			
			<label for="ime">Ime: </label>
			<input id="ime" type="text" name="ime"/><br/>
			
			
			<label for="prezime">Prezime: </label>
			<input id="prezime" type="text" name="prezime"/><br/>
			
			<label for="krvnaGrupa">Krvna grupa: </label>
			<input id="krvnaGrupa" type="text" name="krvnaGrupa"/><br/>		
			
			<button onClick="showText()" name ="pretrazi">Učitaj</button><br><br>
			
			
			<p>
				Redni broj: <span id='redniBroj'></span><br />
				Ime: <span id='imeI'></span><br />
				Prezime: <span id='prezimeI'></span><br />
				Krvna grupa: <span id='krvnaGrupaI'></span><br />
				</p>
				<input id='prethodni' type='button' value='Prethodni' onclick='prethodni();' />
				<input id='sljedeci' type='button' value='Sljedeći' onclick='sljedeci();' />
			</p>
				
			</div>
		
		</section>
		
	</div>
	<footer class="site-footer">
		<p>Copyright &copy; ZKD, 2014</p>
	</footer>
  
</body>
<!--<script>
				
				var data = <?php  echo json_encode($arr);  ?>;
				var i = 0;
				function prikazi() {
					
					document.getElementById('redniBroj').innerHTML = i;
					document.getElementById('imeI').innerHTML = data[i].ime;
					//document.getElementById('ime').value=data[i].ime;
					document.getElementById('prezimeI').innerHTML = data[i].prezime;
					//document.getElementById('prezime').value=data[i].prezime;
					document.getElementById('krvnaGrupaI').innerHTML = data[i].krvnaGrupa;
					//document.getElementById('krvnaGrupa').value=data[i].krvnaGrupa;
				}
				function prethodni () {
				if (i>0) i=i-1;
					prikazi();
				}
				
				function sljedeci () {
				if (i<data.length) i=i+1;
					prikazi();
				}
				prikazi();
				
</script>-->
</html>