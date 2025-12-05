<?php
// Connexion à la base de données MySQL
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

$id_user = $_SESSION["id_user"];

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Chemin relatif vers le dossier images par rapport à l'emplacement actuel du script PHP
$imageDir = dirname(__FILE__) . '/images/';

// Vérifie si le fichier a été correctement envoyé
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadFile = $imageDir . basename($_FILES['image']['name']);

    // Déplacer le fichier téléchargé vers le dossier d'images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // Chemin de l'image pour stockage en base de données
        $imagePath = 'images/' . $_FILES['image']['name'];

        // Requête SQL pour insérer le chemin de l'image dans la base de données
        $sql = "UPDATE user SET image_data = '$imagePath' WHERE id_user = $id_user";
            
        if ($conn->query($sql) === TRUE) {
            echo 'Image uploaded successfully.';
        } else {
            echo 'Error uploading image.';
        }
    } else {
        echo 'Error uploading image.';
    }
} else {
    echo 'No image uploaded or an error occurred.';
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
