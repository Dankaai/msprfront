<html>
    <body>
    <table> 
        <thead> 
            <tr> 
                <th>Accessible : </th>
                <th>Heure d\'ouverture : </th> 
                <th>Heure de fermeture :</th>
                <th>Informations :</th> 
                <th>Latitude : </th>
                <th>Longitude :</th>
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
$requete = $pdo->prepare("SELECT * FROM `parking`");
$requete->execute();
while ($data = $requete->fetch()) { 
    ?> 
<html>      
<tr> 
<td><?= $data['is_accessible']; ?></td> 
<td><?= $data['heure_debut']; ?></td> 
<td><?= $data['heure_fin']; ?></td>
<td><?= $data['information']; ?></td>  
<td><?= $data['latitude']; ?></td> 
<td><?= $data['longitude']; ?></td> 
</tr>
<?php } ?> 

</table>
</html>


           
      