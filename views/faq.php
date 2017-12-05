<?php
Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <h1>FAQ</h1>
                <?php Controller::loadTemplate('faqContent'); ?>

            </article>
            <hr />
            <?php Controller::loadTemplate('footer', $data) ?>
        </main>
    </body>
