<html>
    <form method="POST" action="controle_concert">
    <label for="date">Date</label> <input type="date"  name="date" id="date" value=""/><br />
    <label for="heure_debut">Heure de debut</label> <input type="date"  name="heure_debut" id="heure_debut" value=""/><br />
    <label for="heure_fin">Heure de fin</label> <input type="date"  name="heure_fin" id="heure_fin" value=""/><br />
    <label for="information">Information</label> <input type="text"  name="information" id="information" value=""/><br />
    <select name="id_artiste" id="id_artiste">
 
        <?php
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
        $reponse = $pdo->query('SELECT * FROM artiste');
         
        while ($donnees = $reponse->fetch())
        {
        ?>
                   <option value="<?php echo $donnees['Id_artiste']; ?>"> <?php echo $donnees['nom']; ?></option>
        <?php
        }
         
        ?>
        </select>
        <select name="id_scene" id="id_scene">
 
            <?php
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
            $reponse = $pdo->query('SELECT * FROM scene');
             
            while ($donnees = $reponse->fetch())
            {
            ?>
                       <option value="<?php echo $donnees['Id_scene']; ?>"> <?php echo $donnees['nom']; ?></option>
            <?php
            }
             
            ?>
            </select>
    <input type="submit" name="Envoyer" value="Envoyer" /> </form>
    </html>