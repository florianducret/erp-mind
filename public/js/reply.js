 $('.container').on('submit', '.reply-form', function(){
    var data = $(this).serialize();
    var replyName = "#replies-" + $(this).data('id');

    $.post($(this).attr('action'), data, function(html){
        $(replyName).append(html);
        TweenMax.from($(replyName + ' .media:last'), 0.7, {
            ease: Power3.easeOut,
            opacity:0,
            height:0.5,
            y: -100
        });
    });
    return false;

});