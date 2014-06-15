<?php

	//Varijable
	$prijavaKorIme=$_POST['username'];
	$prijavaPassword=$_POST['password'];

	$link=mysqli_connect("localhost","root","123","labosi");
	/* Provjera spajanja */
	if(mysqli_connect_errno()){
		exit ('Baza ne postoji: '. mysqli_connect_error ()); 
	}

	$link2=mysqli_select_db($link,"korisnici");
	$link3=mysqli_query($link, "SET NAMES 'utf8'");
	$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");

	
	$provjeraupit="SELECT korIme FROM korisnici WHERE korIme='$prijavaKorIme'";
	$zbroj=mysqli_query($link, $provjeraupit);
	$query = "SELECT lozinka FROM korisnici WHERE korIme = '$prijavaKorIme';";
	$result=mysqli_query($link, $query);
	
	$broj=mysqli_num_rows($zbroj);
	$passwordFromPost = $prijavaPassword;	
	
	
	while($row=mysqli_fetch_array($zbroj)){
			$prijavaKor=$row['korIme'];
	}
	
	while($row=mysqli_fetch_array($result)){
			$hashKor=$row['lozinka'];
	}
	
	if($broj != 0){
		if((password_verify($passwordFromPost, $hashKor)) && ($prijavaKor==$prijavaKorIme)){
			echo "<h1>Uspješno ste se prijavili!</h1>";
			session_start();
			$_SESSION['korisnik'] = $prijavaKorIme;
			
			header( "refresh:2;url=login.php" );
		}
		else{
			echo "<h1>Krivo korisničko ime ili lozinka!<br/>Pokušajte opet!</h1>";
			
			header( "refresh:3;url=login.html" );
		}
	}
	else{
		echo "<h1>Korisničko ime ne postoji! Registrirajte se!</h1>";
		
		header( "refresh:2;url=registracija.html" );
	}
	
	
	mysqli_close($link);
?>