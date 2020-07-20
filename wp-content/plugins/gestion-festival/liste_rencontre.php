<html>
    <body>
    <table> 
        <thead> 
            <tr> 
                <th>Lieu :</th>
                <th>Date :</th>
                <th>Heure d\'ouverture : </th> 
                <th>Heure de fermeture :</th>
                <th>Informations :</th>
                <th>Nom de l'artiste :</th>
                <th>Latitude : </th>
                <th>Longitude :</th>
                <th>Accessible : </th>
            </tr> 
        </thead> 
</html>
            <?php


    $hote = 'localhost';
    $port = "";
    $nom_bdd = 'msprfront';
    $utilisateur = 'root';
    $mot_de_passe ='hugo150199';
    
    try {
        //On test la connexion à la base de donnée
        $pdo = new PDO('mysql:host='.$hote.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);
       echo("<script>console.log('connecté');</script>");
    
    }
catch (Exception $e) {  
die('Erreur : ' . $e->getMessage()); 
 } 
$requete = $pdo->prepare("SELECT * FROM `rencontre`");
$requete->execute();
while ($data = $requete->fetch()) { 
    ?> 
<html>      
<tr> 
<td><?= $data['lieu']; ?></td> 
<td><?= $data['date']; ?></td> 
<td><?= $data['heure_debut']; ?></td> 
<td><?= $data['heure_fin']; ?></td>
<td><?= $data['information']; ?></td> 
<td><?= $data['nom_artiste']; ?></td> 
<td><?= $data['latitude']; ?></td> 
<td><?= $data['longitude']; ?></td> 
<td><?= $data['is_accessible']; ?></td> 
</tr>
<?php } ?> 

</table>
</html>
