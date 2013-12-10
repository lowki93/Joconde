$(document).ready(function(){
    new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
});

$(".menu-newsearch").hover(function(){
    var $button = $(this).find('i');
    $button.removeClass("picto_newrecherche");
    $button.addClass("picto_newrecherche_hover");
}, function() {
    var $button = $(this).find('i');
    $button.removeClass("picto_newrecherche_hover");
    $button.addClass("picto_newrecherche");
});

$(".menu-selection").hover(function(){
    var $button = $(this).find('i');
    $button.removeClass("picto_selection");
    $button.addClass("picto_selection_hover");
}, function() {
    var $button = $(this).find('i');
    $button.removeClass("picto_selection_hoverr");
    $button.addClass("picto_selection");
});

$(".menu-apropos").hover(function(){
    var $button = $(this).find('i');
    $button.removeClass("picto_apropos");
    $button.addClass("picto_apropos_hover");
}, function() {
    var $button = $(this).find('i');
    $button.removeClass("picto_apropos_hover");
    $button.addClass("picto_apropos");
});