<footer>
    <span>Site réalisé par Yoan Ballesteros | <a href="mailto:blabla@blabla.fr">Contact</a></span>
</footer>
<script>
$(document).ready(function() {

    // Use document to make the event listener apply even after DOM change
    $(document).on('click', 'a', function(element) {
        element.preventDefault();
        let link = element.target.href;

        $('header').prepend('<div class="loader"></div>');

        $.ajax({
            url: link,
        }).done(function(response) {
            $('article').fadeOut(500, function() {
                $('article').html($(response).find('article').html());
                $('article').fadeIn();
            });
            history.pushState({link: link}, null, link);
            setTimeout(function() {
                $('div.loader').fadeOut();
            }, 500);
        }).fail(function() {
            // In case an error occurred, use classic navigation
            window.location = link;
        });
    })

    $(window).bind('popstate', function(event) {
        if (event.originalEvent.state.link !== 'undefined') {
            window.location = event.originalEvent.state.link;
        }
    })

    $('#hideAside').on('click', function() {
        $('aside').hide(2000);
    });

    $('#fadeImg').on('click', function() {
        $('img').fadeOut(3000);
    });

    $('#toggleMenu').on('click', function() {
        $('#menu').slideToggle(500, function() {
            setTimeout(function() {
                $('#menu').slideToggle(500);
            }, 1000);
        });
    });

    $('dt').on('mouseenter mouseleave', function() {
        if (!$(this).hasClass('display')) {
            $(this).next('dd').toggle();
        }
    });

    $('dt').each(function() {
        $(this).data('clicksCount', 0);
        $(this).text($(this).text() + ' (' + $(this).data('clicksCount') + ')');
    });

    var maxNbClicks = 0;
    $('dt').on('click', function() {
        if ($(this).hasClass('display')) {
            $(this).removeClass('display');
            $(this).next('dd').removeClass('display');
        } else {
            $(this).addClass('display');
            $(this).next('dd').addClass('display');
        }
        $(this).data('clicksCount', parseInt($(this).data('clicksCount')) + 1);
        $(this).text('Firefox : ' + $(this).data('clicksCount'));

        $('article dl dt').each(function() {
            if (typeof($(this).data('clicksCount')) === 'undefined') {
                $(this).data('clicksCount') = 0;
            }
            if ($(this).data('clicksCount') > maxNbClicks) {
                $(this).prependTo($('dl'));
                maxNbClicks = $(this).data('clicksCount');
            }
        });
    });

    $('#loadAside').on('click', function() {
        $('#superAside').html('<div class="loader"></div>');
        $.ajax({
            method: 'GET',
            url: '<?= $data['ajaxUrl'] ?>',
            success: function(response) {
                $('#superAside').html(response);
            },
            error: function(error) {
                alert('An error occurred during the AJAX call : ' + error);
            }
        });
    });

    // jQuery plugin
    (function ($) {
        $.fn.relFunction = function() {
            let linksList = $('body a');
            let noFollowLinks = 0;
            let displayableList = [];

            linksList.each(function(key, element) {
                if ($(element).attr('rel') != 'nofollow') {
                    noFollowLinks++;
                    displayableList.push('<a href="#" id="link" data-id-link=' + key + '>' + $(element).text().substr(0, 10) + ' ...</div>');
                }
            });

            $('body').append('<div id="dashboard"><strong>Links Dashboard</strong><p>Number of links retrieved : ' + linksList.length + '</p><p>Number of links that doesn\'t have the nofollow attribute : ' + (noFollowLinks / linksList.length * 100) + ' %</p><p>List of links :<div id="linksList"></div></p>');
            $('#linksList').html(displayableList.join(""));

            $('#linksList #link').on('click', function() {
                // Reset all links to white color
                $('#linksList #link').css('background-color', '#fff');
                $('a').css('background-color', '#fff');

                // Retrieve the link id
                let id = $(this).attr('data-id-link');
                let element = linksList[id];

                // Define background color to red for both the link and the link in the list
                $(this).css('background-color', '#EB5B61');
                $(element).css('background-color', '#EB5B61');

                // Scroll to link
                $('html, body').animate({
                    scrollTop: $(element).offset().top
                }, 500);
            });
        };
    } (jQuery));

    //$('body').relFunction();
});
</script>
