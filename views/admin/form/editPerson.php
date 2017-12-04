<?php Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <h1>Edit person</h1>
                <form method="post">
                    <p style="text-align:center;">
                        Person first name<br />
                        <input name="firstName" value="<?= $data['prenom'] ?>" type="text" placeholder="First name">
                        <br /><br />

                        Person last name<br />
                        <input name="lastName" value="<?= $data['nom'] ?>" type="text" placeholder="Last name">
                        <br /><br />

                        Person birth date<br />
                        <input name="birthDate" value="<?= $data['dateDeNaissance'] ?>" type="date" placeholder="Birth date">
                        <br /><br />

                        Biography<br />
                        <textarea name="biography" rows=20 cols=100 placeholder="Biography"><?= $data['biographie'] ?></textarea>

                        <br /><br />

                        Filmography<br />
                        <textarea name="filmography" rows=20 cols=100 placeholder="Filmography"><?= $data['filmographie'] ?></textarea>

                        <br /><br />

                        <button type="submit">Save</button>
                </form>
            </article>
        </main>
    </body>
