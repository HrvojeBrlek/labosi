<?php

	$link=mysqli_connect("localhost","root","123","labosi");
	/* Provjera spajanja */
	if(mysqli_connect_errno()){
		exit ('Baza ne postoji: '. mysqli_connect_error ()); 
	}

	$link2=mysqli_select_db($link,"korisnici");
	$link3=mysqli_query($link, "SET NAMES 'utf8'");
	$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");

	function createSalt(){
		$text = md5(uniqid(rand(), true));
		return substr($text, 0, 3);
	}
	
	$salt = createSalt();
	
	
	function hashpass($string, $salt){
		$string= crypt($string, '$6$' . $salt . '$');
		return $string;
	}
	
	$korIme=$_POST['username'];
	$lozinka=$_POST['password'];
	$imePrezime=$_POST['imePre'];
	
	
	$provjeraupit="SELECT korIme FROM korisnici";
	$result=mysqli_query($link, $provjeraupit);
	
	while($row=mysqli_fetch_array($result)){
			$provjeraIme=$row['korIme'];
			}
	
	/* Hash-iranje password-a */
	
	$options = ['cost' => 11,];
	// Get the password from post
	$passwordFromPost = $lozinka;

	$hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
	
	
	
	
	if($korIme != $provjeraIme){
		$upit="INSERT INTO korisnici(korIme, lozinka, punoIme) VALUES ('$korIme', '$hash', '$imePrezime')";
				if($upit2=mysqli_query($link, $upit)){
					echo "<h1>Uspješno ste se registrirali!</h1>";
					session_start();
					$_SESSION['korisnik']=$korIme;
					header( "refresh:2;url=login.html" );
				}
				else{
					echo "<h1>Prilikom registracije došlo je do pogreške. Molimo pokušajte opet!</h1>";
						
					header( "refresh:2;url=registracija.html" );
				}
	}
	else{
		echo "<h1>Korisničko ime već postoji! :( Odaberite novo korisničko ime</h1>";
		
		header( "refresh:2;url=registracija.html" );
	}			
	mysqli_close($link);
?>