<?php
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 2");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include('template.php');


    //Sinon on affiche tous les artistes
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `artiste`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de artistes et le stocke 
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['artiste'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);