<?php Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <?php Controller::loadTemplate('moviesList', $data); ?>
                <?php Controller::loadTemplate('actorsList', $data); ?>
                <?php Controller::loadTemplate('directorsList', $data); ?>
            </article>
            <hr />
            <?php Controller::loadTemplate('footer') ?>
        </main>
    </body>
