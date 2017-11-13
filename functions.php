<?php

function initDbConnection() {
    return new mysqli('localhost', 'root', 'root', 'moviesWebsite');
}

function getBlock($file, $args = [])
{
    $db = initDbConnection();

    if ($db->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    } else {
        if (!empty($args)) {
            foreach ($args as $key => $value) {
                switch ($key) {
                    case 'movie':
                        $result = mysqli_query($db, "SELECT * FROM film where id = $value");
                        $data['movie'] = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];

                        $result = mysqli_query($db, "SELECT * FROM photo JOIN film_has_photo On photo.id = film_has_photo.id_photo WHERE id_film = " . $data['movie']['id']);
                        $data['imagesOfFilm'] = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        $result = mysqli_query($db, "SELECT chemin, legende FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON personne_has_photo.id_personne = film_has_personne.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = " . $data['movie']['id'] . " AND film_has_personne.role = 'Réalisateur'");
                        $data['realisateur'] = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];

                        $result = mysqli_query($db, "SELECT DISTINCT * FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON film_has_personne.id_personne = personne_has_photo.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = " . $data['movie']['id'] . " AND film_has_personne.role <> 'Réalisateur'");
                        $data['imagesOfActorsInFilm'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        break;

                    case 'personne':
                        $result = mysqli_query($db, "SELECT * FROM personne JOIN personne_has_photo ON personne.id = personne_has_photo.id_personne JOIN photo on personne_has_photo.id_photo = photo.id WHERE personne.id = $value");
                        $data['personne'] = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
                        break;

                    case 'filmsList':
                        $result = mysqli_query($db, "SELECT * FROM film ORDER BY titre ASC");
                        $data['filmsList'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        break;

                    case 'realisatorsList':
                        $result = mysqli_query($db, "SELECT * FROM personne JOIN film_has_personne ON personne.id = film_has_personne.id_personne WHERE role like 'Réalisateur' ORDER BY nom ASC");
                        $data['realisatorsList'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        break;

                    case 'actorsList':
                        $result = mysqli_query($db, "SELECT * FROM personne JOIN film_has_personne ON personne.id = film_has_personne.id_personne WHERE role like 'Acteur' ORDER BY nom ASC");
                        $data['actorsList'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        break;
                }
            }
        }
    }

    // Replace require with include so the data var is accessible
    include $file;
}

?>
