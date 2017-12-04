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
        $(this).next('dd').toggle();
    });

    $('dt').data('clicksCount', 0);

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
    });
});
</script>
