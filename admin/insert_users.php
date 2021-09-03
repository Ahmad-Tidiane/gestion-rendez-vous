<?php
require('../config.php');

if (isset($_REQUEST['prenom'],$_REQUEST['nom'], $_REQUEST['Email'],$_REQUEST['passwrd'],$_REQUEST['telephone'], $_REQUEST['type'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom); 
    $nom = stripslashes($_REQUEST['nom']);
	$nom = mysqli_real_escape_string($conn, $nom);
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['Email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['passwrd']);
	$password = mysqli_real_escape_string($conn, $password);
    // récupérer le numero de telephone et supprimer les antislashes ajoutés par le formulaire
	$telephone = stripslashes($_REQUEST['telephone']);
	$telephone = mysqli_real_escape_string($conn, $telephone);
	// récupérer le type (user | admin)
	$type = stripslashes($_REQUEST['type']);
	$type = mysqli_real_escape_string($conn, $type);
	
    $query = "INSERT into `users` (prenom,nom, Email, passwrd,telephone,type)
				  VALUES ('$prenom','$nom', '$email', '".hash('sha256', $password)."', '$telephone', '$type')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
             header('Location:home.php');
             exit();
    }else{
        echo "erreur de saisie";
    }
}
