<?php

// ⁡⁢⁢⁢// 𝗖𝗼𝗻𝗻𝗲𝘅𝗶𝗼𝗻 𝗹𝗶𝗴𝗻𝗲 𝟱 / 𝟭𝟰⁡

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







// ⁡⁢⁢⁢𝗦𝘂𝗽𝗽𝗿𝗶𝗺𝗲𝗿 𝘂𝗻 𝘂𝘀𝗲𝗿 𝘃𝗶𝗮 𝘂𝗻 𝗽𝗿𝗲𝗽𝗮𝗿𝗲 / 𝗯𝗶𝗻𝗱𝗣𝗮𝗿𝗮𝗺 𝗲𝘁 𝘂𝗻 𝗲𝘅𝗲𝗰𝘂𝘁𝗲 
// ⁡⁢⁢⁢𝗟𝗲 𝗽𝗿𝗲𝗽𝗮𝗿𝗲 𝘀𝗲𝗿𝘁 à 𝗽𝗿é𝗽𝗮𝗿𝗲𝗿 𝗻𝗼𝘁𝗿𝗲 𝗿𝗲𝗾𝘂ê𝘁𝗲 / 𝗹𝗲 𝗯𝗶𝗻𝗱𝗣𝗮𝗿𝗮𝗺 𝘃𝗶𝗲𝗻𝘁 𝗮𝘀𝘀𝗶𝗴𝗻𝗲𝗿 𝗱𝗲𝘀 𝘃𝗮𝗹𝗲𝘂𝗿 𝗺𝗼𝗱𝗶𝗳𝗶𝗮𝗯𝗹𝗲 𝗮𝘃𝗲𝗰 ":" ⁡

function deleteUser($db, $id)
{
     $codeSQL = $db->prepare('DELETE FROM `MyUser` WHERE `id`=:id');
     $codeSQL->bindParam(':id', $id);
     $codeSQL->execute();
}

// ⁡⁢⁢⁢𝘂𝗻 𝗶𝘀𝘀𝗲𝘁 𝗽𝗼𝘂𝗿 𝘃é𝗿𝗶𝗳𝗶𝗲𝗿 𝗮𝘃𝗲𝗰 𝗰𝗼𝗺𝗺𝗲 𝗽𝗼𝘀𝘁 "𝗱𝗲𝗹𝗲𝘁𝗲" 𝗿é𝗳𝗲𝗿𝗲𝗻𝗰𝗲 à 𝗺𝗼𝗻 𝗯𝗼𝘂𝘁𝗼𝗻 𝗽𝗹𝘂𝘀 𝗯𝗮𝘀⁡

if (isset($_POST['delete'])) {

     deleteUser($db, $_POST['delete']);
}


// ⁡⁢⁢⁢𝗦𝗶𝗺𝗶𝗹𝗮𝗶𝗿𝗲 𝗶𝗰𝗶 𝗽𝗼𝘂𝗿 𝗮𝗷𝗼𝘂𝘁𝗲𝗿 𝘂𝗻 𝘂𝘀𝗲𝗿𝘀 , 𝗼𝗻 𝗿é𝗮𝘁𝗿𝗶𝗯𝘂𝘁 𝘀𝗶𝗺𝗽𝗹𝗲𝗺𝗲𝗻𝘁 𝗽𝗼𝘂𝗿 𝗹𝗲 𝗻𝗼𝗺 , 𝗽𝗿𝗲𝗻𝗼𝗺 𝗲𝘁𝗰 𝗲𝗻 𝗽𝗿𝗲𝗻𝗮𝗻𝘁 𝘁𝗼𝘂𝗷𝗼𝘂𝗿𝘀 𝗹𝗮 𝗗𝗕 𝗲𝗻 𝗽𝗮𝗿𝗮𝗺⁡

