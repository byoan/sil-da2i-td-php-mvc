<?php
    Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <h1>Add a movie</h1>
                <form method="post">
                    <p>
                        Movie name<br />
                        <input name="title" type="text" placeholder="Movie name">
                        <br /><br />

                        Movie synopsis<br />
                        <textarea name="synopsis" rows=20 cols=100 placeholder="Movie synopsis"></textarea>

                        <br /><br />

                        Movie release date<br />
                        <input type="date" name="releaseDate" />

                        <br /><br />

                        Movie rating<br />
                        <input name="rating" type="number" placeholder="Movie rating, from 0 to 5" step="0.1" min="0" max="5">

                        <br /><br />
                        <button type="submit">Save</button>
                </form>
            </article>
        </main>
    </body>
<?php Controller::loadTemplate('footer'); ?>
