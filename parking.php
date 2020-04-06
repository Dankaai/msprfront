<?php
include('template.php');


    //Sinon on affiche tous les parkings
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `parking`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de parkings et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['parking'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);