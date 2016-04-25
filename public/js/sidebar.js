var animation = new TimelineLite();

animation
	.to('#sidebar-wrapper', 0.5, {
		width: 300,
		padding: "0 20px"
	}, "#depart")

.to('#page-content-wrapper', 0.5, {
	x:200,
	scale:0.9,
	ease: Back.easeOut
}, "#depart")

.staggerFrom('#sidebar-wrapper *', 0.5, {
	opacity: 0,
	x: 60,
	ease: Back.easeOut
}, 0.03)

.pause();

button_toggled = false;
$("#menu-toggle").on('click', function(e) {
	e.preventDefault();

	button_toggled ?
		animation.timeScale(1.5).reverse() :
		animation.timeScale(1).play();

	button_toggled = !button_toggled;
});