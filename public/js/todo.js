$('.container').on('submit', '.todo-form', function() {

	var input = $(this).serialize();
	$.post('/todo/add', input, function(output) {
		$('#todo-list').append(output);
		TweenMax.from('#todo-list li:last', 0.7, {
			scale:0,
			ease:Back.easeOut
		})
	});

	return false;
});

$('.container').on('submit', '#todo-list .delete-form', function() {

	var parent = $(this).closest('form');
	var input = $(this).serialize();

	$.post($(this).attr('action'), input, function() {
		TweenMax.to(parent, 0.5, {
			scale:0,
			height: 0,
			ease:Back.easeIn,
			onComplete: function() { parent.remove(); }
		})
	});

	return false;
});