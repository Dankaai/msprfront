<html>
    <body>
    <table> 
        <thead> 
            <tr> 
                <th>Texte :</th>
                <th>Date :</th>
                <th>Niveau :</th>
                <th>Type :</th>
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
$requete = $pdo->prepare("SELECT * FROM `information`");
$requete->execute();
while ($data = $requete->fetch()) { 
    ?> 
<html>      
<tr> 
<td><?= $data['texte']; ?></td> 
<td><?= $data['date']; ?></td> 
<td><?= $data['niveau']; ?></td>
<td><?= $data['type']; ?></td>
</tr>
<?php } ?> 

</table>
</html>
