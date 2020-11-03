<?php
	session_start();

	$conn = mysqli_connect('localhost','FuzzyStak0','stak01987','hotel');
	if(!$conn){
		echo 'Connection error' . mysqli_connect_error();
	}

	$odlazak = $dolazak = $članovi = '';
	$errors = array('dolazak' => '', 'odlazak' => '', 'članovi' => '');

	if(isset($_POST['potvrda'])){

		// Ako je prazno
		if(empty($_POST['dolazak'])){
			$errors['dolazak'] = 'Unesite vreme dolaska';
		}else{
			$_SESSION['dolazak'] = $_POST['dolazak'];
		}

		if(empty($_POST['odlazak'])){
			$errors['odlazak'] = 'Unesite vreme odlazak';
		}else{
			$_SESSION['odlazak'] = $_POST['odlazak'];
		}

		if(empty($_POST['članovi'])){
			$errors['članovi'] = 'Unesite broj osoba';
		}else{
			if(!preg_match('/^\d+$/', $_POST['članovi'])){
				echo 'pogresko';
				$errors['članovi'] = 'Unesi broj umesto teksta';
			}
			$_SESSION['članovi'] = $_POST['članovi'];
		}


		if(array_filter($errors)){
			echo "form is empty";
		}else{
			header('location: detalji_rezervacije.php');
		}
	}
	


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Rezervacije</title>
	<link rel="stylesheet" type="text/css" href="rez_stil.css">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>

<br><br>
<br><br>
<h1 align="center">Rezervacije</h1>
<br><br>
<p align="center">Ma ko te pita</p>
<br><br>
<div align="center">
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
			Članovi: <br>
			<input type="text" name="članovi">
		</li>

		<li>
			Promo kod: <br>
			<input type="text" name="kod" placeholder="Unesite promo kod:">
		</li>
		<li>
			<input class="btn btn-primary" type="submit" name="potvrda"><br>
		</li>

	</ul>
</div>
</form>
</body>
</html>
