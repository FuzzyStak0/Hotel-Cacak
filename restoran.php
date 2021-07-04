<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
	<!-- HEADER I FOOTER -->
	<link rel="stylesheet" type="text/css" href="css/footer_style.css">
	<link rel="stylesheet" type="text/css" href="css/navbar_style.css">

    <!-- <script src="https://kit.fontawesome.com/773f4a36ec.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<style type="text/css">
		body{
		  color: #0E2156;
		  background-color: #F2F5FC;
		}

		.jumbotron {
		  padding: 2rem 1rem;
		  background-color: #F2F5FC;
		}

		h2{
		  margin: 70px auto;
		  color: #0E2156;
		  font-family: Dancing Script;
		  font-size: 80px;
		  text-align: center;
		}

		p{
			text-align: justify;
			font-family: sitka heading;
			font-size: 22px;
			white-space: pre-line;
		}

		h3{
		  font-family: sitka heading;
		  font-size: 50px;
		  line-height: 1.5;
		}

		hr{
			border: 2px solid #0E2156; 
			width: 80%;
			opacity: 1;
			border-radius: 5px;
		}


		@media(max-width: 1398px){
		  p{
		    font-size: 21px;
		    font-weight: 500;
		  }
		  h3{
		    font-size: 47px;
		    line-height: 1.2;
		  }
		}
		@media(max-width: 991px){
		  p{
		    font-size: 18px;
		     font-weight: 800;
		  }
		  h3{
		    font-size: 43px;
		    line-height: 1.2;
		  }
		  .jumbotron{
		     padding: 1rem;
		  }
		}
		@media(max-width: 767px){
		  p{
		    font-size: 17px;
		    font-weight: 800;
		  }
		  h3{
		    font-size: 30px;
		    line-height: 1.2;
		  }
		  .jumbotron{
		     padding: 1rem;
		  }
		  .first{
		    order: -1;
		  }
		  .last{
		    order: 6;
		  }
		}
	</style>
</head>
<body>

    <?php include('header.php'); ?>

    <main>
        <h2>Restoran</h2>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="slike/Sobe i restoran/carrot-salad.jpg" width="600" height="350">
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>Salate</h3>
                        <p>Šantena šargarepa tofu
                        Havajsko srce graška breskve i limete</p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4 mx-auto">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 last">
                    <div class="jumbotron">
                        <h3>Glavna jela</h3>
                        <p>Polako počeni som filet sa dodacima
                        Pasta sa tartufima i račićima</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 first">
                    <img class="img-fluid" src="slike/Sobe i restoran/filet.jpg" width="600" height="350">
                </div>
            </div>
        </div>

        <hr class="my-4 mx-auto">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="slike/Sobe i restoran/nabujak.jpg" width="600" height="350">
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>Dezerti</h3>
                        <p>Čokoladni nabujak
                        Šerbet od vanile i jagode
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4 mx-auto">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 last">
                    <div class="jumbotron">
                        <h3>Predjela</h3>
                        <p>Ostrige i biseri
                        Sabajon biserske manioke sa ostrvskim grčkim ostrigama</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 first">
                    <img class="img-fluid" src="slike/Sobe i restoran/ostrige.jpg" width="600" height="350">
                </div>
            </div>
        </div>

        <hr class="my-4 mx-auto">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="slike/Sobe i restoran/sardonej.jpg" width="500" height="350">
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>Vina</h3>
                        <p>Bela vina: Reisling Chardonnay
                        Crna vina: Mary Rivers, Pinot Noir, Sonoma Coast</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>

</body>
</html>