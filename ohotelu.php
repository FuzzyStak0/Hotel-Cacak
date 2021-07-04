<?php 

    include('include/connection.php');

    // BROJ JEDNOKREVETNI SOBA U BAZI
    $sql_jednokrevetna = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = '1'";
    $result = mysqli_query($conn, $sql_jednokrevetna);
    if (!$result) {
      echo "Error invalid property" . mysqli_error($conn);
    }
    $jednokrevetna = mysqli_fetch_array($result, MYSQLI_NUM);

    // BROJ DVOKREVETNIH SOBA U BAZI
    $sql_dvokrevetna = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = '2'";
    $result = mysqli_query($conn, $sql_dvokrevetna);
    if (!$result) {
      echo "Error invalid property" . mysqli_error($conn);
    }
    $dvokrevetna = mysqli_fetch_array($result, MYSQLI_NUM);

    $sql_dvokrevetnaDuplex = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = '3'";
    $result = mysqli_query($conn, $sql_dvokrevetnaDuplex);
    if (!$result) {
      echo "Error invalid property" . mysqli_error($conn);
    }
    $dvokrevetnaDuplex = mysqli_fetch_array($result, MYSQLI_NUM);

    $sql_premium = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = '4'";
    $result = mysqli_query($conn, $sql_premium);
    if (!$result) {
      echo "Error invalid property" . mysqli_error($conn);
    }
    $premium = mysqli_fetch_array($result, MYSQLI_NUM);

    $sql_royal = "SELECT COUNT(sobaID) FROM soba WHERE status = 'Slobodno' AND tipsobeID = '5'";
    $result = mysqli_query($conn, $sql_royal);
    if (!$result) {
      echo "Error invalid property" . mysqli_error($conn);
    }
    $royal = mysqli_fetch_array($result, MYSQLI_NUM);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Hotelu</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <!-- HEADER I FOOTER -->
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar_style.css">

    <!-- <script src="https://kit.fontawesome.com/773f4a36ec.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

    <style>
      body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #F2F5FC;
        text-align: center; 
      }

      .my-container{
        margin: 15px;
      }

      .jumbotron {
          padding: 2rem;
          background-color: #E1E9FC;
          border: 1px solid #0E2156;
          height: 100%;
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
      }
      h2{
          font-family: Sitka heading;
          font-size: 28px;
          color: #0E2156;
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
      }
      @media(max-width: 991px){
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
        <div class="my-container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                <div id="prvi" class="jumbotron">
                    <h1><span style="font-family: Arial;">|</span>O Hotelu</h1>
                    <P>
                        Dobrodošli u hotel Čačak, znamenitost Sutomora, jednog od najznačajnijih arhitektonskih 
                        dragulja crnogorskog primorja, izgrađenog u stilu ruske secesije, koji je pod zaštitom 
                        države od druge polovine prethodnog veka. Ovu velelepno zdanje otvorio je 
                        kralj Petar I Karađorđević 1908. godine. Tradicija postojanja i poslovanja duža od 
                        jednog veka učinila je da ovaj hotel poseti preko 45 miliona ljudi, uključujući poznata 
                        imena poput: Albert Ajnštajna, Ane Pavlove, Leonida Brežnjeva, Indire Gandi, Rej Čarlsa,
                        Robert De Nira, Bred Pita, Maksim Gorkog, Kirk Daglasa, Majkl Daglasa,
                        Mile Jovovič i mnogi drugi.
                    </p>
                </div>
                </div>
                <div id="prvi" class="col-md-7 col-sm-12">
                    <img class="img-fluid" src="slike/O hotelu/hotelpravi.jpg">
                </div>
            </div>
        </div>

        <div class="my-container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="jumbotron">
                    <h2>Jednokrevetna sobe</h2>
                    <p class="display-5"><?php echo $jednokrevetna[0]; ?></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="jumbotron d-flex flex-column">
                    <p class="display-5 last"><?php echo $premium[0]; ?></p>
                    <h2 class="first">Premium sobe</h2>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="jumbotron">
                    <h2>Konferencijska sala</h2>
                    <p class="display-5">1</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="jumbotron d-flex flex-column">
                    <p class="display-5 last"><?php echo $dvokrevetna[0]; ?></p>
                    <h2 class="first">Dvokrevetne sobe</h2>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="jumbotron">
                        <h2>Duplex sobe</h2>
                        <p class="display-5"><?php echo $dvokrevetnaDuplex[0]; ?></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="jumbotron d-flex flex-column">
                    <p class="display-5 last"><?php echo $royal[0]; ?></p>
                    <h2 class="first">Royal sobe</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-container">
        <img class="img-fluid" src="slike/O hotelu/hotelpravi.jpg" style="width: 100%;">
        </div>
    </main>

    <?php include('footer.php'); ?>

</body>
</html>