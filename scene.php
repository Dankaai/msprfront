<?php
include('template.php');


    //Sinon on affiche toutes les scenes
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `scene`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de scenes et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['scene'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);