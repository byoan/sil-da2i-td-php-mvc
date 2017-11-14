<h3>Acteurs : </h3>
<p>
    <ul>
    <?php
        foreach ($data['actorsList'] as $key => $person) {
            echo "<li><a href='actor.php?id=" . $person['id'] . "'>" . $person['nom'] . " " .  $person['prenom'] ."</a></li>";
        }
    ?>
    </ul>
</p>
