jQuery(document).ready(function() {

    jQuery(".icon").click(function() {
        jQuery(".menuOptions").toggle();
    });
    $(".butonJoin").click(function() {
        $(this).toggleClass('push');
    });
});