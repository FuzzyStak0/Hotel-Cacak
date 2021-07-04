<?php 
	include('include/connection.php');

	$errors = array('dolazak' => '','odlazak' => '');
	session_start();

	session_unset();
	if (isset($_POST['potvrda'])) {
		if(isset($_POST['jednokrevetnaBez'])){
			$_SESSION['jednokrevetnaBez']['Sobe'] = $_POST['Sobe1'];
			$_SESSION['jednokrevetnaBez']['Osobe'] = 1;
			$_SESSION['jednokrevetnaBez']['Cena'] = 90 * intval($_POST['Sobe1']);
			$_SESSION['jednokrevetnaBez']['VrstaSobe'] = 'Jednokrevetna soba';
		}
		if(isset($_POST['jednokrevetnaSa'])){
			$_SESSION['jednokrevetnaSa']['Sobe'] = $_POST['Sobe2'];
			$_SESSION['jednokrevetnaSa']['Osobe'] = 1;
			$_SESSION['jednokrevetnaSa']['Cena'] = 100 * intval($_POST['Sobe2']);
			$_SESSION['jednokrevetnaSa']['VrstaSobe'] = 'Jednokrevetna soba';
		}
		if(isset($_POST['dvokrevetnaBez'])){
			$_SESSION['dvokrevetnaBez']['Sobe'] = $_POST['Sobe3'];
			$_SESSION['dvokrevetnaBez']['Osobe'] = 2;
			$_SESSION['dvokrevetnaBez']['Cena'] = 120 * intval($_POST['Sobe3']);
			$_SESSION['dvokrevetnaBez']['VrstaSobe'] = 'Dvokrevetna ekonomska soba';
		}
		if(isset($_POST['dvokrevetnaSa'])){
			$_SESSION['dvokrevetnaSa']['Sobe'] = $_POST['Sobe4'];
			$_SESSION['dvokrevetnaSa']['Osobe'] = 2;
			$_SESSION['dvokrevetnaSa']['Cena'] = 130 * intval($_POST['Sobe4']);
			$_SESSION['dvokrevetnaSa']['VrstaSobe'] = 'Dvokrevetna ekonomska soba';

		}
		if(isset($_POST['dvokrevetnaDuplexBez'])){
			$_SESSION['dvokrevetnaDuplexBez']['Sobe'] = $_POST['Sobe5'];
			$_SESSION['dvokrevetnaDuplexBez']['Osobe'] = 2;
			$_SESSION['dvokrevetnaDuplexBez']['Cena'] = 140 * intval($_POST['Sobe5']);
			$_SESSION['dvokrevetnaDuplexBez']['VrstaSobe'] = 'Dvokrevetna duplex soba';
		}
		if(isset($_POST['dvokrevetnaDuplexSa'])){
			$_SESSION['dvokrevetnaDuplexSa']['Sobe'] = $_POST['Sobe6'];
			$_SESSION['dvokrevetnaDuplexSa']['Osobe'] = 2;			
			$_SESSION['dvokrevetnaDuplexSa']['Cena'] = 150 * intval($_POST['Sobe6']);
			$_SESSION['dvokrevetnaDuplexSa']['VrstaSobe'] = 'Dvokrevetna duplex soba';

		}
		if(isset($_POST['premiumBez'])){
			$_SESSION['premiumBez']['Sobe'] = $_POST['Sobe7'];
			$_SESSION['premiumBez']['Osobe'] = 3;
			$_SESSION['premiumBez']['Cena'] = 160 * intval($_POST['Sobe7']);
			$_SESSION['premiumBez']['VrstaSobe'] = 'Premium apartman';
		}
		if(isset($_POST['premiumSa'])){
			$_SESSION['premiumSa']['Sobe'] = $_POST['Sobe8'];
			$_SESSION['premiumSa']['Osobe'] = 3;
			$_SESSION['premiumSa']['Cena'] = 170 * intval($_POST['Sobe8']);
			$_SESSION['premiumSa']['VrstaSobe'] = 'Premium apartman';

		}
		if(isset($_POST['royalBez'])){
			$_SESSION['royalBez']['Sobe'] = $_POST['Sobe9'];
			$_SESSION['royalBez']['Osobe'] = 4;
			$_SESSION['royalBez']['Cena'] = 190 * intval($_POST['Sobe9']);
			$_SESSION['royalBez']['VrstaSobe'] = 'Royal apartman';
		}
		if(isset($_POST['royalSa'])){
			$_SESSION['royalSa']['Sobe'] = $_POST['Sobe10'];
			$_SESSION['royalSa']['Osobe'] = 4;
			$_SESSION['royalSa']['Cena'] = 200 * intval($_POST['Sobe10']);
			$_SESSION['royalSa']['VrstaSobe'] = 'Royal apartman';

		}

		if(!empty($_SESSION)){
			$_SESSION['dolazak'] = $_POST['dolazak'];
			$_SESSION['odlazak'] = $_POST['odlazak'];
			if(empty($_SESSION['dolazak'])){
				$errors['dolazak'] = "Unesi datum dolaska";
			}
			if(empty($_SESSION['dolazak'])){
				$errors['odlazak'] = "Unesi datum odlaska";
			}

			if(!array_filter($errors)){
				header('location: potvrda_rezervacije.php');
			}
		}
	}

	$sql_soba = "SELECT sobaID FROM soba";
	$result = mysqli_query($conn,$sql_soba);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$soba = mysqli_fetch_all($result, MYSQLI_NUM);


	$sql_okupirane_sobe = "SELECT sobaID FROM okupirane_sobe";
	$result = mysqli_query($conn,$sql_okupirane_sobe);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$okupirane_sobeID = mysqli_fetch_all($result, MYSQLI_NUM);
	$brojac=0;
	$niz = array();
	foreach ($okupirane_sobeID as $key => $value) {
		foreach ($value as $items) {
			$niz[$brojac++] = $items;
		}
	}
	// print_r(is_array($niz)?$niz:"nema niza");


	if(!empty($niz)){
		for($j=0; $j < count($soba); $j++){
			if(!in_array($soba[$j][0],$niz)){
				$temp = $soba[$j][0];
				$sql_update_status_sobe = "UPDATE soba SET status='Slobodno' WHERE sobaID = $temp";
				if(!mysqli_query($conn,$sql_update_status_sobe)){
				    echo "ERROR: Could not able to execute $sql_update_status_sobe. " . mysqli_error($conn);
				}
			}
		}
	} else{
		foreach ($soba as $key => $value) {
			foreach ($value as $items) {
				$SobaInt = intval($items);
				$sql_update_status_sobe = "UPDATE soba SET status='Slobodno' WHERE sobaID = $SobaInt";
				if(!mysqli_query($conn,$sql_update_status_sobe)){
				    echo "ERROR: Could not able to execute $sql_update_status_sobe. " . mysqli_error($conn);
				}
			}
		}
	} 

	$sql_jednokrevetna = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = 1";
	$result = mysqli_query($conn, $sql_jednokrevetna);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$jednokrevetna = mysqli_fetch_array($result, MYSQLI_NUM);

	$sql_dvokrevetnaEkonomska = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = 2";
	$result = mysqli_query($conn, $sql_dvokrevetnaEkonomska);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$dvokrevetnaEkonomska = mysqli_fetch_array($result, MYSQLI_NUM);

	$sql_dvokrevetnaDuplex = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = 3";
	$result = mysqli_query($conn, $sql_dvokrevetnaDuplex);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$dvokrevetnaDuplex = mysqli_fetch_array($result, MYSQLI_NUM);


	$sql_premium = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = 4";
	$result = mysqli_query($conn, $sql_premium);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$premium = mysqli_fetch_array($result, MYSQLI_NUM);

	$sql_royal = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = 5";
	$result = mysqli_query($conn, $sql_royal);
	if (!$result) {
		echo "Error is found " . mysqli_error($conn);
	}
	$royal = mysqli_fetch_array($result, MYSQLI_NUM);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rezervacija</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/footer_style.css">
	<link rel="stylesheet" type="text/css" href="css/navbar_style.css">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- <script src="https://kit.fontawesome.com/773f4a36ec.js" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<script>
		function myFunction1() {
			  var x = document.getElementById("mySelect1").value * 90;
			  document.getElementById("demo1").innerHTML = "Ukupno "+ x +" EUR";
		}
		function myFunction2(){
			var y = document.getElementById("mySelect2").value * 100;
			document.getElementById("demo2").innerHTML = "Ukupno "+ y +" EUR";
		}
		function myFunction3(){
			var z = document.getElementById("mySelect3").value * 120;
			document.getElementById("demo3").innerHTML = "Ukupno "+ z +" EUR";
		}
		function myFunction4(){
			var q = document.getElementById("mySelect4").value * 130;
			document.getElementById("demo4").innerHTML = "Ukupno "+ q +" EUR";
		}
		function myFunction5(){
			var c = document.getElementById("mySelect5").value * 140;
			document.getElementById("demo5").innerHTML = "Ukupno "+ c +" EUR";
		}
		function myFunction6(){
			var g = document.getElementById("mySelect6").value * 150;
			document.getElementById("demo6").innerHTML = "Ukupno "+ g +" EUR";
		}
		function myFunction7(){
			var d = document.getElementById("mySelect7").value * 160;
			document.getElementById("demo7").innerHTML = "Ukupno "+ d +" EUR";
		}
		function myFunction8(){
			var r = document.getElementById("mySelect8").value * 170;
			document.getElementById("demo8").innerHTML = "Ukupno "+ r +" EUR";
		}
		function myFunction9(){
			var a = document.getElementById("mySelect9").value * 190;
			document.getElementById("demo9").innerHTML = "Ukupno "+ a +" EUR";
		}
		function myFunction10(){
			var b = document.getElementById("mySelect10").value * 200;
			document.getElementById("demo10").innerHTML = "Ukupno "+ b +" EUR";
		}
	</script>
	<script type="text/javascript">
	    $(function(){
	        var dtToday = new Date();
	        
	        var month = dtToday.getMonth() + 1;
	        var day = dtToday.getDate();
	        var year = dtToday.getFullYear();
	        if(month < 10)
	            month = '0' + month.toString();
	        if(day < 10)
	            day = '0' + day.toString();
	        
	        var maxDate = year + '-' + month + '-' + day;
	        
	        $('#checkIn').attr('min', maxDate);
	    });
	    function updatedate() {
	        var firstdate = document.getElementById("checkIn").value;
	        var niz = firstdate.split("-");
	        var month = parseInt(niz[1]);
	        var day = parseInt(niz[2]) + 1;
	        var year = parseInt(niz[0]);

	        if ((month == 1) || (month == 3) || (month == 5) || (month == 7) || (month == 8) || (month == 10) || (month == 12)) {
	            if (day > 31) {
	                day = 1;
	                month =  parseInt(niz[1]) + 1;
	                if (month > 12) {
	                    month = 1;
	                    year = parseInt(niz[0]) + 1;
	                }
	            }
	        }
	        else if ((month == 4) || (month == 6) || (month == 9) || (month == 11)) {
	            if (month > 30) {
	                day = 1;
	                month =  parseInt(niz[1]) + 1;                    
	            }
	        }
	        else{
	            if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) {
	                if (day > 29) {
	                    day = 1;
	                    month =  parseInt(niz[1]) + 1;
	                }
	            }else{
	                if (day > 28) {
	                    day = 1;
	                    month =  parseInt(niz[1]) + 1;
	                }
	            }
	        }

	        if(month < 10){
	            month = '0' + month.toString();
	        }
	        if(day < 10){
	            day = '0' + day.toString();
	        }

	        var re = year + '-' + month + '-' + day;
	        document.getElementById("checkOut").value = re;
	        document.getElementById("checkOut").setAttribute("min",re);
	    }
	</script>
	<style>
	    body{
	        margin: 0;
	        padding: 0;
	        background-color: #F2F5FC;
	        box-sizing: border-box;
	        overflow-x: hidden;
	    }

	    .jumbotron1 {
	        padding: 0;
	        background-color: #E1E9FC;
	        border-radius: .3rem;
	        border: 2px solid #0E2156;
	    }
	    .jumbotron2 {
	        padding: 0.5rem;
	        background-color: #F2F5FC;
	        border-radius: .3rem;

	    }
	    .dugme2{
	    	width: 145px;
	    	height: 50px;
	    	background: #0E2156;
	    }
	    main{
	    	margin: 100px auto;
	    }

	    main .row{
	        padding-left: 0 !important; 
	    }

		main h1{
	    	font-family: Dancing Script;
	    	font-size: 50px;
	    	color: #0E2156;
	    	margin-bottom: 100px;
	    }
	    form{
	    	font-family: sitka heading;
	    }
	    .form-control{
	    	width: 70%;
	    }
	    .card{
	    	border: 2px solid #0E2156;
	    }
	    .card-header{
	    	background-color: #E1E9FC;
	    }
	    .card-body{
	    	background-color: #F2F5FC;
	    }
	    .btn,.hi{
	    	position: relative;
	    	top: 50%;
	    	left: 50%;
	    	transform: translate(-50%, -50%);
	    }

	</style>

