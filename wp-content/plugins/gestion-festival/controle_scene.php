<?php
if(isset($_POST['Envoyer'] )){
$erreur = NULL;
$i = 0;
$temps = time(); 

//------- Début des paramètres nom -----------
 $erreur_nom = NULL;
if(strlen($_POST['nom']) > 72)
{ $erreur_nom = "Le champs nom est trop long";
$i++;
}
  if (strlen($_POST['nom']) < 0)
{ $erreur_nom= "Le champs nom est trop court";
$i++;
}
//------- Fin des paramètres nom -----------

//------- Début des paramètres taille -----------
 $erreur_taille = NULL;
if(strlen($_POST['taille']) > 256)
{ $erreur_taille = "Le champs taille est trop long";
$i++;
}
  if (strlen($_POST['taille']) < 0)
{ $erreur_taille= "Le champs taille est trop court";
$i++;
}
//------- Fin des paramètres taille -----------

//------- Début des paramètres information -----------
 $erreur_information = NULL;
if(strlen($_POST['information']) > 256)
{ $erreur_information = "Le champs information est trop long";
$i++;
}
  if (strlen($_POST['information']) < 0)
{ $erreur_information= "Le champs information est trop court";
$i++;
}
//------- Fin des paramètres information -----------

//------- Début des paramètres latitude -----------
 $erreur_latitude = NULL;
if(strlen($_POST['latitude']) > 72)
{ $erreur_latitude = "Le champs latitude est trop long";
$i++;
}
  if (strlen($_POST['latitude']) < 0)
{ $erreur_latitude= "Le champs latitude est trop court";
$i++;
}
//------- Fin des paramètres latitude -----------

//------- Début des paramètres longitude -----------
 $erreur_longitude = NULL;
if(strlen($_POST['longitude']) > 72)
{ $erreur_longitude = "Le champs longitude est trop long";
$i++;
}
  if (strlen($_POST['longitude']) < 0)
{ $erreur_longitude= "Le champs longitude est trop court";
$i++;
}
//------- Fin des paramètres longitude -----------

//------- Début des paramètres is_accessible -----------
 $erreur_is_accessible = NULL;
if(strlen($_POST['is_accessible']) > 72)
{ $erreur_is_accessible = "Le champs is_accessible est trop long";
$i++;
}
  if (strlen($_POST['is_accessible']) < 0)
{ $erreur_is_accessible= "Le champs is_accessible est trop court";
$i++;
}
//------- Fin des paramètres is_accessible -----------
if($i > 0){
echo $erreur_nom;
echo $erreur_taille;
echo $erreur_information;
echo $erreur_latitude;
echo $erreur_longitude;
echo $erreur_is_accessible;

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
$query=$pdo->prepare('INSERT INTO scene (
nom, taille, information, latitude, longitude, is_accessible
) VALUES (:nom, :taille, :information, :latitude, :longitude, :is_accessible)');
$query->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$query->bindValue(':taille', $_POST['taille'], PDO::PARAM_STR);
$query->bindValue(':information', $_POST['information'], PDO::PARAM_STR);
$query->bindValue(':latitude', $_POST['latitude'], PDO::PARAM_STR);
$query->bindValue(':longitude', $_POST['longitude'], PDO::PARAM_STR);
$query->bindValue(':is_accessible', $_POST['is_accessible'], PDO::PARAM_STR);
$query->execute();
$query->CloseCursor();
}} 