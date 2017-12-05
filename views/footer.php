<footer>
    <span>Site réalisé par Yoan Ballesteros | <a href="mailto:blabla@blabla.fr">Contact</a></span>
</footer>
<script>
$(document).ready(function() {

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
});
</script>
