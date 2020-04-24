<?php
if(isset($_POST['Envoyer'] )){
    $erreur = NULL;
    $i = 0;
    $temps = time(); 
    
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
    
    //------- Début des paramètres niveau -----------
     $erreur_niveau = NULL;
    if (strlen($_POST['niveau']) > 72)
    { $erreur_niveau = "Le champs niveau est trop long";
    $i++;
    }
      if (strlen($_POST['niveau']) < 0)
    { $erreur_niveau = "Le champs niveau est trop court";
    $i++;
    }
     if(!is_numeric($_POST['niveau']))
    { $erreur_niveau = "Mauvais format du champ niveau";
    $i++;
        }
    //------- Fin des paramètres niveau -----------
    
    //------- Début des paramètres type -----------
     $erreur_type = NULL;
    if(strlen($_POST['type']) > 72)
    { $erreur_type = "Le champs type est trop long";
    $i++;
    }
      if (strlen($_POST['type']) < 0)
    { $erreur_type= "Le champs type est trop court";
    $i++;
    }
    //------- Fin des paramètres type -----------
    if($i > 0){
    echo $erreur_texte;
    echo $erreur_niveau;
    echo $erreur_type;
    
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
    $query=$pdo->prepare('INSERT INTO information (
    texte, niveau, date, type
    ) VALUES (:texte, :niveau, NOW(), :type)');
    $query->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
    $query->bindValue(':niveau', $_POST['niveau'], PDO::PARAM_INT);

    $query->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
    $query->execute();
    $query->CloseCursor();
    }} 