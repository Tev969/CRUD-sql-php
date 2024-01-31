<?php
$user = 'root';
$pass = 'root';
try {
     $db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=CRUD', $user, $pass);
     $db->exec('SET NAMES utf8');
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo 'connexion réussie';
} catch (PDOException $e) {
     echo 'Erreur : ' . $e->getMessage();
}


// Executation de la requête




// Supprimer 
function deleteUser($db, $id)
{
     $codeSQL = $db->prepare('DELETE FROM `MyUser` WHERE `id`=:id');
     $codeSQL->bindParam(':id', $id);
     $codeSQL->execute();
}

if (isset($_POST['delete'])) {

     deleteUser($db, $_POST['delete']);
     
}


function addUser($db, $Nom, $Prénom, $Mail, $Password) {

     $codeSQL = $db->prepare('INSERT INTO `MyUser` (`Nom` , `Prénom` , `Mail` , `Password`) VALUES (:Nom , :Prenom , :Mail , :pwd)');
     $codeSQL->bindParam(':Nom', $Nom);
     $codeSQL->bindParam(':Prenom', $Prénom);
     $codeSQL->bindParam(':Mail', $Mail);
     $codeSQL->bindParam(':pwd', $Password);
     $codeSQL->execute();

}



if (isset($_POST['modif'])) {
     $Nom = $_POST['nom'];
     $Prénom = $_POST['prenom'];
     $Mail =  $_POST['mail'];
     $Password = $_POST['password'];
     addUser($db, $Nom, $Prénom, $Mail, $Password);
}



$codeSQL = $db->prepare('SELECT * FROM MyUser');
$codeSQL->execute();
$users = $codeSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./assets/style.css">
     <title>CRUD</title>
</head>

<body>
     <form action="" method="post">
          <table>
               <thead>
                    <tr>
                         <th>Nom</th>
                         <th>Prénom</th>
                         <th>Mail</th>
                         <th>Password</th>
                         <th>Delete</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    foreach ($users as $user) : ?>
                         <tr>
                              <td> <?php echo $user['Nom'] ?> </td>
                              <td><?php echo $user['Prénom'] ?> </td>
                              <td> <?php echo $user['Mail'] ?></td>
                              <td> <?php echo $user['Password'] ?></td>
                              <td> <button name="delete" type="submit" value="<?php echo $user['id'] ?>">Delete</button></td>
                         </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>
     </form>
     <form action="" method="post">
          <input name="nom" placeholder="Votre nom" type="text">
          <input name="prenom" placeholder="Votre prénom" type="text">
          <input name="mail" placeholder="Votre mail" type="text">
          <input name="password" placeholder="Votre mot de passe" type="text">
          <button name="modif" type="submit">Create user</button>
     </form>
</body>

</html>