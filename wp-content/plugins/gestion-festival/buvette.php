<?php
include('template.php');


    //Sinon on affiche toutes les buvettes
    //modifier les champs pour chaque table
	$requete = $pdo->prepare("SELECT * FROM `buvette`");


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
    $success = true;
    //compte le nombre de buvettes et le stocke
    $data['nombre'] = count($resultats);
    //stocke le résultat de la requête
	$data['buvette'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);