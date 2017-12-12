<?php ((!$data['contentOnly']) ? Controller::loadTemplate('head') : '') ?>
    <body>
        <main>
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('header') : '') ?>
            <article>
                <h1>Delete person</h1>
                <form method="post">
                    <p>
                        <input name="idPerson" value="<?= $data['id'] ?>" hidden>
                        Are you sure you want to delete <?= $data['nom'] . $data['prenom'] ?> ?<br />
                        <button type="submit">Delete</button>
                </form>
            </article>
        </main>
    </body>
<?php ((!$data['contentOnly']) ? Controller::loadTemplate('footer') : '') ?>
