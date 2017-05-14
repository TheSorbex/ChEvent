jQuery(document).ready( function($) {
    $(".event-button").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: event.ajaxurl,
            success: function( data ) {
                alert( 'Your home page has ' + $(data).find('div').length + ' div elements.');
            }
        });
    });
});