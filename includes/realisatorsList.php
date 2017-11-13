<h3>Réalisateurs : </h3>
<p>
    <ul>
    <?php
        foreach ($data['realisatorsList'] as $key => $person) {
            echo "<li><a href='person.php?personId=" . $person['id'] . "'>" . $person['nom'] . " " .  $person['prenom'] ."</a></li>";
        }
        ?>
    </ul>
</p>
