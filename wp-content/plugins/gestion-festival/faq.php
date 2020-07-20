<?php
include('template.php');


    //Sinon on affiche toutes les FAQ
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `faq`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de FAQ et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['faq'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);