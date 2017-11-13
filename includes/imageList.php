<div class="flexRow">
    <?php
    foreach ($data['imagesOfActorsInFilm'] as $key => $image) {
        echo '<figure>
            <img src="' . $image['chemin'] . '" class="figure-img" alt="Image de ' . $image["legende"] . '" width=300 height=400>
            <figcaption>' . $image["legende"] . '</figcaption>
        </figure>';
    }
    ?>
</div>
