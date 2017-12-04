<h3>Editer les personnes : </h3>
<p>
    <ul>
    <?php
        foreach ($data['personList'] as $key => $person) {
            echo "<li><a href='". _BASE_URL_ . "admin/edit/person/" . $person['id'] . "'>" . $person['nom'] . " " .  $person['prenom'] ."</a> - <a href='". _BASE_URL_ . "admin/delete/person/" . $person['id'] . "'>Supprimer</a></li>";
        }
    ?>
    </ul>
</p>
