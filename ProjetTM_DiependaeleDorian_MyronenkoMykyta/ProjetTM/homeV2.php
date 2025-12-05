<html>
<head>
    <?php
      session_start();
      if(isset($_SESSION['error']) && $_SESSION['error'] == "IDNotFound") {
        echo "<script>alert('An error occurred. Please try again later.');</script>";
        unset($_SESSION['error']);
      }
    ?>

    <meta charset="utf-8">
    <title>GeoTravelFinder</title>

    <!-- logo il faut encore le détourer car fake png -->
    <link rel="icon" href="plane.png">

    <script src="ajaxSite/jquery-3.6.3.js"></script>

    <script type="text/javascript" src="script.js"></script>

    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css"/>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2e1b0496cc.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body {
            background-color: white;
            color: black;
            font-size: 25px;
        }

        .dark-mode {
            background-color: #2C3E50;
            color: white;
            offcanvas-bg-color: #2C3E50;
        }

        .dark-mode-navbar {
            background-color: #273746;
        }

        .navbarGrey {
          background-color:#f5f5f5 ;
        }

        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 1s ease-in forwards;
        }

        @keyframes fadeInAnimation {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        #map {
            height: 550px;
            margin: auto;
        }

        /* Média query pour les écrans de taille supérieure à 768px (PC) */
        @media (min-width: 768px) {
          #map {
            width: 700px;
          }
        }
        
        /* Média query pour les écrans de taille inférieure à 768px (mobile) */
        @media (max-width: 767px) {
          #map {
            width: auto;
            max-width: 100%;
          }
        }

        .checkbox {
            opacity: 0;
            position: absolute;
        }

        .checkbox-label {
            background-color: #111;
            width: 50px;
            height: 26px;
            border-radius: 50px;
            position: relative;
            padding: 5px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .fa-moon {
            color: #f1c40f;
        }

        .fa-sun {
            color: #f39c12;
        }

        .ball {
            background-color: #fff;
            width: 22px;
            height: 22px;
            position: absolute;
            left: 2px;
            top: 2px;
            border-radius: 50%;
            transition: transform 0.2s linear;
        }

        .checkbox:checked + .checkbox-label .ball {
            transform: translateX(24px);
        }

        .menu-content {
          display: none;
          position: absolute;
          border: 1px solid #ccc;
          border-radius: 8px; /* Augmentation du rayon de bordure pour un aspect plus doux */
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Augmentation de l'ombre pour un effet de profondeur */
          padding: 12px 16px; /* Augmentation du rembourrage pour une meilleure lisibilité */
          min-width: 160px; /* Ajustement de la largeur minimale pour un meilleur agencement */
          z-index: 1;
          right: 0;
        }

        .menu-contentWhite {
          background-color: #FFFFFF;
        }

        .menu-content.show {
          display: block;
        }

        .menu-content.left {
          left: 0;
          right: auto;
        }
        .custom-btn {
          width: 50px;
          height: 50px; 
          border-radius: 50%;
          background-size: cover; 
          background-repeat: no-repeat;
          background-position: center;
          border: none;
          cursor: pointer; 
        }
        .defaultImageProfil {
          width: 50px;
          height: 50px;
          background-image: url('basePic.png');
        }
        .custom-btn2 {
          font-size: 20px; /* Taille de la police */
          color: #000000; /* Couleur du texte */
          font-weight: bold;
          background-color: #e0e0e0; /* Couleur de fond */
          border: none; /* Supprimer la bordure */
          border-radius: 4px; /* Ajouter des coins arrondis */
          padding: 8px 16px; /* Ajouter du rembourrage */
        }

        .custom-btn:hover {
          background-color: #555555;
        }

        .nav-link:focus{
          background-color: #e0e0e0;
        }

        /* joli tableau */
        table {
          width: 75%;
          margin: 0 auto;
          gap: 20px;
          border-radius: 5px 5px 0 0;
          overflow: hidden;
          box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
          border: 1px solid;
        }

        th {
          background-color: #007bff;
          color: white;
          text-align: left;
          padding-left: 1%;
          font-weight: bold;
        }

        table,
        th,
        td {
          border-collapse: collapse;
        }

        table tbody tr {
          border-bottom: 1px solid rgb(236, 240, 241);
        }

        table tbody tr:last-of-type {
          border-bottom: rgb(26, 188, 156);
        }

        th,
        td {
          padding: 12px 15px;
          border-bottom: 1px solid #ccc;
        }

        .tmpwhiteTd {
          color: black;
        }

        #imagePreview {
          width: 40px;
          height: 40px;
          overflow: hidden;
          border-radius: 50%;
          position: relative;
        }
        
        #imagePreview img {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          max-width: 100%;
          height: auto;
        }



      .div-background {
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
      }

      .div-background-dark {
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #666;
        border-radius: 5px;
        background-color: #273746;
      }

      .div-background-white {
        background-color: #f5f5f5;
      }

        h2 {
          text-align: center;
        }

        hr {
          margin-top: 20px;
          margin-bottom: 20px;
        }

        .form-group {
          margin-bottom: 20px;
        }

        label {
          font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        .password-input {
          position: relative;
        }

        .toggle-password {
          position: absolute;
          top: 50%;
          right: 10px;
          transform: translateY(-50%);
          cursor: pointer;
          color: #000;
        }

        .login-button {
          width: 100%;
          padding: 10px;
          border: none;
          border-radius: 5px;
          background-color: #007bff;
          color: #fff;
          font-size: 16px;
          cursor: pointer;
        }

        .login-button:hover {
          background-color: #0056b3;
        }


        .step-container {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          text-align: center;
          margin-bottom: 20px;
          padding-bottom: 20px;
        }


        @media screen and (min-width: 1480px) {
          .step-container {
            display: inline-block;
            width: 25%;
            text-align: left;
            margin-right: 20px;
            margin-bottom: 0;
          }
        }

        .leftMenuLine {
          height: 105%;
        }

        .leftMenu {
          position: fixed;
          left: 0;
          height: 100%;
          background-color: #F5F5F5;
        }

        .leftMenu-dark {
          position: fixed;
          left: 0;
          height: 100%;
          background-color: #273746;
        }

        .leftMenu-white {
          background-color: #F5F5F5;
        }

        .navbar-mobile {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        @media (max-width: 1530px) and (min-width: 990px) {
          .main-content {
            position: absolute;
            right: 0;
            width: 74%;
          }
        }

        #imageUpload {
            display: none;
        }
    </style>
</head>

<body style="padding-top: 70px;">

<nav class="navbar navbar-expand-lg navbar-light navbarGrey navbar-mobile">
  <div class="container-fluid">
    <div>
      <div class="d-none d-lg-block"><h5>GeoTravelFinder</h5></div>
      <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-lg-none mb-3"></div>
      <input type="checkbox" class="checkbox" id="checkbox">
      <label for="checkbox" class="checkbox-label">
        <i class="fas fa-moon fa-2xs"></i>
        <i class="fas fa-sun fa-2xs"></i>
        <span class="ball"></span>
      </label>
    </div>
    <div class="d-flex justify-content-between align-items-center">
      <div id="imagePreview"></div>
    <div>
    <div style="margin-left: 10px;">
      <?php
        if (isset($_SESSION['username_db'])) {
          echo '<button id="profilePic" onclick="toggleMenu()" class="btn custom-btn defaultImageProfil" type="button"></button>';
          echo '<div id="menu-content" class="menu-content menu-contentWhite">';
          echo '<button class="btn custom-btn2" type="button" style="display: block; margin: 0 auto;" onclick="showDiv(\'accountDiv\')">My Account</button>';
          echo '<hr>';
          echo '<a>' . $_SESSION['first_name'] . '</a>';
          echo '<br>';
          echo '<a>' . $_SESSION['last_name'] . '</a>';
          echo '</div>';
        }
      ?>
    </div>
  </div>
</nav>


<div class="container-fluid">
  <div class="row leftMenuLine">
    <!-- Left menu pour la version PC -->
    <div class="col-lg-2">
    <div class="leftMenu leftMenu-white"> 
      <div class="left-menu d-none d-lg-block">
        <div class="offcanvas-body">
          <div class="row"><hr>
            <div class="collapse navbar-collapse show" id="navbarSupportedContent">
              <ul class="navbar-nav mt-3 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#" onclick="showDiv('div1')" style="background-color: #e0e0e0;">Home</a>
                </li>
                <li class="nav-item">
                  <?php
                  if (isset($_SESSION['username_db'])) {
                    echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div3\')">Find a Travel</a>';
                  } else {
                    echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Find a Travel</a>';
                  }
                  ?>
                </li>
                <li class="nav-item">
                  <?php
                  if (isset($_SESSION['username_db'])) {
                    echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div5\')">Consult old travels</a>';
                  } else {
                    echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Consult old travels</a>';
                  }
                  ?>
                </li>
                <li class="nav-item">
                  <?php
                  if (isset($_SESSION['username_db'])) {
                    echo '<a class="nav-link active" aria-current="page" href="logout.php" onclick="return confirm(\'Are you sure you want to logout?\')">Login/Logout</a>';
                  } else {
                    echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div2\')">Login/Logout</a>';
                  }
                  ?>
                </li>
                <li class="nav-item">
                  <?php
                    if (isset($_SESSION['username_db'])) {
                      echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Register</a>';
                    } else {
                      echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div4\')">Register</a>';
                    }
                  ?>
                </li>
                <?php
                if (isset($_SESSION['username_db']) && $_SESSION['role'] == 'admin') {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link active" href="database_display_adminOnly.php">Consult databases</a>';
                  echo '</li>';
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="offcanvas offcanvas-start d-lg-none leftMenu leftMenu-white" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
      <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasLabel">GeoTravelFinder</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div><hr>
      <div class="offcanvas-body">
        <div class="row">
          <div class="collapse navbar-collapse show" id="navbarSupportedContent">
            <ul class="navbar-nav mt-3 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" onclick="showDiv('div1')" style="background-color: #e0e0e0;">Home</a>
              </li>
              <li class="nav-item">
                <?php
                if (isset($_SESSION['username_db'])) {
                  echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div3\')">Find a Travel</a>';
                } else {
                  echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Find a Travel</a>';
                }
                ?>
              </li>
              <li class="nav-item">
                <?php
                if (isset($_SESSION['username_db'])) {
                  echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div5\')">Consult old travels</a>';
                } else {
                  echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Consult old travels</a>';
                }
                ?>
              </li>
              <li class="nav-item">
                <?php
                if (isset($_SESSION['username_db'])) {
                  echo '<a class="nav-link active" aria-current="page" href="logout.php" onclick="return confirm(\'Are you sure you want to logout?\')">Login/Logout</a>';
                } else {
                  echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div2\')">Login/Logout</a>';
                }
                ?>
              </li>
              <li class="nav-item">
                <?php
                  if (isset($_SESSION['username_db'])) {
                    echo '<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Register</a>';
                  } else {
                    echo '<a class="nav-link active" aria-current="page" href="#" onclick="showDiv(\'div4\')">Register</a>';
                  }
                ?>
              </li>
              <?php
              if (isset($_SESSION['username_db']) && $_SESSION['role'] == 'admin') {
                echo '<li class="nav-item">';
                echo '<a class="nav-link active" href="database_display_adminOnly">Consult databases</a>';
                echo '</li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-10 main-content">
      <div id="div1" class="content-div">
        <br>
        <h1 style="text-align: center;">welcome to GeoTravelFinder !</h1>
        <h4 style="text-align: center; font-weight: normal;">
        GeoTravelFinder is your go-to travel agency to find the nearest airport,
        planning your journey, and exploring hotel options at your destination.
        Your next getaway starts here!
        </h4>
        <hr>
        <div style="text-align: center;">
          <div class="step-container">
            <p>1. Find the nearest airport.</p>
            <img id="testos"src="step1.png" alt="Step 1">
          </div>
          <div class="step-container">
            <p>2. Choose your destination.</p>
            <img src="step2.png" alt="Step 2">
          </div>
          <div class="step-container">
            <p>3. Explore hotel options.</p>
            <img src="step3.png" alt="Step 3">
          </div>
          <div class="step-container">
            <p>4. Save for later!</p>
            <img src="step4.png" alt="Step 4">
          </div>
        </div>
      </div>

      <div id="div2" class="content-div" style="display:none; padding-bottom: 500px;">
      <br>
      <h2>Login</h2>
      <hr>
      <div class="div-background div-background-white">
        <form method="post" class="login-form">
          <div class="form-group">
            <label for="username">Username:</label><br>
            <input type="text" id="usernameLog" name="username" required>
          </div>
          <div class="form-group">
            <label for="psw">Password:</label><br>
            <div class="password-input">
              <input type="password" id="pswLog" name="psw" required>
              <span class="toggle-password" onclick="togglePasswordVisibility('pswLog')">
                <i class="fa fa-eye"></i>
              </span>
            </div>
          </div>
          <button type="submit" class="login-button">LOGIN</button>
        </form>
      </div>
    </div>


      <div id="div3" class="content-div" style="display:none;">
        <br>
        <h2>Find a travel</h2>
        <hr>

      <form id="destination_form" action="register_destination.php" method="post" onsubmit="return validateFormDest()">
      <label for="name_destination">Destination :</label>
      <input type="text" id="name_destination" name="name_destination" placeholder="Enter a location" required>
      <br><br>
      <input type="hidden" id="name_airport" name="name_airport" value="">
      <input type="hidden" id="distance" name="distance" value="">
      <input type="hidden" id="distanceInKm" name="distanceInKm" value="">
      <input type="hidden" id="durationInMinutes" name="durationInMinutes" value="">

      <input type="hidden" id="idHotel1" name="idHotel[]" value="">
      <input type="hidden" id="idHotel2" name="idHotel[]" value="">
      <input type="hidden" id="idHotel3" name="idHotel[]" value="">
      <input type="hidden" id="idHotel4" name="idHotel[]" value="">
      <input type="hidden" id="idHotel5" name="idHotel[]" value="">

        <div id="map" style="width: 100%;"></div>
        <div id="msg" style="text-align: center;"></div>
        <br><br>
        <div id="parent_div_hotelInfo"></div>
        <hr>
        <div id="hotelImage1" style="display:flex;"></div><hr>
        <div id="hotelImage2" style="display:flex;"></div><hr>
        <div id="hotelImage3" style="display:flex;"></div><hr>
        <div id="hotelImage4" style="display:flex;"></div><hr>
        <div id="hotelImage5" style="display:flex;"></div><hr><br>
        <input type="submit" class="login-button" id="save_button" value="SAVE" title="Click here to save in 'Consult previous travels' (optional)">
        </form>
      </div>

      <div id="div5" class="content-div" style="display:none; padding-bottom: 500px;">
        <br>
        <h2>Consult previous travels</h2>
        <p style="font-size: medium;">The fly duration is calculated based on an assumed flight speed of approximately 800 km/h (the average plane speed).</p>
        <hr>
        <?php
          $id_user = $_SESSION['id_user'];
          $bdd = new PDO('mysql:host=localhost; dbname=travel_agency; charset=utf8', 'root','');
          // $bdd = new PDO('mysql:host=geotran569.mysql.db; dbname=geotran569; charset=utf8', 'geotran569','Lostark117');

          $requete = $bdd->prepare("SELECT id_destination, name_destination, fly_duration, travel_distance, destination.id_user, COUNT(hotel.id_hotel) AS hotel_count
                                    FROM destination
                                    LEFT JOIN hotel using(id_destination)
                                    WHERE destination.id_user = :id_user AND placeId_hotel != '' GROUP BY id_destination ORDER BY id_destination desc");
                      
          $requete->bindParam(':id_user', $id_user, PDO::PARAM_INT);
          $requete->execute();

          $requete2 = $bdd->prepare("SELECT id_airport, name_airport, travel_time_car, travel_distance_car, airport.id_user
                                     FROM airport
                                     where airport.id_user = :id_user ORDER BY id_airport desc;");
                                     
          $requete2->bindParam(':id_user', $id_user, PDO::PARAM_INT);
          $requete2->execute();

          echo "<div class=\"table-responsive\">";
          echo "<table>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>Destination</th>";
          echo "<th>Fly Duration</th>";
          echo "<th>Travel Distance</th>";
          echo "<th>Number of Hotels</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          
          while ($donnees = $requete->fetch()) {
              echo "<tr>";
              echo "<td class=\"tmpwhiteTd\"><a href=\"#\" class=\"destination-link\">" . $donnees['name_destination'] . "</a></td>";
              echo "<td class=\"tmpwhiteTd\">" . $donnees['fly_duration'] . "</td>";
              echo "<td class=\"tmpwhiteTd\">" . $donnees['travel_distance'] . " km</td>";
              echo "<td class=\"tmpwhiteTd\">" . $donnees['hotel_count'] . "</td>";
              echo "</tr>";
          }

          echo "</tbody>";
          echo "</table><br>";
          echo "</div>";

          $requete->closeCursor();

          echo "<br><h3 style=\"text-align: center;\">Nearest airport to your destination :</h3>";

          echo "<div class=\"table-responsive\">";
          echo "<table>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>Name</th>";
          echo "<th>Driving Duration</th>";
          echo "<th>Driving Distance</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";


          $donnees2 = $requete2->fetch(PDO::FETCH_ASSOC);
          if ($donnees2) {
          echo "<tr>";
          echo "<td class=\"tmpwhiteTd\">" . $donnees2['name_airport'] . " </td>";
          echo "<td class=\"tmpwhiteTd\">" . $donnees2['travel_time_car'] . " </td>";
          echo "<td class=\"tmpwhiteTd\">" . $donnees2['travel_distance_car'] . " km</td>";
          echo "</tr>";
          } else {
            echo "<tr><td colspan=\"3\" class=\"tmpwhiteTd\">Not saved yet.</td></tr>";
        }

        echo "</tbody>";
        echo "</table><br>";
        echo "</div>";
          
          $requete2->closeCursor();
        ?>
      </div>

      <div id="div4" class="content-div" style="display:none;">
        <br>
        <h2>Register</h2>
        <hr>
        <div class="div-background div-background-white">
          <form id="formRegisterInsert" method="post" onsubmit="return validateForm()">
            <label for="username">Username :</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="psw">Password :</label><br>
            <div class="password-input">
              <input type="password" id="psw" name="psw" required>
              <span class="toggle-password" onclick="togglePasswordVisibility('psw')">
                <i class="fa fa-eye"></i>
              </span>
            </div>
            <label for="confirm_psw">Confirm Password :</label><br>
            <div class="password-input">
              <input type="password" id="confirm_psw" name="confirm_psw" required>
              <span class="toggle-password" onclick="togglePasswordVisibility('confirm_psw')">
                <i class="fa fa-eye"></i>
              </span>
            </div>

            <div id="password-error" style="color: red;"></div>

            <label for="username">Last name :</label><br>
            <input type="text" id="lastName" name="lastName" required><br>
            <label for="username">First name :</label><br>
            <input type="text" id="firstName" name="firstName" required><br><br>
            
            <input type="hidden" id="country" name="country" required>
            <input type="hidden" id="district" name="district" required>
            <input type="submit" class="login-button" value="REGISTER">
          </form>
        </div>
      </div>

      <div id="accountDiv" class="content-div" style="display:none; padding-bottom: 600px;">
      <br>
      <h2>Your profile</h2>
      <hr>
      <div class="div-background div-background-white">
        <div style="text-align: center;">
            <label for="imageUpload" class="login-button" style="width: auto;">Choose an image for your profile</label>
            <input type="file" id="imageUpload" accept="image/*"><hr>
        </div>
        <?php
        echo "<div style=\"text-align: center;\">";
        echo "<p style=\"font-weight: bold;\">Username:</p>";
        echo '<p style="font-size: smaller;">' . $_SESSION['username_db'] . '</p><hr>';
        echo "<p style=\"font-weight: bold;\">First Name:</p>";
        echo '<p style="font-size: smaller;">' . $_SESSION['first_name'] . '</p><hr>';
        echo "<p style=\"font-weight: bold;\">Last Name:</p>";
        echo '<p style="font-size: smaller;">' . $_SESSION['last_name'] . '</p><hr>';
        echo "<p style=\"font-weight: bold;\">District area:</p>";
        echo '<p style="font-size: smaller;">' .$_SESSION['district']. '</p><hr>';
        echo "<p style=\"font-weight: bold;\">Country:</p>";
        echo '<p style="font-size: smaller;">' . $_SESSION['country'] . '</p>';
        echo "</div>";
        ?>
      </div>
      </div>
    </div>
  </div>
</div>

<script>
  var posUser;
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        posUser = {lat:position.coords.latitude, lng:position.coords.longitude};
        initMap();
      },
      (error) => {
        console.error('Error : ', error);
      }
    );
  } else {
    console.log("Bug geoloc");
  } 

  function registerPosUser()
  {
      if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          posUser = {lat: position.coords.latitude, lng: position.coords.longitude};
          var geocoder = new google.maps.Geocoder();
          geocoder.geocode({'location': posUser}, function(results, status) {
            if (status === 'OK') {
              if (results[0]) {
                var addressComponents = results[0].address_components;
                for (var i = 0; i < addressComponents.length; i++) {
                  var component = addressComponents[i];
                  if (component.types.includes('administrative_area_level_2')) {
                    document.getElementById("district").value=component.long_name;
                  } else if (component.types.includes('country')) {
                    document.getElementById("country").value=component.long_name;
                  }
                }
              } else {
                console.error('No address found');
              }
            } else {
              console.error('Error geocode:', status);
            }
          });
        },
        (error) => {
          console.error('Error geoloc : ', error);
        }
      );
    } else {
      console.log("geoloc unavailable for your browser");
    }
  }
  


  var map;
  var pos1;
  var pos2;
  var line;
  var nearestAirport;
  var posAirport;
  function initMap() {
    const options = {zoom: 10, scaleControl: true, center: posUser};
    map = new google.maps.Map(document.getElementById('map'), options);
    pos1 = new google.maps.Marker({position: posUser, map: map});
    pos2 = new google.maps.Marker({position: posUser, map: map});


    var request = {
    location: posUser,
    radius: '200000', //en metre
    keyword: 'airport'
    };

    var placesService = new google.maps.places.PlacesService(map);
    placesService.nearbySearch(request, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
        //le premier aeroport ( le plus proche du coup)
        nearestAirport = results[0];
        document.getElementById('name_airport').value = nearestAirport.name;
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();

        // def des options de la ligne (polyline)
        directionsRenderer.setOptions({
          polylineOptions: {
          strokeColor: '#FF0000', // Couleur rouge
          strokeOpacity: 0.8, 
          strokeWeight: 4
          }
        });

        directionsRenderer.setMap(map);

        var routeRequest = {
            origin: posUser,
            destination: nearestAirport.geometry.location,
            travelMode: google.maps.TravelMode.DRIVING
        };

        directionsService.route(routeRequest, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
                var route = response.routes[0];
                var distance = 0;
                var duration = 0;

                for (var i = 0; i < route.legs.length; i++) {
                  distance += route.legs[i].distance.value;
                  duration += route.legs[i].duration.value;
                }

                var distanceInKm = distance / 1000;
                var durationInMinutes = duration / 60;
                console.log('car distance: '+distanceInKm+" car duration: "+durationInMinutes);
                document.getElementById('distanceInKm').value = distanceInKm.toFixed(2);
                document.getElementById('durationInMinutes').value = durationInMinutes;
            } else {
                console.log('Unable to calculate the route : ' + status);
            }
        });
    } else {
        console.log('No airports found.');
      }
    });

  }
    
  function haversine_distance(pos1, pos2) {
        var rad = 6371;
        var rlat1 = pos1.position.lat() * (Math.PI/180);
        var rlat2 = pos2.position.lat() * (Math.PI/180);
        var difflat = rlat2-rlat1;
        var difflon = (pos2.position.lng()-pos1.position.lng()) * (Math.PI/180);

        var dist = 2 * rad * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
        return dist;
  }


  function showDiv(divId) {
    var divs = document.querySelectorAll('.content-div');
    for (var i = 0; i < divs.length; i++) {
      divs[i].style.display = 'none';
    }
    document.getElementById(divId).style.display = 'block';
    document.getElementById(divId).classList.add('fade-in'); // anim d'apparition

  }

    const checkbox = document.getElementById("checkbox")
    checkbox.addEventListener("change", () => {
      toggleDarkMode();
    });


  function toggleDarkMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
    var navbarSelected = document.querySelector(".navbar");
    var offcanvasSelected = document.querySelector(".offcanvas");

    navbarSelected.classList.toggle("navbar-light");
    navbarSelected.classList.toggle("navbar-dark");
    navbarSelected.classList.toggle("dark-mode-navbar");
    navbarSelected.classList.toggle("navbarGrey");
    offcanvasSelected.classList.toggle("dark-mode");

    var allTds = document.getElementsByTagName("td");

     for (var i = 0; i < allTds.length; i++) {
       allTds[i].classList.toggle("dark-mode");
       allTds[i].classList.toggle("tmpwhiteTd");
     } 



    var userMenu = document.querySelector(".menu-content");
    if(userMenu != null)
    {
       userMenu.classList.toggle("dark-mode");
       userMenu.classList.toggle("menu-contentWhite");      
    }

    var divColor = document.querySelectorAll(".div-background")
    if(divColor != null)
    {
      for (var j = 0; j < divColor.length; j++) {
         divColor[j].classList.toggle("div-background-dark");
         divColor[j].classList.toggle("div-background-white");
      }
    }

    var leftMenuColor = document.querySelectorAll(".leftMenu");
    if(leftMenuColor != null) {
      for (var k = 0; k < leftMenuColor.length; k++) {
         leftMenuColor[k].classList.toggle("leftMenu-dark");
         leftMenuColor[k].classList.toggle("leftMenu-white");
      }
    }


      //enregistrer si darkmode ou pas dans un cookie
       var darkModeEnabled = element.classList.contains("dark-mode");
       document.cookie = "darkMode=" + (darkModeEnabled ? "enabled" : "");

  }


  //cookie pour se souvenir du darkmode ici get le nom du cookie
  function getCookie(name) {
    var value = "; " + document.cookie;
    console.log(value);
    var parts = value.split("; " + name + "=");
    console.log(parts);
    if (parts.length == 2) return parts.pop().split(";").shift();
  }



  $(document).ready(function(){
    $('#offcanvas .nav-link').on('click', function(){
      $('#offcanvas').offcanvas('hide');
    });
    var darkModeCookie = getCookie("darkMode");
      if (darkModeCookie === "enabled") {
        toggleDarkMode();
        checkbox.checked =true;
      }

  });

  function toggleMenu() {
    var menuContent = document.getElementById("menu-content");
    menuContent.classList.toggle("show");
    }
  window.onclick = function(event) {
    if (!event.target.matches('.btn')) {
      var menus = document.getElementsByClassName("menu-content");
      var i;
      for (i = 0; i < menus.length; i++) {
        var openMenu = menus[i];
        if (openMenu.classList.contains('show')) {
          openMenu.classList.remove('show');
        }
      }
    }
  }

  function geocodePlaceByText(placeText, callback) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: placeText }, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          callback(results[0]);
        } else {
          console.error('No results found for this search.');
        }
      } else {
        console.error('Geocoding error. : ' + status);
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            if(document.getElementById('div4').style.display==='block')
            {
              registerPosUser();
            }
            navLinks.forEach(function(link) {
                link.style.backgroundColor = '';
            });
            
            event.target.style.backgroundColor = '#e0e0e0';
        });
    });
  });

