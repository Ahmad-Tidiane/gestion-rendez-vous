<?php
include("connexion_db.php");

if(isset($_POST['sendmail'])){
    $id = $_POST['id_users'];
    $date = $_POST['Date_RV'];
    $hd = $_POST['Heure_Deb'];
    $hf = $_POST['Heure_Fin'];
    $dest = $_POST['destinataire'];
    $sujet = $_POST['subject'];
    $corp = $_POST['Objet'];
    $id_pers = $_POST['id_personnes'];
    $headers = "From: isepdd197@gmail.com";
    // insertion dans la base de donnees
    $insert = "INSERT INTO prendrerv(Date_RV,Heure_Deb,Heure_Fin,Objet,destinataire,id_users,id_personnes) VALUES (?,?,?,?,?,?,?)";
    
    $result = $pdo->prepare($insert);
    $result->execute([$date,$hd,$hf,$corp,$dest,$id,$id_pers]);

  if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } else {
    echo "Échec de l'envoi de l'email...";
  }
}
?>


