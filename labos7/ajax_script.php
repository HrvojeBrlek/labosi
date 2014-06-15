<?php
	$ime1=$_GET['ime'];
	$prezime1=$_GET['prezime'];
	$krv1=$_GET['krvnaGrupa'];

	unset($sql);

	if ($ime1) {
		$sql[] = " ime like '$ime1' ";
	}
	if ($prezime1) {
		$sql[] = " prezime = '$prezime1' ";
	}
	if($krv1) {
				if($krv1=='O'){
		$krv1='0';
		}
		$sql[] = " krvnaGrupa = '$krv1' ";
	}

	$query1 = "SELECT ime, prezime, krvnaGrupa FROM unosBaza";

	if (!empty($sql)) {
		$query1 .= ' WHERE ' . implode(' AND ', $sql);
	}

	$db = new PDO('mysql:host=localhost;dbname=labosi;charset=UTF8', 'root', '123');
	$query = $db->prepare("$query1");
	$query->execute();
	$people = $query->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($people);
	
	/*var_dump($people);*/
?>				
				
		