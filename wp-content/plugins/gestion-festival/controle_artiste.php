<?php

if(isset($_POST['Envoyer'] )){
$erreur = NULL;
$i = 0;
$temps = time(); 

//------- Début des paramètres nom -----------
 $erreur_nom = NULL;
 if ($_POST['nom'] == NULL)
{ $erreur_nom = "Vous n'avez pas remplie le champs nom";
$i++;
    }
if(strlen($_POST['nom']) > 72)
{ $erreur_nom = "Le champs nom est trop long";
$i++;
}
  if (strlen($_POST['nom']) < 1)
{ $erreur_nom= "Le champs nom est trop court";
$i++;
}
//------- Fin des paramètres nom -----------

//------- Début des paramètres type -----------
 $erreur_type = NULL;
 if ($_POST['type'] == NULL)
{ $erreur_type = "Vous n'avez pas remplie le champs type";
$i++;
    }
if(strlen($_POST['type']) > 72)
{ $erreur_type = "Le champs type est trop long";
$i++;
}
  if (strlen($_POST['type']) < 0)
{ $erreur_type= "Le champs type est trop court";
$i++;
}
//------- Fin des paramètres type -----------

//------- Début des paramètres information -----------
 $erreur_information = NULL;
 if ($_POST['information'] == NULL)
{ $erreur_information = "Vous n'avez pas remplie le champs information";
$i++;
    }
if(strlen($_POST['information']) > 256)
{ $erreur_information = "Le champs information est trop long";
$i++;
}
  if (strlen($_POST['information']) < 0)
{ $erreur_information= "Le champs information est trop court";
$i++;
}
//------- Fin des paramètres information -----------
if($i > 0){
echo $erreur_nom;
echo $erreur_type;
echo $erreur_information;

} else {
    $hote = 'localhost';
    $port = "";
    $nom_bdd = 'msprfront';
    $utilisateur = 'root';
    $mot_de_passe ='';
    
    try {
        //On test la connexion à la base de donnée
        $pdo = new PDO('mysql:host='.$hote.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);
        echo("<script>console.log('connecté');</script>");
    
    }
catch (Exception $e) {  
die('Erreur : ' . $e->getMessage()); 
 } 
$query=$pdo->prepare('INSERT INTO artiste (
nom, type, information
) VALUES (:nom, :type, :information)');
$query->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$query->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
$query->bindValue(':information', $_POST['information'], PDO::PARAM_STR);
$query->execute();
$query->CloseCursor();
}} 