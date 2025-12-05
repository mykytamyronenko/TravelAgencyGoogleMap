$(document).ready(function() {
    // Requête AJAX pour le formulaire d'inscription
    $('#formRegisterInsert').on('submit', function(event) {
        event.preventDefault();

        if ($('#username').val() != '' &&
            $('#psw').val() != '' &&
            $('#confirm_psw').val() != '' &&
            $('#lastName').val() != '' &&
            $('#firstName').val() != '' &&
            $('#country').val() != '' &&
            $('#district').val() != '') {
            var form_data = $(this).serialize();
            $.ajax({
                url: "register_insert.php",
                method: "POST",
                data: form_data,
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        console.log(data.message);

                        updateSessionData(data.session_data);
                        window.location.href = "homeV2.php";
                    } else {
                        console.error(data.message);
                        alert(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            console.error("Please fill in all the fields.");
            alert("Please fill in all the fields.");
        }
    });

    // Requête AJAX pour le formulaire de connexion
    $('.login-form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "connection_verification.php",
            method: "POST",
            data: form_data,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.success) {
                    console.log(data.message);
                    updateSessionData(data.session_data);
                    window.location.href = "homeV2.php";
                } else {
                    console.error(data.message);
                    alert("Username or password incorrect.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("An error occurred during the connection. Please try again.");
            }
        });
    });

    // Fonction pour mettre à jour les variables de session côté client
    function updateSessionData(sessionData) {
        // Mettre à jour les variables de session côté client
        localStorage.setItem('first_name', sessionData.first_name);
        localStorage.setItem('last_name', sessionData.last_name);
        localStorage.setItem('role', sessionData.role);
        localStorage.setItem('username_db', sessionData.username_db);
        localStorage.setItem('id_user', sessionData.id_user);
        localStorage.setItem('country', sessionData.country);
        localStorage.setItem('district', sessionData.district);
    }
});
