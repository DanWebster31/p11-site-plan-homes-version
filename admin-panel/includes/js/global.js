/********************************************************
INIT NAVIGATION
********************************************************/

function toggleHamburger() {
	$('#hamburger').toggleClass('open');
}

$('#responsive-menu-button').sidr({
	name: 'sidr-main',
	source: '#mainNav',
	side: 'right',
	onOpen: function() { toggleHamburger(); },
	onClose: function() { toggleHamburger(); }
});