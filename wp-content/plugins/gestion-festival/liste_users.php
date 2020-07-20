<html>
    <body>
    <table> 
        <thead> 
            <tr> 
                <th>Pseudo : </th>
                <th>Email : </th> 
                <th>display name :</th>
                <th>Numero de téléphone :</th> 
                <th>Prénom : </th>
                <th>Nom de famille :</th>
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
$requete = $pdo->prepare("SELECT * FROM `wp_users`");
$requete->execute();
while ($data = $requete->fetch()) { 
    ?> 
<html>      
<tr> 
<td><?= $data['user_nicename']; ?></td> 
<td><?= $data['user_email']; ?></td> 
<td><?= $data['display_name']; ?></td>
<td><?= $data['user_tel']; ?></td>  
<td><?= $data['user_firstname']; ?></td> 
<td><?= $data['user_lastname']; ?></td> 
</tr>
<?php } ?> 

</table>
</html>

