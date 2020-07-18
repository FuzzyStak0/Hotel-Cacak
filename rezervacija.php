<?php


	$conn = mysqli_connect('localhost','FuzzyStak0','stak01987','hotel');
	if(!$conn){
		echo 'Connection error' . mysqli_connect_error();
	}

	$odlazak = $dolazak = $odrasli = '';
	$errors = array('dolazak' => '', 'odlazak' => '', 'odrasli' => '');

	if(isset($_POST['potvrda'])){

		// Ako je prazno
		if(empty($_POST['dolazak'])){
			$errors['dolazak'] = 'Unesite vreme dolaska';
		}else{
			$dolazak = $_POST['dolazak'];
		}

		if(empty($_POST['odlazak'])){
			$errors['odlazak'] = 'Unesite vreme odlazak';
		}else{
			$odlazak = $_POST['odlazak'];
		}

		if(empty($_POST['odrasli'])){
			$errors['odrasli'] = 'Unesite broj osoba';
		}else{
			$odrasli = $_POST['odrasli'];
			if(!preg_match('/^\d+$/', $odrasli)){
				echo 'pogresko';
				$errors['odrasli'] = 'Unesi broj umesto teksta';
			}
		}


		if(array_filter($errors)){
			echo "form is empty";
		}else{
			header("index: RezDetalji.php");
		}
	}
	


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Rezervacije</title>
	<link rel="stylesheet" type="text/css" href="rez_stil.css">
</head>
<body>
<h1 align="center">Rezervacije</h1>
<br><br>
<hr>
<br><br>
<p align="center">Najbolje cene su na sajtu</p>
<br><br>
<p align="center">Hotel Cacak se trudi da vas ugosti da uzivate u svom ostanku</p>
<br><br>

<form action="rezervacija.php" method="POST">
	<ul>

		<li>
			Dolazak: <br>
			<input type="date" name="dolazak">
		</li>

		<li>
			Odlazak: <br>
			<input type="date" name="odlazak">
		</li>

		<li>
			Odrasli: <br>
			<input type="text" name="odrasli">
		</li>

		<li>
			Promo kod: <br>
			<input type="text" name="kod" placeholder="Unesite promo kod:">
		</li>
		<li>
			<input type="submit" name="potvrda"><br>
		</li>

	</ul>

</form>
</body>
</html>
