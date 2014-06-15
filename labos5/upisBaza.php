<?php

	$link=mysqli_connect("localhost","root","123","labosi");
	/* Provjera spajanja */
	if(mysqli_connect_errno()){
		exit ('Baza ne postoji: '. mysqli_connect_error ()); 
	}

	$link2=mysqli_select_db($link,"unosBaza");
	$link3=mysqli_query($link, "SET NAMES 'utf8'");
	$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");

	
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$spol = $_POST['spol'];
	$datumRodjenja = date("Y-m-d", strtotime($_POST['datumRodjenja']));
	$mjestoRodjenja = $_POST['mjestoRodjenja'];
	$mjestoStanovanja = $_POST['mjestoStanovanja'];
	$krvnaGrupa = $_POST['krvnaGrupa'] . '' . $_POST['krvnaGrupa1'];
	$prijasnjeTegobe = $_POST['prijasnjeTegobe'];
	$tegobe = $_POST['tegobe'];
	$alergija = $_POST['alergija'];
	$alergijaLijekovi = $_POST['alergijaLijekovi'];
	
	$query="INSERT INTO unosBaza(ime,prezime,spol,datumRodjenja,mjestoRodjenja,adresaStanovanja,krvnaGrupa,prijasnjeTegobe,tegobe,alergijaLijekovi,alergija)
			VALUES('$ime', '$prezime', '$spol', '$datumRodjenja', '$mjestoRodjenja', '$mjestoStanovanja', '$krvnaGrupa', '$prijasnjeTegobe', '$tegobe', '$alergija', '$alergijaLijekovi')";
	$result=mysqli_query($link, $query);
	
	header("Location:pacijentiUnos.php");
	
	mysqli_close($link);
?>