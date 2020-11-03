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
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	</script>
	<style type="text/css">
		body{
			background-color: #F2F5FC;
		}
		h1{
			font-family: Dancing Script;
			font-size: 50px;
			color: #0E2156;
		}
		p{
			font-size: 28px;
			font-family: sitka heading;
		}
		label{
			font-size: 18px;
			font-family: sitka heading;
			text-align: left;
		}
		form{
			margin: 0 20px;
		}
		.centered {
  			position: absolute;
  			top: 45%;
  			left: 50%;
  			transform: translate(-50%, -50%);
  			color: white;
		}
		h1{
			margin: 150px auto;
		}
		p{
			margin: 50px auto;
		}
		.dugme{
			position: relative;
			top: 15px;
		}
	</style>
</head>
<body>
<h1 align="center">Rezervacije</h1>
<p align="center">Ma ko te pita</p>
<div align="center">
<form>
  <div class="row">
    <div class="col">
    	<label>Dolazak:</label>
      <input type="date" class="form-control">
    </div>
    <div class="col">
    	<label>Odlazak:</label>
      <input type="date" class="form-control">
    </div>
    <div class="col">
    	<label>Odrasli:</label>
      <input type="number" value="0" class="form-control">
    </div>
    <div class="col">
    	<label>Deca:</label>
      <input type="number" value="0" class="form-control">
    </div>
    <div class="col">
    	<label>Promo kod</label>
      <input type="text" class="form-control">
    </div>
    <div class="col dugme">
    	<!-- <div class="centered"><b>REZERVIŠITE</b></div> -->	
      <input type="image" src="button2.png" alt="Submit" width="180" height="80" placeholder="REZERVIŠITE">
    </div>
  </div>
</form>
</body>
</html>
