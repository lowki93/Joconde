$(document).ready(function() {
    var attr = $('.search').attr('data-url');
    $(".search").autocomplete({
        minLength: 3,
        source: attr,
    });
});