<h3>Réalisateurs : </h3>
<p>
    <ul>
    <?php
        foreach ($data['directorsList'] as $key => $person) {
            echo "<li><a href='director.php?id=" . $person['id'] . "'>" . $person['nom'] . " " .  $person['prenom'] ."</a></li>";
        }
        ?>
    </ul>
</p>
