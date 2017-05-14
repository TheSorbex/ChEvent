jQuery(document).ready( function($) {
    $(".event-button").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: event.ajaxurl,
            type: "POST",
            data: {
                "eventId": $(e.target).attr('event_id'),
                "buttonId": $(e.target).attr('id')
            },
            success: function( data ) {
                alert( 'event status id ' + data);
            }
        });
    });
});