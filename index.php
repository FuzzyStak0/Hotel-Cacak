<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/773f4a36ec.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

    <style>
        body{
            box-sizing: border-box;
            background-color: #F2F5FC;
        }
        .jumbotron {
            padding: 2rem;
            background-color: #E1E9FC;
            border: 1px solid #0E2156;
            height: 100%;
        }

        .my-container{
            margin: 15px;
        }

        p {
            font-family: Sitka heading;
            font-size: 22px;
            line-height: 1.3;
            margin-top: 20px;
        }
        h1 {
            font-family: Dancing Script;
            font-size: 50px;
            color: #0E2156;
            text-align: center;
        }
        h2{
            font-family: Sitka heading;
            font-size: 30px;
            color: #0E2156;
            text-align: left;
        }
        .link-vise {
            text-align: right;
        }
        .link-vise a {
            text-decoration: none;
            font-weight: 500;
            color: #0E2156;
        }
        .link-vise a:hover{
            color: #777;
        }
        @media(max-width: 1568px){
            p{
                font-size: 20px;
            }
        }
        @media(max-width: 1595px){
            p{
                font-size: 18px;
            }
        }
        @media(max-width: 1371px){
            p{
                font-size: 16px;
            }
        }
        @media(max-width: 1244px){
            p{
                font-size: 15px;
            }
            h1{
                font-size: 48px;
            }
            h2{
                font-size: 28px;
            }
        }
        @media(max-width: 1210px){
            p{
                font-size: 15px;
                margin-top: 10px;
            }
            h1{
                font-size: 42px;
            }
            h2{
                font-size: 26px;
            }
        }
        @media(max-width: 1190px){
            p{
                font-size: 13px;
                margin-top: 5px;
                font-weight: bold;
            }
            h1{
                font-size: 38px;
            }
            h2{
                font-size: 22px;
            }
            .jumbotron{
                padding: 1rem;
            }
        }
        @media(max-width: 919px){
            p{
                font-size: 11px;
                margin-top: 5px;
                font-weight: bold;
            }
            h1{
                font-size: 34px;
            }
            h2{
                font-size: 20px;
            }
            .jumbotron{
                padding: 1rem;
            }
        }
        @media(max-width: 843px){
            p{
                font-size: 10px;
                margin-top: 3.5px;
                font-weight: bold;
            }
            h1{
                font-size: 30px;
            }
            h2{
                font-size: 18px;
            }
            .jumbotron{
                padding: 1rem;
            }
        }
        @media(max-width: 767px){
            #prvi{
                border-bottom: none;
            }
            #prvi img{
                border: 1px solid #0E2156;
                border-top: none;
            }
            #drugi{
                border-top: none;
                border-bottom: none;
            }
            #mobile-img-top img{
                border: 1px solid #0E2156;
                border-bottom: none;

            }
            #mobile-img-bottom img{
                border: 1px solid #0E2156;
                border-top: none;
            }
            #treci{
                border-top: none;
            }
            #treci img{
                border: 1px solid #0E2156;
                border-bottom: none;
            }
            .mb-3{
                margin-bottom: 0 !important;
            }
            #mobile-none{
                display: none;
            }
        }

    </style>
