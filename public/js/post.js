$(".container").on('submit', '.status-form', function(){
    var data = $(this).serialize();
    $('#statuses .well').remove();
    $.post('/status', data, function(html){
        $("#statuses").prepend(html);
        TweenMax.from($('#statuses .media:first'), 1.7, {
            ease: Power3.easeOut,
            opacity:-1,
            y: -200
        });
    });
    return false;

});