<?php

if(isset($_POST['Envoyer'] )){
    $erreur = NULL;
    $i = 0;
    $temps = time(); 
    
    //------- Début des paramètres titre -----------
     $erreur_titre = NULL;
    if(strlen($_POST['titre']) > 72)
    { $erreur_titre = "Le champs titre est trop long";
    $i++;
    }
      if (strlen($_POST['titre']) < 0)
    { $erreur_titre= "Le champs titre est trop court";
    $i++;
    }
    //------- Fin des paramètres titre -----------
    
    //------- Début des paramètres texte -----------
     $erreur_texte = NULL;
    if(strlen($_POST['texte']) > 256)
    { $erreur_texte = "Le champs texte est trop long";
    $i++;
    }
      if (strlen($_POST['texte']) < 0)
    { $erreur_texte= "Le champs texte est trop court";
    $i++;
    }
    //------- Fin des paramètres texte -----------
    if($i > 0){
    echo $erreur_titre;
    echo $erreur_texte;
    
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
    $query=$pdo->prepare('INSERT INTO faq (
    titre, texte
    ) VALUES (:titre, :texte)');
    $query->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
    $query->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
    $query->execute();
    $query->CloseCursor();
    }} 