</head>
<body>

<?php include('header.php'); ?>

<main>	
	<form action="rezervacija.php" method="POST">
		<h1 align="center">Rezervacija</h1>
		<div class="container">
			<div class="card" style="margin: 10px auto;">
				<div class="card-header">
						Popunjavanje podataka
				</div>
				<div class="card-body" >
					<div class="row g-3 text-center">
						<div class="col-sm-12 col-md-6">
							<label class="form-label">Dolazak:</label>
							<p style="color:red;"><?php echo $errors['dolazak']; ?></p>
						  	<input type="date" class="form-control mx-auto" onchange="updatedate()" name="dolazak" id="checkIn">
						</div>
						<div class="col-sm-12 col-md-6">
							<label class="form-label">Odlazak:</label>
							<p style="color:red;"><?php echo $errors['odlazak']; ?></p>
						  	<input type="date" class="form-control mx-auto" name="odlazak" id="checkOut">
						</div>			
	<!-- 				    <div class="col-4">
							<label class="form-label">Promo kod:</label>
							<input type="text" class="form-control mx-auto" name="promokod" placeholder="Unesite promo kod:">
					    </div>	 -->		
					</div>
				</div>
			</div>
		</div>

		<!-- Jednokrevetna ekonomska soba -->
			
		<div class="container" style="padding: 70px 0;">
		    <h4><i class="fas fa-male"></i> Jednokrevetna soba</h4>
		    <div id="slika" class="row jumbotron1"> 
		        <div class="col-sm-12 col-md-5" style="padding: 0; position: relative;">
		        	<p style="position:absolute; top: 10px; left: 15px; color: red;"><?php echo 'Preostalo soba: ' . $jednokrevetna[0]; ?></p>
		            <img src="slike/Sobe i restoran/singleroom.jpg" class="img-fluid" alt="">
		        </div>
		        <div class="col-sm-12 col-md-7" style="height: auto; display: flex; flex-direction: column; justify-content: space-evenly; text-align: center;">
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena sobe</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>90$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
	                           <label for="mySelect1">Sobe</label>
	                           <select class="form-select" id="mySelect1" onchange="myFunction1()" style="width: 60px; margin: 0 auto;" name="Sobe1">
	                             <option value="1">1</option>
	                             <option value="2">2</option>
	                             <option value="3">3</option>
	                             <option value="4">4</option>
	                             <option value="5">5</option>
	                           </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;" name="Osobe1">
		                             <option value="1">1</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="jednokrevetnaBez">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>1 osobe, 1 noć</h6>
		                            <p id="demo1">Ukupno 90 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div> 
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena sobe sa doručkom</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>100$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                       <label for="mySelect2">Sobe</label>
		                       <select class="form-select" id="mySelect2" onchange="myFunction2()" style="width: 60px; margin: 0 auto;" name="Sobe2">
		                       	 <option value="1">1</option>
		                       	 <option value="2">2</option>
		                       	 <option value="3">3</option>
		                       	 <option value="4">4</option>
		                       	 <option value="5">5</option>
		                       </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;" name="Osobe2">
		                             <option>1</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="jednokrevetnaSa">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>1 osobe, 1 noć</h6>
		                            <p id="demo2">Ukupno 100 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div>    
		        </div>               
		    </div>
		</div>
		<!-- KRAJ Jednokrevetna ekonomska soba -->

		<!-- Dvokrevetna ekonomska soba -->
		<div class="container" style="padding: 70px 0;">
		    <h4><i class="fas fa-male"></i> <i class="fas fa-male"></i> Dvokrevetna ekonomska soba</h4>
		    <div id="slika" class="row jumbotron1"> 
		        <div class="col-sm-12 col-md-5" style="padding: 0; position: relative;">
		        	<p style="position:absolute; top: 10px; left: 15px; color: red;"><?php echo 'Preostalo soba: ' . $dvokrevetnaEkonomska[0]; ?></p>
		            <img src="slike/Sobe i restoran/dvokrevetna.jpg" class="img-fluid" alt="">
		        </div>
		        <div class="col-sm-12 col-md-7" style="height: auto; display: flex; flex-direction: column; justify-content: space-evenly; text-align: center;">
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>120$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
	                           <label for="mySelect3">Sobe</label>
	                           <select class="form-select" id="mySelect3" onchange="myFunction3()" style="width: 60px; margin: 0 auto;" name="Sobe3">
	                           	 <option value="1">1</option>
	                           	 <option value="2">2</option>
	                           	 <option value="3">3</option>
	                           	 <option value="4">4</option>
	                           	 <option value="5">5</option>
	                           </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;" name="Osobe3">
		                             <option>2</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="dvokrevetnaBez">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>2 osobe, 1 noć</h6>
		                            <p id="demo3">Ukupno 120 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div> 
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba i doručak</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>130$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                       <label for="mySelect4">Sobe</label>
		                       <select class="form-select" id="mySelect4" onchange="myFunction4()" style="width: 60px; margin: 0 auto;" name="Sobe4">
		                       	 <option value="1">1</option>
		                       	 <option value="2">2</option>
		                       	 <option value="3">3</option>
		                       	 <option value="4">4</option>
		                       	 <option value="5">5</option>
		                       </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;" name="Osobe4">
		                             <option>2</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="dvokrevetnaSa">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>2 osobe, 1 noć</h6>
		                            <p id="demo4">Ukupno 130 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div>    
		        </div>               
		    </div>
		</div>
		<!-- KRAJ Dvokrevetna ekonomska soba -->

		<!-- Dvokrevetna standard -->
		<div class="container" style="padding: 70px 0;">
		    <h4><i class="fas fa-male"></i> <i class="fas fa-male"></i> Dvokrevetna duplex soba</h4>
		    <div id="slika" class="row jumbotron1"> 
		        <div class="col-sm-12 col-md-5" style="padding: 0; position: relative;">
		        	<p style="position:absolute; top: 10px; left: 15px; color: red;"><?php echo 'Preostalo soba: ' . $dvokrevetnaDuplex[0]; ?></p>
		            <img src="slike/Sobe i restoran/superior.png" class="img-fluid" alt="">
		        </div>
		        <div class="col-sm-12 col-md-7" style="height: auto; display: flex; flex-direction: column; justify-content: space-evenly; text-align: center;">
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>140$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
	                           <label for="mySelect5">Sobe</label>
	                           <select class="form-select" id="mySelect5" onchange="myFunction5()" style="width: 60px; margin: 0 auto;" name="Sobe5">
	                             <option>1</option>
	                             <option>2</option>
	                             <option>3</option>
	                             <option>4</option>
	                             <option>5</option>
	                           </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;">
		                             <option>2</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="dvokrevetnaDuplexBez">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>2 osobe, 1 noć</h6>
		                            <p id="demo5">Ukupno 140 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div> 
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba i doručak</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>150$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                       <label for="mySelect6">Sobe</label>
		                       <select class="form-select" id="mySelect6" onchange="myFunction6()" style="width: 60px; margin: 0 auto;" name="Sobe6">
		                         <option>1</option>
		                         <option>2</option>
		                         <option>3</option>
		                         <option>4</option>
		                         <option>5</option>
		                       </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;">
		                             <option>2</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="dvokrevetnaDuplexSa">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>2 osobe, 1 noć</h6>
		                            <p id="demo6">Ukupno 150 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div>    
		        </div>               
		    </div>
		</div>
		<!-- KRAJ Double Standard Room -->

		<!-- Superior Duplex Room -->
		<div class="container" style="padding: 70px 0;">
		    <h4><i class="fas fa-male"></i> <i class="fas fa-male"></i> + <i class="fas fa-male"></i> Premium apartman</h4>
		    <div id="slika" class="row jumbotron1"> 
		        <div class="col-sm-12 col-md-5" style="padding: 0; position: relative;">
		        	<p style="position:absolute; top: 10px; left: 15px; color: red;"><?php echo 'Preostalo soba: ' . $premium[0]; ?></p>
		            <img src="slike/Sobe i restoran/premium.jpg" class="img-fluid" alt="">
		        </div>
		        <div class="col-sm-12 col-md-7" style="height: auto; display: flex; flex-direction: column; justify-content: space-evenly; text-align: center;">
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-sm-3" >
		                        <h5 style="font-weight: 400;">Cena soba</h5>
		                    </div>
		                    <div class="col-sm-3 col-sm-2">
		                        <h5>160$</h5>
		                    </div>
		                    <div class="col-sm-3 col-sm-2">
	                           <label for="mySelect7">Sobe</label>
	                           <select class="form-select" id="mySelect7" onchange="myFunction7()" style="width: 60px; margin: 0 auto;" name="Sobe7">
	                             <option>1</option>
	                             <option>2</option>
	                             <option>3</option>
	                             <option>4</option>
	                             <option>5</option>
	                           </select>
		                    </div>
		                    <div class="col-sm-3 col-sm-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;">
		                             <option>3</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-sm-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="premiumBez">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>3 osobe, 1 noć</h6>
		                            <p id="demo7">Ukupno 160 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div> 
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba i doručak</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>170$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                       <label for="mySelect8">Sobe</label>
		                       <select class="form-select" id="mySelect8" onchange="myFunction8()" style="width: 60px; margin: 0 auto;" name="Sobe8">
		                         <option>1</option>
		                         <option>2</option>
		                         <option>3</option>
		                         <option>4</option>
		                         <option>5</option>
		                       </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;">
		                             <option>3</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="premiumSa">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>3 osobe, 1 noć</h6>
		                            <p id="demo8">Ukupno 170 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div>    
		        </div>               
		    </div>
		</div>

		<div class="container" style="padding: 70px 0;">
		    <h4><i class="fas fa-male"></i> <i class="fas fa-male"></i> + <i class="fas fa-male"></i> <i class="fas fa-male"></i> Royal apartman</h4>
		    <div id="slika" class="row jumbotron1"> 
		        <div class="col-sm-12 col-md-5" style="padding: 0; position: relative;">
		        	<p style="position:absolute; top: 10px; left: 15px; color: red;"><?php echo 'Preostalo soba: ' . $royal[0]; ?></p>
		            <img src="slike/Sobe i restoran/royal.png" class="img-fluid" alt="">
		        </div>
		        <div class="col-sm-12 col-md-7" style="height: auto; display: flex; flex-direction: column; justify-content: space-evenly; text-align: center;">
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>190$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
	                           <label for="mySelect7">Sobe</label>
	                           <select class="form-select" id="mySelect9" onchange="myFunction9()" style="width: 60px; margin: 0 auto;" name="Sobe9">
	                             <option>1</option>
	                             <option>2</option>
	                             <option>3</option>
	                             <option>4</option>
	                             <option>5</option>
	                           </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;">
		                             <option>4</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="royalBez">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>4 osobe, 1 noć</h6>
		                            <p id="demo9">Ukupno 190 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div> 
		            <div class="container">   
		                <div class="jumbotron2 row" style="align-items: center;">
		                    <div class="col-sm-3 col-md-3" >
		                        <h5 style="font-weight: 400;">Cena soba i doručak </h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <h5>200$</h5>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                       <label for="mySelect8">Sobe</label>
		                       <select class="form-select" id="mySelect10" onchange="myFunction10()" style="width: 60px; margin: 0 auto;" name="Sobe10">
		                         <option>1</option>
		                         <option>2</option>
		                         <option>3</option>
		                         <option>4</option>
		                         <option>5</option>
		                       </select>
		                    </div>
		                    <div class="col-sm-3 col-md-2">
		                        <div class="form-group">
		                           <label>Osobe</label>
		                           <select class="form-select" style="width: 60px; margin: 0 auto;">
		                             <option>4</option>
		                           </select>
		                         </div>
		                    </div>
		                    <div class="col-sm-12 col-md-3" style="display: flex; flex-direction: column;" >
		                    	<div class="form-check" style="margin: 10px auto 0;">
		                    	  <input class="form-check-input" type="checkbox" value="Y" id="flexCheckDefault" name="royalSa">
		                    	  <label class="form-check-label" for="flexCheckDefault">
		                    	    Odaberi
		                    	  </label>
		                    	</div>
		                        <div style="margin: 6% 0; line-height: 0.5; text-align: center; font-size: 14px;">
		                            <h6>4 osobe, 1 noć</h6>
		                            <p id="demo10">Ukupno 200 EUR</p> 
		                        </div>
		                    </div>
		                </div>
		            </div>    
		        </div>               
		    </div>
		</div>

		<div class="container">
			<input class="btn btn-primary btn-lg" type="submit" value="Rezervišite" name="potvrda">
		</div>


	</form>
	<!-- KRAJ Superior Duplex Room --> 
</main>

<?php include('footer.php') ?>

</body>
</html>
