<?php ((!$data['contentOnly']) ? Controller::loadTemplate('head') : '') ?>
    <body>
        <main>
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('header') : '') ?>
            <article>
                <h1>FAQ</h1>
                <?php Controller::loadTemplate('faqContent'); ?>

            </article>
            <hr />
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('footer') : '') ?>
        </main>
    </body>
