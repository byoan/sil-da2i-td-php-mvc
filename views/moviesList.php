<h3>Films : </h3>
<p>
    <ul>
    <?php
        foreach ($data['moviesList'] as $key => $film) {
            echo "<li><a href='film.php?id=" . $film['id'] . "'>" . $film['titre'] ."</a></li>";
        }
    ?>
    </ul>
</p>
