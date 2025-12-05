<?php
if (isset($_POST['username']) &&
    isset($_POST['psw']) &&
    isset($_POST['confirm_psw']) &&
    $_POST['psw'] == $_POST['confirm_psw'] &&
    isset($_POST['lastName']) &&
    isset($_POST['firstName']) &&
    isset($_POST['district']) &&
    isset($_POST['country']))
{
    $login = $_POST["username"];
    $mdp = $_POST["psw"];

    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];

    $district =  $_POST["district"];
    $country = $_POST["country"];

    try {
        $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);

        $bdd = new PDO('mysql:host=localhost; dbname=travel_agency; charset=utf8', 'root','');
        // $bdd = new PDO('mysql:host=geotran569.mysql.db; dbname=geotran569; charset=utf8', 'geotran569','Lostark117');

        // Vérifier si l'utilisateur existe déjà dans la base de données
        $check_query = $bdd->prepare("SELECT COUNT(*) FROM user WHERE username = :login");
        $check_query->bindParam(':login', $login, PDO::PARAM_STR);
        $check_query->execute();
        $existing_user_count = $check_query->fetchColumn();

        if ($existing_user_count > 0) {
            // L'utilisateur existe déjà, afficher un message d'erreur
            $response = array(
                'error' => true,
                'message' => 'Username already exists'
            );
            echo json_encode($response);
            exit(); // Arrêter l'exécution du script
        } else {
            // L'utilisateur n'existe pas encore, insérer les données dans la base de données
            $requete = $bdd->prepare("INSERT INTO user (username, password, role, last_name, first_name, district, country)
                VALUES (:login, :password, 'user', :last_name, :first_name, :district, :country)");

            $requete->bindValue(':password', $mdp_hache, PDO::PARAM_STR);
            $requete->bindValue(':login', $login, PDO::PARAM_STR);
            $requete->bindValue(':last_name', $lastName, PDO::PARAM_STR);
            $requete->bindValue(':first_name', $firstName, PDO::PARAM_STR);
            $requete->bindValue(':district', $district, PDO::PARAM_STR);
            $requete->bindValue(':country', $country, PDO::PARAM_STR);

            $requete->execute();

            // Exécuter le code contenu dans connection_verification.php
            require_once 'connection_verification.php';
        }
    } catch(PDOException $e) {
        error_log("Erreur PDO : " . $e->getMessage());
        echo "<script>console.error('Erreur PDO : " . $e->getMessage() . "');</script>";
    }
}
?>