</head>
<body>

    <?php include('header.php'); ?>

    <main>
        <div class="my-container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <div id="prvi" class="jumbotron">
                        <h1><span style="font-family: Arial;">|</span>O Hotelu</h1>
                        <p>
                            Dobrodošli u hotel Čačak, znamenitost Sutomora, jednog od najznačajnijih arhitektonskih dragulja crnogorskog primorja, izgrađenog u stilu ruske secesije, koji je pod zaštitom države od druge polovine prethodnog veka. Ovu velelepno zdanje otvorio je kralj Petar I Karađorđević 1908. godine. Tradicija postojanja i poslovanja duža od jednog veka učinila je da ovaj hotel poseti preko 45 miliona ljudi, uključujući poznata imena poput: Albert Ajnštajna, Ane Pavlove, Leonida Brežnjeva, Indire Gandi, Rej Čarlsa, Robert De Nira, Bred Pita, Maksim Gorkog, Kirk Daglasa, Majkl Daglasa, Mile Jovovič i mnogi drugi.
                        </p>
                        <p class="link-vise">
                            <a href="ohotelu.php">Vise <i class="fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
                <div id="prvi" class="col-md-7 col-sm-12">
                    <img class="img-fluid" src="slike/Index/slika1.jpg">
                </div>
            </div>
        </div>

        <div class="my-container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div id="mobile-slider1" class="row flex-column"> 
                        <div id="mobile-none" class="col mb-3"><img class="img-fluid" src="slike/Sobe i restoran/superior.png" alt=""></div>
                        <div id="mobile-img-top" class="col"><img class="img-fluid" src="slike/Sobe i restoran/dvokrevetna.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div id="drugi" class="jumbotron">
                        <h1><span style="font-family: Arial;">|</span>Sobe i apartmani</h2>
                        <p>
                            U želji da našim gostima obezbedimo prijatan, miran i komforan ambijent, u ponudi imamo 187 moderno dizajniranih soba i apartmana, raspoređenih na ukupno 7 spratova.U zavisnosti od zahteva i potreba naših gostiju, možemo da ponudimo 73 standardne jednokrevetne sobe, 17 superior jednokrevetnih soba, 54 standardne dvokrevetne sobe , 12 superior dvokrevetnih soba kao i 28 apartmana.
                        </p>

                        <p class="link-vise">
                            <a href="sobe.php">Vise <i class="fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="row flex-column">
                        <div id="mobile-img-bottom" class="col mb-3"><img class="img-fluid" src="slike/Sobe i restoran/singleroom.jpg" alt=""></div>
                        <div id="mobile-none" class="col"><img class="img-fluid" src="slike/Sobe i restoran/premium.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="my-container">
            <div class="row">
                <div id="treci" class="col-md-7 col-sm-12">
                    <img class="img-fluid" src="slike/Index/restoran.png">
                </div>
                <div class=" col-md-5 col-sm-12">
                    <div id="treci" class="jumbotron">
                        <h1><span style="font-family: arial;">|</span>Restoran</h1>
                        <p>
                            Restoran Čačak je elegantan gurme restoran koji spaja tradicionalno i savremeno, istorijsko i moderno, živost i udobnost. Svojim velikim imenom, uz nežne, žive melodije za klavir i svojom elegantnom i šarmantnom atmosferom, ovaj restoran predstavlja dugu tradiciju Hotela Čačak. Ranije su se prve svečanosti i balovi, čiji su domaćini bili ugledni građani Čačaka, održavali upravo ovde, uz pratnju živih orkestara uz mnogo vina i ukusne hrane. Trudimo se da očuvamo stari šarm. Usluga koja teži savršenstvu, kreativnost šefa kuhinje, vinski podrum koji može da zadovolji i najupućenije goste i ljubitelje vina garantuju najbolje ugostiteljsko iskustvo u Čačku. Restoran raspolaže sa 100 mesta unutra i 43 mesta za sedenje napolju.
                        </p>

                        <p class="link-vise">
                            <a href="restoran.php">Vise <i class="fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-4">
                        <h2><i class="fas fa-bus"></i> Javni prevoz</h1>
                        <p>
                            Udaljenost hotela od autobuske stanice je 1 km.<br>
                            Za sve informacije o autobuskim polascima, posetite stranicu.
                        </p>
                    </div>
                    <div class="col-4">
                        <h2><i class="fas fa-train"></i> Voz</h1>
                        <p>
                            Udaljenost hotela od zeleznicke stanice je jedan kilometar.<br>
                            Za sve informacije o redu vožnje, posetite stranicu.
                        </p>
                    </div>
                    <div class="col-4">
                        <h2><i class="fas fa-plane"></i> Avio prevoz</h1>
                        <p>
                            Udaljenost aerodroma u Surčinu je 164km.<br>
                            U ponudi je usluga obezbedjivanja prevoza putnika do aerodroma.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>

</body>
</html>