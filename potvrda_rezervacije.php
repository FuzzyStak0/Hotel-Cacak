<?php 
	session_start();

	$kljucevi = array_keys($_SESSION); 
	array_splice($kljucevi, array_search('dolazak', $kljucevi));

	$ukupna_cena = 0;
	foreach ($_SESSION as $items) {
		foreach((array)$items as $key => $value){
			if($key === 'Cena'){
				$ukupna_cena = $ukupna_cena + intval($value);
			}
		}
	} 

	include("include/insert_db.php");
	// print_r($kljucevi);

	$samo_soba = false;
	$soba_dorucak = false;
	foreach ($kljucevi as $value) {
		if (strpos($value, 'B')) {
			$samo_soba = true;
		}
		if (strpos($value, 'S')) {
			$soba_dorucak = true;
		}
	}

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>potvrda_rezervacije</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
	<style type="text/css">
		#samo_soba{
			<?php 
				if (!$samo_soba) {
					echo "display:none;";

				}

			 ?>
		}
		#soba_dorucak{
			<?php 
				if (!$soba_dorucak) {
					echo "display:none;";
				}

			 ?>
		}
		.error_msg{
			text-align: left;
			color: red;
			margin-bottom: 2px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card mx-auto my-5" style="width: 800px;">
			<div class="card-header">
					Pregled rezervacije
			</div>
			<div class="card-body" >
				<ul class="d-sm-flex justify-content-around list-unstyled">
					<li>
						<h5 class="card-title">Vreme dolaska</h5>
						<p class="card-text"><?php echo $_SESSION['dolazak'] . "<br>";?></p>					
					</li>
				
					<li>
						<h5 class="card-title">Vreme odlaska</h5>
						<p class="card-text"><?php echo $_SESSION['odlazak'] . "<br>";?></p>
					</li>
				</ul>
			</div>
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">
			  	<h5 id="samo_soba">Samo cena sobe</h5>
				<p class="ml-2"><?php
					$brojacB = 0;
					for ($j=0; $j < count($kljucevi) ; $j++) {
					 	if(strpos($kljucevi[$j], 'B')){
							for ($i=0; $i < intval($_SESSION[$kljucevi[$j]]['Sobe']); $i++) { 
								echo '<b>Soba '. ++$brojacB .'</b> '.$_SESSION[$kljucevi[$j]]['VrstaSobe'].' - Odrasli: '.$_SESSION[$kljucevi[$j]]['Osobe'].'<br>';
							}
						}
					}
				 ?></p>
				<h5 id="soba_dorucak">Cena sobe i doručka</h5>
				<p class="ml-2"><?php 
					$brojacS = 0;
					for ($j=0; $j < count($kljucevi) ; $j++) {
					 	if(strpos($kljucevi[$j], 'S')){
							for ($i=0; $i < intval($_SESSION[$kljucevi[$j]]['Sobe']); $i++) { 
								echo '<b>Soba '. ++$brojacS .'</b> '.$_SESSION[$kljucevi[$j]]['VrstaSobe'].' - Odrasli: '.$_SESSION[$kljucevi[$j]]['Osobe'].'<br>';
							}
						}
					}
				?></p>
			  </li>
			  <!-- Soba 1: Single Economy Room with Free Spa Access - Odrasli: 1, Deca: 0 -->
			</ul>
		</div>
		<hr>
		<div class="d-sm-flex justify-content-between" >
			<h5>UKUPNA CENA</h5>
			<h5>EURA 
			<?php echo $ukupna_cena . '.00€';?></h5>
		</div>
		<form action="potvrda_rezervacije.php" method="POST">
			<div class="row my-5">
				<div class="col-md-6 col-sm-12">
					<div class="card">
						<div class="card-header">
							Podaci o korisniku
						</div>
						<div class="card-body">
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="name" class="col-md-2 col-form-label">Ime:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Ime']; ?></div>
									<input type="text" class="form-control" id="name" name="Ime" value="<?php echo htmlspecialchars($Ime); ?>">
								</div>
							</div>
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="lastname" class="col-md-2 col-form-label">Prezime:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Prezime']; ?></div>
									<input type="text" class="form-control" id="lastname" name="Prezime" value="<?php echo htmlspecialchars($Prezime); ?>">
								</div>
							</div>
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="addres" class="col-md-2 col-form-label">Adresa:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Adresa']; ?></div>
									<input type="text" class="form-control" id="addres" name="Adresa" value="<?php echo htmlspecialchars($Adresa); ?>">
								</div>
							</div>
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="zipcode" class="col-md-2 col-form-label">Postanski broj:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Postanski_broj']; ?></div>
									<input type="text" class="form-control" id="zipcode" name="Postanski_broj" value="<?php echo htmlspecialchars($Postanski_broj); ?>">
								</div>
							</div>
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="city" class="col-md-2 col-form-label">Grad:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Grad']; ?></div>
									<input type="text" class="form-control" id="city" name="Grad" value="<?php echo htmlspecialchars($Grad); ?>">
								</div>
							</div>
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="country" class="col-md-2 col-form-label">Drzava:</label>
								<div class="col-md-6">
									<select class="form-select" id="country" name="Drzava">
										<option value="Serbia" selected>Serbia</option>
										<option>Croatia</option>
										<option>Bosnia and Herzegovina</option>
										<option>Slovenia</option>
										<option>North Macedonia</option>
									</select>
								</div>			
							</div>
							<div class="row mb-3 justify-content-center align-items-baseline">
								<label for="email" class="col-md-2 col-form-label">E-mail:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Email']; ?></div>
									<input type="email" class="form-control" id="email" name="Email" value="<?php echo htmlspecialchars($Email); ?>">
								</div>
							</div>
							<div class="row mb-3 justify-content-center aling-items-baseline">
								<label for="phone" class="col-md-2 col-form-label">Telefon:</label>
								<div class="col-md-6">
									<div class="error_msg"><?php echo $errors['Telefon']; ?></div>
									<input type="text" class="form-control" id="phone" name="Telefon" value="<?php echo htmlspecialchars($Telefon); ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="card">
						<div class="card-header">
							Garancija rezervacije
						</div>
						<div class="card-body text-right">
							<div class="row mb-3 aling-items-baseline">
								<label for="creditcardtype" class="col-sm-4 col-form-label">Vrsta kreditne kartice:</label>
								<div class="col-sm-8">
									<select class="form-select" id="creditcardtype" name="Kreditna_kartica">
										<option selected>Visa</option>
										<option>Visa Electron</option>
										<option>Maestor</option>
										<option >American Express</option>
									</select>
								</div>			
							</div>
							<div class="row mb-3 align-items-baseline">
								<label for="creditcard" class="col-sm-4 col-form-label">Broj kartice:</label>
								<div class="col-sm-8">
									<div class="error_msg"><?php echo $errors['Broj_kartice']; ?></div>
									<input type="text" class="form-control" id="creditcard" name="Broj_kartice" maxlength="16" value="<?php echo htmlspecialchars($Broj_kartice); ?>">
								</div>
							</div>
							<div class="row mb-3 align-items-baseline">
								<label for="cvn" class="col-sm-4 col-form-label">CVN:</label>
								<div class="col-sm-8">
									<div class="error_msg"><?php echo $errors['CVN']; ?></div>
									<input type="text" class="form-control" id="cvn" name="CVN" maxlength="4" value="<?php echo htmlspecialchars($CVN); ?>">
								</div>
							</div>
							<div class="row mb-3 align-items-baseline">
								<label for="expirationdate" class="col-sm-4 col-form-label">Vredi do:</label>
								<div class="col-sm-4">
									<div class="error_msg"><?php echo $errors['Rok_kartice_mesec']; ?></div>
									<select class="form-select" id="expirationdate" name="Rok_kartice_mesec">
										<option selected>Mesec:</option>
										<option>1</option>
										<option>2</option>
										<option >3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
								</div>	
								<div class="col-sm-4">
									<div class="error_msg"><?php echo $errors['Rok_kartice_godina']; ?></div>
									<select class="form-select" id="expirationdate" name="Rok_kartice_godina">
										<option selected>Godina:</option>
										<option>2020</option>
										<option>2021</option>
										<option>2022</option>
										<option>2023</option>
										<option>2024</option>
										<option>2025</option>
										<option>2026</option>
										<option>2027</option>
										<option>2028</option>
										<option>2029</option>
									</select>
								</div>		
							</div>
							<div class="row mb-3 align-items-baseline">
								<label for="creditcardname" class="col-sm-4 col-form-label">Ime:</label>
								<div class="col-sm-8">
									<div class="error_msg"><?php echo $errors['Ime_kartice']; ?></div>
									<input type="text" class="form-control" id="creditcardname" name="Ime_kartice" value="<?php echo htmlspecialchars($Ime_kartice); ?>">
								</div>
							</div>
							<div class="row mb-3 align-items-baseline">
								<label for="creditcardlastname" class="col-sm-4 col-form-label">Prezime:</label>
								<div class="col-sm-8">
									<div class="error_msg"><?php echo $errors['Prezime_kartice']; ?></div>
									<input type="text" class="form-control" id="creditcardlastname" name="Prezime_kartice" value="<?php  echo htmlspecialchars($Prezime_kartice); ?>">
								</div>
							</div>
							<input type="submit" name="Potvrda" class="btn btn-primary" value="REZERVIŠI">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>