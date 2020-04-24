<?php
/**** Generé par Haoxi ***/
if(isset($_POST['Envoyer'] )){
$erreur = NULL;
$i = 0;
$temps = time(); 

//------- Début des paramètres date -----------
 $erreur_date = NULL;
if (strlen($_POST['date']) > 72)
{ $erreur_date = "Le champs date est trop long";
$i++;
}
  if (strlen($_POST['date']) < 0)
{ $erreur_date = "Le champs date est trop court";
$i++;
}
/*
 if(!preg_match('#^([0-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/[0-9]{4}$#', $_POST['date']))
{ $erreur_date = "Mauvais format du champ date";
$i++;
    }
    */
//------- Fin des paramètres date -----------

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
if(strlen($_POST['information']) > 72)
{ $erreur_information = "Le champs information est trop long";
$i++;
}
  if (strlen($_POST['information']) < 0)
{ $erreur_information= "Le champs information est trop court";
$i++;
}
//------- Fin des paramètres information -----------

//------- Début des paramètres id_artiste -----------
 $erreur_id_artiste = NULL;
if(strlen($_POST['id_artiste']) > 72)
{ $erreur_id_artiste = "Le champs id_artiste est trop long";
$i++;
}
  if (strlen($_POST['id_artiste']) < 0)
{ $erreur_id_artiste= "Le champs id_artiste est trop court";
$i++;
}
//------- Fin des paramètres id_artiste -----------

//------- Début des paramètres id_scene -----------
 $erreur_id_scene = NULL;
if(strlen($_POST['id_scene']) > 72)
{ $erreur_id_scene = "Le champs id_scene est trop long";
$i++;
}
  if (strlen($_POST['id_scene']) < 0)
{ $erreur_id_scene= "Le champs id_scene est trop court";
$i++;
}
//------- Fin des paramètres id_scene -----------
if($i > 0){
echo $erreur_date;
echo $erreur_heure_debut;
echo $erreur_heure_fin;
echo $erreur_information;
echo $erreur_id_artiste;
echo $erreur_id_scene;

}else {
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
$query=$pdo->prepare('INSERT INTO concert (
date, heure_debut, heure_fin, information, id_artiste, id_scene
) VALUES (:date, :heure_debut, :heure_fin, :information, :id_artiste, :id_scene)');
$query->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
$query->bindValue(':heure_debut', $_POST['heure_debut'], PDO::PARAM_STR);
$query->bindValue(':heure_fin', $_POST['heure_fin'], PDO::PARAM_STR);
$query->bindValue(':information', $_POST['information'], PDO::PARAM_STR);
$query->bindValue(':id_artiste', $_POST['id_artiste'], PDO::PARAM_STR);
$query->bindValue(':id_scene', $_POST['id_scene'], PDO::PARAM_STR);
$query->execute();
$query->CloseCursor();
}} 