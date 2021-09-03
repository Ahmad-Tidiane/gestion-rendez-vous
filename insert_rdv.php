<?php

    include("connexion_db.php");

    if(isset($_POST['Date_RV'],$_POST['Heure_Deb'],$_POST['Heure_Fin'],$_POST['Objet'],$_POST['destinataire'],$_POST['id_personnes'])){

        $date = $_POST['Date_RV'];
        $hd = $_POST['Heure_Deb'];
        $hf = $_POST['Heure_Fin'];
        $objet = $_POST['Objet'];
        $dest = $_POST['destinataire'];
        $mat = 2;
        $pers = $_POST['id_personnes'];

        $insert = "INSERT INTO prendrerv VALUES (?,?,?,?,?,2,?)";

        $result = $pdo->prepare($insert);
        $result->execute([$date,$hd,$hf,$objet,$dest,$mat,$pers]);

        header('Location:index.php');

    }
?>