<h1 class="movieName"><?php echo $data['personne']['nom'] . ' ' . $data['personne']['prenom']; ?></h1>
<section class="imgDirector">
    <figure>
        <img src=<?= $data['personne']['chemin'] ?> class="figure-img" alt="<?= $data['personne']['legende'] ?>" width=300 height=400/>
        <figcaption><?= $data['personne']['legende'] ?></figcaption>
    </figure>
</section>
