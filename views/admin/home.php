<?php ((!$data['contentOnly']) ? Controller::loadTemplate('head') : '') ?>
<body>
    <main>
        <?php ((!$data['contentOnly']) ? Controller::loadTemplate('header') : '') ?>
        <article>
            <a href="<?= _BASE_URL_ ?>admin/add/movie">Add a movie</a>
            <a href="<?= _BASE_URL_ ?>admin/add/person">Add a person</a>
            <?php
                Controller::loadAdminTemplate('moviesList', $data);
                Controller::loadAdminTemplate('personsList', $data);
            ?>
        </article>
        <hr />
        <?php ((!$data['contentOnly']) ? Controller::loadTemplate('footer') : '') ?>
    </main>
</body>
