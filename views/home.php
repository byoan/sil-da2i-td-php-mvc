<?php ((!$data['contentOnly']) ? Controller::loadTemplate('head') : '') ?>
    <body>
        <main>
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('header') : '') ?>
            <article>
                <?php
                    Controller::loadTemplate('moviesList', $data);
                    Controller::loadTemplate('actorsList', $data);
                    Controller::loadTemplate('directorsList', $data);
                ?>
            </article>
            <hr />
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('footer') : '') ?>
        </main>
    </body>
