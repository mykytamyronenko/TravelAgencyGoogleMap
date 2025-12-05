<?php
session_start();

$bdd = new PDO('mysql:host=localhost; dbname=travel_agency; charset=utf8', 'root','');
// $bdd = new PDO('mysql:host=geotran569.mysql.db; dbname=geotran569; charset=utf8', 'geotran569','Lostark117');

$bdd->beginTransaction();

if(isset($_SESSION['id_user'])) {
    $id_user = $_SESSION["id_user"];
    $name_destination = $_POST["name_destination"];
    $distance = $_POST['distance'];
    $distanceInKm = $_POST["distanceInKm"];
    $durationInMinutes = $_POST["durationInMinutes"];
    $name_airport = $_POST["name_airport"];

    if($distance != 0){
        $fly_duration_hours = $distance / 800;
    }

    $fly_duration_formatted = sprintf("%02d:%02d", floor($fly_duration_hours), ($fly_duration_hours - floor($fly_duration_hours)) * 60);

    $requete = $bdd->prepare("INSERT INTO destination (name_destination, fly_duration, travel_distance, id_user)
                                VALUES (:name_destination, :fly_duration, :distance, :id_user)");

    $requete->bindValue(':name_destination', $name_destination, PDO::PARAM_STR);
    $requete->bindValue(':fly_duration', $fly_duration_formatted, PDO::PARAM_STR);
    $requete->bindValue(':distance', $distance, PDO::PARAM_INT);
    $requete->bindValue(':id_user', $id_user, PDO::PARAM_INT);

    $requete->execute();

    $requete2 = $bdd->prepare("INSERT INTO airport (name_airport, travel_time_car, travel_distance_car, id_user)
                                VALUES (:name_airport, :durationInMinutes, :distanceInKm, :id_user)");

    $requete2->bindValue(':name_airport', $name_airport, PDO::PARAM_STR);
    $requete2->bindValue(':durationInMinutes', $durationInMinutes, PDO::PARAM_STR);
    $requete2->bindValue(':distanceInKm', $distanceInKm, PDO::PARAM_INT);
    $requete2->bindValue(':id_user', $id_user, PDO::PARAM_INT);

    $requete2->execute();


    // Récupération de l'ID de la destination insérée
    $id_destination = $bdd->lastInsertId();

    // Boucle pour insérer cinq valeurs différentes
    for ($i = 0; $i <= 4; $i++) {
        // Récupération de la note d'hôtel pour chaque itération
        $idHotel = $_POST['idHotel'][$i];

        $requete2 = $bdd->prepare("INSERT INTO hotel (placeId_hotel, id_destination)
        VALUES (:idHotel, :id_destination)");

        $requete2->bindValue(':idHotel', $idHotel, PDO::PARAM_STR);
        $requete2->bindValue(':id_destination', $id_destination, PDO::PARAM_INT);

        $requete2->execute();
    }

    $bdd->commit();

    $_SESSION['showDiv'] = "div3";
    header('location: homeV2.php');
    exit();
} else {
    $bdd->rollback();
    $_SESSION['error'] = "IDDNotFound";
    header('location: homeV2.php');
    exit();
}
?>
