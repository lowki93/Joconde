$(document).ready(function(){
    new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
    
    var $canvas = $('.myCanvas');
    var loaderImg = $('.loaderImg');

    var width = window.innerWidth;
    var height = window.innerHeight;

    var left = (window.innerWidth/2)-(loaderImg.width()/2);
    var top = (window.innerHeight/2)-(loaderImg.height()/2);

    $canvas.width(width);
    $canvas.height(height);

    loaderImg.css("left", left+"px");
    loaderImg.css("top", top+"px");

    var drop = document.querySelector(".myCanvas" );
    var context = drop.getContext('2d');

    drop.width = width;
    drop.height = height;

    context.beginPath();
    context.arc((window.innerWidth/2),(window.innerHeight/2),150 ,0,Math.PI*2,false);
    context.strokeStyle = "#ff5572";
    context.fillStyle = "#FFF";
    context.fill();
    context.stroke();

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