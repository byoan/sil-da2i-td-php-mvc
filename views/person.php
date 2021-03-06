<?php ((!$data['contentOnly']) ? Controller::loadTemplate('head') : '') ?>
    <body>
        <main>
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('header') : '') ?>
            <article>
                <?php Controller::loadTemplate('personQuickview', $data); ?>
                <section>
                    <h3>Date de naissance :</h3><p><time><?= strftime('%e %B %Y', ((new DateTime($data['personne']['dateDeNaissance']))->getTimestamp())); ?></time></p>
                    <h3>Biographie :</h3>
                    <p>
                        <?= nl2br($data['personne']['biographie']) ?>
                    </p>

                    <h3>Filmographie :</h3>
                    <p>
                        <?= nl2br($data['personne']['filmographie']) ?>
                    </p>
                </section>
            </article>
            <hr />
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('footer', $data) : '') ?>
        </main>
    </body>
</html>
