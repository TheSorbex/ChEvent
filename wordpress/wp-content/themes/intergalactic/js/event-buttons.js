jQuery(document).ready( function($) {
    $(".event-button").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: eventjs.ajaxurl,
            type: "post",
            data: {
                "action": "create_update_event_status",
                "eventId": $(e.target).attr('event_id'),
                "buttonId": $(e.target).attr('id')
            },
            success: function( data ) {
                alert(data);
            }
        });
    });
});