function addUser($db, $Nom, $Prénom, $Mail, $Password)
{

     $codeSQL = $db->prepare('INSERT INTO `MyUser` (`Nom` , `Prénom` , `Mail` , `Password`) VALUES (:Nom , :Prenom , :Mail , :pwd)');
     $codeSQL->bindParam(':Nom', $Nom);
     $codeSQL->bindParam(':Prenom', $Prénom);
     $codeSQL->bindParam(':Mail', $Mail);
     $codeSQL->bindParam(':pwd', $Password);
     $codeSQL->execute();
}

// ⁡⁢⁢⁢𝗶𝘀𝘀𝗲𝘁 𝗮𝘂𝘀𝘀𝗶 𝗼𝗻 𝗿é𝗮𝘁𝗿𝗶𝗯𝘂𝘁 𝘀𝗶𝗺𝗽𝗹𝗲𝗺𝗲𝗻𝘁 𝗻𝗼𝗺 𝘃𝗮𝗿𝗶𝗮𝗯𝗹𝗲 à 𝗣𝗢𝗦𝗧 
// 𝘀𝘂𝗶𝘃𝗶𝗲 𝗱𝘂 𝗻𝗼𝗺 𝗹𝗲 𝗽𝗮𝗿𝗮𝗺é𝘁𝗿𝗲 𝗱𝗲 𝗽𝗼𝘀𝘁 𝗱𝗼𝗶𝘁 ê𝘁𝗿𝗲 𝗹𝗲 𝗻𝗮𝗺𝗲 𝗱𝗲 𝗺𝗲𝘀 𝗶𝗻𝗽𝘂𝘁 𝗱𝘂 𝗳𝗼𝗿𝗺𝘂𝗹𝗮𝗶𝗿𝗲 𝗹𝗶é𝗲⁡


if (isset($_POST['modif'])) {
     $Nom = $_POST['nom'];
     $Prénom = $_POST['prenom'];
     $Mail =  $_POST['mail'];
     $Password = $_POST['password'];
     addUser($db, $Nom, $Prénom, $Mail, $Password);
}

//⁡⁢⁢⁢ 𝗢𝗻 𝗿é𝗰𝘂𝗽𝗲𝗿𝗲 𝗲𝘁 𝗺𝗲𝘁 𝗲𝗻 𝗳𝗼𝗿𝗺 "à 𝗹𝗮 𝗳𝗶𝗻 !".⁡

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

     <!-- 𝗢𝗻 𝗰𝗿é𝗲 𝘂𝗻 𝗳𝗼𝗿𝗺 𝗽𝗼𝘀𝘁 𝗲𝘁 𝘂𝗻𝗲 𝘁𝗮𝗯𝗹𝗲 𝗽𝗼𝘂𝗿 𝗹'𝗮𝗳𝗳𝗶𝗰𝗵𝗮𝗴𝗲 𝗱𝘂 𝗖𝗥𝗨𝗗 -->

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

                    // ⁡⁢⁢⁢𝗼𝗻 𝗯𝗼𝘂𝗰𝗹𝗲 𝘀𝘂𝗿 𝗻𝗼𝘀 𝘂𝘀𝗲𝗿𝘀 𝗲𝘁 𝗼𝗻 𝗿é𝗰𝘂𝗽𝗲𝗿𝗲 𝗹𝗲 𝗻𝗼𝗺 𝗱𝗲 𝗰𝗵𝗮𝗾𝘂𝗲 𝘂𝘀𝗲𝗿 𝗲𝘁𝗰
                    // ⁡
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

     <!-- ⁡⁢⁢⁢𝗗𝗲𝘂𝘅𝗶𝗲𝗺𝗲 𝗳𝗼𝗿𝗺 𝗽𝗼𝘂𝗿 𝗹𝗮 𝗰𝗿é𝗮𝘁𝗶𝗼𝗻 𝗱'𝘂𝗻 𝘂𝘀𝗲𝗿⁡ -->

     <form action="" method="post">
          <input name="nom" placeholder="Votre nom" type="text">
          <input name="prenom" placeholder="Votre prénom" type="text">
          <input name="mail" placeholder="Votre mail" type="text">
          <input name="password" placeholder="Votre mot de passe" type="text">
          <button name="modif" type="submit">Create user</button>
     </form>
</body>

</html>