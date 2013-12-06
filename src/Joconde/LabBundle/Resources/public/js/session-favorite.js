jQuery(function($){
    $(window).load(function(){
        var $container = $('.page-list');
        $("img").each(function(){
            if(  $(this).height() > $(this).width() ){
                console.log("height : "+$(this).height()+" ; width : "+$(this).width()+" ; imgHeight");
                $(this).addClass("imgHeight");
            } else {
                console.log("height : "+$(this).height()+" ; width : "+$(this).width()+" ; imgWidth");
                $(this).addClass("imgWidth");
            }
        });
        // initialize Masonry after all images have loaded
        $container.imagesLoaded( function() {
            $container.masonry({
                isAnimated: true,
                gutter: 10,
                columnWidth: 10,
                itemSelector: '.item',
            });
        });
    });
});

// add to favorite
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

// image hover
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

// change question
$(".btn-question").click(function(){
    var result = $(this).val();
    if(result == "none" || result == "no" ) {
        $.ajax({
            url: Routing.generate('change_question'),
            dataType: "json",
            data: {
                answer: $(this).val()
            },
            complete: function(question){

                $('.question').fadeOut(500,function(){
                    var responseQuestion = question.responseJSON.question;
                    var splitResponse = responseQuestion.split(",");
                    var newQuestion = splitResponse[0];
                    var typeQuestion = splitResponse[1];
                    var response = '<p>'+newQuestion+' ?</p><button class="btn-question" value="'+typeQuestion+',yes">oui</button><button class="btn-question" value="no">non</button><button class="btn-question" value="none">ne sais pas</button>'
                    $('.question').html(response);
                    $('.question').fadeIn(500);
                });
            }
        });
    } else {
        console.log("yes");
    }

});


    private var anim : Animation;
    anim = transform.FindChild("humanizr2").gameObject.GetComponent.<Animation>();
    anim.CrossFade("jumpLeft", 0.1);
    anim.PlayQueued("run");
