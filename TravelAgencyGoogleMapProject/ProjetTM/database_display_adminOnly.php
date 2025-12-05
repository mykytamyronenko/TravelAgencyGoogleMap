<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: homeV2.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin page</title>
</head>
<body style="background-color: #2C3E50">
    <div>
        <h1>ADMIN ONLY</h1>
        <?php
        $bdd = new PDO('mysql:host=localhost; dbname=travel_agency; charset=utf8', 'root','');
        // $bdd = new PDO('mysql:host=geotran569.mysql.db; dbname=geotran569; charset=utf8', 'geotran569','Lostark117');
        $requete = $bdd->prepare("select * from user;");
        $requete2 = $bdd->prepare("select * from destination;");
        $requete3 = $bdd->prepare("select * from airport;");
        $requete4 = $bdd->prepare("select * from hotel;");

        $requete->execute();
        $requete2->execute();
        $requete3->execute();
        $requete4->execute();

        echo "<h5>user</h5>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Role</th><th>Last Name</th><th>First Name</th><th>district</th><th>country</th><th>image</th></tr>";

        while ($donnees = $requete->fetch()) {
            echo "<tr>";
            echo "<td>" . $donnees['id_user'] . "</td>";
            echo "<td>" . $donnees['username'] . "</td>";
            echo "<td>" . $donnees['role'] . "</td>";
            echo "<td>" . $donnees['last_name'] . "</td>";
            echo "<td>" . $donnees['first_name'] . "</td>";
            echo "<td>" . $donnees['district'] . "</td>";
            echo "<td>" . $donnees['country'] . "</td>";
            echo "<td>" . $donnees['image_data'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";

        echo "<h5>destination</h5>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Destination</th><th>Fly Duration</th><th>Travel Distance</th><th>ID User</th></tr>";

        while ($donnees2 = $requete2->fetch()) {
            echo "<tr>";
            echo "<td>" . $donnees2['id_destination'] . "</td>";
            echo "<td>" . $donnees2['name_destination'] . "</td>";
            echo "<td>" . $donnees2['fly_duration'] . "</td>";
            echo "<td>" . $donnees2['travel_distance'] . "</td>";
            echo "<td>" . $donnees2['id_user'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";

        echo "<h5>airport</h5>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Airport</th><th>Drive duration</th><th>travel Distance Car</th><th>ID user</tr>";

        while ($donnees3 = $requete3->fetch()) {
            echo "<tr>";
            echo "<td>" . $donnees3['id_airport'] . "</td>";
            echo "<td>" . $donnees3['name_airport'] . "</td>";
            echo "<td>" . $donnees3['travel_time_car'] . "</td>";
            echo "<td>" . $donnees3['travel_distance_car'] . "</td>";
            echo "<td>" . $donnees3['id_user'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";

        echo "<h5>hotel</h5>";
        echo "<table>";
        echo "<tr><th>ID</th><th>placeId_hotel</th><th>ID destination</th></tr>";

        while ($donnees4 = $requete4->fetch()) {
            echo "<tr>";
            echo "<td>" . $donnees4['id_hotel'] . "</td>";
            echo "<td>" . $donnees4['placeId_hotel'] . "</td>";
            echo "<td>" . $donnees4['id_destination'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";

        $requete->closeCursor();
        $requete2->closeCursor();
        $requete3->closeCursor();
        $requete4->closeCursor();
        ?>
    </div>
    <br>
    <form action="homeV2.php" method="post">
        <input type="submit" value="BACK">
    </form>
</body>
</html>
