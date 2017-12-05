<?php Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <h1>Edit movie</h1>
                <form method="post">
                    <p>
                        Movie name<br />
                        <input name="title" value="<?= $data['titre'] ?>" type="text" placeholder="Movie name">
                        <br /><br />

                        Movie synopsis<br />
                        <textarea name="synopsis" rows=20 cols=100 placeholder="Movie name"><?= $data['synopsis'] ?></textarea>

                        <br /><br />

                        Movie release date<br />
                        <input type="date" name="releaseDate" value="<?= $data['dateDeSortie'] ?>" />

                        <br /><br />

                        Movie rating<br />
                        <input name="rating" type="number" placeholder="Movie rating, from 0 to 5" value="<?= $data['note'] ?>" step="0.1" min="0" max="5">

                        <br /><br />
                        <button type="submit">Save</button>
                </form>
            </article>
        </main>
    </body>
<?php Controller::loadTemplate('footer', $data); ?>
