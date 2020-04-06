<?php
include('template.php');


    //Sinon on affiche toutes les participations
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `participe_rencontre`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de participations et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['participe_rencontre'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);