//ici on gere l'autocomplete + re update le calcul de distance et marker
var place;
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById("name_destination");
    const autocomplete = new google.maps.places.Autocomplete(input);
    var countryDestination = document.getElementById("name_destination").value;
    autocomplete.addListener('place_changed', function() {
      place = autocomplete.getPlace();
      calculbig();


    });
});

    function calculbig() {
        if (place && place.geometry && place.geometry.location) {
        pos2.setPosition({lat: place.geometry.location.lat(), lng: place.geometry.location.lng()});
        map.setZoom(2);

        if (posAirport) {posAirport.setMap(null);}
        posAirport = new google.maps.Marker({position: nearestAirport.geometry.location, map: map});

        if(line){line.setMap(null);}
        line = new google.maps.Polyline({path: [posAirport.getPosition(), pos2.getPosition()], map: map});

        var distance = haversine_distance(posAirport, pos2);
        document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) + " km";

        document.getElementById('distance').value = distance.toFixed(2);
        console.log("Distance: " + distance.toFixed(2));

        var request = {
          location: pos2.getPosition(),
          radius: '20000', //en metre
          keyword: 'hotel'
        };

        if (name_destination !== "") {
                document.getElementById('hotelImage1').scrollIntoView({
                    behavior: 'smooth'
                });
        }

        var placesService = new google.maps.places.PlacesService(map);
        placesService.nearbySearch(request, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {

            var parentDivHotel = document.getElementById('parent_div_hotelInfo');
            var destination_form = document.getElementById('destination_form')
            //5 pour genre max 5 hotels
            for (var i = 0; i < 5 && i < results.length; i++) {
                document.getElementById("hotelImage" + (i + 1)).innerHTML="";
            }

            for (var i = 0; i < 5 && i < results.length; i++) {
            var hotel = results[i];


            var photoReference = "";
            var hotelImage = document.getElementById("hotelImage" + (i + 1));

            if (hotel.photos && hotel.photos.length > 0) {
                photoReference = hotel.photos[0].getUrl({ maxWidth: 400 });
            } else {
              console.log("No photo available"+hotel.name);
            }


            var rating = hotel.rating;
            var maxRate = 5;
            var prcRate = (rating/maxRate) * 100;

            var fullStar = Math.floor(prcRate / 20);
            var reste = prcRate % 20;
            var midStar = Math.floor(reste / 10);
            console.log(rating);
            console.log("mid star : ",midStar);
            var emptyStar = 5 - fullStar - midStar;

            var htmlEtoiles = '';
            for (var l = 0; l < fullStar; l++) {
                htmlEtoiles += '<i class="fas fa-star" style="color: #FFD43B;"></i>';
            }
            for (var j = 0; j < midStar; j++) {
                htmlEtoiles += '<i class="fas fa-star-half-alt" style="color: #FFD43B;"></i>';
            }
            for (var k = 0; k < emptyStar; k++) {
                htmlEtoiles += '<i class="far fa-star" style="color: #FFD43B;"></i>';
            }
            hotelImage.innerHTML +="<div style=\"margin: auto; text-align: center;\">"+
                                      "<div style=\"margin-bottom: 20px;\">"+
                                          "<img src='" + photoReference +"' alt='Hotel Image'>"+
                                      "</div>"+
                                      "<div style=\"margin-bottom: 20px;\">"+
                                          "<div style=\"padding-left: 20px;\">"+"NAME : <br>"+hotel.name+"</div>"+
                                          "<div style=\"padding-left: 20px;\">"+"ADRESS : <br>"+hotel.vicinity+"</div>"+
                                          "<div style=\"padding-left: 20px;\">"+htmlEtoiles+"</div>"+
                                      "</div>"+
                                  "</div>";


            console.log(hotel.place_id);
            document.getElementById("idHotel"+(i+1)).value = hotel.place_id;

            }
          } else {
          console.log('Aucun hotel trouvé.');
            }
      });
      }
    }



  function togglePasswordVisibility(fieldId) {
    var passwordField = document.getElementById(fieldId);
    var toggleBtn = document.querySelector('#' + fieldId + ' + .toggle-password i');
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleBtn.classList.remove('fa-eye');
      toggleBtn.classList.add('fa-eye-slash');
    } else {
      passwordField.type = "password";
      toggleBtn.classList.remove('fa-eye-slash');
      toggleBtn.classList.add('fa-eye');
    }
  }

    // Fonction pour valider le formulaire côté client
  function validateForm() {
    var password = document.getElementById("psw").value;
    var confirm_password = document.getElementById("confirm_psw").value;

    // Vérifier si les mots de passe correspondent
    if (password !== confirm_password) {
      // Afficher un message d'erreur
      document.getElementById("password-error").innerText = "Passwords do not match";
      // Empêcher la soumission du formulaire
      return false;
    }
      // Si la validation réussit, autoriser la soumission du formulaire
      return true;
  }


    function validateFormDest() {
        var countryDestination = document.getElementById("name_destination").value;
        var distance = document.getElementById("distance").value;

        if (countryDestination.trim() === "") {
            alert("Please enter the destination country.");
            return false; 
        }

        if (distance.trim() === "") {
            alert("Please select a destination from the autocomplete suggestions.");
            return false; 
        }

        return true;
    }

    
    var liensDestination = document.querySelectorAll('.destination-link');

    liensDestination.forEach(function(lien) {
        lien.addEventListener('click', function(event) {
            document.getElementById('div5').style.display = 'none';
            document.getElementById('div3').style.display = 'block';

            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
              link.style.backgroundColor = '';
            });

            navLinks[1].style.backgroundColor = '#e0e0e0';

            event.preventDefault();

            var contenuLien = lien.textContent.trim();
            var input = document.getElementById('name_destination');

            input.value = contenuLien;


            geocodePlaceByText(contenuLien, function(result) {
              place = result;
              calculbig(); 
            });   

        });
    });

    var imageInput = document.getElementById('imageUpload');
    var toggleButtonProfil = document.getElementById('profilePic');
    var imageInput = document.getElementById('imageUpload');

