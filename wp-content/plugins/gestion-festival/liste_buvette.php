<html>
    <body>
    <table> 
        <thead> 
            <tr> 
                <th>Nom</th>
                <th>Genre de restauration :</th> 
                <th>Type de nourriture : </th>
                <th>Accessible : </th>
                <th>Latitude : </th>
                <th>Longitude :</th>
                <th>Heure d\'ouverture : </th> 
                <th>Heure de fermeture :</th> 
                <th>Informations :</th>
            </tr> 
        </thead> 
</html>
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
$requete = $pdo->prepare("SELECT * FROM `buvette`");
$requete->execute();
while ($data = $requete->fetch()) { 
    ?> 
<html>      
<tr> 
<td><?= $data['nom']; ?></td> 
<td><?= $data['genre_restauration']; ?></td> 
<td><?= $data['type_nourriture']; ?></td> 
<td><?= $data['is_accessible']; ?></td> 
<td><?= $data['latitude']; ?></td> 
<td><?= $data['longitude']; ?></td> 
<td><?= $data['heure_debut']; ?></td> 
<td><?= $data['heure_fin']; ?></td> 
<td><?= $data['information']; ?></td> 
</tr>
<?php } ?> 

</table>
</html>


           
            