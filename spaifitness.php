<!DOCTYPE html>
<html>
<head>
  <title>spa</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
  <!-- HEADER I FOOTER -->
  <link rel="stylesheet" type="text/css" href="css/footer_style.css">
  <link rel="stylesheet" type="text/css" href="css/navbar_style.css">

  <!-- <script src="https://kit.fontawesome.com/773f4a36ec.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

  <style type="text/css">
    body{
      background-color: #F2F5FC;
    }
    .my-container{
      margin: 50px;
    }
    .razmak{
      margin-bottom: 35px;
    }
    .center{
      display: flex; 
      align-items: center;
    }

    h2{
      font-family: dancing script;
      font-size: 50px;
    }
    p{
      font-family: sitka heading;
      font-size: 22px;
      word-wrap: break-word;
      width: 100%;
    }
    
    .jumbotron{
      padding: 2rem 1rem;
      margin-bottom: 2rem;
      padding: 30px;
      border-style: solid;
      background-color: #F2F5FC;
      border-color: #0E2156
    }

    @media(max-width: 1440px){
      p{
        font-size: 20px;
      }
      h2{
        font-size: 48px;
      }
    }

    @media(max-width: 1302px){
      p{
        font-size: 18px;
      }
      h2{
        font-size: 46px;
      }
    }

    @media(max-width: 1195px){
      p{
        font-size: 14px;
        font-weight: bold;
      }
      h2{
        font-size: 42px;
      }
    }

    @media(max-width: 968px){
      p{
        font-size: 12px;
        font-weight: bold;
      }
      h2{
        font-size: 40px;
      }
    }
    @media(max-width: 767px){
      .first{
        order: -1;
      }
    }
  </style>

</head>
<body>

    <?php include('header.php'); ?>

    <main>
        <div class="my-container">
            <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 center">
                <h2>Zatvoreni bazen</h2>
                </div>
                <div class="col-md-4">
                <p>
                Na bazenu hotela Cacak mogu se odmarati i rekreirati svi, kako gosti hotela tako i oni koji ne odsedaju u hotelu. Bazen hotela Cacak radi svakog dana, tokom cele godine, osim ponedeljkom jer je to dan rezervisan za tehničke preglede bazena.
                </p>
                </div>
                <div class="col-md-4">
                <p>
                Svuda okolo su veoma udobne ležaljke koje vam pružaju mogućnost uživanja ali i mnogo zelenila što upotpunjuje ambijent i doživljaj. U slučaju velike gužve i velikog broja ljudi na bazenu prvenstvo, naravno, imaju gosti hotela.
                </p>
                </div>
            </div>
            </div>

            <img class="razmak img-fluid" src="slike/Spafitnes/zatvoren-bazen.jpg"  style="width:100%; height: auto;">

            <div class="jumbotron">
            <div class="row">
                <div class="col-md-4">
                <p>
                Idealno opuštanje nakon napornog dana ili jednostavno rešenje za pročišćavanje organizma. Telo i koža oslobađaju se toksina, pobojšava se cirkulacija krvi, a imuni sistem stimuliše se takok da regeneriše fizički i mentalni sistem.
                </p>
                </div>
                <div class="col-md-4">
                <p>
                Boravak u prostoriji gde je vazduk zasićen vlagom, a temperatura koja dostiže do 50 °C, ima značajan pozitivan uticaj na okrepljenje organizma ali i blistavost kože. Ovaj ritual sa bliskog istoka savršena je priprema za masažu ili tretman lica.
                </p>
                </div>
                <div class="col-md-4 center first">
                <h2>Parno kupatilo</h2>
                </div>
            </div>
            </div>

            <img class="razmak img-fluid" src="slike/Spafitnes/parno-kupatilo.jpg" style="width:100%; height: auto;">

            <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 center">
                <h2>Fitness centar</h2>
                </div>
                <div class="col-md-4">
                <p>
                Ostanite u formi, čak i kada ste na poslovnom puti, ili posebno kada ste na poslovnom putu. Budite aktivni, čak i kada ste na odmoru, ili posebno kada ste na odmoru. Fitnes prostor u okviru Eva spa wellness centra u potpunosti je opremljen najsavremenijm spravama za vežbanje.
                </p>
                </div>
                <div class="col-md-4">
                <p>
                Poboljšavajući kardiovaskularnu i mišićnu snagu vašeg tela osetite se snažno i poletno u svakom smislu.
                </p>
                </div>
            </div>
            </div>

            <img class="razmak img-fluid" src="slike/Spafitnes/teretana.jpg" height="500" width="100%">
        </div>  
    </main>

    <?php include('footer.php'); ?>

</body>
</html>