imageInput.addEventListener('change', function(event) {
    var file = event.target.files[0];
    if (file) {
        var formData = new FormData();
        formData.append('image', file);

        // Envoi de l'image au serveur via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Image uploaded successfully.');
                location.reload();
            } else {
                console.error('Error uploading image. Status:', xhr.status);
            }
        };
        xhr.send(formData);
    }
});

function afficherImage(imagePath) {
    var imageContainer = document.getElementById('profilePic');

    var imgElement = new Image();

    imgElement.onload = function() {
        // on crée un canvas pour redimensionner l'image
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        canvas.width = 50;
        canvas.height = 50;
        ctx.drawImage(imgElement, 0, 0, 50, 50);

        // on convertis le canvas en URL data
        var resizedImageUrl = canvas.toDataURL();

        // on applique l'image redimensionnée au bouton
        imageContainer.style.backgroundImage = 'url(' + resizedImageUrl + ')';
    };

    // on définis la source de l'image
    imgElement.src = imagePath;
}



</script>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

if($_SESSION) {


  $id_user = $_SESSION["id_user"];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT image_data FROM user where id_user=$id_user";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // récupère le chemin de l'image depuis la première ligne du résultat
      $row = $result->fetch_assoc();
      $imagePath = $row["image_data"];

      // affiche l'image
      echo "<script>afficherImage('$imagePath');</script>";

      
  }

  $conn->close();
}
?>



















<?php
  if(isset($_SESSION['showDiv']) && $_SESSION['showDiv'] == "div3") {
    echo "<script>
            document.getElementById('div1').style.display = 'none';
            document.getElementById('div5').style.display = 'block';

            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
              link.style.backgroundColor = '';
            });

            navLinks[2].style.backgroundColor = '#e0e0e0';
          </script>";
    unset($_SESSION['showDiv']);
  }
?>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNOz3pcx50YtC8BJe_C7r7lb9eFCny-ag&libraries=places">
</script>
</body>
</html>