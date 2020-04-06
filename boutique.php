<?php
include('template.php');


    //Sinon on affiche toutes les boutiques
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `boutique`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de boutiques et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['boutique'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);