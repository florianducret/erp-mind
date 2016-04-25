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

$('[name=status]').on('input', function(e){
    var inputLength = $('[name=status]').val().length;
    if(500 - inputLength <= 0) {
        console.log($('[name=status]').val());
        $('[name=status]').val($('[name=status]').val().substr(0, 499));
        inputLength = 500;
    }
    $('#chars-count').text(500 - inputLength);
});