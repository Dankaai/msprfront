<?php
include('template.php');


    //Sinon on affiche tous les stands
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `stand`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de stands et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['stand'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);