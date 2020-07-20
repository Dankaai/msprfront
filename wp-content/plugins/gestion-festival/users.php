<?php
include('template.php');


    //Sinon on affiche tous les users
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `wp_users`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de users et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['wp_users'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);