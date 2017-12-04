<h3>Editer les films : </h3>
<p>
    <ul>
    <?php
        foreach ($data['moviesList'] as $key => $film) {
            echo "<li><a href='". _BASE_URL_ . "admin/edit/movie/" . $film['id'] . "'>" . $film['titre'] ."</a> - <a href='". _BASE_URL_ . "admin/delete/movie/" . $film['id'] . "'>Delete</a></li>";
        }
    ?>
    </ul>
</p>
