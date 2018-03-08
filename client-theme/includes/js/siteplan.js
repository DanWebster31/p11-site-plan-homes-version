// Vars used to dynamically scale site plan and icons /////
maxSitePlanWidth = 1600;
origSitePlanWidth = 2000;
origIconWidth = 52;
origSelectWidth = 313;

var winWidth = $(window).width();

if (winWidth < maxSitePlanWidth) {
	scale = winWidth/origSitePlanWidth;
} else {
	scale = maxSitePlanWidth/origSitePlanWidth;
}
//console.log(origIconWidth*scale);
// Scale icons
$(".res").each(function(){
	$(this).css("width", origIconWidth * scale + "px");
});

$("#select-res").css("width", origSelectWidth * scale + "px");

$('.tooltip').tooltipster({
	contentAsHTML: true,
	trigger: 'click',
	animation: 'fade',
	interactive: true,
	delay: 200,
	maxWidth: 400,
	distance: -5,
	position: 'right',
	hideOnClick: true,
	theme: 'tooltipster-noir',
	border: "2px",
	zIndex: 300,
	triggerClose: {
      click: true,
      scroll: true
  }
});

$(window).resize(function(){

	var winWidth = $(window).width();

	if (winWidth < maxSitePlanWidth) {
		scale = winWidth/origSitePlanWidth;
	} else {
		scale = maxSitePlanWidth/origSitePlanWidth;
	}

	$(".res").each(function(){
		$(this).css("width", origIconWidth * scale + "px");
	});

	$("#select-res").css("width", origSelectWidth * scale + "px");

});
