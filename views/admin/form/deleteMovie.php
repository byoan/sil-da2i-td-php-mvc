<?php ((!$data['contentOnly']) ? Controller::loadTemplate('head') : '') ?>
    <body>
        <main>
            <?php ((!$data['contentOnly']) ? Controller::loadTemplate('header') : '') ?>
            <article>
                <h1>Delete movie</h1>
                <form method="post">
                    <p>
                        <input name="idMovie" value="<?= $data['id'] ?>" hidden>
                        Are you sure you want to delete the <?= $data['titre'] ?> movie ?<br />
                        <button type="submit">Delete</button>
                </form>
            </article>
        </main>
    </body>
<?php ((!$data['contentOnly']) ? Controller::loadTemplate('footer') : '') ?>
