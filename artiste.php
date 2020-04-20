<?php
include('template.php');


    //Sinon on affiche tous les artistes
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `artiste`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de artistes et le stocke
    $data['nombreok'] = count($resultats);
    //stocke le résultat de la requête
	$data['artiste'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);