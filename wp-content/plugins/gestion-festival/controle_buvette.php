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

//------- Début des paramètres genre_restauration -----------
 $erreur_genre_restauration = NULL;
if(strlen($_POST['genre_restauration']) > 72)
{ $erreur_genre_restauration = "Le champs genre_restauration est trop long";
$i++;
}
  if (strlen($_POST['genre_restauration']) < 0)
{ $erreur_genre_restauration= "Le champs genre_restauration est trop court";
$i++;
}
//------- Fin des paramètres genre_restauration -----------

//------- Début des paramètres type_nourriture -----------
 $erreur_type_nourriture = NULL;
if(strlen($_POST['type_nourriture']) > 72)
{ $erreur_type_nourriture = "Le champs type_nourriture est trop long";
$i++;
}
  if (strlen($_POST['type_nourriture']) < 0)
{ $erreur_type_nourriture= "Le champs type_nourriture est trop court";
$i++;
}
//------- Fin des paramètres type_nourriture -----------

//------- Début des paramètres is_accessible -----------
 $erreur_is_accessible = NULL;
if(strlen($_POST['is_accessible']) > 1)
{ $erreur_is_accessible = "Le champs is_accessible est trop long";
$i++;
}
  if (strlen($_POST['is_accessible']) < 0)
{ $erreur_is_accessible= "Le champs is_accessible est trop court";
$i++;
}
//------- Fin des paramètres is_accessible -----------

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

//------- Début des paramètres heure_debut -----------
 $erreur_heure_debut = NULL;
if (strlen($_POST['heure_debut']) > 72)
{ $erreur_heure_debut = "Le champs heure_debut est trop long";
$i++;
}
  if (strlen($_POST['heure_debut']) < 0)
{ $erreur_heure_debut = "Le champs heure_debut est trop court";
$i++;
}
/*
 if(!preg_match('#^([0-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/[0-9]{4}$#', $_POST['heure_debut']))
{ $erreur_heure_debut = "Mauvais format du champ heure_debut";
$i++;
    }
    */
//------- Fin des paramètres heure_debut -----------

//------- Début des paramètres heure_fin -----------
 $erreur_heure_fin = NULL;
if (strlen($_POST['heure_fin']) > 72)
{ $erreur_heure_fin = "Le champs heure_fin est trop long";
$i++;
}
  if (strlen($_POST['heure_fin']) < 0)
{ $erreur_heure_fin = "Le champs heure_fin est trop court";
$i++;
}
/*
 if(!preg_match('#^([0-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/[0-9]{4}$#', $_POST['heure_fin']))
{ $erreur_heure_fin = "Mauvais format du champ heure_fin";
$i++;
    }
    */
//------- Fin des paramètres heure_fin -----------

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
if($i > 0){
echo $erreur_nom;
echo $erreur_genre_restauration;
echo $erreur_type_nourriture;
echo $erreur_is_accessible;
echo $erreur_latitude;
echo $erreur_longitude;
echo $erreur_heure_debut;
echo $erreur_heure_fin;
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
$query=$pdo->prepare('INSERT INTO buvette (
nom, genre_restauration, type_nourriture, is_accessible, latitude, longitude, heure_debut, heure_fin, information
) VALUES (:nom, :genre_restauration, :type_nourriture, :is_accessible, :latitude, :longitude, :heure_debut, :heure_fin, :information)');
$query->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$query->bindValue(':genre_restauration', $_POST['genre_restauration'], PDO::PARAM_STR);
$query->bindValue(':type_nourriture', $_POST['type_nourriture'], PDO::PARAM_STR);
$query->bindValue(':is_accessible', $_POST['is_accessible'], PDO::PARAM_STR);
$query->bindValue(':latitude', $_POST['latitude'], PDO::PARAM_STR);
$query->bindValue(':longitude', $_POST['longitude'], PDO::PARAM_STR);
$query->bindValue(':heure_debut', $_POST['heure_debut'], PDO::PARAM_STR);
$query->bindValue(':heure_fin', $_POST['heure_fin'], PDO::PARAM_STR);
$query->bindValue(':information', $_POST['information'], PDO::PARAM_STR);
$query->execute();
$query->CloseCursor();
}} 