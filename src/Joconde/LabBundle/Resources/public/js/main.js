jQuery(function($){
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
	
	resize_canvas();
});

$(".menu-newsearch").hover(function(){

	var $button = $(this).find('i');
	$button.removeClass("picto_newrecherche")
	$button.addClass("picto_newrecherche_hover");

}, function(){

	var $button = $(this).find('i');
	$button
		.removeClass("picto_newrecherche_hover")
		.addClass("picto_newrecherche");

});

$(".menu-selection").hover(function(){

	var $button = $(this).find('i');
	$button
		.removeClass("picto_selection")
		.addClass("picto_selection_hover");

}, function(){

	var $button = $(this).find('i');
	$button
		.removeClass("picto_selection_hoverr")
		.addClass("picto_selection");

});

$(".menu-apropos").hover(function(){

	var $button = $(this).find('i');
	$button
		.removeClass("picto_apropos")
		.addClass("picto_apropos_hover");

}, function() {
	var $button = $(this).find('i');
	$button
		.removeClass("picto_apropos_hover")
		.addClass("picto_apropos");
});