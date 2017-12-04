<?php Controller::loadTemplate('head'); ?>
<body>
    <main>
        <?php Controller::loadTemplate('header'); ?>
        <article>
            <a href="<?= _BASE_URL_ ?>admin/add/movie">Add a movie</a>
            <a href="<?= _BASE_URL_ ?>admin/add/person">Add a person</a>
            <?php
                Controller::loadAdminTemplate('moviesList', $data);
                Controller::loadAdminTemplate('personsList', $data);
            ?>
        </article>
        <hr />
        <?php Controller::loadTemplate('footer') ?>
    </main>
</body>
