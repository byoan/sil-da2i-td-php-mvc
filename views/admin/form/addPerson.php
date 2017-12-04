<?php Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <h1>Add person</h1>
                <form method="post">
                    <p>
                        Person first name<br />
                        <input name="firstName" type="text" placeholder="First name">
                        <br /><br />

                        Person last name<br />
                        <input name="lastName" type="text" placeholder="Last name">
                        <br /><br />

                        Person birth date<br />
                        <input name="birthDate" type="date" placeholder="Birth date">
                        <br /><br />

                        Biography<br />
                        <textarea name="biography" rows=20 cols=100 placeholder="Biography"></textarea>

                        <br /><br />

                        Filmography<br />
                        <textarea name="filmography" rows=20 cols=100 placeholder="Filmography"></textarea>

                        <br /><br />

                        <button type="submit">Save</button>
                </form>
            </article>
        </main>
    </body>
