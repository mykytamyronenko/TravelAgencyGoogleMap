<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "travel_agency");
    // $mysqli = new mysqli("geotran569.mysql.db", "geotran569", "Lostark117", "geotran569");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['psw'];

    $query = "SELECT id_user, username, password, role, last_name, first_name, district, country FROM user WHERE username = ?";

    $statement = $mysqli->prepare($query);

    if ($statement) {
        $statement->bind_param("s", $_POST['username']);
        $statement->execute();

        $statement->bind_result($id_user, $username_db, $password_db, $role, $last_name, $first_name, $district, $country);

        $statement->fetch();

        if ($username_db && $role && $last_name && $first_name) {
            if (password_verify($password, $password_db)) {
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['role'] = $role;
                $_SESSION['username_db'] = $username_db;
                $_SESSION['id_user'] = $id_user;
                $_SESSION['district'] = $district;
                $_SESSION['country'] = $country;

                // Création d'un tableau associatif contenant les données à renvoyer
                $response = array(
                    'success' => true,
                    'message' => 'Correct password',
                    'session_data' => $_SESSION // Inclure les données de session dans la réponse
                );

                // Convertion du tableau en JSON et renvoi des données à l'utilisateur
                echo json_encode($response);
            } else {
                // Créer un tableau associatif des données à renvoyer en cas de mot de passe incorrect
                $response = array(
                    'success' => false,
                    'message' => 'Incorrect password'
                );

                // Convertion du tableau en JSON et renvoi des données à l'utilisateur
                echo json_encode($response);
            }
        } else {
            // Créer un tableau associatif des données à renvoyer en cas d'utilisateur non trouvé
            $response = array(
                'success' => false,
                'message' => 'User not found'
            );

            // Convertion du tableau en JSON et renvoi des données à l'utilisateur
            echo json_encode($response);
        }

        $statement->close();
    } else {
        // Création d'un tableau associatif des données à renvoyer en cas d'erreur de préparation de la requête
        $response = array(
            'success' => false,
            'message' => 'Error preparing query'
        );

        // Convertion du tableau en JSON et renvoi des données à l'utilisateur
        echo json_encode($response);
    }

    $mysqli->close();
}
?>


