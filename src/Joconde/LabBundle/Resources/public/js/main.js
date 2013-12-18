jQuery(function($){

    new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) ); 
    resize_canvas();

});

$(".menu-newsearch").hover(function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_newrecherche")
        .addClass("picto_newrecherche_hover");

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
        .removeClass("picto_selection_hover")
        .addClass("picto_selection");

});

$(".menu-apropos").hover(function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_apropos")
        .addClass("picto_apropos_hover");

}, function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_apropos_hover")
        .addClass("picto_apropos");

});

$(".menu").hover(function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_menu")
        .addClass("picto_menu_hover");

}, function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_menu_hover")
        .addClass("picto_menu");

});

$(".cherche").hover(function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_chercher")
        .addClass("picto_chercher_hover");

}, function(){

    var $button = $(this).find('i');
    $button
        .removeClass("picto_chercher_hover")
        .addClass("picto_chercher");

});

$(document)
    .on({ // HOVER TOO CHANGE PICTO FOR SEE
        mouseenter: function(){

            var $button = $(this).find('i');
            $button
                .removeClass("picto_close")
                .addClass("picto_close_hover");

        },
        mouseleave: function(){

            var $button = $(this).find('i');
            $button
                .removeClass("picto_close_hover")
                .addClass("picto_close");

        }
    }, '.close')