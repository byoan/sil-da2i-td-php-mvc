<?php
    Controller::loadTemplate('head'); ?>
    <body>
        <main>
            <?php Controller::loadTemplate('header'); ?>
            <article>
                <h1>Add a movie</h1>
                <form method="post" id="newMovieForm">
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

                        <input type="text" name="submit" hidden=true>

                        <br /><br />
                        <button id="submitNewMovie" type="submit">Save</button>
                </form>
            </article>
        </main>

        <script>
            $('#submitNewMovie').on('click', function(e) {
                $('input, textarea').css('background-color', '#fff');
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: '<?= $data['postUrl'] ?>',
                    data: $('#newMovieForm').serialize(),
                    success: function(response) {
                        response = JSON.parse(response);

                        if (response.error) {
                            response.missingFields.forEach(function(value) {
                                $('*[name="' + value + '"]').css('background-color', '#ff0000');
                            })
                        } else {
                            window.location = response.redirectUrl;
                        }
                    },
                    error: function(error) {
                        alert('An error occurred during the AJAX call : ' + error);
                    }
                });
            });
        </script>
    </body>
<?php Controller::loadTemplate('footer', $data); ?>
