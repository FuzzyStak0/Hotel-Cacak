<?php

    include("connection.php");
    
	$errors	= array('Ime' => '', 'Prezime' => '', 'Adresa' => '', 'Postanski_broj' => '', 'Grad' => '', 'Email' => '', 'Telefon' => '','Broj_kartice' => '', 'CVN' => '', 'Rok_kartice_mesec' => '', 'Rok_kartice_godina' => '', 'Ime_kartice' => '', 'Prezime_kartice' => '');
    $Ime = $Prezime = $Adresa = $Postanski_broj = $Grad = $Email = $Telefon = $Broj_kartice = $CVN = $Ime_kartice = $Prezime_kartice = "";


if (isset($_POST['Potvrda'])) {
 	
    // PODACI O KORISNIKU

    // Ime
    if (empty($_POST['Ime'])) {
        $errors['Ime'] = "Ime is empty";
    }else{
        $Ime = $_POST['Ime'];
        if(!preg_match('/^[a-zA-Z]+$/', $Ime)){
            $errors['Ime'] = "Ime must be letters";
        } 
    }
    // Prezime
    if (empty($_POST['Prezime'])) {
        $errors['Prezime'] = "Prezime is empty";
    }else{
        $Prezime = $_POST['Prezime'];
        if(!preg_match('/^[a-zA-Z]+$/', $Prezime)){
            $errors['Prezime'] = "Prezime must be letters";
        } 
    }
    // Adresa 
    if (empty($_POST['Adresa'])) {
        $errors['Adresa'] = "Adresa is empty";
    }else{
        $Adresa = $_POST['Adresa'];
        if(!preg_match('/[\w]+\s?[\w]+/', $Adresa)){
            $errors['Adresa'] = "Adresa must be letters";
        } 
    }	
    // Postanski broj
    if (empty($_POST['Postanski_broj'])) {
        $errors['Postanski_broj'] = "Postanski broj is empty";
    }else{
        $Postanski_broj = $_POST['Postanski_broj'];
        if(!preg_match('/^\d+$/', $Postanski_broj)){
            $errors['Postanski_broj'] = "Postanski broj must be numbers";
        } 
    }
    // Grad
    if (empty($_POST['Grad'])) {
        $errors['Grad'] = "Grad is empty";
    }else{
        $Grad = $_POST['Grad'];
        if(!preg_match('/^[a-zA-Z]+$/', $Grad)){
            $errors['Grad'] = "Grad must be letters";
        } 
    }
    // Email
    if (empty($_POST['Email'])) {
        $errors['Email'] = "EMAIL is empty";
    }else{
        $Email = $_POST['Email'];
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $errors['Email'] = 'email must be valid email address';
        } 
    }

    // // Drzava
    $Drzava = $_POST['Drzava'];


    // Telefon
    if (empty($_POST['Telefon'])) {
        $errors['Telefon'] = "Telefon is empty";
    }else{
        $Telefon = $_POST['Telefon'];
        if(!preg_match('/^\d+$/', $Telefon)){
            $errors['Telefon'] = "Telefon must be letters";
        } 
    }

    // GARANCIJA REZERVACIJE


    // Kreditna kartica
    $Kreditna_kartica = $_POST['Kreditna_kartica'];

    // Broj kartice
    if (empty($_POST['Broj_kartice'])) {
        $errors['Broj_kartice'] = "Broj_kartice is empty";
    }else{
        $Broj_kartice = $_POST['Broj_kartice'];
        if(!preg_match('/^\d+$/', $Broj_kartice)){
            $errors['Broj_kartice'] = "Broj_kartice must be numbers";
        } 
    }

    // CVN
    if (empty($_POST['CVN'])) {
        $errors['CVN'] = "CVN is empty";
    }else{
        $CVN = $_POST['CVN'];
        if(!preg_match('/^\d+$/', $CVN)){
            $errors['CVN'] = "CVN must be numbers";
        } 
    }

    // Rok mesec
    if (!empty($_POST['Rok_kartice_mesec'])) {
        $Rok_kartice_mesec = $_POST['Rok_kartice_mesec'];
        if(strcmp('Mesec:', $Rok_kartice_mesec) == 0){
            $errors['Rok_kartice_mesec'] = "Mesec must be selected";
        } 
    }

    // Rok godina
    if (!empty($_POST['Rok_kartice_godina'])) {
        $Rok_kartice_godina = $_POST['Rok_kartice_godina'];
        if(strcmp('Godina:', $Rok_kartice_godina) == 0){
            $errors['Rok_kartice_godina'] = "Godina must be selected";
        } 
    }

    // Ime kartice
    if (empty($_POST['Ime_kartice'])) {
        $errors['Ime_kartice'] = "Ime is empty";
    }else{
        $Ime_kartice = $_POST['Ime_kartice'];
        if(!preg_match('/^[a-zA-Z]+$/', $Ime_kartice)){
            $errors['Ime_kartice'] = "Ime must be letters";
        } 
    }

    // Prezime kartice
    if (empty($_POST['Prezime_kartice'])) {
        $errors['Prezime_kartice'] = "Prezime is empty";
    }else{
        $Prezime_kartice = $_POST['Prezime_kartice'];
        if(!preg_match('/^[a-zA-Z]+$/', $Prezime_kartice)){
            $errors['Prezime_kartice'] = "Prezime must be letters";
        } 
    }

    if (!array_filter($errors)) {

        // GOST

        // // Ubacivanje gosta
        $sql_gost = "INSERT INTO gost (ime,prezime,email,adresa,postanski_broj,grad,drzava,telefon) VALUE ('$Ime','$Prezime','$Email','$Adresa',$Postanski_broj,'$Grad','$Drzava','$Telefon')";
        if(mysqli_query($conn, $sql_gost)){
            echo "Records added successfully.";
        }else{
            echo "ERROR: Could not able to execute $sql_gost. " . mysqli_error($conn);
        }

        // GARANCIJA REZERVACIJE
        $sql_garancija = "INSERT INTO garancija_rezervacije (kreditna_kartica, broj_kartice, cvn, vredi_do_mesec, vredi_do_godina,ime,prezime) VALUES ('$Kreditna_kartica',$Broj_kartice,$CVN,$Rok_kartice_mesec,$Rok_kartice_godina,'$Ime_kartice','$Prezime_kartice')";
        if(!mysqli_query($conn, $sql_garancija)){
            echo "ERROR: Could not able to execute $sql_gost. " . mysqli_error($conn);
        }

        // // REZERVACIJA //

        // Trazenje gost ID za Rezervaciju
        $sql_gostID = "SELECT gostID FROM gost WHERE ime = '$Ime' AND prezime = '$Prezime' AND email = '$Email'";
        $result = mysqli_query($conn,$sql_gostID);
        if(!$result){
            echo 'Tabel is not found' . mysqli_error($conn);
        }
        $gostID = mysqli_fetch_array($result, MYSQLI_NUM);


        // Trazenje garancija_rezervacije ID za Rezervaciju
        $sql_garancijaID = "SELECT garancijaID FROM garancija_rezervacije WHERE cvn='$CVN' AND broj_kartice='$Broj_kartice'";
        $result = mysqli_query($conn,$sql_garancijaID);
        if(!$result){
            echo 'Tabel is not found' . mysqli_error($conn);
        }
        $garancijaID = mysqli_fetch_array($result, MYSQLI_NUM);


        //Ubacivanje rezervacija
        $sql_rezervacija = "INSERT INTO rezervacija(datum_od,datum_do,napravljeno,ukupna_cena,gostID,garancijaID) VALUES('".$_SESSION['dolazak']."','".$_SESSION['odlazak']."','Online',$ukupna_cena,$gostID[0],$garancijaID[0])";
        if(!mysqli_query($conn, $sql_rezervacija)){
            echo "ERROR: Could not able to execute $sql_rezervacija. " . mysqli_error($conn);
        }

        // Trazenje rezervacija ID-a
        $sql_rezervacijaID = "SELECT rezervacijaID FROM rezervacija WHERE gostID = $gostID[0]";
        $result = mysqli_query($conn, $sql_rezervacijaID);
        if(!$result){
            echo 'Tabel is not found' . mysqli_error($conn);
        }
        $rezervacijaID = mysqli_fetch_array($result, MYSQLI_NUM);

        if(in_array('jednokrevetnaBez', $kljucevi) || in_array('jednokrevetnaSa', $kljucevi)){
            $jednokrevetneBez = (in_array('jednokrevetnaBez', $kljucevi)) ? $_SESSION['jednokrevetnaBez']['Sobe'] : 0;
            $jednokrevetnaSa =  (in_array('jednokrevetnaSa', $kljucevi)) ? $_SESSION['jednokrevetnaSa']['Sobe'] : 0;
            $broj_soba = intval($jednokrevetneBez) + intval($jednokrevetnaSa);

            // REZERVISANE SOBE // 

            $sql_rezervacija_sobe = "INSERT INTO rezervacija_sobe (broj_soba,status,tipsobeID,rezervacijaID) VALUES ($broj_soba,'zakazano',1,$rezervacijaID[0] )";
            if(!mysqli_query($conn,$sql_rezervacija_sobe)){
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            // OKUPIRANE SOBE //

            $sql_sobaID = "SELECT sobaID FROM soba WHERE tipsobeID = 1 AND status = 'Slobodno'";
            $result = mysqli_query($conn, $sql_sobaID);
            if(!$result){
                echo 'Tabel is not found' . mysqli_error($conn);
            }

            $sobaID_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
            for($i = 0; $i < $broj_soba; $i++){
                $sobaID = $sobaID_array[$i]['sobaID'];
                $sql_okupirane_sobe = "INSERT INTO okupirane_sobe(prijava_od,prijava_do,sobaID,rezervacijaID) VALUES ('".$_SESSION['dolazak']."','".$_SESSION['odlazak']."',$sobaID,$rezervacijaID[0])";
                if(!mysqli_query($conn,$sql_okupirane_sobe)){
                    echo "ERROR: Could not able to execute $sql_okupirane_sobe. " . mysqli_error($conn);
                }

                // UPDATED soba //
                $sql_update_soba = "UPDATE soba SET status='Zauzeto' WHERE sobaID = $sobaID";
                if(!mysqli_query($conn,$sql_update_soba)){
                    echo "ERROR: Could not able to execute $sql_update_soba. " . mysqli_error($conn);
                }
            }

        }

        if(in_array('dvokrevetnaBez', $kljucevi) || in_array('dvokrevetnaSa', $kljucevi)){
            $dvokrevetnaBez = (in_array('dvokrevetnaBez', $kljucevi)) ? $_SESSION['dvokrevetnaBez']['Sobe'] : 0;
            $dvokrevetnaSa =  (in_array('dvokrevetnaSa', $kljucevi)) ? $_SESSION['dvokrevetnaSa']['Sobe'] : 0;
            $broj_soba = intval($dvokrevetnaBez) + intval($dvokrevetnaSa);

            // REZERVISANE SOBE // 

            $sql_rezervacija_sobe = "INSERT INTO rezervacija_sobe (broj_soba,status,tipsobeID,rezervacijaID) VALUES ($broj_soba,'zakazano',2,$rezervacijaID[0])";
            if(!mysqli_query($conn,$sql_rezervacija_sobe)){
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            // OKUPIRANE SOBE //
 
            $sql_sobaID = "SELECT sobaID FROM soba WHERE tipsobeID = 2 AND status = 'Slobodno'";
            $result = mysqli_query($conn, $sql_sobaID);
            if(!$result){
                echo 'Tabel is not found' . mysqli_error($conn);
            }
            $sobaID_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

            for($i = 0; $i < $broj_soba; $i++){
                $sobaID = $sobaID_array[$i]['sobaID'];
                $sql_okupirane_sobe = "INSERT INTO okupirane_sobe(prijava_od,prijava_do,sobaID,rezervacijaID) VALUES ('".$_SESSION['dolazak']."','".$_SESSION['odlazak']."',$sobaID,$rezervacijaID[0])";
                if(!mysqli_query($conn,$sql_okupirane_sobe)){
                    echo "ERROR: Could not able to execute $sql_okupirane_sobe. " . mysqli_error($conn);
                }

                // UPDATED soba //
                $sql_update_soba = "UPDATE soba SET status='Zauzeto' WHERE sobaID = $sobaID";
                if(!mysqli_query($conn,$sql_update_soba)){
                    echo "ERROR: Could not able to execute $sql_update_soba. " . mysqli_error($conn);
                }
            }

        }

        if(in_array('dvokrevetnaDuplexBez', $kljucevi) || in_array('dvokrevetnaDuplexSa', $kljucevi)){
            $dvokrevetnaDuplexBez = (in_array('dvokrevetnaDuplexBez', $kljucevi)) ? $_SESSION['dvokrevetnaDuplexBez']['Sobe'] : 0;
            $dvokrevetnaDuplexSa =  (in_array('dvokrevetnaDuplexSa', $kljucevi)) ? $_SESSION['dvokrevetnaDuplexSa']['Sobe'] : 0;
            $broj_soba = intval($dvokrevetnaDuplexBez) + intval($dvokrevetnaDuplexSa);

            // REZERVISANE SOBE // 

            $sql_rezervacija_sobe = "INSERT INTO rezervacija_sobe (broj_soba,status,tipsobeID,rezervacijaID) VALUES ($broj_soba,'zakazano',3,$rezervacijaID[0])";
            if(!mysqli_query($conn,$sql_rezervacija_sobe)){
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            // OKUPIRANE SOBE //
        
            $sql_sobaID = "SELECT sobaID FROM soba WHERE tipsobeID = 3 AND status = 'Slobodno'";
            $result = mysqli_query($conn, $sql_sobaID);
            if(!$result){
                echo 'Tabel is not found' . mysqli_error($conn);
            }
            $sobaID_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

            for($i = 0; $i < $broj_soba; $i++){
                $sobaID = $sobaID_array[$i]['sobaID'];
                $sql_okupirane_sobe = "INSERT INTO okupirane_sobe(prijava_od,prijava_do,sobaID,rezervacijaID) VALUES ('".$_SESSION['dolazak']."','".$_SESSION['odlazak']."',$sobaID,$rezervacijaID[0])";
                if(!mysqli_query($conn,$sql_okupirane_sobe)){
                    echo "ERROR: Could not able to execute $sql_okupirane_sobe. " . mysqli_error($conn);
                }

                // UPDATED soba //
                $sql_update_soba = "UPDATE soba SET status='Zauzeto' WHERE sobaID = $sobaID";
                if(!mysqli_query($conn,$sql_update_soba)){
                    echo "ERROR: Could not able to execute $sql_update_soba. " . mysqli_error($conn);
                }
            }

        }

        if(in_array('premiumBez', $kljucevi) || in_array('premiumSa', $kljucevi)){
            $premiumBez = (in_array('premiumBez', $kljucevi)) ? $_SESSION['premiumBez']['Sobe'] : 0;
            $premiumSa =  (in_array('premiumSa', $kljucevi)) ? $_SESSION['premiumSa']['Sobe'] : 0;
            $broj_soba = intval($premiumBez) + intval($premiumSa);

            // REZERVISANE SOBE // 

            $sql_rezervacija_sobe = "INSERT INTO rezervacija_sobe (broj_soba,status,tipsobeID,rezervacijaID) VALUES ($broj_soba,'zakazano',4,$rezervacijaID[0])";
            if(!mysqli_query($conn,$sql_rezervacija_sobe)){
                echo "ERROR: Could not able to execute $sql_rezervacija_sobe. " . mysqli_error($conn);
            }

            // OKUPIRANE SOBE //
        
            $sql_sobaID = "SELECT sobaID FROM soba WHERE tipsobeID = 4 AND status = 'Slobodno'";
            $result = mysqli_query($conn, $sql_sobaID);
            if(!$result){
                echo 'Tabel is not found' . mysqli_error($conn);
            }
            $sobaID_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

            for($i = 0; $i < $broj_soba; $i++){
                $sobaID = $sobaID_array[$i]['sobaID'];
                $sql_okupirane_sobe = "INSERT INTO okupirane_sobe(prijava_od,prijava_do,sobaID,rezervacijaID) VALUES ('".$_SESSION['dolazak']."','".$_SESSION['odlazak']."',$sobaID,$rezervacijaID[0])";
                if(!mysqli_query($conn,$sql_okupirane_sobe)){
                    echo "ERROR: Could not able to execute $sql_okupirane_sobe. " . mysqli_error($conn);
                }

                // UPDATED soba //
                $sql_update_soba = "UPDATE soba SET status='Zauzeto' WHERE sobaID = $sobaID";
                if(!mysqli_query($conn,$sql_update_soba)){
                    echo "ERROR: Could not able to execute $sql_update_soba. " . mysqli_error($conn);
                }
            }

        }


        if(in_array('royalBez', $kljucevi) || in_array('royalSa', $kljucevi)){
            $royalBez = (in_array('royalBez', $kljucevi)) ? $_SESSION['royalBez']['Sobe'] : 0;
            $royalSa =  (in_array('royalSa', $kljucevi)) ? $_SESSION['royalSa']['Sobe'] : 0;
            $broj_soba = intval($royalBez) + intval($royalSa);

            // REZERVISANE SOBE // 

            $sql_rezervacija_sobe = "INSERT INTO rezervacija_sobe (broj_soba,status,tipsobeID,rezervacijaID) VALUES ($broj_soba,'zakazano',5,$rezervacijaID[0])";
            if(!mysqli_query($conn,$sql_rezervacija_sobe)){
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            // OKUPIRANE SOBE //
        
            $sql_sobaID = "SELECT sobaID FROM soba WHERE tipsobeID = 5 AND status = 'Slobodno'";
            $result = mysqli_query($conn, $sql_sobaID);
            if(!$result){
                echo 'Tabel is not found' . mysqli_error($conn);
            }
            $sobaID_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

            for($i = 0; $i < $broj_soba; $i++){
                $sobaID = $sobaID_array[$i]['sobaID'];
                $sql_okupirane_sobe = "INSERT INTO okupirane_sobe(prijava_od,prijava_do,sobaID,rezervacijaID) VALUES ('".$_SESSION['dolazak']."','".$_SESSION['odlazak']."',$sobaID,$rezervacijaID[0])";
                if(!mysqli_query($conn,$sql_okupirane_sobe)){
                    echo "ERROR: Could not able to execute $sql_okupirane_sobe. " . mysqli_error($conn);
                }

                // UPDATED soba //
                $sql_update_soba = "UPDATE soba SET status='Zauzeto' WHERE sobaID = $sobaID";
                if(!mysqli_query($conn,$sql_update_soba)){
                    echo "ERROR: Could not able to execute $sql_update_soba. " . mysqli_error($conn);
                }
            }

        }



        mysqli_close($conn);
    }
}