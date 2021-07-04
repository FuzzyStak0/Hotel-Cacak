<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
	<!-- HEADER I FOOTER -->
	<link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar_style.css">
    
    <!-- <script src="https://kit.fontawesome.com/773f4a36ec.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<style type="text/css">
		body{
		    margin: 0;
		    padding: 0;
		    box-sizing: border-box;
		    background-color: #F2F5FC;
		}

		hr{
			border: 1px solid #0E2156; 
			width: 50%;
			opacity: 1;
			border-radius: 5px;
		}

		p {
		    font-family: Sitka heading;
		}
		h2 {
		    font-family: Dancing Script;
		    color: #0E2156;
		}
		h3{
		    font-family: Sitka heading;
		    color: #0E2156;
		}
		@media(max-width: 1200px){
			.fluid{
				max-width: 100%;
				height: auto;
			}
		}

	</style>
</head>
<body>

<?php include('header.php'); ?>

<main>    
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 col-sm-7 mb-4 mx-auto">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<h2>| Kontaktirajte nas</h2>
						<div class="row g-3">
							<div class="col-md-12">	
								<label for="ime" class="form-label">Ime i prezime:</label>
						        <input type="text" class="form-control" name="ime" id="ime" required="" placeholder="Unesite ime i prezime">
					        </div>	
			        		<div class="col-md-12">	
			        			<label for="telefon" class="form-label">Telefon:</label>
			        	        <input type="number" class="form-control" name="telefon" id="telefon" required="" placeholder="Unesite telefon">
			                </div>
							<div class="col-md-12">	
								<label for="mejl" class="form-label">E-mail:</label>
						        <input type="email" class="form-control" name="mejl" id="mejl" required="" placeholder="Unesite E-mail adresu">
					        </div>
				        </div>
			        </div>
			        <div class="col-md-6 col-sm-12 align-self-end">
			        	<div class="row g-3">
			        		<div class="col-12">
								<label class="form-label" for="poruka">Poruka:</label>
						        <textarea class="form-control" id="poruka" rows="5" required="" placeholder="Unesite poruku"></textarea>
			        		</div>
			        		<div class="col-12">
			        		  <button type="submit" class="btn btn-primary">Pošalji</button>
			        		</div>
			        	</div>
			    
			        </div>
		        </div>
			</div>


			<div class="col-md-6 col-sm-12 text-center">
				<h2> | Informacije </h2>
				<hr class="mx-auto">
				<h3>Adresa:</h3> 
				<p>Balkanska 1</p>
				<hr class="mx-auto">
				<h3>Telefon:</h3> 
				<p>011/324-90-42</p>
				<hr class="mx-auto">
				<h3>E-mail:</h3> 
				<p><a href="mailto:hotelcacak@gmail.com" id="mejl">hotelcacak@gmail.com</a></p>
				<hr class="mx-auto">
			</div>

		</div>
	</div>

    <div class="container my-4">
        <iframe class="fluid" width="1110" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=balkanska%201%20beograd&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
</main>

<?php include('footer.php'); ?>

</body>
</html>