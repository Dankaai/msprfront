<form method="POST" action="controle_rencontre">
<label for="lieu">lieu</label> <input type="text"  name="lieu" id="lieu" value=""/><br />
<label for="date">date</label> <input type="date"  name="date" id="date" value=""/><br />
<label for="heure_debut">heure de debut</label> <input type="date"  name="heure_debut" id="heure_debut" value=""/><br />
<label for="heure_fin">heure de fin</label> <input type="date"  name="heure_fin" id="heure_fin" value=""/><br />
<label for="information">information :</label> <input type="text"  name="information" id="information" value=""/><br />
<label for="Id_artiste">Artiste :</label>
<select name="Id_artiste" id="Id_artiste">
 
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
    </br>
<label for="latitude">latitude</label> <input type="text"  name="latitude" id="latitude" value=""/><br />
<label for="longitude">longitude</label> <input type="text"  name="longitude" id="longitude" value=""/><br />
<label>Accessible : </label>
    <label>
        <input type="radio" name="is_accessible" value="1"  />
        Oui
    </label>
    <label>
        <input type="radio" name="is_accessible" value="0"   />
        Non
    </label><br />
<input type="submit" name="Envoyer" value="Envoyer" /> </form>