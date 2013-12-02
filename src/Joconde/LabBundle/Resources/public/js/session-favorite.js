$(document).ready(function() {
    $(".btn-favorite").click(function(){
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

$("img").hover(function() {
    $img = $(this);
    $.ajax({
        url: Routing.generate('notice_hover'),
        dataType: "json",
        data: {
            id: $img.attr("alt")
        },
        complete: function(data){
            var image = /^[^;]*/i.exec(data.responseJSON[0].video);
            var response = " auteur : "+data.responseJSON[0].autr+"<br />"
                +'<img src="http://www.culture.gouv.fr/Wave/image/joconde'+image[0]+'"/>';
            $('.notice-hover').html(response);
        }
    });
}
, function() {
    console.log('out');
    $('.notice-hover').text("");
})