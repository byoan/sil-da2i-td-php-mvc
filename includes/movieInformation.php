<h1 class="movieName"><?= $data['movie']['titre'] ?> (<time><?= date('Y', strtotime($data['movie']['dateDeSortie'])); ?></time>)</h1>
<h2 class="movieRating"><meter min="0" max="5" value="<?= $data['movie']['note'] ?>"><?= $data['movie']['note'] ?></meter></h2>
<section>
    <div>
        <h3>Synopsis :</h3>
        <p>
            <?= $data['movie']['synopsis'] ?>
        </p>
    </div>
    <div class="actors">
        <h3>Acteurs principaux :</h3>
        <p>
            <?= nl2br($data['movie']['acteursPrincipaux']); ?>
        </p>
    </div>
</section>
<section>
    <h3>Photos</h3>
    <div class="flexRow">
        <?php
            foreach ($data['imagesOfFilm'] as $key => $image) {
                echo '<figure>
                    <img width=200 height=300 src="' . $image['chemin'] . '" class="figure-img" alt="' . $image['legende'] . '" width=300 height=400>
                    <figcaption>' . $image['legende'] . '</figcaption>
                </figure>';
            }
        ?>
    </div>
</section>
<aside>
    <div>
        <section>
            <h4>Infos Réalisateur</h4>
            <div class="flexRow">
                <figure>
                    <img src="<?= $data['realisateur']['chemin'] ?>" class="figure-img" alt="Image de <?= $data['realisateur']['legende'] ?>, réalisateur du film" width=300 height=400 />
                    <figcaption><?= $data['realisateur']['legende'] ?></figcaption>
                </figure>
            </div>
        </section>
        <section>
            <h4>Infos Acteurs</h4>
            <?php include('includes/imageList.php'); ?>
        </section>
    </div>
</aside>
