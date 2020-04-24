<?php
/**** Generé par Haoxi ***/
if(isset($_POST['Envoyer'] )){
$erreur = NULL;
$i = 0;
$temps = time(); 

//------- Début des paramètres lieu -----------
 $erreur_lieu = NULL;
if(strlen($_POST['lieu']) > 72)
{ $erreur_lieu = "Le champs lieu est trop long";
$i++;
}
  if (strlen($_POST['lieu']) < 0)
{ $erreur_lieu= "Le champs lieu est trop court";
$i++;
}
//------- Fin des paramètres lieu -----------

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
}/*
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
echo $erreur_lieu;
echo $erreur_date;
echo $erreur_heure_debut;
echo $erreur_heure_fin;
echo $erreur_information;
echo $erreur_nom_artiste;
echo $erreur_latitude;
echo $erreur_longitude;
echo $erreur_is_accessible;


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
 $reponse = $pdo->query('SELECT * FROM artiste where Id_artiste = '.$_POST['Id_artiste'].'');
         
 while ($donnees = $reponse->fetch())
 {
$query=$pdo->prepare('INSERT INTO rencontre (
lieu, date, heure_debut, heure_fin, information, nom_artiste, latitude, longitude, is_accessible, Id_artiste
) VALUES (:lieu, :date, :heure_debut, :heure_fin, :information, '.$donnees['nom'].', :latitude, :longitude, :is_accessible, :Id_artiste');
$query->bindValue(':lieu', $_POST['lieu'], PDO::PARAM_STR);
$query->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
$query->bindValue(':heure_debut', $_POST['heure_debut'], PDO::PARAM_STR);
$query->bindValue(':heure_fin', $_POST['heure_fin'], PDO::PARAM_STR);
$query->bindValue(':information', $_POST['information'], PDO::PARAM_STR);
$query->bindValue(':latitude', $_POST['latitude'], PDO::PARAM_STR);
$query->bindValue(':longitude', $_POST['longitude'], PDO::PARAM_STR);
$query->bindValue(':is_accessible', $_POST['is_accessible'], PDO::PARAM_STR);
$query->bindValue(':Id_artiste', $_POST['Id_artiste'], PDO::PARAM_INT);
$query->execute();
$query->CloseCursor();
 }
}} 