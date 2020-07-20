<?php
include('template.php');
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


    //Sinon on affiche tous les concerts
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT artiste.nom as artiste, artiste.Id_artiste, date, heure_debut, scene.nom as scene, image, artiste.information as information from concert inner join artiste on concert.Id_artiste = artiste.Id_artiste INNER join scene on concert.Id_scene = scene.Id_scene where date = '2020-08-02'");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;

    //stocke le résultat de la requête
	$data['concert'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);