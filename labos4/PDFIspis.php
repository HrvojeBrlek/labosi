<?php

//require('skripte/fpdf/fpdf.php');
require('skripte/tfpdf/tfpdf.php');


	$ime=$_POST['ime'];
	$prezime=$_POST['prezime'];
	$krvnaGrupa=$_POST['krvnaGrupa'];
	
	$link=mysqli_connect("localhost","root","123","labosi");

	/* Provjera spajanja */
	if(mysqli_connect_errno()){
		exit ('Baza ne postoji: '. mysqli_connect_error ()); 
	}
	$link2=mysqli_select_db($link,"unosBaza");
	$link3=mysqli_query($link, "SET NAMES 'utf8'");
	$link4=mysqli_query($link, "SET CHARACTER_SET 'utf8'");


	$pdf = new tFPDF();
	$pdf->Open();
	$pdf->SetAutoPageBreak(false);
	$pdf->AddPage();
	$pdf->AddFont('Arial','','arial.ttf',true);

	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Popis pacijenata');
	$pdf->SetFont('Arial','',7);
	$y_axis = 25;

	$pdf->SetFillColor(232, 232, 232);
	$pdf->SetY($y_axis);
	$pdf->SetX(5);

	$pdf->Cell(15, 6, 'Ime', 1, 0, 'L', 1);
	$pdf->Cell(15, 6, 'Prezime', 1, 0, 'L', 1);
	$pdf->Cell(8, 6, 'Spol', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Datum Rođenja', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Mjesto Rođenja', 1, 0, 'L', 1);
	$pdf->Cell(40, 6, 'Adresa Stanovanja', 1, 0, 'L', 1);
	$pdf->Cell(16, 6, 'Krvna Grupa', 1, 0, 'L', 1);
	$pdf->Cell(10, 6, 'Tegobe', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Tegobe', 1, 0, 'L', 1);
	$pdf->Cell(10, 6, 'Alergija', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Alergija', 1, 0, 'L', 1);

	$where = array();
	foreach(array('ime','prezime','krvnaGrupa') as $key) {
		if(isset($_POST[$key]) && !empty($_POST[$key])) {
			$where[] = $key . " LIKE '%" . mysqli_real_escape_string($link, $_POST[$key]) . "%'";
		}
	}
	$query = "SELECT * FROM unosBaza ";
	if(empty($where)) {
		$query .= "WHERE unos LIKE '%" . mysql_real_escape_string($info) . "%'";
	} else {
		$query .= "WHERE " . implode(' AND ',$where);
	}

	$result=mysqli_query($link, $query);

	//$query="SELECT * FROM unosBaza WHERE ime LIKE '%$ime%' AND prezime LIKE'%$prezime%' AND krvnaGrupa LIKE'%$krvnaGrupa%'";


	$i = 0;
	$max = 25;
	$row_height = 6;
	$y_axis = $y_axis + $row_height;

	while($row = mysqli_fetch_array($result))
	{
		//If the current row is the last one, create new page and print column title
		if ($i == $max)
		{
			$pdf->AddPage();

			//print column titles for the current page
			$pdf->SetY($y_axis_initial);
			$pdf->SetX(5);
			$pdf->Cell(15);
	$pdf->Cell(15, 6, 'Prezime', 1, 0, 'L', 1);
	$pdf->Cell(8, 6, 'Spol', 1, 0,'L', 1);
	$pdf->Cell(20, 6, 'Datum Rođenja', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Mjesto Rođenja', 1, 0, 'L', 1);
	$pdf->Cell(40, 6, 'Adresa Stanovanja', 1, 0, 'L', 1);
	$pdf->Cell(16, 6, 'Krvna Grupa', 1, 0, 'L', 1);
	$pdf->Cell(10, 6, 'Tegobe', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Tegobe', 1, 0, 'L', 1);
	$pdf->Cell(10, 6, 'Alergija', 1, 0, 'L', 1);
	$pdf->Cell(20, 6, 'Alergija', 1, 0, 'L', 1);

			
			//Go to next row
			$y_axis = $y_axis + $row_height;
			
			//Set $i variable to 0 (first row)
			$i = 0;
		}
	$ime = $row['ime'];
	$prezime = $row['prezime'];
	$spol = $row['spol'];
	$datumRodjenja = $row['datumRodjenja'];
	$mjestoRodjenja = $row['mjestoRodjenja'];
	$adresaStanovanja = $row['adresaStanovanja'];
	$krvnaGrupa = $row['krvnaGrupa'];
	$prijasnjeTegobe = $row['prijasnjeTegobe'];
	$tegobe = $row['tegobe'];
	$alergijaLijekovi = $row['alergijaLijekovi'];
	$alergija = $row['alergija'];

		$pdf->SetY($y_axis);
		$pdf->SetX(5);
		$pdf->Cell(15, 6, $ime, 1, 0,'L', 1);
		$pdf->Cell(15, 6, $prezime, 1, 0, 'L', 1);
		$pdf->Cell(8, 6, $spol, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $datumRodjenja, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $mjestoRodjenja, 1, 0, 'L', 1);
	$pdf->Cell(40, 6, $adresaStanovanja, 1, 0, 'L', 1);
	$pdf->Cell(16, 6, $krvnaGrupa, 1, 0, 'L', 1);
	$pdf->Cell(10, 6, $prijasnjeTegobe, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $tegobe, 1, 0, 'L', 1);
	$pdf->Cell(10, 6, $alergijaLijekovi, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $alergija, 1, 0, 'L', 1);


		//Go to next row
		$y_axis = $y_axis + $row_height;
		$i = $i + 1;
	}

	$pdf->Output('I','I');
	mysqli_close($link);

?>