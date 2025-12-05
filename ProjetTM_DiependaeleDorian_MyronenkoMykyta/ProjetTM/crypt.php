<?php

$login = $_POST["login"];
$mdp = $_POST["mdp"];

$bdd = new PDO('mysql:host=localhost; dbname=travel_agency; charset=utf8', 'root','');
// $bdd = new PDO('mysql:host=geotran569.mysql.db; dbname=geotran569; charset=utf8', 'geotran569','Lostark117');
$requete = $bdd->prepare("SELECT username, password FROM user");
$requete->execute();

$tableau = array();

while ($donnees = $requete->fetch()) {
    $tableau[] = $donnees;
}

foreach ($tableau as $user) {
    if ($login === $user['username']) {
        if (password_verify($mdp, $user['password'])) { // Comparer le mot de passe saisi avec le mot de passe haché stocké
            echo "Correct password.";
            exit();
        } else {
            echo "Incorrect password.";
            exit();
        }
    }
}

echo "User not found.";
exit();

?>
