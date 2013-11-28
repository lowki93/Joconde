$(document).ready(function() {
    $(".btn-favorite").click(function(){
        console.log($(this).val());
        $.ajax({
            url: Routing.generate('add_favorite_notice'),
            dataType: "json",
            data: {
                param: $(this).val()
            },
            success: function(message){
                console.log(message);
            }
        });
    });
});