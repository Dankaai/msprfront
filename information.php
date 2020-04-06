<?php
include('template.php');


    //Sinon on affiche toutes les informations
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `information`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre d'informations et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['information'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);