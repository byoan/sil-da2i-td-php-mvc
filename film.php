<?php
ini_set('error_reporting', -1);
ini_set('display_errors', 'on');

require_once('functions.php');

if (!empty($_GET['filmId'])) {
    $filmId = (int)$_GET['filmId'];
} else {
    header("HTTP/1.0 404 Not Found");
    echo '<h1>404 Not Found</h1>';
    die;
}

$data = array();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Whiplash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <main>
            <?php getBlock('includes/header.php'); ?>
            <article>
                <?php getBlock('includes/movieInformation.php', ['movie' => $filmId]); ?>
            </article>
            <hr />
            <?php getBlock('includes/footer.php'); ?>
        </main>
    </body>
</html>
