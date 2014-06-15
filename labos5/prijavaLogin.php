<?php

	$link=mysqli_connect("localhost","root","123","labosi");
	/* Provjera spajanja */
	if(mysqli_connect_errno()){
		exit ('Baza ne postoji: '. mysqli_connect_error ()); 
	}

	$link2=mysqli_select_db($link,"korisnici");
	$link3=mysqli_query($link, "SET NAMES 'utf8'");
	$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");

	
	$korIme=$_POST['username'];
	$lozinka=$_POST['password'];
	
	$query="SELECT * FROM korisnici WHERE korIme='$korIme' AND lozinka='$lozinka'";
	$result=mysqli_query($link, $query);
	
	while($row=mysqli_fetch_array($result)){
		if(is_array($row)){
			session_start();
			$_SESSION['korisnik']=$korIme;
			header("Location:login.php");
		}
		else{
			echo "Krivo korisničko ime ili lozinka!";
			header( "refresh:4;url=login.html" );
		}
	}
	
?>