<html>
    <body>
    <table> 
        <thead> 
            <tr> 
                <th>Nom de la scène : </th> 
                <th>Taille :</th>
                <th>Informations :</th> 
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
    $mot_de_passe ='';
    
    try {
        //On test la connexion à la base de donnée
        $pdo = new PDO('mysql:host='.$hote.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);
       echo("<script>console.log('connecté');</script>");
    
    }
catch (Exception $e) {  
die('Erreur : ' . $e->getMessage()); 
 } 
$requete = $pdo->prepare("SELECT * FROM `scene`");
$requete->execute();
while ($data = $requete->fetch()) { 
    ?> 
<html>      
<tr> 
<td><?= $data['nom']; ?></td> 
<td><?= $data['taille']; ?></td>
<td><?= $data['information']; ?></td>  
<td><?= $data['latitude']; ?></td> 
<td><?= $data['longitude']; ?></td> 
<td><?= $data['is_accessible']; ?></td> 
</tr>
<?php } ?> 

</table>
</html>

