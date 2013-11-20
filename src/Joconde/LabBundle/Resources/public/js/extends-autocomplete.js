$(document).ready(function() {
    $(".search").autocomplete({
        minLength: 3,
        source: function(request, response) {
            $.ajax({
                url: '/search_ajax',
                dataType: "json",
                data: {
                    param:  $('.search').val()
                },
                success: function(data){
                    response( $.map( data, function( object ) {
                        return {
                            label: object.label,
                            value: object.label
                        }
                    }));
                },
                open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
              },
              close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
              }
            });
        }
    });
});